<?php

class Exhibitions_ExhibitionController extends Application_Controllers_Action
{
    public function viewAction() {
        $url = $this->request->getParam('exhibition');

        $model_exhibitions = new Exhibitions();
        $exhibition = $model_exhibitions->findByUrl($url);

        $this->view->exhibition = $exhibition;
        $this->view->exhibitors = $exhibition->getExhibitors();
    }

    public function slideshowAction() {
        $url = $this->request->getParam('exhibition');

        $model_exhibitions = new Exhibitions();
        $exhibition = $model_exhibitions->findByUrl($url);

        if ($exhibition->hasSlideshow()) {
            $path = APPLICATION_PATH . '/data/slideshows/' . $exhibition->ident . '.pdf';

            try {
                header("HTTP/1.1 200 OK");
                header("Status: 200 OK");
                header('Content-Type: application/pdf');
                header('Content-Disposition: attachment; filename="' . strtolower($exhibition->title) . '.pdf";');
                header('Content-Length: '. filesize($path) . '; ');
                ob_clean();
                flush();
                readfile($path);
            } catch (Exception $e) {}
            die;
        }
    }
}
