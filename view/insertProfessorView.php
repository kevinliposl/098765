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
        <h1>Registar Profesor</h1>
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
                                <label for="form-typeId">Tipo de Identificaci&oacute;n:</label>
                                <input type="radio" name="form-typeId" value="N" checked/><label>Cédula Nacional</label>
                                <input type="radio" name="form-typeId" value="D"/> <label>Dimex</label>
                                <input type="radio" name="form-typeId" value="E"/><label>Pasaporte</label>
                            </div>
                            
                            <div class="col_full">
                                <label for="form-id">Número de Identificaci&oacute;n:</label>
                                <input type="text" id="form-id" class="form-control" required/>
                                <input type="hidden" id="failed-id" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            
                            <div class="col_full">
                                <label for="form-name">Nombre:</label>
                                <input type="text" id="form-name" class="form-control" required/>
                                <input type="hidden" id="failed-name" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>

                            <div class="col_full">
                                <label for="form-firstLastName">Primer Apellido:</label>
                                <input type="text" id="form-firstLastName" class="form-control" required/>
                                <input type="hidden" id="failed-firstLastName" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>

                            <div class="col_full">
                                <label for="form-secondLastName">Segundo Apellido:</label>
                                <input type="text" id="form-secondLastName" class="form-control" required/>
                                <input type="hidden" id="failed-secondLastName" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            
                            <div class="col_full">
                                <label for="form-address">Lugar de Residencia:</label>
                                <input type="text" id="form-address" class="form-control" required/>
                                <input type="hidden" id="failed-address" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            
                            <div class="col_full">
                                <label for="form-gender">G&eacute;nero:</label>
                                <input type="radio" name="form-gender" value="M" checked/> <label>Masculino</label>
                                <input type="radio" name="form-gender" value="F"/><label>Femenino</label>
                            </div>
                            
                            <div class="col_full">
                                <label for="form-nationality">Nacionalidad:</label>
                                <input type="text" id="form-nationality" class="form-control" required/>
                                <input type="hidden" id="failed-nationality" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            
                            <div class="col_full">
                                <label for="form-phone1">Tel&eacute;fono:</label>
                                <input type="text" id="form-phone1" class="form-control" required/>
                                <input type="hidden" id="failed-phone1" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            
                            <div class="col_full">
                                <label for="form-phone2">Otro Tel&eacute;fono:</label>
                                <input type="text" id="form-phone2" class="form-control" required/>
                                <input type="hidden" id="failed-phone2" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            
                            <div class="col_full">
                                <label for="form-email">Correo Electr&oacute;nico:</label>
                                <input type="email" id="form-email" class="form-control" required/>
                                <input type="hidden" id="failed-email" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            
                            <div class="col_full">
                                <label for="form-age">Fecha de nacimiento:</label>
                                <input type="date" id="form-age" class="form-control" required/>
                                <input type="hidden" id="failed-age" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            
                            <div class="col_full">
                                <label for="form-additionalInformation">Informaci&oacute;n Adicional:</label>
                                <input type="text" id="form-additionalInformation" class="form-control" required/>
                                <input type="hidden" id="failed-additionalInformation" data-notify-type= "error" data-notify-position="bottom-full-width"/>
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
                    <h4 style="text-align: center;">¿Realmente desea insertar este profesor?</h4>
                    <p>Consejos:
                    <li>Revisar que todos los espacios contengan la informaci&oacute;n suministrada correctamente</li>
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

//        var identification, name, firstLastName, secondLastName, email, additionalInformation, age, address, phone, phone2, nacionalidad;
//
//        initials = $("#form-initials").val().trim();
//        name = $("#form-name").val().trim();
//        description = $("#form-description").val().trim();
//        instrument = $("#form-instrument").val().trim();

//        if (initials.length < 6 || initials.length > 6 || isNaN(initials.substr(3,3)) || /^[a-z][a-z]*/.test(initials.substr(0,3)) || initials.split(" ", 2).length > 1) {
//            $("#failed-initials").attr("data-notify-msg", "<i class=icon-remove-sign></i> Inicial de curso Incorrecta. Complete e intente de nuevo!");
//            SEMICOLON.widget.notifications($("#failed-initials"));
//            return false;
//
//        }else if (!isNaN(name) || name.length < 4 || name.split(" ", 2).length > 1) {
//            $("#failed-name").attr("data-notify-msg", "<i class=icon-remove-sign></i> Nombre Incorrecto. Complete e intente de nuevo!");
//            SEMICOLON.widget.notifications($("#failed-name"));
//            return false;
//
//        } else if (!isNaN(description) || description.length < 4 || description.split(" ", 2).length > 1) {
//            $("#failed-description").attr("data-notify-msg", "<i class=icon-remove-sign></i> Descripción Incorrecto. Complete e intente de nuevo!");
//            SEMICOLON.widget.notifications($("#failed-description"));
//            return false;
//
//        } else if (!isNaN(instrument) || instrument.length < 4 || instrument.split(" ", 2).length > 1) {
//            $("#failed-instrument").attr("data-notify-msg", "<i class=icon-remove-sign></i> Instrumento Incorrecto. Complete e intente de nuevo!");
//            SEMICOLON.widget.notifications($("#failed-instrument"));
//            return false;
//        }
        $('#showModal').click();
        return false;
    }

    //Insert
    $("#form-submity").click(function () {
        var parameters = {
            "typeId": $("input[name*='form-typeId']").val(),
            "id": $("#form-id").val().trim(),
            "email": $("#form-email").val().trim(),
            "name": $("#form-name").val().trim(),
            "firstLastName": $("#form-firstLastName").val().trim(),
            "secondLastName": $("#form-secondLastName").val().trim(),
            "gender": $("input[name*='form-gender']").val(),
            "nationality": $("#form-nationality").val().trim(),
            "phone": $("#form-phone1").val().trim(),
            "phone2": $("#form-phone2").val().trim(),
            "additionalInformation": $("#form-additionalInformation").val().trim(),
            "address": $("#form-address").val().trim(),
            "age": $("#form-age").val()
        };

        $.post("?controller=Professor&action=insert", parameters, function (data) {
            if (data.result === "1") {
                $("#success").attr({
                    "data-notify-type": "success",
                    "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!",
                    "data-notify-position": "bottom-full-width"
                });
                SEMICOLON.widget.notifications($("#success"));
                setTimeout("location.href = '?controller=Professor&action=insert';", 2000);
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
