<?php

class Application_Controllers_Validators_UniqueUsername extends Zend_Validate_Abstract
{
    const UNIQUE = 'UNIQUE';

    protected $_messageTemplates = array(
        self::UNIQUE => "El nombre de usuario no esta disponible o ya esta siendo usado",
    );

    private $user = null;

    public function __construct($user) {
        $this->user = $user;
    }

    public function isValid($username) {
        $this->_setValue($username);

        $model_users = new Users();
        $user = $model_users->findByUsername($username);

        if (!empty($user) && ($this->user->ident <> $user->ident)) {
            $this->_error(self::UNIQUE);
            return false;
        }

        return true;
    }
}
