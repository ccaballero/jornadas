<?php

class Application_Views_Helpers_Translate
{
    public function translate($text) {
        $translate = Zend_Registry::get('Zend_Translate');
        return $translate->_($text);
    }
}
