<?php

class Services_IndexController extends Application_Controllers_Action
{
    public function queryAction() {
        $hash = $this->request->getParam('hash');

        $model_users = new Users();
        $user = $model_users->findByQr(sha1($hash));

        $stdClass = new stdClass();

        if (empty($user)) {
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

        $xml = new Extra_ToXML();

        $response = $this->getResponse();
        $response->setHeader('Content-Type', 'application/xml');
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

        $xml = new Extra_ToXML();

        $response = $this->getResponse();
        $response->setHeader('Content-Type', 'application/xml');
        $response->setBody($xml->toXML($list));

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
    }

    public function markAction() {
        $apikey = $this->request->getParam('apikey');
        $id_activity = $this->request->getParam('activity');
        $hash = $this->request->getParam('hash');

        $xml = new Extra_ToXML();
        $stdClass = new stdClass();

        $model_users = new Users();
        $model_activities = new Activities();

        // POST verification
        $valid_post = false;
        if ($this->request->isPost()) {
            $valid_post = true;
        } else {
            $stdClass->messages[] = 'Debe utilizar el metodo POST';
        }
        
        // API KEY verification
        $valid_apikey = false;
        if (!empty($apikey)) {
            $organizer = $model_users->findByApiKey($apikey);
            if (!empty($organizer)) {
                $valid_apikey = true;
            } else {
                $stdClass->messages[] = 'API KEY erroneo';
            }
        } else {
            $stdClass->message[] = 'API KEY no provisto';
        }

        // Activity verification
        $valid_activity = false;
        if (!empty($id_activity)) {
            $activity = $model_activities->findByIdent($id_activity);
            if (!empty($activity)) {
                $valid_activity = true;
            } else {
                $stdClass->messages[] = 'Actividad inexistente';
            }
        } else {
            $stdClass->messages[] = 'Actividad no provista';
        }

        // Hash verification
        $valid_hash = false;
        if (!empty($hash)) {
            $assistant = $model_users->findByQr(sha1($hash));
            if (!empty($assistant)) {
                $valid_hash = true;
            } else {
                $stdClass->messages[] = 'Hash incorrecto';
            }
        } else {
            $stdClass->messages[] = 'Hash no provisto';
        }

        if ($valid_post && $valid_apikey && $valid_activity && $valid_hash) {
            $model_activities_users = new Activities_Users();

            try {
                $model_activities_users->insert(array(
                    'user' => $assistant['ident'],
                    'activity' => $activity->ident,
                ));
                $stdClass->result = 1;
            } catch (Exception $e) {
                $stdClass->result = 0;
                $stdClass->messages[] = $assistant->getFullname() . ' ya fue marcado en esta actividad.';
            }
        } else {
            $stdClass->result = 0;
        }

        $response = $this->getResponse();
        $response->setHeader('Content-Type', 'application/xml');
        $response->setBody($xml->toXML($stdClass));

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
    }
}
