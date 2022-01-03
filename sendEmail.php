<?php
require 'vendor/autoload.php';

class SendEmail {
    public static function SendEmail ($to, $subject,$content){
        $key = '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';
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom('dohuycuong92@gmail.com', "Steven Do");
        $email->setSubject($subject);
        $email->addTo($to);
        $email->addContent("text/plain", $content);

        $sendGrid = new \SendGrid($key);
        try{
            $response = $sendGrid->send($email);
            return $response;
        }catch(Exception $e){
            echo 'Email exception caught: '. $e->getMessage();
            return false;
        }
    }
}
?>