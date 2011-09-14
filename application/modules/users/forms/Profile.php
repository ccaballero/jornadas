<?php

class Users_Form_Profile extends Zend_Form
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
                ->setLabel('apellidos:')
                ->setAttrib('class', 'focus')
                ->addFilter('StringTrim')
                ->addFilter('StripTags')
                ->addValidator('StringLength', false, array(1, 1024));

        $name = $this->createElement('text', 'name');
        $name->setRequired(true)
             ->setLabel('nombres:')
             ->setAttrib('class', 'focus')
             ->addFilter('StringTrim')
             ->addFilter('StripTags')
             ->addValidator('StringLength', false, array(1, 1024));

        $username = $this->createElement('text', 'username');
        $username->setRequired(true)
                 ->setLabel('nombre de usuario:')
                 ->addFilter('StringTrim')
                 ->addFilter('StripTags')
                 ->addValidator('StringLength', false, array(1, 128))
                 ->addValidator('Alnum', false, array('allowWhiteSpace' => false))
                 ->addValidator(new Application_Controllers_Validators_UniqueUsername($this->user), false);

        $email = $this->createElement('text', 'email');
        $email->setRequired(false)
              ->setLabel('correo electrónico:')
              ->addFilter('StringTrim')
              ->addValidator('StringLength', false, array(1, 128))
              ->addValidator('EmailAddress')
              ->addValidator(new Application_Controllers_Validators_UniqueEmail($this->user), false);

        $this->addElement($surname);
        $this->addElement($name);
        $this->addElement($username);
        $this->addElement($email);

        $this->addElement('submit', 'submit', array('ignore' => true, 'label' => 'actualizar',));
    }

    public function setUser($user) {
        $this->getElement('surname')->setValue($user->surname);
        $this->getElement('name')->setValue($user->name);
        $this->getElement('username')->setValue($user->username);
        $this->getElement('email')->setValue($user->email);
    }
}
