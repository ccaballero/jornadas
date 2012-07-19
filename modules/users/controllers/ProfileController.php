<?php

class Users_ProfileController extends Application_Controllers_Action
{
    public function indexAction() {
        $this->requireLogin();

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

                $this->_helper->flashMessenger->addMessage('Perfil actualizado correctamente');
                $this->_helper->redirector('index', 'profile', 'users');
            }
        }

        $this->view->form = $form;
    }
}
