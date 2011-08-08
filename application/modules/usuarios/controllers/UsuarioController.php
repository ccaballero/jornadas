<?php

class Usuarios_UsuarioController extends Jornadas_Controllers_Action
{
    public function verAction() {
        $request = $this->getRequest();

        $url = $request->getParam('usuario');

        $modelo_usuarios = new Usuarios();
        $usuario = $modelo_usuarios->findByUsername($url);

        $this->view->usuario = $usuario;
    }
}
