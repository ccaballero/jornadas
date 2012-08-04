<?php

class Users_ServicesController extends Application_Controllers_Action
{
    public function enableAction() {
        $this->acl('apikey:view');

        $model_users = new Users();
        $username = $this->request->getParam('username');

        if (!empty($username)) {
            $user = $model_users->findByUsername($username);

            $hash_generator = new Application_Views_Helpers_Password();
            $hash = $hash_generator->password(8);

            $user->apikey = $hash;
            $user->save();

            $this->_helper->flashMessenger->addMessage('Se ha asignado un API KEY al usuario ' . $user->username);
        } else {
            $this->_helper->flashMessenger->addMessage('Usuario no encontrado');
        }

        $this->_helper->redirector('index', 'index', 'users');
    }

    public function disableAction() {
        $this->acl('apikey:view');

        $model_users = new Users();
        $username = $this->request->getParam('username');

        if (!empty($username)) {
            $user = $model_users->findByUsername($username);

            $user->apikey = '';
            $user->save();

            $this->_helper->flashMessenger->addMessage('Se ha removido el API KEY al usuario ' . $user->username);
        } else {
            $this->_helper->flashMessenger->addMessage('Usuario no encontrado');
        }

        $this->_helper->redirector('index', 'index', 'users');
    }
}
