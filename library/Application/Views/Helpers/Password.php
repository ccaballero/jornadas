<?php

class Application_Views_Helpers_Password
{
    public function password($size = 16) {
        $values = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890';
        $length = strlen($values);
        $code = '';
        for ($i = 0; $i < $size; $i++) {
            $code .= $values[rand(0, $length - 1)];
        }
        return $code;
    }
}
