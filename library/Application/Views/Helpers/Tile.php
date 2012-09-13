<?php

class Application_Views_Helpers_Tile
{
    public function tile() {
        $size = pow(2, 14);
        $space = 4;

        $values = '+-*/';
        $length = strlen($values);
        $code = '';
        for ($i = 0; $i < $size; $i++) {
            if ($i % $space == 0) {
                $code .= ' ';
            }
            $code .= $values[rand(0, $length - 1)];
        }
        return $code;
    }

}
