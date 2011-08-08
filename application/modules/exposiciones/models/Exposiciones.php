<?php

class Exposiciones extends Jornadas_Models_Table
{
    protected $_name = 'exposiciones';
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
            $select->from('exposiciones', array('exposiciones.*', 'usuarios.username', 'usuarios.fullname'))
                   ->join('usuarios', 'usuarios.ident = exposiciones.exponent')
                   ->order('exposiciones.title ASC')
            );
    }

    public function findByUrl($url) {
        return $this->fetchRow($this->select()->where('url = ?', $url));
    }
}
