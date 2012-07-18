<?php

class Exhibitions extends Application_Models_Table
{
    protected $_name = 'exhibitions';
    protected $_primary = 'ident';
    protected $_rowClass = 'Exhibitions_Exhibition';

    protected $_dependentTables = array();
    protected $_referenceMap = array(
        'Exhibitor'             => array(
            'columns'           => 'exhibitor',
            'refTableClass'     => 'Users',
            'refColumns'        => 'ident',
            'onDelete'          => self::CASCADE,
            'onUpdate'          => self::RESTRICT
        ),
    );

    public function selectWithExponents() {
        $select = $this->select();
        $select->setIntegrityCheck(false);

        return $this->fetchAll(
            $select->from('exhibitions', array('exhibitions.*'))
                   ->join('users', 'users.ident = exhibitions.exhibitor', array('users.username', 'fullname' => 'CONCAT(users.title,\' \',users.name,\' \',users.surname)'))
                   ->order('exhibitions.tsstart ASC')
            );
    }

    public function findByUrl($url) {
        return $this->fetchRow($this->select()->where('url = ?', $url));
    }
}
