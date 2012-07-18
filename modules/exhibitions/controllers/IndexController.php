<?php

class Exhibitions_IndexController extends Application_Controllers_Action
{
    public function indexAction() {
        $model_exhibitions = new Exhibitions();
        $exhibitions = $model_exhibitions->selectWithExponents();

        $this->view->exhibitions= $exhibitions;
    }
}
