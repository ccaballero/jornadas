<?php

class Exhibitions_Users extends Application_Models_Table
{
    protected $_name = 'exhibitions_users';
    protected $_primary = array('exhibition', 'user');

    protected $_dependentTables = array('Exhibitions', 'Users');
    protected $_referenceMap = array(
        'Exhibition' => array(
            'columns' => array('exhibition'),
            'refTableClass' => 'Exhibitions',
            'refColumns' => array('ident'),
        ),
        'User' => array(
            'columns' => array('user'),
            'refTableClass' => 'Users',
            'refColumns' => array('ident'),
        ),
    );
    
}
