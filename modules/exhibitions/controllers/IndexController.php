<?php

class Exhibitions_IndexController extends Application_Controllers_Action
{
    public function indexAction() {
        $model_exhibitions = new Exhibitions();

        $exhibitions = array();
        foreach ($model_exhibitions->fetchAll() as $exhibition) {
            $exhibitions[] = array(
                $exhibition,
                $exhibition->getExhibitors(),
            );
        }
        
        $this->view->exhibitions = $exhibitions;
    }
}
