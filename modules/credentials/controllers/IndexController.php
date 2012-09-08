<?php

class Credentials_IndexController extends Application_Controllers_Action
{
    public $header;
    public $scesi;

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

            $header_file = APPLICATION_PATH . '/public/media/header_2.0.png';
            $this->header = Zend_Pdf_Image::imageWithPath($header_file);

            $scesi_file = APPLICATION_PATH . '/public/media/scesi.jpg';
            $this->scesi = Zend_Pdf_Image::imageWithPath($scesi_file);

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
        $page->setFillColor(new Zend_Pdf_Color_Html('#FFCB05'));
        $page->drawRectangle($x1, $y1+84, $x2, $y1+110, Zend_Pdf_Page::SHAPE_DRAW_FILL);

        $page->setFillColor(new Zend_Pdf_Color_Html('#000000'));
        $page->drawRectangle($x1, $y1+110, $x2, $y2, Zend_Pdf_Page::SHAPE_DRAW_FILL);
        $page->drawImage($this->header, $x1+5, $y1+115, $x2-50, $y2-5);

        $page->setFillColor(new Zend_Pdf_Color_Html('#000000'));
        $page->setLineWidth(1);
        $page->drawRectangle($x1, $y1, $x2, $y2, Zend_Pdf_Page::SHAPE_DRAW_STROKE);

        $page->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_COURIER), 10);

        $page->setFillColor(new Zend_Pdf_Color_Html('#000000'));
        $page->drawText($user->username, $x1+5, $y1+100);
        $page->drawText($user->hash, $x2-50, $y1+100);

        $page->drawText($user->getFullname(), $x1+5, $y1+88);

        $image_file = APPLICATION_PATH . '/data/9block/' . $user->ident . '.png';
        $logo = Zend_Pdf_Image::imageWithPath($image_file);
        $page->drawImage($logo, $x1+20, $y1+10, $x1+84, $y1+74);

        $image_file = APPLICATION_PATH . '/data/qrcode/' . $user->ident . '.png';
        $logo = Zend_Pdf_Image::imageWithPath($image_file);
        $page->drawImage($logo, $x2-84, $y1+10, $x2-20, $y1+74);

        $page->drawImage($this->scesi, $x1+105, $y1+5, $x2-105, $y1+30);
    }
}
