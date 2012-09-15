<?php

class Application_Views_Helpers_Tile
{
    public function tile($values = '01', $size = 16, $space = 4) {
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
