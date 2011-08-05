<?php

class Exposiciones_IndexController extends Jornadas_Controllers_Action
{
    public function indexAction() {
        $modelo_exposiciones = new Exposiciones();
        $exposiciones = $modelo_exposiciones->selectWithExponents();

        $this->view->exposiciones = $exposiciones;
    }
}
