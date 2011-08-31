<?php

class Usuarios_AutentificarController extends Jornadas_Controllers_Action
{
    public function accederAction() {
        $request = $this->getRequest();
        $form = new Usuarios_Form_Login();

        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {
                $dbAdapter = Zend_Db_Table::getDefaultAdapter();
                $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);
                $authAdapter->setTableName('usuarios')
                            ->setIdentityColumn('username')
                            ->setCredentialColumn('password')
                            ->setCredentialTreatment("SHA1(MD5(?))");

                $authAdapter->setIdentity($form->getElement('username')->getValue());
                $authAdapter->setCredential($form->getElement('password')->getValue());

                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);
                if ($result->isValid()) {
                    $user = $authAdapter->getResultRowObject();
                    $auth->getStorage()->write($user);
                    $this->_helper->flashMessenger->addMessage(array(
                        'pwd' => '~',
                        'cmd' => 'su ' . $user->username,
                        'su' => true,
                        'user' => 'guest',
                    ));
                    $this->_helper->redirector('index', 'index', 'portada');
                }
                $form->getElement('username')->addErrorMessage('Información incorrecta')->markAsError();
            }
        }

        $this->view->form = $form;
    }

    public function salirAction() {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_helper->redirector('index', 'index', 'portada');
    }
}
