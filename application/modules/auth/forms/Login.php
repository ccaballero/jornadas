<?php

class Auth_Form_Login extends Zend_Form
{
    public function init() {
        $this->setMethod('post');

        $email = $this->createElement('text', 'username');
        $email->setRequired(true)
              ->setLabel('usuario:')
              ->setAttrib('class', 'focus')
              ->addFilter('StringTrim')
              ->addFilter('StripTags')
              ->addValidator('StringLength', false, array(1, 128));

        $password = $this->createElement('password', 'password');
        $password->setRequired(true)
                 ->setLabel('contraseña:');

        $csrf = $this->createElement('hash', 'csrf', array('ignore' => true));

        $this->addElement($email);
        $this->addElement($password);
        $this->addElement($csrf);

        $this->addElement('submit', 'submit', array('ignore' => true, 'label' => 'acceder'));
    }
}
