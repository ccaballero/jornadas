<?php

class Application_Views_Helpers_Allowed
{
    public function allowed($resource) {
        $role = Zend_Registry::get('role');
        $acl = Zend_Registry::get('acl');

        return $acl->isAllowed($role, null, $resource);
    }
}
