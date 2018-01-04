<?php

$session = SSession::getInstance();

if (isset($session->permissions)) {
    if ($session->permissions == 'A') {
        include_once 'public/headerAdmin.php';
    } else {
        header('Location:?action=notFound');
    }
} else {
    header('Location:?action=notFound');
}
?>

<section id="page-title">
    <div class="container clearfix">
        <h1>Registrar Curso</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin" style="max-width: 550px;">
                <div class="acc_content clearfix">
                    <form id="form" class="nobottommargin" onsubmit="return val();">
                        <div class="col_full">
                            <label for="form-initials">Siglas:</label>
                            <input type="text" id="form-initials" class="form-control" placeholder="CAL000" minlength="6" maxlength="6" required/>
                            <input type="hidden" id="failed-initials" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class='icon-remove-sign'></i> Inicial de curso Incorrecta. Complete e intente de nuevo!"/>
                        </div>

                        <div class="col_full">
                            <label for="form-name">Nombre:</label>
                            <input type="text" id="form-name" class="form-control" pattern="([A-z0-9À-ž\s]){4,}" placeholder="Canto Lirico" minlength="3" maxlength="49" required/>
                            <input type="hidden" id="failed-name" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class='icon-remove-sign'></i> Nombre Incorrecto. Complete e intente de nuevo!"/>
                        </div>

                        <div class="col_full">
                            <label for="form-instrument">Instrumento:</label>
                            <input type="text" id="form-instrument" class="form-control" pattern="([A-z0-9À-ž\s]){2,}" placeholder="Voz" minlength="3" maxlength="99" required/>
                            <input type="hidden" id="failed-instrument" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class='icon-remove-sign'></i> Descripción Incorrecto. Complete e intente de nuevo!"/>
                        </div>

                        <div class="col_full">
                            <label for="form-description">Breve Descripci&oacute;n:</label>
                            <input type="text" id="form-description" class="form-control" pattern="([A-z0-9À-ž\s]){2,}" placeholder="Breve Descripción" minlength="3" maxlength="99" required/>
                            <input type="hidden" id="failed-description" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class='icon-remove-sign'></i> Instrumento Incorrecto. Complete e intente de nuevo!"/>
                        </div>

                        <div class="col_full nobottommargin">                      
                            <input type="submit" value="Registrar" class="button button-3d button-black nomargin form-control" style="display: block; text-align: center;"/>
                            <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i>La operacion no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="success" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Operaci&oacute;n exitosa, revise en breve...!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="wait" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>
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
                    <h4 style="text-align: center;">¿Realmente desea insertar este Curso?</h4>
                    <p>Consejos:
                    <li>Revisar que todos los campos tengan la informaci&oacute;n correcta</li>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="form-close">Cerrar</button>
                    <input type="button" class="btn btn-primary button-black nomargin" id="form-submity" value="Insertar"/>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function val() {

        var initials = $("#form-initials").val().toUpperCase().trim();
        var name = $("#form-name").val().trim();
        var description = $("#form-description").val().trim();
        var instrument = $("#form-instrument").val().trim();

        if (isNaN(initials.substr(3, 3)) || /^[a-z][a-z]*/.test(initials.substr(0, 3)) || initials.split(" ", 2).length > 1) {
            SEMICOLON.widget.notifications($("#failed-initials"));
            return false;

        } else if (!isNaN(name)) {
            SEMICOLON.widget.notifications($("#failed-name"));
            return false;

        } else if (!isNaN(description)) {
            SEMICOLON.widget.notifications($("#failed-description"));
            return false;

        } else if (!isNaN(instrument)) {
            SEMICOLON.widget.notifications($("#failed-instrument"));
            return false;
        }
        $('#showModal').click();
        return false;
    }
    //Insert
    $("#form-submity").click(function () {

        $("#form-submity").attr('disabled', 'disabled');
        $("#form-close").attr('disabled', 'disabled');

        var args = {
            'initials': $("#form-initials").val().toUpperCase().trim(),
            'name': $("#form-name").val().trim(),
            'description': $("#form-description").val().trim(),
            'instrument': $("#form-instrument").val().trim()
        };
        SEMICOLON.widget.notifications($("#wait"));

        $.post("?controller=Course&action=insert", args, function (data) {
            if (data.result === "1") {
                SEMICOLON.widget.notifications($("#success"));
                setTimeout("location.href = '?controller=Course&action=insert';", 1500);
            } else {
                SEMICOLON.widget.notifications($("#warning"));
                $("#form-submity").removeAttr('disabled');
                $("#form-close").removeAttr('disabled');
            }
        }, "json");
    });
</script>

<?php
include_once 'public/footer.php';
