<?php

class Usuarios_IndexController extends Zend_Controller_Action
{
    public function indexAction() {
        $modelo_usuarios = new Usuarios();
        $usuarios = $modelo_usuarios->fetchAll();

        $this->view->usuarios = $usuarios;
    }
}
