<?php

class Services_IndexController extends Application_Controllers_Action
{
    public $xml;
    
    public function init() {
        $this->xml = new Extra_ToXML();
        
        parent::init();
    }

    public function queryAction() {
        $stdClass = new stdClass();

        if ($this->getUser() == null) {
            $stdClass->result = 0;
        } else {
            $stdClass->result = 1;

            $stdClass->role = $user->role;
            $stdClass->title = $user->title;
            $stdClass->surname = $user->surname;
            $stdClass->name = $user->name;
            $stdClass->username = $user->username;
            $stdClass->email = $user->email;
        }

        $this->sendXML($stdClass);
    }

    public function activitiesAction() {
        $model_activities = new Activities();

        $activities = $model_activities->fetchAll(
            $model_activities->select()->order('order ASC')
        );

        $list = array();
        foreach ($activities as $activity) {
            $stdClass = new stdClass();
            $stdClass->code = $activity->code;
            $stdClass->label = $activity->label;
            $list[] = $stdClass;
        }

        $this->sendXML($list);
    }

    public function markAction() {
        return $this->_markAction('add');
    }
    
    public function unmarkAction() {
        return $this->_markAction('del');
    }
    
    private function _markAction($status) {
        $stdClass = new stdClass();

        $organizer = $this->getOrganizer($stdClass);
        $user = $this->getUser($stdClass);
        $activity = $this->getActivity($stdClass);

        // POST verification
//        $valid_post = false;
//        if ($this->request->isPost()) {
            $valid_post = true;
//        } else {
//            $stdClass->messages[] = 'Debe utilizar el metodo POST';
//        }

        if (!empty($organizer) && !empty($user) &&
            !empty($activity) && $valid_post) {
            $model_activities_users = new Activities_Users();

            try {
                if ($status == 'add') {
                    $model_activities_users->insert(array(
                        'user' => $user->ident,
                        'activity' => $activity->ident,
                    ));
                    $stdClass->result = 1;
                } else if ($status == 'del') {
                    $model_activities_users->delete(array(
                        'user = ?' => $user->ident,
                        'activity = ?' => $activity->ident
                    ));
                    $stdClass->result = 1;
                }
            } catch (Exception $e) {
                $stdClass->result = 0;
                $stdClass->messages[] = $user->getFullname() .
                    ' ya fue marcado en esta actividad.';
            }
        } else {
            $stdClass->result = 0;
        }

        $this->sendXML($stdClass);
    }

    public function getHash($container = null) {
        $hash = $this->request->getParam('hash');
        if (empty($hash)) {
            $container->messages[] = 'Hash no provisto';
        }
        return $hash;
    }
    
    public function getApikey($container = null) {
        $apikey = $this->request->getParam('apikey');
        if (empty($apikey)) {
            $container->messages[] = 'API no provisto';
        }
        return $apikey;
    }
    
    public function getActivity($container = null) {
        $id_activity = $this->request->getParam('activity');
        if (empty($id_activity)) {
            $container->messages[] = 'Actividad no provista';
        } else {
            $model_activities = new Activities();
            
            $activity = $model_activities->findByCode($id_activity);
            if (empty($activity)) {
                $container->messages[] = 'Actividad inexistente';
            }
        }

        return $activity;
    }

    public function getUser($container = null) {
        $model_users = new Users();
        $user = $model_users->findByQr(sha1($this->getHash()));
        
        if (empty($user)) {
            $container->messages[] = 'Usuario incorrecto';
        }
        
        return $user;
    }

    public function getOrganizer($container = null) {
        $apikey = $this->getApikey();

        $model_users = new Users();
        
        $organizer = $model_users->findByApiKey($apikey);
        if (empty($organizer)) {
            if (empty($container)) {
                $container->messages[] = 'API KEY erroneo';
            }
        }
        
        return $organizer;
    }

    public function sendXML($container) {
        $response = $this->getResponse();
        $response->setHeader('Content-Type', 'application/xml');
        $response->setBody($this->xml->toXML($container));

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
    }
}
