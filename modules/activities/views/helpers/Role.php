<?php

class Activities_View_Helper_Role
{
    public function role($role) {
        $availables = array (
            'organizer' => 'Organizador',
            'protocol'  => 'Protocolo',
            'assistant' => 'Asistente',
        );

        if (array_key_exists($role, $availables)) {
            return $availables[$role];
        }

        return '';
    }
}
