<?php

class Activities extends Application_Models_Table
{
    protected $_name = 'activities';
    protected $_primary = 'label';

    public function findByIdent($ident) {
        return $this->fetchRow($this->getAdapter()->quoteInto('ident = ?', $ident));
    }

    public function findByLabel($label) {
        return $this->fetchRow($this->getAdapter()->quoteInto('label = ?', $label));
    }
}
