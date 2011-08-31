<?php

class Usuarios extends Jornadas_Models_Table
{
    protected $_name = 'usuarios';
    protected $_primary = 'ident';
    protected $_rowClass = 'Usuarios_Usuario';

    protected $_dependentTables = array(
        'Exposiciones',
    );
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

    public function selectByRole($role) {
        return $this->fetchAll($this->select()->where('role = ?', $role)->order('username ASC'));
    }
}
