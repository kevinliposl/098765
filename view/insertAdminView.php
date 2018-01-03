<?php

$session = SSession::getInstance();

if (isset($session->permissions)) {
    if ($session->permissions == 'R') {
        include_once 'public/headerRoot.php';
    } else {
        header('Location:?action=notFound');
    }
} else {
    header('Location:?action=notFound');
}
?>
<section id="page-title">
    <div class="container clearfix">
        <h1>Registrar Administrador</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin" style="max-width: 550px;">
                <div class="acc_content clearfix">
                    <form id="form" class="nobottommargin" onsubmit="return val();">
                        <div class="col_full">
                            <label for="form-id">Cedula:</label>
                            <input type="text" id="form-id" class="form-control" pattern="[0-9]+$" required minlength="9" placeholder="304440555"/>
                            <input type="hidden" id="failed-id" data-notify-type="error" data-notify-position="bottom-full-width" data-notify-msg="<i class='icon-remove-sign'></i> Cedula Incorrecta. Complete e intente de nuevo!"/>
                        </div>

                        <div class="col_full">
                            <label for="form-email">Correo Electronico:</label>
                            <input type="email" id="form-email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required placeholder="hola@dominio.com"/>
                            <input type="hidden" id="failed-email" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class='icon-remove-sign'></i> Correo Incorrecto. Complete e intente de nuevo!"/>
                        </div>

                        <div class="col_full">
                            <label for="form-name">Nombre:</label>
                            <input type="text" id="form-name" class="form-control" pattern="[a-zA-Z\s]+$" required minlength="3" placeholder="Laura"/>
                            <input type="hidden" id="failed-name" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg= "<i class='icon-remove-sign'></i> Nombre Incorrecto. Complete e intente de nuevo!"/>
                        </div>

                        <div class="col_full">
                            <label for="form-firstlastname">Primer Apellido:</label>
                            <input type="text" id="form-firstLastName"class="form-control" pattern="[a-zA-Z\s]+$" required minlength="3" placeholder="Brenes"/>
                            <input type="hidden" id="failed-firstLastName" data-notify-type="error" data-notify-position="bottom-full-width" data-notify-msg="<i class='icon-remove-sign'></i> Primer Apellido Incorrecto. Complete e intente de nuevo!"/>
                        </div>

                        <div class="col_full">
                            <label for="form-secondlastname">Segundo Apellido:</label>
                            <input type="text" id="form-secondLastName" class="form-control" pattern="[a-zA-Z\s]+$" required minlength="3" placeholder="Mora"/>
                            <input type="hidden" id="failed-secondLastName" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class='icon-remove-sign'></i> Segundo Apellido Incorrecto. Complete e intente de nuevo!"/>
                        </div>

                        <div class="col_full nobottommargin">                      
                            <input type="submit" id="submit" value="Registrar" class="button button-3d button-black nomargin form-control" style="display: block; text-align: center;"/>
                            <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i>La operacion no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="success" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Operaci&oacute;n exitosa, revise en breve...!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="wait" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Un momento por favor..." data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="alert" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Se ha creado el administrador, pero no se ha podido enviarle el correo Electronico, ¡contacte con Soporte tecnico!" data-notify-position="bottom-full-width"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<a id="showModal" style="display: none;"class="button button-3d button-black nomargin" data-target="#myModal" data-toggle="modal">Modal</a>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">¡Aviso!</h4>
                </div>
                <div class="modal-body">
                    <h4 style="text-align: center;">¿Realmente desea insertar este Administrador?</h4>
                    <p>Consejos:
                    <li>Revisar que todos los campos tengan la informaci&oacute;n correcta</li>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="form-close">Cerrar</button>
                    <input type="button" class="btn btn-primary button-black nomargin" id="form-submity" value="Registrar"/>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function val() {
        args = {
            "id": $("#form-id").val().trim(),
            "email": $("#form-email").val().trim(),
            "name": $("#form-name").val().trim(),
            "firstLastName": $("#form-firstLastName").val().trim(),
            "secondLastName": $("#form-secondLastName").val().trim()
        };

        if (!/\w+@\w+\.+[a-z]/.test(args['email']) || args['email'].split(" ").length > 1) {
            SEMICOLON.widget.notifications($("#failed-email"));
            return false;

        } else if (isNaN(args['id']) || args['id'].length < 9 || args['id'].split(" ", 2).length > 1) {
            SEMICOLON.widget.notifications($("#failed-id"));
            return false;

        } else if (args['name'].length < 4 || args['name'].split(" ", 2).length > 1) {
            SEMICOLON.widget.notifications($("#failed-name"));
            return false;

        } else if (args['firstLastName'].length < 4 || args['firstLastName'].split(" ", 2).length > 1) {
            SEMICOLON.widget.notifications($("#failed-firstLastName"));
            return false;

        } else if (args['secondLastName'].length < 4 || args['secondLastName'].split(" ", 2).length > 1) {
            SEMICOLON.widget.notifications($("#failed-secondLastName"));
            return false;
        }
        $('#showModal').click();
        return false;
    }

    //Insert
    $("#form-submity").click(function () {
        $("#form-submity").attr('disabled', 'disabled');
        $("#form-close").attr('disabled', 'disabled');

        SEMICOLON.widget.notifications($("#wait"));

        $.post("?controller=Admin&action=insert", args, function (data) {
            if (data.result === "1") {
                SEMICOLON.widget.notifications($("#success"));
                setTimeout("location.href='?controller=Admin&action=insert';", 1500);
            } else if (data.result === "0"){
                SEMICOLON.widget.notifications($("#warning"));
                $("#form-submity").removeAttr('disabled');
                $("#form-close").removeAttr('disabled');
            }else{
                SEMICOLON.widget.notifications($("#alert"));
                setTimeout("location.href='?controller=Admin&action=insert';", 2000);
            }
        }, "json");
    });
</script>

<?php

include_once 'public/footer.php';
