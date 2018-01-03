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
        <h1>Registrar Profesor</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin">
                <div class="acc_content clearfix">
                    <form id="form" class="nobottommargin" onsubmit="return val();">
                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-typeId">Tipo de Identificación:</label>
                            <input type="radio" name="form-typeId" value="C" onclick="checkTypeId('C');" checked/><label>Cédula Nacional</label>
                            <input type="radio" name="form-typeId" value="D" onclick="checkTypeId('D');"/> <label>Dimex</label>
                            <input type="radio" name="form-typeId" value="P" onclick="checkTypeId('P');"/><label>Pasaporte</label>
                        </div>

                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-id">Número de Identificaci&oacute;n:</label>
                            <input type="text" id="form-id" class="form-control" required/>
                            <input type="hidden" id="failed-id" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                        </div>

                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-name">Nombre:</label>
                            <input type="text" id="form-name" class="form-control" pattern="[a-zA-Z\s]+$" placeholder="Manuel" minlength="3" maxlength="50" required/>
                            <input type="hidden" id="failed-name" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> Dato de Nombre Incorrecto. Complete e intente de nuevo!"/>
                        </div>

                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-firstLastName">Primer Apellido:</label>
                            <input type="text" id="form-firstLastName" class="form-control" pattern="[a-zA-Z\s]+$" placeholder="Garcia" minlength="3" maxlength="50" required/>
                            <input type="hidden" id="failed-firstLastName" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> Primer Apellido Incorrecto. Complete e intente de nuevo!"/>
                        </div>

                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-secondLastName">Segundo Apellido:</label>
                            <input type="text" id="form-secondLastName" class="form-control" pattern="[a-zA-Z\s]+$" placeholder="Garcia" minlength="3" maxlength="50" required/>
                            <input type="hidden" id="failed-secondLastName" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> Segundo Apellido Incorrecto. Complete e intente de nuevo!"/>
                        </div>
                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-address">Lugar de Residencia:</label>
                            <input type="text" id="form-address" class="form-control" pattern="[a-zA-Z\s]+$" minlength="5" maxlength="200" required/>
                            <input type="hidden" id="failed-address" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> Dirección muy extensa. Complete e intente de nuevo!"/>
                        </div>

                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-gender">G&eacute;nero:</label>
                            <br>
                            <input type="radio" name="form-gender" value="M" checked/> <label>Masculino</label>
                            <input type="radio" name="form-gender" value="F"/><label>Femenino</label>
                        </div>
                        <div class="col_full" style="padding: 10px;">
                            <label for="form-address">Lugar de Residencia:</label>
                            <input type="text" id="form-address" class="form-control" pattern="[a-zA-Z\s]+$" minlength="5" maxlength="200" required/>
                            <input type="hidden" id="failed-address" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> Dirección muy extensa. Complete e intente de nuevo!"/>
                        </div>
                        
                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-nationality">Nacionalidad:</label>
                            <select id="form-nationality" class="selectpicker form-control" data-live-search="true">
                                <?php
                                foreach ($vars as $var) {
                                    ?>
                                    <option value="<?php print_r($var['name']); ?> " data-tokens="">
                                        <?php print_r($var['name']); ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                            <input type="hidden" id="failed-nationality" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> Formato de nacionalidad incorrecto. Complete e intente de nuevo!"/>
                        </div>
                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-phone1">Tel&eacute;fono:</label>
                            <input type="text" id="form-phone1" class="form-control" minlength="8" maxlength="8" required pattern="{4-16}"/>
                            <input type="hidden" id="failed-phone1" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> Formato de telefono incorrecto. Complete e intente de nuevo!"/>
                        </div>

                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-phone2">Otro Tel&eacute;fono:</label>
                            <input type="text" id="form-phone2" class="form-control" minlength="8" maxlength="8" required pattern="{4-16}"/>
                            <input type="hidden" id="failed-phone2" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> Formato de telefono incorrecto. Complete e intente de nuevo!"/>
                        </div>

                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-email">Correo Electr&oacute;nico:</label>
                            <input type="text" id="form-email" class="form-control" required/>
                            <input type="hidden" id="failed-email" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                        </div>

                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-age">Fecha de nacimiento:</label>
                            <input type="date" id="form-age" class="form-control" required/>
                            <input type="hidden" id="failed-age" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                        </div>

                        <div class="col_full" style="padding: 10px;">
                            <label for="form-additionalInformation">Informaci&oacute;n Adicional:</label>
                            <textarea class="form-control" id="form-additionalInformation" rows="6" cols="30" required style="resize: none;"></textarea>
                            <input type="hidden" id="failed-additionalInformation" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> Información adicional muy extensa. Complete e intente de nuevo!"/>
                        </div>

                        <div class="col_full" style="padding: 10px;">                      
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
                    <h4 style="text-align: center;">¿Realmente desea insertar este profesor?</h4>
                    <p>Consejos:
                    <li>Revisar que todos los espacios contengan la informaci&oacute;n suministrada correctamente</li>
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
    function checkTypeId(type) {
        if (type === 'C') {
            $("#form-id").attr('minlength', '9');
            $("#form-id").attr('maxlength', '9');
            $("#form-id").val('');
        } else {
            $("#form-id").attr('minlength', '9');
            $("#form-id").attr('maxlength', '20');
            $("#form-id").val('');
        }
    }

    function val() {

        var typeId = $("input[name*='form-typeId']").val();
        var id = $("#form-id").val().trim();
        var email = $("#form-email").val().trim();
        var name = $("#form-name").val().trim();
        var firstLastName = $("#form-firstLastName").val().trim();
        var secondLastName = $("#form-secondLastName").val().trim();
        var gender = $("input[name*='form-gender']").val();
        var nationality = $("#form-nationality").val().trim();
        var phone = $("#form-phone1").val().trim();
        var phone2 = $("#form-phone2").val().trim();
        var additionalInformation = $("#form-additionalInformation").val().trim();
        var address = $("#form-address").val().trim();
        var age = $("#form-age").val();


        if (name.length < 3 || name.length > 49 || !isNaN(name)) {
            SEMICOLON.widget.notifications($("#failed-name"));
            return false;

        } else if (firstLastName.length < 3 || firstLastName.length > 49 || !isNaN(firstLastName)) {
            SEMICOLON.widget.notifications($("#failed-firsLastName"));
            return false;

        } else if (secondLastName.length < 3 || secondLastName.length > 49 || !isNaN(secondLastName)) {
            SEMICOLON.widget.notifications($("#failed-secondLastName"));
            return false;

        } else if (phone.length < 8 || phone.length > 8 || isNaN(phone)) {
            SEMICOLON.widget.notifications($("#failed-phone1"));
            return false;

        } else if (phone2.length < 8 || phone2.length > 8 || isNaN(phone2)) {
            SEMICOLON.widget.notifications($("#failed-phone2"));
            return false;

        } else if (nationality.length < 6 || nationality.length > 49 || !isNaN(nationality) || nationality.split(" ", 2).length > 1) {
            SEMICOLON.widget.notifications($("#failed-nationality"));
            return false;

        } else if (address.length > 200) {
            SEMICOLON.widget.notifications($("#failed-address"));
            return false;

        } else if (additionalInformation.length > 2000) {
            SEMICOLON.widget.notifications($("#failed-additionalInformation"));
            return false;

        } else {
//            if (args['typeId'] === "C") {
//                if (isNaN(args['identification']) || args['identification'].length < 9 || args['identification'].length > 9) {
//                    $("#failed-id").attr("data-notify-msg", "<i class=icon-remove-sign></i> Formato de identificacion incorrecto. Complete e intente de nuevo!");
//                    SEMICOLON.widget.notifications($("#failed-id"));
//                    return false;
//                }
//            } else if (args['typeId'] === "D") {
//                if (args['identification'].length < 12 || args['identification'].length > 12) {
//                    $("#failed-id").attr("data-notify-msg", "<i class=icon-remove-sign></i> Formato de identificacion incorrecto. Complete e intente de nuevo!");
//                    SEMICOLON.widget.notifications($("#failed-id"));
//                    return false;
//                }
//            }//if-else
        }//final

        $('#showModal').click();
        return false;
    }

    //Insert
    $("#form-submity").click(function () {
        $("#form-submity").attr('disabled', 'disabled');
        $("#form-close").attr('disabled', 'disabled');

        var param = {
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

        SEMICOLON.widget.notifications($("#wait"));

        $.post("?controller=Professor&action=insert", param, function (data) {
            if (data.result === "1") {
                SEMICOLON.widget.notifications($("#success"));
                setTimeout("location.href = '?controller=Professor&action=insert';", 1500);
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
