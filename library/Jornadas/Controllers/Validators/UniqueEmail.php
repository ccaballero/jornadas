<?php

class Jornadas_Controllers_Validators_UniqueEmail extends Zend_Validate_Abstract
{
    const UNIQUE = 'UNIQUE';

    protected $_messageTemplates = array(
        self::UNIQUE => "El correo no esta disponible o ya esta siendo usado",
    );

    public function isValid($email) {
        $this->_setValue($email);

        $modelo_usuarios = new Usuarios();
        $usuario = $modelo_usuarios->findByEmail($email);

        if (!empty($usuario)) {
            $this->_error(self::UNIQUE);
            return false;
        }

        return true;
    }
}
