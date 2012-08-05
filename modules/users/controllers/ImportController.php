<?php

class ImportController extends Jornadas_Controllers_Action
{
//    public function indexAction() {
//        $mode = $this->request->getParam('tipo');
//
//        if ($mode == 'asistentes') {
//            $inscritos = APPLICATION_PATH . '/data/asistentes';
//        } else {
//            $inscritos = APPLICATION_PATH . '/data/organizadores';
//        }
//
//        $usuarios = new Usuarios();
//        $count = 1;
//
//        $handle = @fopen($inscritos, 'r');
//        if ($handle) {
//            while (($buffer = fgets($handle, 4096)) !== false) {
//                $usuario = $usuarios->createRow();
//
//                if ($mode == 'asistentes') {
//                    $usuario->role = 'asistente';
//                    $usuario->username = 'asistente' . $count++;
//                } else {
//                    $usuario->role = 'organizador';
//                    $usuario->username = 'organizador' . $count++;
//                }
//
//                $usuario->fullname = $buffer;
//
//                $hash_generator = new Jornadas_Views_Helpers_Password();
//                $hash = $hash_generator->password(8);
//
//                $usuario->hash = $hash;
//                $usuario->password = sha1(md5($hash));
//                $usuario->tsregister = time();
//
//                $usuario->save();
//                //echo $usuario->role . ' ' . $usuario->username . ' ' . $usuario->fullname . '<br />';
//            }
//            if (!feof($handle)) {
//                echo "Error: unexpected fgets() fail\n";
//            }
//            fclose($handle);
//        }
//
//        echo 'OK';
//        die;
//    }
}