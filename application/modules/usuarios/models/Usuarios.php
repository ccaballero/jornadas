<?php

class Usuarios extends Jornadas_Models_Table
{
    protected $_name = 'usuarios';
    protected $_primary = 'ident';
    protected $_rowClass = 'Usuarios_Usuario';

    protected $_dependentTables = array(
        'Exposiciones', 'Exposiciones_Inscripciones', 'Noticias', 'Noticias_Comentarios'
    );
    protected $_referenceMap = array();
}
