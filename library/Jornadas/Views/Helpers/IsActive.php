<?php

class Jornadas_Views_Helpers_IsActive
{
    public function isActive($route, $menu) {
        return (substr($route, 0, strlen($menu)) == $menu);
    }
}
