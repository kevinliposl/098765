<?php

$session = SSession::getInstance();

if (isset($session->permissions)) {
    if ($session->permissions == 'T') {
        include_once 'public/headerProfessor.php';
    } else if ($session->permissions == 'S') {
        include_once 'public/headerStudent.php';
    } else if ($session->permissions == 'A') {
        include_once 'public/headerAdmin.php';
    } else {
        include_once 'public/header.php';
    }
} else {
    header('Location:?action=notFound');
}
?>

<section id="page-title">
    <div class="container clearfix">
        <h1>Recuperar Contraseña</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin" style="max-width: 550px;">
                <div class="acc_content clearfix">
                    <form id="form" class="nobottommargin" onsubmit="return val()">
                        <div class="col_full">
                            <label for="form-password">Correo electr&oacute;nico:</label>
                            <input type="email" id="form-email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required/>
                            <input type="hidden" id="failed-email" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                        </div>
                        <div class="col_full nobottommargin">                      
                            <input type="submit" value="Obtener" class="button button-3d button-black nomargin form-control" style="display: block; text-align: center;"/>
                            <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i> El envio no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="success" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Envio realizado, revise en breve...!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="wait" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function val() {
        var email = $("#form-email").val().trim();

        if (!/\w+@\w+\.+[a-z]/.test(email) || email.split(" ", 2).length > 1) {
            $("#failed-email").attr("data-notify-msg", "<i class=icon-remove-sign></i> Correo Incorrecto. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-email"));
            return false;
        }
        SEMICOLON.widget.notifications($("#wait"));

        var parameters = {
            "email": email
        };
        $.post("?controller=User&action=rememberPassword", parameters, function (data) {
            if (data.result === "1") {
                SEMICOLON.widget.notifications($("#success"));
                setTimeout("location.href = '?controller=User&action=logIn';", 1000);
            } else {
                SEMICOLON.widget.notifications($("#warning"));
            }
            ;
        }, "json");
        return false;
    }
</script>

<?php

include_once 'public/footer.php';
