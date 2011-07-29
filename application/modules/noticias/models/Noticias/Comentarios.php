<?php

class Noticias_Comentarios extends Jornadas_Models_Table
{
    protected $_name = 'noticias_comentarios';
    protected $_primary = 'ident';

    protected $_dependentTables = array();
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
        'Noticia'               => array(
            'columns'           => 'noticia',
            'refTableClass'     => 'Noticias',
            'refColumns'        => 'ident',
            'onDelete'          => self::CASCADE,
            'onUpdate'          => self::RESTRICT
        ),
    );
}
