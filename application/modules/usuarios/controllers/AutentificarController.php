<?php

class Usuarios_AutentificarController extends Jornadas_Controllers_Action
{
    public function registroAction() {
        $request = $this->getRequest();
        $form = new Usuarios_Form_Register();

        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {
                $fullname = $form->getElement('fullname')->getValue();
                $username = $form->getElement('username')->getValue();
                $email = $form->getElement('email')->getValue();

                $password_generator = new Jornadas_Views_Helpers_Password();
                $password = $password_generator->password();

                $modelo_usuarios = new Usuarios();
                $usuario = $modelo_usuarios->createRow();

                $usuario->fullname = $fullname;
                $usuario->username = $username;
                $usuario->password = sha1(md5($password));
                $usuario->email = $email;
                $usuario->tsregister = time();

                $usuario->save();

                $view = new Zend_View();
                $view->setScriptPath(APPLICATION_PATH . '/modules/usuarios/views/scripts/');
                $view->usuario = $usuario;
                $view->password = $password;

                $mail = new Jornadas_Views_Helpers_Mail();
                $mail->mail('Registro en el sitio de las jornadas de seguridad informática', $view->render('mail/registro.php'), $usuario->email, $usuario->fullname);

                $this->_helper->flashMessenger->addMessage('Se envió un correo electrónico con la contraseña de acceso');
                $this->_redirect('/acceder');
            }
        }

        $this->view->form = $form;
    }

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
