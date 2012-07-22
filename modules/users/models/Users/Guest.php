<?php

class Users_Guest {
    public $ident = 0;
    public $username = 'guest';
    public $role = 'guest';
    public $fullname = 'Visitante';

    public function getFullname() {
        return $this->fullname = '';
    }

    public function save() {}
}
