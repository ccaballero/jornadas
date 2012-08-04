<?php

class Users_UserController extends Application_Controllers_Action
{
//    public function viewAction() {
//    }

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
