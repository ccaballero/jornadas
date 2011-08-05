<?php

class Usuarios_Form_Register extends Zend_Form
{
    public function init() {
        $this->setMethod('post');

        $fullname = $this->createElement('text', 'fullname');
        $fullname->setRequired(true)
                 ->setLabel('nombre completo:')
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
                 ->addValidator(new Jornadas_Controllers_Validators_UniqueUsername(), false);

        $email = $this->createElement('text', 'email');
        $email->setRequired(true)
              ->setLabel('correo electrónico:')
              ->addFilter('StringTrim')
              ->addValidator('StringLength', false, array(1, 128))
              ->addValidator('EmailAddress')
              ->addValidator(new Jornadas_Controllers_Validators_UniqueEmail(), false);

        $captcha = $this->createElement('captcha', 'captcha', array('captcha' => array('captcha' => 'Figlet', 'wordLen' => 5, 'timeout' => 300)));
        $captcha->setRequired(true)
                ->setLabel('ingrese los 5 caracteres presentados:');

        $csrf = $this->createElement('hash', 'csrf', array('ignore' => true));

        $this->addElement($fullname);
        $this->addElement($username);
        $this->addElement($email);
        $this->addElement($captcha);
        $this->addElement($csrf);

        $this->addElement('submit', 'submit', array('ignore' => true, 'label' => 'registrarse',));
    }
}
