<?php

class Usuarios_IndexController extends Jornadas_Controllers_Action
{
    public function indexAction() {
        $modelo_usuarios = new Usuarios();
        $usuarios = $modelo_usuarios->fetchAll($modelo_usuarios->select()->order('role ASC')->order('username ASC'));

        $this->view->usuarios = $usuarios;
    }
}
