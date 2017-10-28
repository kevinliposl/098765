<?php
$session = SSession::getInstance();

if (isset($session->email)) {
    //include_once 'public/headerUser.php';
} else {
    include_once 'public/header.php';
}
?>

<!-- Page Title
============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Registar Curso</h1>
    </div>
</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin" style="max-width: 550px;">
                <div class="acctitle">
                    <div class="acc_content clearfix">
                        <form id="form" class="nobottommargin" onsubmit="return validate();">
                            <div class="col_full">
                                <label for="form-initials">Siglas:</label>
                                <input type="text" id="form-initials" class="form-control" required/>
                                <input type="hidden" id="failed-initials" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            
                            <div class="col_full">
                                <label for="form-name">Nombre:</label>
                                <input type="text" id="form-name" class="form-control" required/>
                                <input type="hidden" id="failed-name" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>

                            <div class="col_full">
                                <label for="form-instrument">Instrumento:</label>
                                <input type="text" id="form-instrument" class="form-control" required/>
                                <input type="hidden" id="failed-instrument" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>

                            <div class="col_full">
                                <label for="form-description">Breve Descripci&oacute;n:</label>
                                <input type="text" id="form-description" class="form-control" required/>
                                <input type="hidden" id="failed-description" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>

                            <div class="col_full nobottommargin">                      
                                <input type="submit" value="Insertar" class="button button-3d button-black nomargin form-control" style="display: block; text-align: center;"/>
                                <input type="hidden" id="warning"/>
                                <input type="hidden" id="success"/>
                                <input type="hidden" id="failed"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section><!-- #content end -->

<!--MODAL -->
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="button" class="btn btn-primary button-black nomargin" id="form-submity" value="Insertar"/>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validate() {

        var initials, name, description, instrument;

        initials = $("#form-initials").val().trim();
        name = $("#form-name").val().trim();
        description = $("#form-description").val().trim();
        instrument = $("#form-instrument").val().trim();

        if (initials.length < 6 || initials.length > 6 || isNaN(initials.substr(3,3)) || /^[a-z][a-z]*/.test(initials.substr(0,3)) || initials.split(" ", 2).length > 1) {
            $("#failed-initials").attr("data-notify-msg", "<i class=icon-remove-sign></i> Inicial de curso Incorrecta. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-initials"));
            return false;

        }else if (!isNaN(name) || name.length < 4 || name.split(" ", 2).length > 1) {
            $("#failed-name").attr("data-notify-msg", "<i class=icon-remove-sign></i> Nombre Incorrecto. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-name"));
            return false;

        } else if (!isNaN(description) || description.length < 4 || description.split(" ", 2).length > 1) {
            $("#failed-description").attr("data-notify-msg", "<i class=icon-remove-sign></i> Descripción Incorrecto. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-description"));
            return false;

        } else if (!isNaN(instrument) || instrument.length < 4 || instrument.split(" ", 2).length > 1) {
            $("#failed-instrument").attr("data-notify-msg", "<i class=icon-remove-sign></i> Instrumento Incorrecto. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-instrument"));
            return false;
        }
        $('#showModal').click();
        return false;
    }

    //Insert
    $("#form-submity").click(function () {
        var parameters = {
            "initials": $("#form-initials").val().trim(),
            "name": $("#form-name").val().trim(),
            "description": $("#form-description").val().trim(),
            "instrument": $("#form-instrument").val().trim()
        };

        $.post("?controller=Course&action=insert", parameters, function (data) {
            if (data.result === "1") {
                $("#success").attr({
                    "data-notify-type": "success",
                    "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!",
                    "data-notify-position": "bottom-full-width"
                });
                SEMICOLON.widget.notifications($("#success"));
                location.href = "?controller=Course&action=insert";
            } else {
                $("#warning").attr({
                    "data-notify-type": "warning",
                    "data-notify-msg": "<i class=icon-warning-sign></i> Operacion Fallida!",
                    "data-notify-position": "bottom-full-width"
                });
                SEMICOLON.widget.notifications($("#warning"));
            }
            ;
        }, "json");
    });
</script>

<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';