<?php

class Users_IndexController extends Application_Controllers_Action
{
    public function indexAction() {
        if ($this->request->isPost()) {
            $this->_forward('index', 'index', 'credentials');
        }

        $model_users = new Users();

        $this->view->organizers = $model_users->selectByRole('organizer');
        $this->view->protocols  = $model_users->selectByRole('protocol');
        $this->view->assistants = $model_users->selectByRole('assistant');

        $config = Zend_Registry::get('config');

        $this->view->max_organizers = intval($config->system->capacity->organizers);
        $this->view->max_protocols  = intval($config->system->capacity->protocols);
        $this->view->max_assistants = intval($config->system->capacity->assistants);

        $this->view->count_organizers = intval($model_users->countByRole('organizer'));
        $this->view->count_protocols  = intval($model_users->countByRole('protocol'));
        $this->view->count_assistants = intval($model_users->countByRole('assistant'));
    }

    public function organizerAction() {
        $this->acl('organizer:add');
        $this->agregarUsuario('organizer');
    }

    public function protocolAction() {
        $this->acl('protocol:add');
        $this->agregarUsuario('protocol');
    }

    public function assistantAction() {
        $this->acl('assistant:add');
        $this->agregarUsuario('assistant');
    }

    private function agregarUsuario($rol) {
        $request = $this->getRequest();

        $model_users = new Users();
        $user = $model_users->createRow();

        $form = new Users_Form_Profile(0);
        $form->setUser($user);

        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {

                $hash_generator = new Application_Views_Helpers_Password();
                $hash = $hash_generator->password(8);

                $user->role     = $rol;

                $user->title    = $form->getElement('title')->getValue();
                $user->surname  = $form->getElement('surname')->getValue();
                $user->name     = $form->getElement('name')->getValue();
                $user->username = $form->getElement('username')->getValue();
                $user->email    = $form->getElement('email')->getValue();

                $user->hash = $hash;
                $user->password = sha1(md5($hash));
                $user->tsregister = time();

                $user->save();

                $this->_helper->flashMessenger->addMessage('Usuario agregado');
                $this->_helper->redirector('index', 'index', 'users');
            }
        }

        $this->view->form = $form;
    }

/*    public function exportAction() {
        header("HTTP/1.1 200 OK"); //mandamos código de OK
        header("Status: 200 OK"); //sirve para corregir un bug de IE (fuente: php.net)
        header('Content-Type: text/plain; charset=utf-8');

        $model_users = new Users();


        echo '"NOMBRE COMPLETO","TIPO"' . PHP_EOL;

        foreach ($model_users->selectByRole('exhibitor') as $us) {
            echo '"' . $us->getFullname() . '","Expositor"' . PHP_EOL;
        }

        foreach ($model_users->selectByRole('organizer') as $us) {
            echo '"' . $us->getFullname() . '","Organizador"' . PHP_EOL;
        }

        foreach ($model_users->selectByRole('assistant') as $us) {
            echo '"' . $us->getFullname() . '","Asistente"' . PHP_EOL;
        }

        die;
    }

    public function generateAction() {
//        $this->requireLogin();
//        $this->requireAdmin();

        $modelo_usuarios = new Usuarios();
        $usuarios = $modelo_usuarios->fetchAll();

        foreach ($usuarios as $usuario) {
            $image_file = APPLICATION_PATH . '/data/tmp/' . $usuario->ident . '.png';

            $ch = curl_init();
            $fp = fopen($image_file, 'wb');
            curl_setopt ($ch, CURLOPT_URL, 'http://' . $_SERVER['HTTP_HOST'] . '/icon.php?hash=' . sha1($usuario->fullname) . '&size=512');
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_exec($ch);
            curl_close($ch);
            fclose($fp);
        }

        $this->_helper->flashMessenger->addMessage(array(
            'pwd' => '~',
            'cmd' => 'sh credentials_generate.sh',
            'role' => 'admin',
            'user' => $this->user,
            'message' => 'Imagenes generadas correctamente',
        ));
        $this->_helper->redirector('index', 'index', 'portada');
    }*/
}
