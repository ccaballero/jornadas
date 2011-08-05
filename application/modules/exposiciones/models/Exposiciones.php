<?php

class Exposiciones extends Jornadas_Models_Table
{
    protected $_name = 'expositions';
    protected $_primary = 'ident';

    protected $_dependentTables = array(
        'Exposiciones_Inscripciones', 'Noticias',
    );
    protected $_referenceMap = array(
        'Expositor'             => array(
            'columns'           => 'exponent',
            'refTableClass'     => 'Usuarios',
            'refColumns'        => 'ident',
            'onDelete'          => self::CASCADE,
            'onUpdate'          => self::RESTRICT
        ),
    );

    public function selectWithExponents() {
        $select = $this->select();
        $select->setIntegrityCheck(false);
        return $this->fetchAll(
            $select->from('expositions', array('expositions.*', 'users.username', 'users.fullname'))
                   ->join('users', 'users.ident = expositions.exponent')
                   ->order('expositions.title ASC')
            );
    }
}
