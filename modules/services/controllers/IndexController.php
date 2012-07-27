<?php

class Services_IndexController extends Application_Controllers_Action
{
    public function queryAction() {
        $request = $this->getRequest();
        
        $username = $request->getParam('username');
        $hash = $request->getParam('hash');
        
        $model_users = new Users();
        $user = $model_users->getUser($username, sha1($hash));
        
        $stdClass = new stdClass();

        if (empty($user)) {
            $stdClass->result = false;
        } else {
            $stdClass->result = true;
            
            $stdClass->role = $user['role'];
            $stdClass->title = $user['title'];
            $stdClass->surname = $user['surname'];
            $stdClass->name = $user['name'];
            $stdClass->name = $user['email'];
        }
        
        $response = $this->getResponse();
        $response->setHeader('Content-Type', 'application/xml');
        $response->setBody(Extra_ArrayToXML::toXml($stdClass));

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
    }
}
