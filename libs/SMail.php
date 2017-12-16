<?php

class SMail {

    private $mail;
    private static $instance = null;
    
    private function __construct() {
        require 'PHPMailer/PHPMailerAutoload.php';
        date_default_timezone_set('Etc/UTC');
        set_time_limit(0);
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
            $this->mail->Subject = $subject;

            $html = file_get_contents('view/mailView.php');
            $body = str_replace("Mensaje", $messaje, $html);
            $body1 = str_replace("Asunto", $subject, $body);

            $this->mail->AddEmbeddedImage("public/images/fusionOriginalMail.png","imagen0");
            $this->mail->AddEmbeddedImage("public/images/facebook.png","imagen1");
            
            $this->mail->Body = $body1;
            $this->mail->AltBody = 'La academia informa...';

            $this->mail->addAddress($addressee);

            return $this->mail->send();
        } catch (Exception $exc) {
            return $exc->getTraceAsString();
        }
    }

    private function autoLoad() {
        $this->mail = new PHPMailer;
        $this->mail->isSMTP(); //Indicar que se usará SMTP
        $this->mail->CharSet = 'UTF-8'; //permitir envío de caracteres especiales (tildes y ñ)

        $this->mail->SMTPDebug = 0; //Mensajes de debug; 0 = no mostrar (en producción), 1 = de cliente, 2 = de cliente y servidor
        $this->mail->Debugoutput = 'html'; //Mostrar mensajes (resultados) de depuración(debug) en html

        $this->mail->Host = 'smtp.gmail.com'; //Nombre de host

        $this->mail->Port = 587; //Puerto SMTP, 587 para autenticado TLS
        $this->mail->SMTPSecure = 'tls'; //Sistema de encriptación - ssl (obsoleto) o tls
        $this->mail->SMTPAuth = true; //Usar autenticación SMTP
        $this->mail->SMTPOptions = array(
            'ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true)
        );
        $this->mail->Username = "3msqueters@gmail.com";
        $this->mail->Password = "mosquetero";
        $this->mail->setFrom('fusionAcademiaMusical.com', 'Kevin');
    }
}
