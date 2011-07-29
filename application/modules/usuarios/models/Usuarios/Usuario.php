<?php

class Usuarios_Usuario extends Zend_Db_Table_Row_Abstract
{
    public function __toString() {
        return $this->ident . ' ' . $this->nombre;
    }
}
