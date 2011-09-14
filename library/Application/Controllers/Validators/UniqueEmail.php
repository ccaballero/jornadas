<?php

class Application_Controllers_Validators_UniqueEmail extends Zend_Validate_Abstract
{
    const UNIQUE = 'UNIQUE';

    protected $_messageTemplates = array(
        self::UNIQUE => "El correo no esta disponible o ya esta siendo usado",
    );

    private $user = null;

    public function __construct($user) {
        $this->user = $user;
    }

    public function isValid($email) {
        $this->_setValue($email);

        $model_users = new Users();
        $user = $model_users->findByEmail($email);

        if (!empty($user) && ($this->user <> $user->ident)) {
            $this->_error(self::UNIQUE);
            return false;
        }

        return true;
    }
}
