<?php

class Auth_Form_Register extends Zend_Form
{
    private $user = null;

    public function __construct($user) {
        $this->user = $user;
        parent::__construct();
    }

    public function init() {
        $this->setMethod('post');

        $surname = $this->createElement('text', 'surname');
        $surname->setRequired(true)
                ->setLabel('Apellidos (*):')
                ->addFilter('StringTrim')
                ->addFilter('StripTags')
                ->addValidator('StringLength', false, array(1, 512));

        $name = $this->createElement('text', 'name');
        $name->setRequired(true)
             ->setLabel('Nombres (*):')
             ->addFilter('StringTrim')
             ->addFilter('StripTags')
             ->addValidator('StringLength', false, array(1, 512));

        $username = $this->createElement('text', 'username');
        $username->setRequired(true)
                 ->setLabel('Usuario (*):')
                 ->addFilter('StringTrim')
                 ->addFilter('StripTags')
                 ->addValidator('StringLength', false, array(1, 128))
                 ->addValidator('Alnum', false, array('allowWhiteSpace' => false))
                 ->addValidator(new Application_Controllers_Validators_UniqueUsername($this->user), false);

        $email = $this->createElement('text', 'email');
        $email->setRequired(false)
              ->setLabel('Email (*):')
              ->addFilter('StringTrim')
              ->addValidator('StringLength', false, array(1, 128))
              ->addValidator('EmailAddress')
              ->addValidator(new Application_Controllers_Validators_UniqueEmail($this->user), false);

        $captcha = $this->createElement('captcha', 'captcha', array('captcha' => array('captcha' => 'Figlet', 'wordLen' => 5, 'timeout' => 300)));
        $captcha->setRequired(true)
                ->setLabel('Ingrese los 5 caracteres presentados:');

        $csrf = $this->createElement('hash', 'csrf', array('ignore' => true));

        $this->addElement($surname);
        $this->addElement($name);
        $this->addElement($username);
        $this->addElement($email);
        $this->addElement($captcha);
        $this->addElement($csrf);

        $this->addElement('submit', 'submit', array('ignore' => true, 'label' => 'Registrar'));
    }

    public function setUser($user) {
        $this->getElement('surname')->setValue($user->surname);
        $this->getElement('name')->setValue($user->name);
        $this->getElement('username')->setValue($user->username);
        $this->getElement('email')->setValue($user->email);
    }
}
