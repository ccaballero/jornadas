<?php

class Application_Controllers_Action extends Zend_Controller_Action
{
    public $auth = null;
    public $user = null;
    public $role = null;
    public $route = null;

    public function preDispatch() {
        $this->view->addScriptPath(APPLICATION_PATH . '/modules');

        $this->view->auth = Zend_Auth::getInstance();
        $this->auth = $this->view->auth->getIdentity();

        if (!empty($this->auth)) {
            $model_users = new Users();
            $this->user = $model_users->findByIdent($this->auth->ident);
            $this->view->user = $this->user;
        } else {
            $this->user = new Users_Guest();
            $this->view->user = $this->user;
        }

        $this->role = $this->user->role;
        $this->view->role = $this->role;

        $db = Zend_Db_Table::getDefaultAdapter();
        $db->insert('stats', array(
            'user_agent' => $_SERVER['HTTP_USER_AGENT'],
            'remote_addr' => $_SERVER['REMOTE_ADDR'],
            'request_uri' => $_SERVER['REQUEST_URI'],
            'tsregister' => time(),
        ));

        $this->view->addHelperPath(APPLICATION_PATH . '/library/Application/Views/Helpers', 'Application_Views_Helpers');

        $this->view->route = $this->getFrontController()->getRouter()->getCurrentRouteName();
        $this->route = $this->view->route;
    }

    public function postDispatch() {
        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->view->messages = $this->_flashMessenger->getMessages();

        $this->view->render('frontpage/views/scripts/menu.php');
        $this->view->render('frontpage/views/scripts/footer.php');
        $this->view->render('frontpage/views/scripts/messages.php');
    }

    public function requireLogin() {
        if ($this->auth == null) {
            $this->_helper->flashMessenger->addMessage(array(
                'only_message' => true,
                'message' => 'Tu debes estar logeado',
            ));
            $this->_helper->redirector('in', 'index', 'auth');
        }
    }

    public function requireAdmin() {
        $role = $this->role;

        if ($this->role == 'admin') { return; }
        if ($this->role == 'organizer') { return; }

        $this->_helper->flashMessenger->addMessage(array(
            'only_message' => true,
            'message' => 'Tu debes tener privilegios de administración',
        ));
        $this->_helper->redirector('index', 'index', 'frontpage');
    }
}
