<?php

class Mail {

    private $mail;

    function __construct() {
        require 'PHPMailer/PHPMailerAutoload.php';
        date_default_timezone_set('Etc/UTC');
        set_time_limit(0);
        ignore_user_abort(true);
        $this->autoLoad();
    }

    function sendMail($addressee, $subject, $messaje) {
        $this->mail->Subject = $subject;

        $html = file_get_contents('view/mailView.php');
        $body = str_replace("<p id='message'></p>", "<p id='message'>$messaje</p>", $html);

        $this->mail->Body = $body;
        $this->mail->AltBody = '---'; //Mensaje de sólo texto si el receptor no acepta HTML
        
        $this->mail->addAddress($addressee);

        return $this->mail->send();
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
