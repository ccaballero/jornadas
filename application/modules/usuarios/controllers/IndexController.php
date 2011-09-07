<?php

class Usuarios_IndexController extends Jornadas_Controllers_Action
{
    public function indexAction() {
        $modelo_usuarios = new Usuarios();
        $usuarios = $modelo_usuarios->selectByRole('participant');

        $this->view->usuarios = $usuarios;
    }

    public function agregarAction() {
        $request = $this->getRequest();
        $form = new Usuarios_Form_Register();

        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {
                $fullname = $form->getElement('fullname')->getValue();
                $username = $form->getElement('username')->getValue();
                $email = $form->getElement('email')->getValue();

                $hash_generator = new Jornadas_Views_Helpers_Password();
                $hash = $hash_generator->password(8);

                $modelo_usuarios = new Usuarios();
                $usuario = $modelo_usuarios->createRow();

                $usuario->fullname = $fullname;
                $usuario->username = $username;
                $usuario->hash = $hash;
                $usuario->password = sha1(md5("...$hash..."));
                $usuario->email = $email;
                $usuario->tsregister = time();

                $usuario->save();

                $this->_helper->flashMessenger->addMessage(array(
                        'pwd' => '~',
                        'cmd' => 'sudo useradd ' . $usuario->username,
                        'su' => true,
                        'user' => $this->user->username,
                    ));
                $this->_helper->redirector('index', 'index', 'usuarios');
            }
        }

        $this->view->form = $form;
    }

    public function generateAction() {
        $this->requireLogin();
        $this->requireAdmin();

        $modelo_usuarios = new Usuarios();
        $usuarios = $modelo_usuarios->fetchAll();

        foreach ($usuarios as $usuario) {
            $image_file = APPLICATION_PATH . '/../data/tmp/' . $usuario->ident . '.png';

            $ch = curl_init();
            $fp = fopen($image_file, 'wb');
            curl_setopt ($ch, CURLOPT_URL, 'http://' . $_SERVER['HTTP_HOST'] . '/icon.php?hash=' . sha1($usuario->hash) . '&size=512');
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_exec($ch);
            curl_close($ch);
            fclose($fp);
        }

        $this->_helper->flashMessenger->addMessage(array(
            'pwd' => '~',
            'cmd' => 'sh credentials_generate.sh',
            'role' => 'admin',
            'user' => $this->user,
            'message' => 'Imagenes generadas correctamente',
        ));
        $this->_helper->redirector('index', 'index', 'portada');
    }

    public function credencialesAction() {
        $modelo_usuarios = new Usuarios();
        $usuarios = $modelo_usuarios->fetchAll();

        $scale = 200;
        $proportion = (1 + sqrt(5) ) / 2;

        $pdf = new Zend_Pdf();
        $template = $pdf->newPage(intval($scale * $proportion) . ':' . $scale);
        $width = $template->getWidth();
        $height = $template->getHeight();

        foreach ($usuarios as $usuario) {
            $page = new Zend_Pdf_Page($template);

            $page->setLineWidth(3);
            $page->drawRectangle(0, 0, $width, $height, Zend_Pdf_Page::SHAPE_DRAW_STROKE);

            $image_file = APPLICATION_PATH . '/../data/tmp/' . $usuario->ident . '.png';
            $logo = Zend_Pdf_Image::imageWithPath($image_file);
            $page->drawImage($logo, intval($width/2 - 64), $height - 132, intval($width/2 + 64), $height - 4);

            $page->setLineWidth(1);
            $page->drawCircle($width - 10, $height - 10, 4, Zend_Pdf_Page::SHAPE_DRAW_STROKE);
            $page->drawCircle($width - 10, $height - 24, 4, Zend_Pdf_Page::SHAPE_DRAW_STROKE);

            $page->setLineWidth(3);
            $page->drawLine(0, $height - 153, $width, $height - 153);

            $page->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_COURIER_BOLD), 13);
            $page->drawText('Jornadas de seguridad informática', 33, $height - 146);

            $page->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_COURIER_BOLD), 11);
            $page->drawText($usuario->fullname, 6, $height - 167);
            $page->drawText('Usuario: ', 6, $height - 180);
            $page->drawText('Clave: ', 6, $height - 193);

            $page->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_COURIER), 11);
            $page->drawText($usuario->username, 80, $height - 180);
            $page->drawText($usuario->hash, 80, $height - 193);

            $pdf->pages[] = $page;
        }


        $render = $pdf->render();

        header("HTTP/1.1 200 OK"); //mandamos código de OK
        header("Status: 200 OK"); //sirve para corregir un bug de IE (fuente: php.net)
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="credenciales.pdf"');
        header('Content-Length: '. strlen($render));
        echo $render;
        die;
    }
}

/*$page->setLineColor(new Zend_Pdf_Color_Rgb(0, 0, 0));
$page->setFillColor(new Zend_Pdf_Color_Rgb(255, 255, 255));
$page->setLineWidth(2);
$page->drawRectangle(0, 0, $width, $height, Zend_Pdf_Page::SHAPE_DRAW_FILL_AND_STROKE);
$page->drawLine($scale, 0, $scale, $height);
$page->drawLine(0, intval((($scale * $proportion) - $scale) / $proportion), $width, intval((($scale * $proportion) - $scale) / $proportion));
$page->drawLine(0, $height, $width, 0);
$page->drawLine($scale, 0, $width, $height);
$page->setFillColor(new Zend_Pdf_Color_Rgb(0, 0, 0));
$page->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_COURIER), 11);
$page->drawText('Jornadas de seguridad informática', 0, $height / 2);*/
