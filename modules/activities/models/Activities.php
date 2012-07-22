<?php

class Activities extends Application_Models_Table
{
    protected $_name = 'activities';
    protected $_primary = 'label';
//    protected $_rowClass = 'News_New';

    public function findByLabel($label) {
        return $this->fetchRow($this->getAdapter()->quoteInto('label = ?', $label));
    }
}
