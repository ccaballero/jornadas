<?php

class Jornadas_Controllers_Action extends Zend_Controller_Action
{
    public $auth = null;
    public $user = null;
    public $route = null;

    public function preDispatch() {
        $this->view->addScriptPath(APPLICATION_PATH . '/modules');

        $this->view->auth = Zend_Auth::getInstance();
        $this->auth = $this->view->auth->getIdentity();

        if (!empty($this->auth)) {
            $modelo_usuarios = new Usuarios();
            $this->user = $modelo_usuarios->findByIdent($this->auth->ident);
            $this->view->user = $this->user;
        } else {
            $this->user = new Usuarios_Guest();
            $this->view->user = $this->user;
        }

        $db = Zend_Db_Table::getDefaultAdapter();
        $db->insert('visitas', array(
            'application_env' => $_SERVER['APPLICATION_ENV'],
            'user_agent' => $_SERVER['HTTP_USER_AGENT'],
            'remote_addr' => $_SERVER['REMOTE_ADDR'],
            'request_uri' => $_SERVER['REQUEST_URI'],
            'tsregister' => time(),
        ));

        $this->view->addHelperPath(APPLICATION_PATH . '/../library/Jornadas/Views/Helpers', 'Jornadas_Views_Helpers');

        $this->view->route = $this->getFrontController()->getRouter()->getCurrentRouteName();
        $this->route = $this->view->route;
    }

    public function postDispatch() {
        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->view->messages = $this->_flashMessenger->getMessages();

        $this->view->render('portada/views/scripts/menu.php');
        $this->view->render('portada/views/scripts/footer.php');
        $this->view->render('portada/views/scripts/messages.php');
    }

    public function requireLogin() {
        if ($this->auth == null) {
            $this->_helper->flashMessenger->addMessage('You must be logged');
            $this->_helper->redirector('in', 'index', 'auth');
        }
    }
}
