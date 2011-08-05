<?php

class Jornadas_Controllers_Validators_UniqueUsername extends Zend_Validate_Abstract
{
    const UNIQUE = 'UNIQUE';

    protected $_messageTemplates = array(
        self::UNIQUE => "El nombre de usuario no esta disponible o ya esta siendo usado",
    );

    public function isValid($username) {
        $this->_setValue($username);

        $modelo_usuarios = new Usuarios();
        $usuario = $modelo_usuarios->findByUsername($username);

        if (!empty($usuario)) {
            $this->_error(self::UNIQUE);
            return false;
        }

        return true;
    }
}
