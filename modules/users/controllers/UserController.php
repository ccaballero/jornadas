<?php

class Users_UserController extends Application_Controllers_Action
{
    public function viewAction() {
        $request = $this->getRequest();
        $model_users = new Users();

        $url = $request->getParam('user');
        if (empty($url)) {
            $user = $this->user;
        } else {
            $user = $model_users->findByUsername($url);
        }

        $this->view->profile = $user;
    }
}
