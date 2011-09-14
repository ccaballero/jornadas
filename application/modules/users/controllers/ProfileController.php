<?php

class Users_ProfileController extends Application_Controllers_Action
{
    public function indexAction() {
        $request = $this->getRequest();

        $form = new Users_Form_Profile($this->user->ident);
        $form->setUser($this->user);

        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {

                $surname = $form->getElement('surname')->getValue();
                $name = $form->getElement('name')->getValue();
                $username = $form->getElement('username')->getValue();
                $email = $form->getElement('email')->getValue();

                $this->user->surname = $surname;
                $this->user->name = $name;
                $this->user->username = $username;
                $this->user->email = $email;
                $this->user->save();

                $this->_helper->flashMessenger->addMessage(array(
                    'pwd' => '~',
                    'cmd' => './update_user.sh',
                    'user' => $this->user->username,
                    'message' => 'Configurando la información del usuario ' . '<br />' .
                                 str_pad('Estableciendo el nombre completo ', 99, '.', STR_PAD_RIGHT) . '<span class="bold green">[OK]</span><br />' .
                                 str_pad('Verificando el nombre de usuario ', 99, '.', STR_PAD_RIGHT) . '<span class="bold green">[OK]</span><br />' .
                                 str_pad('Verificando el correo electronico ', 99, '.', STR_PAD_RIGHT) . '<span class="bold green">[OK]</span><br />' .
                                 '<br />' .
                                 'Tu nombre completo es: ' . '<span class="bold">' . $this->user->getFullname() . '</span><br />' ,
                ));
                $this->_helper->redirector('index', 'profile', 'users');
            }
        }

        $this->view->form = $form;
    }
}
