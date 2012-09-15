<?php

class Sponsors_IndexController extends Application_Controllers_Action
{
    public function indexAction() {
        // show the news
        $model_sponsors = new Sponsors();
        $this->view->sponsors = $model_sponsors->fetchAll(
            $model_sponsors->select()->order('label DESC')
        );
    }
}
