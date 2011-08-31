<?php

class Usuarios_IndexController extends Jornadas_Controllers_Action
{
    public function indexAction() {
        $modelo_usuarios = new Usuarios();
        $usuarios = $modelo_usuarios->selectByRole('participant');

        $this->view->usuarios = $usuarios;
    }

    public function addAction() {
        $request = $this->getRequest();
        $form = new Usuarios_Form_Register();

        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {
                $fullname = $form->getElement('fullname')->getValue();
                $username = $form->getElement('username')->getValue();
                $email = $form->getElement('email')->getValue();

                $hash_generator = new Jornadas_Views_Helpers_Password();
                $hash = $hash_generator->password(8);

                $modelo_usuarios = new Usuarios();
                $usuario = $modelo_usuarios->createRow();

                $usuario->fullname = $fullname;
                $usuario->username = $username;
                $usuario->hash = $hash;
                $usuario->password = sha1(md5("...$hash..."));
                $usuario->email = $email;
                $usuario->tsregister = time();

                $usuario->save();

                $this->_helper->flashMessenger->addMessage(array(
                        'pwd' => '~',
                        'cmd' => 'sudo useradd ' . $usuario->username,
                        'su' => true,
                        'user' => $this->user->username,
                    ));
                $this->_helper->redirector('index', 'index', 'usuarios');
            }
        }

        $this->view->form = $form;
    }
}
