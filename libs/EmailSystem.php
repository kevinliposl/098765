<?php

class EmailSystem {

    function __construct() {
        require 'libs/phpmailer/PHPMailerAutoload.php';
    }

    function contactSendEmail($nameT, $emailT, $phoneT, $serviceT, $subjectT, $messageT) {
        $toemails = array();

        $toemails[] = array(
            'email' => 'pruebaproyectosucr@gmail.com',
            'name' => $nameT
        );

        $message_success = 'We have <strong>successfully</strong> received your Message and will get Back to you as soon as possible.';


        $mail = new PHPMailer();

        $name = $nameT;
        $email = $emailT;
        $phone = $phoneT;
        $service = $serviceT;
        $subject = $subjectT;
        $message = $messageT;

        $subject = isset($subject) ? $subject : 'Nuevo Mensaje sin Asunto';

        $mail->SetFrom($email, $name);
        $mail->AddReplyTo($email, $name);

        foreach ($toemails as $toemail) {
            $mail->AddAddress($toemail['email'], $toemail['name']);
        }
        $mail->Subject = $subject;

        $name = isset($name) ? "Name: $name<br><br>" : '';
        $email = isset($email) ? "Email: $email<br><br>" : '';
        $phone = isset($phone) ? "Phone: $phone<br><br>" : '';
        $service = isset($service) ? "Service: $service<br><br>" : '';
        $message = isset($message) ? "Message: $message<br><br>" : '';

        $referrer = $_SERVER['HTTP_REFERER'] ? '<br><br><br>Este formulario fue enviado desde: ' . $_SERVER['HTTP_REFERER'] : '';

        $body = "$name $email $phone $service $message $referrer";

        if (isset($_FILES['template-contactform-file']) && $_FILES['template-contactform-file']['error'] == UPLOAD_ERR_OK) {
            $mail->IsHTML(true);
            $mail->AddAttachment($_FILES['template-contactform-file']['tmp_name'], $_FILES['template-contactform-file']['name']);
        }

        $mail->MsgHTML($body);
        $sendEmail = $mail->Send();

        if ($sendEmail == true):
            return "1";
        else:
            return "0";
        endif;
    }
    
    function contactSendPassword($emailT, $passwordT) {
        $toemails = array();

        $toemails[] = array(
            'email' => $emailT,
            'name' => 'Sr. Usuario'
        );

        $mail = new PHPMailer();

        $email = $emailT;
        $password = $passwordT;

        $subject = 'Servicio Tecnico - Fusión Academia de Música: Recuperación de Contraseña';

        $mail->SetFrom($email, $subject);
        $mail->AddReplyTo($email, $subject);

        foreach ($toemails as $toemail) {
            $mail->AddAddress($toemail['email'], $toemail['name']);
        }
        $mail->Subject = $subject;

        $email = isset($email) ? "Email: $email<br><br>" : '';
        $password = isset($password) ? "Contraseña: $passwordT<br><br>" : '';
        $add = '<br> Por favor, no responder a este correo.';

        $body = "$email $password $add";

        if (isset($_FILES['template-contactform-file']) && $_FILES['template-contactform-file']['error'] == UPLOAD_ERR_OK) {
            $mail->IsHTML(true);
            $mail->AddAttachment($_FILES['template-contactform-file']['tmp_name'], $_FILES['template-contactform-file']['name']);
        }

        $mail->MsgHTML($body);
        $sendEmail = $mail->Send();

        if ($sendEmail == true):
            return "1";
        else:
            return "0";
        endif;
    }

}
