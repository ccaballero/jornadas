<?php

class Noticias extends Jornadas_Models_Table
{
    protected $_name = 'noticias';
    protected $_primary = 'ident';

    protected $_dependentTables = array(
        'Noticias_Comentarios'
    );
    protected $_referenceMap = array(
        'Autor'                 => array(
            'columns'           => 'autor',
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
