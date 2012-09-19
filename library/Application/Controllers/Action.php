<?php

class Application_Controllers_Action extends Zend_Controller_Action
{
    public $config = null;
    public $user = null;
    public $role = null;
    public $acl = null;

    public $request = null;

    public function preDispatch() {
        $this->config = Zend_Registry::get('config');
        $this->user = Zend_Registry::get('user');
        $this->role = Zend_Registry::get('role');
        $this->acl = Zend_Registry::get('acl');

        $this->request = $this->getRequest();

        $db = Zend_Db_Table::getDefaultAdapter();
        $db->insert('stats', array(
            'user_agent' => $_SERVER['HTTP_USER_AGENT'],
            'remote_addr' => $_SERVER['REMOTE_ADDR'],
            'request_uri' => $_SERVER['REQUEST_URI'],
            'tsregister' => time(),
        ));
    }

    public function postDispatch() {
        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->view->messages = $this->_flashMessenger->getMessages();
        
        $this->view->config = $this->config;

        $this->view->partial('frontpage/views/scripts/toolbar.php', array(
            'auth' => Zend_Auth::getInstance(),
            'user' => $this->user,
            'register' => $this->config->system->register->open,
        ));

        $this->view->partial('frontpage/views/scripts/menu.php', array(
            'route' => $this->getFrontController()->getRouter()->getCurrentRouteName(),
            'config' => $this->config,
        ));

        $this->view->render('frontpage/views/scripts/footer.php');
        $this->view->render('frontpage/views/scripts/messages.php');
    }

    public function acl($resource) {
        if (!$this->acl->isAllowed($this->role, null, $resource)) {
            $this->_helper->flashMessenger->addMessage('Tu no tienes los privilegios suficientes');
            $this->_helper->redirector('in', 'index', 'auth');
        }
    }
}
