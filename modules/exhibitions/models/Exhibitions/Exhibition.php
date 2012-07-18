<?php

class Exhibitions_Exhibition extends Zend_Db_Table_Row_Abstract
{
    public function getTotal() {
        $a = file_exists(APPLICATION_PATH . '/data/slideshows/' . $this->ident . '.pdf');
        $b = file_exists(APPLICATION_PATH . '/data/audios/' . $this->ident . '.mp3');
        $c = file_exists(APPLICATION_PATH . '/data/videos/' . $this->ident . '.avi');
        return $a + $b + $c;
    }

    public function hasSlideshow() { return file_exists(APPLICATION_PATH . '/data/slideshows/' . $this->ident . '.pdf'); }
    public function hasAudio() {     return file_exists(APPLICATION_PATH . '/data/audios/' . $this->ident . '.mp3');     }
    public function hasVideo() {     return file_exists(APPLICATION_PATH . '/data/videos/' . $this->ident . '.avi');     }

    public function sizeSlideshow() { if ($this->hasSlideshow()) { return filesize(APPLICATION_PATH . '/data/slideshows/' . $this->ident . '.pdf'); } }
    public function sizeAudio() {     if ($this->hasVideo()) {     return filesize(APPLICATION_PATH . '/data/audios/' . $this->ident . '.mp3');     } }
    public function sizeVideo() {     if ($this->hasVideo()) {     return filesize(APPLICATION_PATH . '/data/videos/' . $this->ident . '.avi');     } }

    public function tsSlideshow() { if ($this->hasSlideshow()) { return filectime(APPLICATION_PATH . '/data/slideshows/' . $this->ident . '.pdf'); } }
    public function tsAudio() {     if ($this->hasAudio()) {     return filectime(APPLICATION_PATH . '/data/audios/' . $this->ident . '.mp3'); } }
    public function tsVideo() {     if ($this->hasVideo()) {     return filectime(APPLICATION_PATH . '/data/videos/' . $this->ident . '.avi'); } }
}
