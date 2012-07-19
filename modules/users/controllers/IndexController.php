<?php

class Users_IndexController extends Application_Controllers_Action
{
    public function indexAction() {
        $model_users = new Users();

        $this->view->organizers = $model_users->selectByRole('organizer');
        $this->view->assistants = $model_users->selectByRole('assistant');
    }

    public function organizerAction() {
        $this->agregarUsuario('organizer');
    }

    public function assistantAction() {
        $this->agregarUsuario('assistant');
    }

    private function agregarUsuario($rol) {
        $request = $this->getRequest();

        $model_users = new Users();
        $user = $model_users->createRow();

        $form = new Users_Form_Profile(0);
        $form->setUser($user);

        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {
                $surname = $form->getElement('surname')->getValue();
                $name = $form->getElement('name')->getValue();
                $username = $form->getElement('username')->getValue();
                $email = $form->getElement('email')->getValue();

                $hash_generator = new Application_Views_Helpers_Password();
                $hash = $hash_generator->password(8);

                $user->role = $rol;
                $user->surname = $surname;
                $user->name = $name;
                $user->username = $username;
                $user->email = $email;
                $user->hash = $hash;
                $user->password = sha1(md5($hash));
                
                $user->tsregister = time();

                $user->save();

                $this->_helper->flashMessenger->addMessage('Usuario agregado');
                $this->_helper->redirector('index', 'index', 'users');
            }
        }

        $this->view->form = $form;
    }

/*    public function exportAction() {
        header("HTTP/1.1 200 OK"); //mandamos código de OK
        header("Status: 200 OK"); //sirve para corregir un bug de IE (fuente: php.net)
        header('Content-Type: text/plain; charset=utf-8');

        $model_users = new Users();


        echo '"NOMBRE COMPLETO","TIPO"' . PHP_EOL;

        foreach ($model_users->selectByRole('exhibitor') as $us) {
            echo '"' . $us->getFullname() . '","Expositor"' . PHP_EOL;
        }

        foreach ($model_users->selectByRole('organizer') as $us) {
            echo '"' . $us->getFullname() . '","Organizador"' . PHP_EOL;
        }

        foreach ($model_users->selectByRole('assistant') as $us) {
            echo '"' . $us->getFullname() . '","Asistente"' . PHP_EOL;
        }

        die;
    }

    public function generateAction() {
        $this->requireLogin();
        $this->requireAdmin();

        $modelo_usuarios = new Usuarios();
        $usuarios = $modelo_usuarios->fetchAll();

        foreach ($usuarios as $usuario) {
            $image_file = APPLICATION_PATH . '/data/tmp/' . $usuario->ident . '.png';

            $ch = curl_init();
            $fp = fopen($image_file, 'wb');
            curl_setopt ($ch, CURLOPT_URL, 'http://' . $_SERVER['HTTP_HOST'] . '/icon.php?hash=' . sha1($usuario->fullname) . '&size=512');
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
        $request = $this->getRequest();

        $page = $request->getParam('page', 1);
        $size = $request->getParam('size', 96);

        $modelo_usuarios = new Usuarios();

        $paginator = Zend_Paginator::factory($modelo_usuarios->fetchAll());
        $paginator->setItemCountPerPage($size);
        $paginator->setCurrentPageNumber($page);
        $paginator->setPageRange(10);

        $usuarios= $paginator;

        $scale = 160;
        $proportion = (1 + sqrt(5) ) / 2;

        $pdf = new Zend_Pdf();
        $template = $pdf->newPage(intval($scale * $proportion) . ':' . $scale);
        $width = $template->getWidth();
        $height = $template->getHeight();

        foreach ($usuarios as $usuario) {
            $page = new Zend_Pdf_Page($template);

            $page->setLineWidth(3);
            $page->drawRectangle(0, 0, $width, $height, Zend_Pdf_Page::SHAPE_DRAW_STROKE);

            $image_file = APPLICATION_PATH . '/data/tmp/' . $usuario->ident . '.png';
            $logo = Zend_Pdf_Image::imageWithPath($image_file);
            $page->drawImage($logo, intval($width/2 - 40), $height - 88, intval($width/2 + 40), $height - 8);

            $scesi_file = APPLICATION_PATH . '/public/media/scesi.jpg';
            $scesi = Zend_Pdf_Image::imageWithPath($scesi_file);
            $page->drawImage($scesi, $width - 40, 4, $width - 5, intval((35 * 354) / 509) + 4);

            $page->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_COURIER_BOLD), 11);
            $page->setFillColor(new Zend_Pdf_Color_Html('#0000FF'));
            $page->drawText('Jornadas de seguridad informática', 20, $height - 102);

            $page->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_COURIER_BOLD), 10);
            $page->setFillColor(new Zend_Pdf_Color_Html('#000000'));
            $page->drawText($usuario->fullname, 8, $height - 126);
            $page->setFillColor(new Zend_Pdf_Color_Html('#0000FF'));
            $page->drawText('Usuario: ', 8, $height - 138);
            $page->drawText('Clave: ', 8, $height - 150);

            $page->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_COURIER), 10);
            $page->setFillColor(new Zend_Pdf_Color_Html('#000000'));
            $page->drawText($usuario->username, 60, $height - 138);
            $page->drawText($usuario->hash, 60, $height - 150);

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

    // Mal codigo,, causal de desesperacion consumada,, o ingrata suerte.
    public function credencialAction() {
        $request = $this->getRequest();

        $ident = $request->getParam('ident', 1);

        $modelo_usuarios = new Usuarios();
        $usuario = $modelo_usuarios->findByIdent($ident);

        $scale = 160;
        $proportion = (1 + sqrt(5) ) / 2;

        $pdf = new Zend_Pdf();
        $template = $pdf->newPage(intval($scale * $proportion) . ':' . $scale);
        $width = $template->getWidth();
        $height = $template->getHeight();

            $page = new Zend_Pdf_Page($template);

            $page->setLineWidth(3);
            $page->drawRectangle(0, 0, $width, $height, Zend_Pdf_Page::SHAPE_DRAW_STROKE);

            $image_file = APPLICATION_PATH . '/data/tmp/' . $usuario->ident . '.png';
            $logo = Zend_Pdf_Image::imageWithPath($image_file);
            $page->drawImage($logo, intval($width/2 - 40), $height - 88, intval($width/2 + 40), $height - 8);

            $scesi_file = APPLICATION_PATH . '/public/media/scesi.jpg';
            $scesi = Zend_Pdf_Image::imageWithPath($scesi_file);
            $page->drawImage($scesi, $width - 40, 4, $width - 5, intval((35 * 354) / 509) + 4);

            $page->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_COURIER_BOLD), 11);
            $page->setFillColor(new Zend_Pdf_Color_Html('#0000FF'));
            $page->drawText('Jornadas de seguridad informática', 20, $height - 102);

            $page->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_COURIER_BOLD), 10);
            $page->setFillColor(new Zend_Pdf_Color_Html('#000000'));
            $page->drawText($usuario->fullname, 8, $height - 126);
            $page->setFillColor(new Zend_Pdf_Color_Html('#0000FF'));
            $page->drawText('Usuario: ', 8, $height - 138);
            $page->drawText('Clave: ', 8, $height - 150);

            $page->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_COURIER), 10);
            $page->setFillColor(new Zend_Pdf_Color_Html('#000000'));
            $page->drawText($usuario->username, 60, $height - 138);
            $page->drawText($usuario->hash, 60, $height - 150);

            $pdf->pages[] = $page;

        $render = $pdf->render();

        header("HTTP/1.1 200 OK"); //mandamos código de OK
        header("Status: 200 OK"); //sirve para corregir un bug de IE (fuente: php.net)
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $ident . '.pdf"');
        header('Content-Length: '. strlen($render));
        echo $render;
        die;
    }*/
}
