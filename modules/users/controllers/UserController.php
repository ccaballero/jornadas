<?php

class Users_UserController extends Application_Controllers_Action
{
//    public function viewAction() {
//    }

    public function editAction() {
        $user = $this->getUser();

        $form = new Users_Form_Profile($user);
        $form->setUser($user);

        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost())) {

                $user->title    = $form->getElement('title')->getValue();
                $user->surname  = $form->getElement('surname')->getValue();
                $user->name     = $form->getElement('name')->getValue();
                $user->username = $form->getElement('username')->getValue();
                $user->email    = $form->getElement('email')->getValue();
                $user->save();

                $this->_helper->flashMessenger->addMessage('Usuario editado');
                $this->_helper->redirector('index', 'index', 'users');
            }
        }

        $this->view->form = $form;
    }

    public function nineblockAction() {
        $this->getResponse()->setHeader('Content-Type', 'image/png');
        echo $this->getUser()->getNineBlock();

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
    }

    private function getUser() {
        $model_users = new Users();

        $username = $this->request->getParam('username');
        if (empty($username)) {
            $user = $this->user;
        } else {
            $user = $model_users->findByUsername($username);
        }

        return $user;
    }
}
