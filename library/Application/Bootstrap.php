<?php

class Application_Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initAutoload() {
        $loader = Zend_Loader_Autoloader::getInstance();

        $resourceTypes = array('form' => array('path' => 'forms/', 'namespace' => 'Form',),);
        $modules = array('frontpage', 'users', 'auth', 'services', 'exhibitions', 'news', 'activities');

        foreach ($modules as $module) {
            $loader->pushAutoloader(new Zend_Application_Module_Autoloader(
                array(
                    'namespace' => ucfirst($module),
                    'basePath' => APPLICATION_PATH . '/modules/' . $module, 'resourceTypes' => $resourceTypes)
            ));
        }

        $loader->pushAutoloader(new Application_Models_Loader());
        return $loader;
    }

    protected function _initRouter() {
        $ctrl = Zend_Controller_Front::getInstance();
        $router = $ctrl->getRouter();

        $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/routes.ini');
        $router->addConfig($config, 'global');

        return $router;
    }

    protected function _initSession() {
        Zend_Session::start();
    }

    protected function _initConfig() {
        $config = new Zend_Config($this->getOptions());

        Zend_Registry::set('config', $config);
        return $config;
    }

    protected function _initTranslate() {
        $translate = new Zend_Translate(array(
            'adapter' => 'csv',
            'content' => APPLICATION_PATH . '/i18n/es.csv',
            'locale'  => 'es',
            'delimiter' => ','
        ));

        // PHP's settings for encoding
        mb_internal_encoding('UTF-8');
        mb_http_output('UTF-8');

        // Set for localization
        setlocale(LC_CTYPE, 'en_US.UTF8');
        Zend_Locale::setDefault('en_US.UTF8');

        Zend_Form::setDefaultTranslator($translate);
        Zend_Validate_Abstract::setDefaultTranslator($translate);

        Zend_Registry::set('Zend_Translate', $translate);

        return $translate;
    }

    protected function _initView() {
        $this->bootstrap(array('user', 'acl'));
        
        $options = $this->getOptions();

        $view = new Zend_View();

        $baseUrl = $options['resources']['frontController']['baseUrl'];
        $layout = $options['resources']['layout']['layout'];

        $view->headTitle($options['system']['name']);
        $view->doctype($options['resources']['layout']['doctype']);
        $view->headMeta()
             ->appendHttpEquiv('Content-Type', 'text/html; charset=utf-8');
        $view->headScript()
             ->appendFile($baseUrl . '/js/jquery-1.6.2.min.js', 'text/javascript')
             ->appendFile($baseUrl . '/js/jquery.countdown.min.js', 'text/javascript')
             ->appendFile($baseUrl . '/js/init.js', 'text/javascript');
        $view->headLink()
             ->headLink(array('rel' => 'favicon', 'href' => $view->baseUrl('templates/' . $layout . '/favicon.png')))
             ->headLink(array('rel' => 'alternate', 'type' => 'application/rss+xml', 'href' => '/rss', 'title' => 'Canal RSS'));
        
        $css_styles = $options['template']['css'];
        foreach ($css_styles as $css_style) {
             $view->headLink()
                  ->appendStylesheet($baseUrl . '/css/' . $css_style);
        }

        $view->title = $options['system']['name'];
        $view->baseUrl = $baseUrl;

        $view->user = Zend_Registry::get('user');
        $view->role = Zend_Registry::get('role');
        $view->acl = Zend_Registry::get('acl');

        $view->addHelperPath(APPLICATION_PATH . '/library/Application/Views/Helpers', 'Application_Views_Helpers');
        $view->addScriptPath(APPLICATION_PATH . '/modules');

        // Use the php suffix in views
        $renderer = new Zend_Controller_Action_Helper_ViewRenderer();
        $renderer->setView($view)
                 ->setViewSuffix('php');

        Zend_Controller_Action_HelperBroker::addHelper($renderer);

        return $view;
    }

    public function _initUser() {
        $this->bootstrap(array('db', 'autoload'));

        $auth = Zend_Auth::getInstance();
        $identity = $auth->getIdentity();

        $user = new Users_Guest();

        if (!empty($identity)) {
            $model_users = new Users();
            $logged_user = $model_users->findByIdent($identity->ident);

            if (!empty($logged_user)) {
                if (empty($logged_user->hash)) {
                    $hash_generator = new Application_Views_Helpers_Password();
                    $logged_user->hash = $hash_generator->password(8);
                    $logged_user->save();
                }
                $user = $logged_user;
            }
        }

        Zend_Registry::set('user', $user);
        Zend_Registry::set('role', $user->role);
        return $user;
    }

    public function _initAcl() {
        $acl = new Zend_Acl();

        $acl->addRole(new Zend_Acl_Role('guest'))
            ->addRole(new Zend_Acl_Role('assistant'))
            ->addRole(new Zend_Acl_Role('exhibitor'))
            ->addRole(new Zend_Acl_Role('organizer'))
            ->addRole(new Zend_Acl_Role('admin'));

        $acl->allow('assistant', null, array(
            'credential:view',
            'new:add',
        ));
        $acl->allow('exhibitor', null, array(
            'credential:view',
            'new:add',
        ));
        $acl->allow('organizer', null, array(
            'credential:view',
            'assistant:add',
            'activity:view',
            'new:add',
        ));
        $acl->allow('admin', null, array(
            'credential:view',
            'credential:print',
            'organizer:add',
            'exhibitor:add',
            'protocol:add',
            'assistant:add',
            'user:edit',
            'hash:view',
            'apikey:view',
            'activity:view',
            'activity:manage',
            'new:add',
            'exhibitions:add',
        ));

        Zend_Registry::set('acl', $acl);
        return $acl;
    }
}
