<?php

class Exposiciones_ExposicionController extends Jornadas_Controllers_Action
{
    public function verAction() {
        $request = $this->getRequest();

        $url = $request->getParam('exposicion');

        $modelo_exposiciones = new Exposiciones();
        $exposicion = $modelo_exposiciones->findByUrl($url);

        $this->view->exposicion = $exposicion;
        $this->view->expositor = $exposicion->findParentUsuarios();
    }
}
