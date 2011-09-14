<?php

class Exhibitions_ExhibitionController extends Application_Controllers_Action
{
    public function viewAction() {
        $request = $this->getRequest();
        $url = $request->getParam('exhibition');

        $model_exhibitions = new Exhibitions();
        $exhibition = $model_exhibitions->findByUrl($url);

        $this->view->exhibition = $exhibition;
        $this->view->exhibitor = $exhibition->findParentUsers();
    }
}
