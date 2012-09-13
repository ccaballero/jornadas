<?php

class Auth_IndexController extends Application_Controllers_Action
{
    public function registerAction() {
        if (!$this->config->system->register->open) {
            $this->_helper->flashMessenger->addMessage('El registro libre esta deshabilitado');
            $this->_helper->redirector('index', 'index', 'frontpage');
        }

        $model_users = new Users();
        $user = $model_users->createRow();

        $form = new Auth_Form_Register();
//        $form = new Users_Form_Profile(0);
//        $form->setUser($user);

        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost())) {
                $hash_generator = new Application_Views_Helpers_Password();
                $hash = $hash_generator->password(8);

                $user->role = 'assistant';
                $user->username = $form->getElement('username')->getValue();
                $user->email = $form->getElement('email')->getValue();
                $user->hash = $hash;
                $user->password = sha1(md5($hash));
                $user->tsregister = time();
                $user->save();

                
                // email notification
                $view = new Zend_View();
                $view->setScriptPath($this->config->resources->frontController->moduleDirectory . '/auth/views/scripts/mail/');

                $view->user       = $user;
                $view->servername = $this->config->system->servername;
                $view->password   = $password;

                $content = $view->render('register.php');
                $mail = new Zend_Mail('UTF-8');
                $mail->setBodyHtml($content)
                        ->setFrom($this->config->system->email_direction, $this->config->system->email_name)
                        ->addTo($user->email, $user->getFullName())
                        ->setSubject('Notificacion de registro de usuario')
                        ->send();

                $this->_helper->flashMessenger->addMessage('Bienvenido, te enviamos un correo con la famosa contraseña aleatoria.');
                $this->_helper->redirector('index', 'index', 'frontpage');
            }
        }

        $this->view->form = $form;
    }

    public function inAction() {
        $form = new Auth_Form_Login();

        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost())) {
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

                    // Register of last login
                    $dbAdapter->update('users', array('tslastlogin' => time()), 'ident = ' . $user->ident);

                    $this->_helper->flashMessenger->addMessage('Bienvenido ' . $username);
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
        $this->_helper->redirector('in', 'index', 'auth');
    }
}
