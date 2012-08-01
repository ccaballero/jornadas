<?php

class Activities_IndexController extends Application_Controllers_Action
{
    public function indexAction() {
        $this->acl('manage:activity');

        $model_activities = new Activities();

        $request = $this->getRequest();
        if ($request->isPost()) {
            $activities = $request->getParam('act');

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

            $insertions = array();
            $errors = 0;
            
            foreach ($activities as $activity) {
                $code = $filter1->filter($activity['code']);
                $label = $filter2->filter($activity['label']);
                $order = $filter3->filter($activity['order']);

                if ($validator1->isValid($code) && $validator2->isValid($label)) {
                    $insertions[] = array(
                        'code' => $code,
                        'label' => $label,
                        'order' => $order
                    );
                } else {
                    $errors++;
                }
            }

            $model_activities->delete('');
            foreach ($insertions as $insert) {
                $model_activities->insert($insert);
            }
        }

        $this->view->activities = $model_activities->fetchAll($model_activities->select()->order('order ASC'));
    }

    public function assignAction() {
        $model_activities = new Activities();
        $this->view->activities = $model_activities->fetchAll($model_activities->select()->order('order ASC'));

        $model_users = new Users();
        $this->view->organizers = $model_users->selectByRole('organizer');
        $this->view->protocols  = $model_users->selectByRole('protocol');
        $this->view->assistants = $model_users->selectByRole('assistant');
    }
}
