<?php

class Activities_IndexController extends Application_Controllers_Action
{
    public function indexAction() {
        $model_activities = new Activities();

        $request = $this->getRequest();
        if ($request->isPost()) {
            $activities = $request->getParam('act');
            
            $model_activities->delete('');
            
            $filter1 = new Zend_Filter();
            $filter1->addFilter(new Zend_Filter_StringTrim())
                    ->addFilter(new Zend_Filter_StripNewlines());
            $filter2 = new Zend_Filter();
            $filter2->addFilter(new Zend_Filter_StringTrim())
                    ->addFilter(new Zend_Filter_Int());

            foreach ($activities as $activity) {
                if (!empty($activity['label'])) {
                    $model_activities->insert(
                        array(
                            'label' => $filter1->filter($activity['label']),
                            'order' => $filter2->filter($activity['order']),
                    ));
                }
            }
        }

        $this->view->activities = $model_activities->fetchAll($model_activities->select()->order('order ASC'));
    }
}
