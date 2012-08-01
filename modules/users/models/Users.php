<?php

class Users extends Application_Models_Table
{
    protected $_name = 'users';
    protected $_primary = 'ident';
    protected $_rowClass = 'Users_User';

    protected $_dependentTables = array('Exhibitions');
    protected $_referenceMap = array();

    public function findByIdent($ident) {
        return $this->fetchRow($this->getAdapter()->quoteInto('ident = ?', $ident));
    }

    public function findByEmail($email) {
        return $this->fetchRow($this->getAdapter()->quoteInto('email = ?', $email));
    }

    public function findByUsername($username) {
        return $this->fetchRow($this->getAdapter()->quoteInto('username = ?', $username));
    }

    public function findByPassword($hash) {
        return $this->db->fetchRow($this->select()->where('password = ?', $hash));
    }

    public function selectByRole($role) {
        return $this->fetchAll($this->select()->where('role = ?', $role)->order('surname ASC')->order('name ASC'));
    }

    public function countByRole($role) {
        return $this->db->fetchOne($this->select()->from(array('u' => 'users'), 'count(ident)')->where('role = ?', $role));
    }
}
