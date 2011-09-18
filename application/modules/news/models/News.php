<?php

class News extends Application_Models_Table
{
    protected $_name = 'news';
    protected $_primary = 'ident';
    protected $_rowClass = 'News_New';

    protected $_dependentTables = array();
    protected $_referenceMap = array();

    public function findByIdent($ident) {
        return $this->fetchRow($this->getAdapter()->quoteInto('ident = ?', $ident));
    }
}
