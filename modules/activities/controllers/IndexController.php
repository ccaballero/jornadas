<?php

class Activities_IndexController extends Application_Controllers_Action
{
    public function indexAction() {
        $this->acl('activity:view');

        $model_activities = new Activities();
        $this->view->activities = $model_activities->fetchAll($model_activities->select()->order('order ASC'));
    }

    public function managerAction() {
        $this->acl('activity:manage');

        $model_activities = new Activities();

        if ($this->request->isPost()) {
            $table = $this->request->getParam('act');

            $filter1 = new Zend_Filter();
            $filter1->addFilter(new Zend_Filter_StringTrim())
                    ->addFilter(new Zend_Filter_Int());
            $filter2 = new Zend_Filter();
            $filter2->addFilter(new Zend_Filter_StringTrim())
                    ->addFilter(new Zend_Filter_StripNewlines());
            $filter3 = new Zend_Filter();
            $filter3->addFilter(new Zend_Filter_StringTrim())
                    ->addFilter(new Zend_Filter_Int());

            $validator1 = new Zend_Validate();
            $validator1->addValidator(new Zend_Validate_NotEmpty())
                       ->addValidator(new Zend_Validate_Int())
                       ->addValidator(new Zend_Validate_GreaterThan(array('min' => 0)));
            $validator2 = new Zend_Validate();
            $validator2->addValidator(new Zend_Validate_NotEmpty())
                       ->addValidator(new Zend_Validate_StringLength(array('min' => 4, 'max' => 128)))
                       ->addValidator(new Zend_Validate_Alnum(array('allowWhiteSpace' => true)));

            // Evaluation in new distribution
            $new_activities = array();
            $errors = 0;

            foreach ($table as $row) {
                $code = $filter1->filter($row['code']);
                $label = $filter2->filter($row['label']);
                $order = $filter3->filter($row['order']);

                if ($validator1->isValid($code) && $validator2->isValid($label)) {
                    $new_activities[$code] = array(
                        'code' => $code,
                        'label' => $label,
                        'order' => $order
                    );
                } else {
                    $errors++;
                }
            }

            // Evaluation in old distribution
            $old_activities = array();
            foreach ($model_activities->fetchAll() as $activity) {
                $old_activities[$activity->code] = $activity;
            }

            // Insert or Update of information
            foreach ($new_activities as $code => $activity) {
                // activity still exist
                if (array_key_exists($code, $old_activities)) {
                    // check for update information
                    $need_update = false;

                    if ($old_activities[$code]->label !== $activity['label']) {
                        $old_activities[$code]->label = $activity['label'];
                        $need_update = true;
                    }
                    if ($old_activities[$code]->order !== $activity['order']) {
                        $old_activities[$code]->order = $activity['order'];
                        $need_update = true;
                    }
                    if ($need_update) {
                        $old_activities[$code]->save();
                    }

                    unset($old_activities[$code]);
                } else {
                    // insertion right now!
                    $model_activities->insert($activity);
                }
            }

            // Delete the residual activities
            foreach ($old_activities as $activity) {
                $activity->delete();
            }
        }

        $this->view->activities = $model_activities->fetchAll($model_activities->select()->order('order ASC'));
    }

    public function assignAction() {
        $this->acl('activity:view');

        $model_activities = new Activities();
        $this->view->activities = $model_activities->fetchAll($model_activities->select()->order('order ASC'));

        $model_users = new Users();
        $organizers = $model_users->selectByRole('organizer');
        $protocols  = $model_users->selectByRole('protocol');
        $assistants = $model_users->selectByRole('assistant');

        $participants = array();
        foreach ($organizers as $organizer) {
            $participants[] = $organizer;
        }
        foreach ($protocols as $protocol) {
            $participants[] = $protocol;
        }
        foreach ($assistants as $assistant) {
            $participants[] = $assistant;
        }

        $this->view->participants = $participants;

        $table = array();

        $model_activities_users = new Activities_Users();
        foreach ($model_activities_users->fetchAll() as $assign) {
            $table[$assign->user][$assign->activity] = true;
        }

        $this->view->table = $table;
    }
}
