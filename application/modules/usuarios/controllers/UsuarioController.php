<?php

class Usuarios_UsuarioController extends Jornadas_Controllers_Action
{
    public function verAction() {
        $request = $this->getRequest();

        $modelo_usuarios = new Usuarios();

        $url = $request->getParam('usuario');
        if (empty($url)) {
            $usuario = $this->user;
        } else {
            $usuario = $modelo_usuarios->findByUsername($url);
        }

        $this->view->usuario = $usuario;
    }
}
