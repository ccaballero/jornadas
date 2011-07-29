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
            'columns'           => 'expositor',
            'refTableClass'     => 'Usuarios',
            'refColumns'        => 'ident',
            'onDelete'          => self::CASCADE,
            'onUpdate'          => self::RESTRICT
        ),
    );
}
