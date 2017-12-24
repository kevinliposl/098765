<?php

$session = SSession::getInstance();

if (isset($session->permissions)) {
    include_once 'public/headerAdmin.php';
} else {
    include_once 'public/header.php';
}
?>

<section id="page-title">
    <div class="container clearfix">
        <h1>Registar Profesor</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin">
                <div class="acctitle">
                    <div class="acc_content clearfix">
                        <form id="form" class="nobottommargin" onsubmit="return validate();">
                            <div class="col-lg-6" style="padding: 10px;">
                                <label for="form-typeId">Tipo de Identificaci&oacute;n:</label>
                                <input type="radio" name="form-typeId" value="C" checked/><label>Cédula.</label>
                                <input type="radio" name="form-typeId" value="D"/> <label> Dimex.</label>
                                <input type="radio" name="form-typeId" value="P"/><label> Pasaporte.</label>
                            </div>

                            <div class="col-lg-6" style="padding: 10px;">
                                <label for="form-id">Número de Identificaci&oacute;n:</label>
                                <input type="text" id="form-id" class="form-control" required/>
                                <input type="hidden" id="failed-id" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>

                            <div class="col-lg-6" style="padding: 10px;">
                                <label for="form-name">Nombre:</label>
                                <input type="text" id="form-name" class="form-control" required/>
                                <input type="hidden" id="failed-name" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>

                            <div class="col-lg-6" style="padding: 10px;">
                                <label for="form-firstLastName">Primer Apellido:</label>
                                <input type="text" id="form-firstLastName" class="form-control" required/>
                                <input type="hidden" id="failed-firstLastName" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>

                            <div class="col-lg-6" style="padding: 10px;">
                                <label for="form-secondLastName">Segundo Apellido:</label>
                                <input type="text" id="form-secondLastName" class="form-control" required/>
                                <input type="hidden" id="failed-secondLastName" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>

                            <div class="col-lg-6" style="padding: 10px;">
                                <label for="form-address">Lugar de Residencia:</label>
                                <input type="text" id="form-address" class="form-control" required/>
                                <input type="hidden" id="failed-address" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>

                            <div class="col-lg-6" style="padding: 10px;">
                                <label for="form-gender">G&eacute;nero:</label>
                                <input type="radio" name="form-gender" value="M" checked/> <label>Masculino</label>
                                <input type="radio" name="form-gender" value="F"/><label>Femenino</label>
                            </div>

                            <div class="col-lg-6" style="padding: 10px;">
                                <label for="form-nationality">Nacionalidad:</label>
                                <input type="text" id="form-nationality" class="form-control" required/>
                                <input type="hidden" id="failed-nationality" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>

                            <div class="col-lg-6" style="padding: 10px;">
                                <label for="form-phone1">Tel&eacute;fono:</label>
                                <input type="text" id="form-phone1" class="form-control" minlength="8" maxlength="8" required pattern="{4-16}"/>
                                <input type="hidden" id="failed-phone1" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>

                            <div class="col-lg-6" style="padding: 10px;">
                                <label for="form-phone2">Otro Tel&eacute;fono:</label>
                                <input type="text" id="form-phone2" class="form-control" minlength="8" maxlength="8" required pattern="{4-16}"/>
                                <input type="hidden" id="failed-phone2" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>

                            <div class="col-lg-6" style="padding: 10px;">
                                <label for="form-email">Correo Electr&oacute;nico:</label>
                                <input type="email" id="form-email" class="form-control" required/>
                                <input type="hidden" id="failed-email" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>

                            <div class="col-lg-6" style="padding: 10px;">
                                <label for="form-age">Fecha de nacimiento:</label>
                                <input type="date" id="form-age" class="form-control" required/>
                                <input type="hidden" id="failed-age" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>

                            <div class="col_full" style="padding: 10px;">
                                <label for="form-additionalInformation">Informaci&oacute;n Adicional:</label>
                                <input type="text" id="form-additionalInformation" class="form-control" required/>
                                <input type="hidden" id="failed-additionalInformation" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>

                            <div class="col_full" style="padding: 10px;">                      
                                <input type="submit" value="Insertar" class="button button-3d button-black nomargin form-control" style="display: block; text-align: center;"/>
                                <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i>La operacion no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
                                <input type="hidden" id="success" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Operaci&oacute;n exitosa, revise en breve...!" data-notify-position="bottom-full-width"/>
                                <input type="hidden" id="wait" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>                            </div>
                        </form>
                    </div>
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

        var typeId, identification, nameP, firstLastName, secondLastName, additionalInformation, address, phone, phone2, nationality;
        typeId = $("input[name*='form-typeId']").val();
        identification = $("#form-id").val().trim();
        nameP = $("#form-name").val().trim();
        firstLastName = $("#form-firstLastName").val().trim();
        secondLastName = $("#form-secondLastName").val().trim();
        additionalInformation = $("#form-additionalInformation").val().trim();
        address = $("#form-address").val().trim();
        phone = $("#form-phone1").val().trim();
        phone2 = $("#form-phone2").val().trim();
        nationality = $("#form-nationality").val().trim();


        if (nameP.length < 3 || nameP.length > 49 || !isNaN(nameP)) {
            $("#failed-name").attr("data-notify-msg", "<i class=icon-remove-sign></i> Dato de Nombre Incorrecto. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-name"));
            return false;

        } else if (firstLastName.length < 3 || firstLastName.length > 49 || !isNaN(firstLastName)) {
            $("#failed-firstLastName").attr("data-notify-msg", "<i class=icon-remove-sign></i> Primer Apellido Incorrecto. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-firsLastName"));
            return false;

        } else if (secondLastName.length < 3 || secondLastName.length > 49 || !isNaN(secondLastName)) {
            $("#failed-secondLastName").attr("data-notify-msg", "<i class=icon-remove-sign></i> Segundo Apellido Incorrecto. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-secondLastName"));
            return false;

        } else if (phone.length < 8 || phone.length > 8 || isNaN(phone)) {
            $("#failed-phone1").attr("data-notify-msg", "<i class=icon-remove-sign></i> Formato de telefono incorrecto. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-phone1"));
            return false;

        } else if (phone2.length < 8 || phone2.length > 8 || isNaN(phone2)) {
            $("#failed-phone2").attr("data-notify-msg", "<i class=icon-remove-sign></i> Formato de otro telefono incorrecto. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-phone2"));
            return false;

        } else if (nationality.length < 6 || nationality.length > 49 || !isNaN(nationality) || nationality.split(" ", 2).length > 1) {
            $("#failed-nationality").attr("data-notify-msg", "<i class=icon-remove-sign></i> Formato de nacionalidad incorrecto. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-nationality"));
            return false;

        } else if (address.length > 200) {
            $("#failed-address").attr("data-notify-msg", "<i class=icon-remove-sign></i> Dirección muy extensa. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-address"));
            return false;

        } else if (additionalInformation.length > 2000) {
            $("#failed-additionalInformation").attr("data-notify-msg", "<i class=icon-remove-sign></i> Información adicional muy extensa. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-additionalInformation"));
            return false;

        } else {
            if (typeId === "C") {
                if (isNaN(identification) || identification.length < 9 || identification.length > 9) {
                    $("#failed-id").attr("data-notify-msg", "<i class=icon-remove-sign></i> Formato de identificacion incorrecto. Complete e intente de nuevo!");
                    SEMICOLON.widget.notifications($("#failed-id"));
                    return false;
                }
            } else if (typeId === "D") {
                if (identification.length < 12 || identification.length > 12) {
                    $("#failed-id").attr("data-notify-msg", "<i class=icon-remove-sign></i> Formato de identificacion incorrecto. Complete e intente de nuevo!");
                    SEMICOLON.widget.notifications($("#failed-id"));
                    return false;
                }
            }//if-else
        }//final

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

<?php
include_once 'public/footer.php';
