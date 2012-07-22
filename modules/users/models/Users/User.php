<?php

class Users_User extends Zend_Db_Table_Row_Abstract
{
    private $_qr_path = '/data/qrcode';
    private $_nb_path = '/data/9block';

    public function getFullname() {
        $fullname = '';
        if (!empty($this->title)) {
            $fullname .= $this->title . ' ';
        }
        if (!empty($this->surname)) {
            $fullname .= $this->surname . ', ';
        }
        if (!empty($this->name)) {
            $fullname .= $this->name . ' ';
        }
        return trim($fullname);
    }

    public function getQR() {
        $file = APPLICATION_PATH . "/{$this->_qr_path}/{$this->ident}.png";
        if (!file_exists($file)) {
            include APPLICATION_PATH . '/library/QRCode/qrlib.php';
            QRcode::png($this->hash, $file, 'L', 10, 0);
        }

        return file_get_contents($file);
    }

    public function getNineBlock() {
        $file = APPLICATION_PATH . "/{$this->_nb_path}/{$this->ident}.png";
        if (!file_exists($file)) {
            include APPLICATION_PATH . '/library/9Block/identicon.php';
            Identicon::png(sha1($this->getFullname()), $file, 210);
        }

        return file_get_contents($file);
    }
}
