<?php

class Users_ProfileController extends Application_Controllers_Action
{
    public function indexAction() {
        $this->acl('profile:view');
        $this->acl('credential:view');

        $form = new Users_Form_Profile($this->user->ident);
        $form->setUser($this->user);
        $form->removeElement('title');

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

                $this->user->generateNineBlock();

                $this->_helper->flashMessenger->addMessage('Perfil actualizado correctamente');
                $this->_helper->redirector('index', 'profile', 'users');
            }
        }

        $this->view->form = $form;
    }

    public function qrAction() {
        $this->acl('credential:view');

        $this->getResponse()->setHeader('Content-Type', 'image/png');
        echo $this->user->getQR();

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
    }

    public function nineblockAction() {
        $this->acl('credential:view');
        
        $this->getResponse()->setHeader('Content-Type', 'image/png');
        echo $this->user->getNineBlock();

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
    }
}
