<?php

class Auth_IndexController extends Application_Controllers_Action
{
    public function inAction() {
        $request = $this->getRequest();
        $form = new Auth_Form_Login();

        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {
                $dbAdapter = Zend_Db_Table::getDefaultAdapter();
                $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);
                $authAdapter->setTableName('users')
                            ->setIdentityColumn('username')
                            ->setCredentialColumn('password')
                            ->setCredentialTreatment("SHA1(MD5(?))");

                $authAdapter->setIdentity($form->getElement('username')->getValue());
                $authAdapter->setCredential($form->getElement('password')->getValue());

                $username = $form->getElement('username')->getValue();
                
                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);
                if ($result->isValid()) {
                    $user = $authAdapter->getResultRowObject();
                    $auth->getStorage()->write($user);
                    $this->_helper->flashMessenger->addMessage('Bienvenido ' . $username);
//                    $this->_helper->flashMessenger->addMessage(array(
//                        'pwd' => '~',
//                        'cmd' => 'su ' . $user->username,
//                        'su' => true,
//                        'user' => 'guest',
//                    ));
                    $this->_helper->redirector('index', 'index', 'frontpage');
                }
                $form->getElement('username')->addErrorMessage('Información incorrecta')->markAsError();
            }
        }

        $this->view->form = $form;
    }

    public function outAction() {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_helper->flashMessenger->addMessage('Tu saliste de tu cuenta');
//        $this->_helper->flashMessenger->addMessage(array(
//            'pwd' => '~',
//            'cmd' => 'exit',
//            'su' => false,
//            'user' => $this->user->username,
//            'role' => $this->role,
//            'message' => 'Acabas de salir de tu cuenta.<br/>',
//        ));
        $this->_helper->redirector('in', 'index', 'auth');
    }
}
