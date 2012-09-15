<?php

class Sponsors extends Application_Models_Table
{
    protected $_name = 'sponsors';
    protected $_primary = 'ident';

    protected $_dependentTables = array();
    protected $_referenceMap = array();

    public function findByIdent($ident) {
        return $this->fetchRow($this->getAdapter()->quoteInto('ident = ?', $ident));
    }
}
