<?php

class Exhibitions_Exhibition extends Zend_Db_Table_Row_Abstract
{
    public function getTotal() {
        $a = file_exists(APPLICATION_PATH . '/../data/videos/' . $this->ident . '.pdf');
        $b =file_exists(APPLICATION_PATH . '/../data/slideshows/' . $this->ident . '.pdf');
        return $a + $b;
    }

    public function hasVideo() {
        return file_exists(APPLICATION_PATH . '/../data/videos/' . $this->ident . '.pdf');
    }

    public function hasSlideshow() {
        return file_exists(APPLICATION_PATH . '/../data/slideshows/' . $this->ident . '.pdf');
    }
}
