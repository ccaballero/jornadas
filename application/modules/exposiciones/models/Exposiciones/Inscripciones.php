<?php

class Exposiciones_Inscripciones extends Jornadas_Models_Table
{
    protected $_name = 'exposiciones_inscripciones';
    //protected $_primary = 'ident';

    protected $_dependentTables = array();
    protected $_referenceMap = array(
        'Participante'          => array(
            'columns'           => 'participante',
            'refTableClass'     => 'Usuarios',
            'refColumns'        => 'ident',
            'onDelete'          => self::CASCADE,
            'onUpdate'          => self::RESTRICT
        ),
        'Exposicion'            => array(
            'columns'           => 'exposicion',
            'refTableClass'     => 'Exposiciones',
            'refColumns'        => 'ident',
            'onDelete'          => self::CASCADE,
            'onUpdate'          => self::RESTRICT
        ),
    );
}