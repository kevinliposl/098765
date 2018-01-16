<?php

class SMail {

    private $mail;
    private static $instance = null;

    private function __construct() {
        require 'libs/phpmailer/PHPMailerAutoload.php';
        date_default_timezone_set('Etc/UTC');
        ignore_user_abort(true);
        $this->autoLoad();
    }

    static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    function sendMail($addressee, $subject, $messaje) {
        try {
            $this->mail->Username = "consultas@fusionacademiacr.com";
            $this->mail->Password = "consultasfusion";
            
            $this->mail->setFrom('http://fusionacademiacr.com/', 'info');
            $this->mail->FromName = 'Soporte Tecnico';
            $this->mail->From = 'consultas@fusionacademiacr.com';
            
            $this->mail->Subject = $subject;

            $html = file_get_contents('view/mailView.php');
            $body = str_replace("Mensaje", $messaje, $html);
            $body1 = str_replace("Asunto", $subject, $body);

            $this->mail->AddEmbeddedImage("public/images/fusionOriginalMail.png", "imagen0");
            $this->mail->AddEmbeddedImage("public/images/facebook.png", "imagen1");

            $this->mail->Body = $body1;
            $this->mail->AltBody = 'La academia informa...';

            $this->mail->addAddress($addressee);

            $result = $this->mail->send();

            if ($result) {
                return array('result' => '1', 'err' => NULL);
            } else {
                return array('result' => '0', 'err' => NULL);
            }
        } catch (Exception $exc) {
            return array('result' => false, 'err' => $exc);
        }
    }

    function contactMail($form_name, $form_email, $form_phone, $form_service, $form_subject, $form_message) {
        try {
            $this->mail->Username = "consultas@fusionacademiacr.com";
            $this->mail->Password = "consultasfusion";
            
            $this->mail->setFrom('http://fusionacademiacr.com/', 'info');
            $this->mail->FromName = 'Soporte Tecnico';

            $this->mail->Subject = $form_subject;

            $html = file_get_contents('view/mailView.php');
            $body = str_replace("Mensaje", $form_message, $html);
            $body1 = str_replace("Asunto", ($form_subject . ' ' . $form_service), $body);

            $this->mail->AddEmbeddedImage("public/images/fusionOriginalMail.png", "imagen0");
            $this->mail->AddEmbeddedImage("public/images/facebook.png", "imagen1");

            $this->mail->Body = $body1;
            $this->mail->AltBody = 'Mensaje de ' . $form_name . ' -- ' . $form_email . ' -- ' . $form_phone;

            $this->mail->addAddress('consultas@fusionacademiacr.com'); //////Poner direccion de envio

            $result = $this->mail->send();
            if ($result) {
                return array('result' => '1', 'err' => NULL);
            } else {
                return array('result' => '0', 'err' => NULL);
            }
        } catch (Exception $exc) {
            return array('result' => '0', 'err' => $exc);
        }
    }

    private function autoLoad() {
        try {
            $this->mail = new PHPMailer;
            $this->mail->isSMTP(); //Indicar que se usará SMTP
            $this->mail->CharSet = 'UTF-8'; //permitir envío de caracteres especiales (tildes y ñ)

            $this->mail->SMTPDebug = 0; //Mensajes de debug; 0 = no mostrar (en producción), 1 = de cliente, 2 = de cliente y servidor
            $this->mail->Debugoutput = 'html'; //Mostrar mensajes (resultados) de depuración(debug) en html

            $this->mail->Host = 'mail.fusionacademiacr.com'; //Nombre de host

            $this->mail->Port = 587; //Puerto SMTP, 587 para autenticado TLS
            $this->mail->SMTPSecure = 'tls'; //Sistema de encriptación - ssl (obsoleto) o tls
            $this->mail->SMTPAuth = true; //Usar autenticación SMTP
//            $this->mail->SMTPOptions = array(
//                'ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true)
//            );
        } catch (Exception $exc) {
            return $exc;
        }
    }

}
