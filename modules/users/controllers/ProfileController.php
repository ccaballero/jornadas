<?php

class Users_ProfileController extends Application_Controllers_Action
{
    public function indexAction() {
        $this->acl('view:profile');

        $form = new Users_Form_Profile($this->user->ident);
        $form->setUser($this->user);

        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost())) {

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

    public function credentialAction() {
        $this->acl('view:credential');
    }

    public function qrAction() {
        $this->acl('view:credential');

        $this->getResponse()->setHeader('Content-Type', 'image/png');
        echo $this->user->getQR();

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
    }

    public function nineblockAction() {
        $this->acl('view:credential');
        
        $this->getResponse()->setHeader('Content-Type', 'image/png');
        echo $this->user->getNineBlock();

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
    }
}
