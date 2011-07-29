<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initAutoload() {
        $loader = Zend_Loader_Autoloader::getInstance();

        $resourceTypes = array('form' => array('path' => 'forms/', 'namespace' => 'Form',),);
        $modules = array('portada', 'usuarios', 'exposiciones', 'noticias');

        foreach ($modules as $module) {
            $loader->pushAutoloader(new Zend_Application_Module_Autoloader(
                array(
                    'namespace' => ucfirst($module),
                    'basePath' => APPLICATION_PATH . '/modules/' . $module, 'resourceTypes' => $resourceTypes)
            ));
        }

        $loader->pushAutoloader(new Jornadas_Models_Loader());
        return $loader;
    }

    protected function _initRouter() {
        $ctrl = Zend_Controller_Front::getInstance();
        $router = $ctrl->getRouter();

        $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/routes.ini');
        $router->addConfig($config, 'global');

        return $router;
    }

    protected function _initView() {
        $renderer = new Zend_Controller_Action_Helper_ViewRenderer();
        $renderer->setViewSuffix('php');
        Zend_Controller_Action_HelperBroker::addHelper($renderer);

        $view = new Zend_View();
        $view->headTitle('Jornadas de seguridad');
        $view->doctype('HTML5');
        $view->headMeta()->appendHttpEquiv('Content-Type', 'text/html; charset=utf-8');
        $view->headLink()->appendStylesheet('/media/style.css');
        return $view;
    }
}
