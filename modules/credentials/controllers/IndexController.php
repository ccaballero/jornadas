<?php

class Credentials_IndexController extends Application_Controllers_Action
{
    public function indexAction() {
        if ($this->request->isPost()) {
            $model_users = new Users();
            $users = $this->request->getParam('users', array());

            $list_users = array();

            foreach ($users as $ident) {
                $user = $model_users->findByIdent($ident);
                if (!empty($user)) {
                    $list_users[] = $user;
                }
            }

            $pdf = new Zend_Pdf();

            $page = $pdf->newPage(Zend_Pdf_Page::SIZE_LETTER);
            $page_w = $page->getWidth();
            $page_h = $page->getHeight();

            foreach ($list_users as $i => $user) {
                $user->generateQR();
                $user->generateNineBlock();

                $position = $i % 10;
                if ($position == 0 && $i > 0) {
                    $pdf->pages[] = $page;
                    $page = $pdf->newPage(Zend_Pdf_Page::SIZE_LETTER);
                }

                $cX = $position % 2;
                $cY = $position / 2 % 5;

                $height = 152;
                $proportion = (1 + sqrt(5)) / 2;
                $width = $height * $proportion;

                $space = 0;
                
                $marginX = ($page_w - ($space + ($width * 2))) / 2;
                $marginY = ($page_h - (($space * 4) + ($height * 5))) / 2;

                $posX = $marginX + ($cX * $width) + ($cX * $space);
                $posY = $marginY + ($cY * $height) + ($cY * $space);

                $this->drawCredential($user, $page, $posX, $posY, $posX + $width, $posY + $height);

            }

            $pdf->pages[] = $page;
            $render = $pdf->render();

            header("HTTP/1.1 200 OK"); //mandamos código de OK
            header("Status: 200 OK"); //sirve para corregir un bug de IE (fuente: php.net)
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="credenciales.pdf"');
            header('Content-Length: '. strlen($render));
            echo $render;
        }

        die;
    }

    private function drawCredential($user, $page, $x1, $y1, $x2, $y2) {
        $page->setLineWidth(1);
        $page->drawRectangle($x1, $y1, $x2, $y2, Zend_Pdf_Page::SHAPE_DRAW_STROKE);

        $image_file = APPLICATION_PATH . '/data/9block/' . $user->ident . '.png';
        $logo = Zend_Pdf_Image::imageWithPath($image_file);
        $page->drawImage($logo, $x1+10, $y2-80, $x1+80, $y2-10);

        $image_file = APPLICATION_PATH . '/data/qrcode/' . $user->ident . '.png';
        $logo = Zend_Pdf_Image::imageWithPath($image_file);
        $page->drawImage($logo, $x2-80, $y2-80, $x2-10, $y2-10);

        $scesi_file = APPLICATION_PATH . '/public/media/scesi.jpg';
        $scesi = Zend_Pdf_Image::imageWithPath($scesi_file);
        $page->drawImage($scesi, $x2-20, $y1+5, $x2-5, $y1+15);

        $config = Zend_Registry::get('config');
        
        $page->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_COURIER_BOLD), 9);
        $page->setFillColor(new Zend_Pdf_Color_Html('#0000FF'));
        $page->drawText($config->system->name, $x1 + 10, $y1 + 30);

//        $page->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_COURIER_BOLD), 10);
//        $page->setFillColor(new Zend_Pdf_Color_Html('#000000'));
//        $page->drawText($user->getFullname(), 8, $height - 126);
//        $page->setFillColor(new Zend_Pdf_Color_Html('#0000FF'));
//        $page->drawText('Usuario: ', 8, $height - 138);
//        $page->drawText('Clave: ', 8, $height - 150);
//
//        $page->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_COURIER), 10);
//        $page->setFillColor(new Zend_Pdf_Color_Html('#000000'));
//        $page->drawText($user->username, 60, $height - 138);
//        $page->drawText($user->hash, 60, $height - 150);
    }
}
