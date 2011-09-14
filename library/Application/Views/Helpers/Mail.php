<?php

class Application_Views_Helpers_Mail
{
    public function mail($subject, $body, $email, $name) {
        $mail = new Zend_Mail('UTF-8');
        $mail->addTo($email, $name)
             ->setSubject($subject)
             ->setBodyHtml($body)
             ->send();
    }
}
