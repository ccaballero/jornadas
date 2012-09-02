<?php

class IndexController extends Application_Controllers_Action
{
    public function indexAction() {
        // If countdown is enabled
        $config = Zend_Registry::get('config');
        if ($config->system->countdown) {
            $now = time();
            $tow = strtotime($config->system->tsevent);

            $dif = $tow - $now;
            if ($dif < 0) {
                $dif = 0;
            }

            $days = floor($dif / (60 * 60 * 24));

            $dif -= $days * (60 * 60 * 24);
            $hours = floor($dif / (60 * 60));

            $dif -= $hours * (60 * 60);
            $minutes = floor($dif / 60);

            $dif -= $minutes * 60;

            $days = str_pad($days, 2, '0', STR_PAD_LEFT);
            $hours = str_pad($hours, 2, '0', STR_PAD_LEFT);
            $minutes = str_pad($minutes, 2, '0', STR_PAD_LEFT);
            $seconds = str_pad($dif, 2, '0', STR_PAD_LEFT);

            $this->view->countdown = "$days:$hours:$minutes:$seconds";
            $this->view->preview = ($dif <> 0);
        } else {
            $this->view->preview = false;
        }

        $this->view->facebook = $config->services->facebook;

        // show the news
        $model_news = new News();
        $this->view->news = $model_news->fetchAll($model_news->select()->order('tsregister DESC'));
    }

    public function sponsorsAction() {
        
    }
}
