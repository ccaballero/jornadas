<?php

class Services_IndexController extends Application_Controllers_Action
{
    public function queryAction() {
        $hash = $this->request->getParam('hash');

        $model_users = new Users();
        $user = $model_users->findByPassword(sha1($hash));

        $stdClass = new stdClass();

        if (empty($user)) {
            $stdClass->result = 0;
        } else {
            $stdClass->result = 1;

            $stdClass->role = $user['role'];
            $stdClass->title = $user['title'];
            $stdClass->surname = $user['surname'];
            $stdClass->name = $user['name'];
            $stdClass->username = $user['username'];
            $stdClass->email = $user['email'];
        }

        $response = $this->getResponse();
        $response->setHeader('Content-Type', 'application/xml');
        
        $xml = new Extra_ToXML();
        $response->setBody($xml->toXML($stdClass));

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
    }

    public function activitiesAction() {
        $model_activities = new Activities();

        $activities = $model_activities->fetchAll($model_activities->select()->order('order ASC'));

        $list = array();
        foreach ($activities as $activity) {
            $stdClass = new stdClass();
            $stdClass->code = $activity->code;
            $stdClass->label = $activity->label;
            $list[] = $stdClass;
        }
        
        $response = $this->getResponse();
        $response->setHeader('Content-Type', 'application/xml');
        
        $xml = new Extra_ToXML();
        $response->setBody($xml->toXML($list));

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
    }
}
