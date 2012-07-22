<?php

class Application_Models_Table extends Zend_Db_Table_Abstract {
    protected $db;

    public function __construct() {
        parent::__construct();

        $this->db = Zend_Db_Table::getDefaultAdapter();
    }
}
