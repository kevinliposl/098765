<?php
$session = SSession::getInstance();

if (isset($session->permissions)) {
    include_once 'public/headerAdmin.php';
} else {
    include_once 'public/header.php';
}
?>

<!-- Page Title
============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Actualizar Datos de Profesor</h1>
    </div>
</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin">
                <div class="acc_content clearfix">
                    <form id="form" class="nobottommargin" onsubmit="return validate();">
                        <div class="white-section">
                            <label for="form-professor">Profesores:</label>
                            <select id="form-professor" class="selectpicker form-control" data-live-search="true">
                                <option data-tokens="">Seleccione un Profesor</option>
                                <?php foreach ($vars as $var) { ?>
                                    <option value="<?php echo $var["identification"] ?>" data-tokens="">
                                        <?php echo $var["Name"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <br>
                        <div class="acc_content clearfix"></div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <colgroup>
                                    <col class="col-xs-5">
                                    <col class="col-xs-8">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>Identificaci&oacute;n</td>
                                        <td>
                                            <a id="form-id" class="bt-editable" href="#" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese la identificación"></a>
                                            <input type="hidden" id="failed-id" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tipo de Identificaci&oacute;n</td>
                                        <td>
                                            <a id="form-id-type" class="bt-editable" href="#" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el tipo de identificación"></a>
                                            <input type="hidden" id="failed-id-type" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nombre</td>
                                        <td>
                                            <a id="form-name" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el nombre"></a>
                                            <input type="hidden" id="failed-name" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Primer Apellido</td>
                                        <td>
                                            <a id="form-first-lastName" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el Primer Apellido"></a>
                                            <input type="hidden" id="failed-first-lastName" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Segundo Apellido</td>
                                        <td>
                                            <a id="form-second-lastName" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el Segundo Apellido"></a>
                                            <input type="hidden" id="failed-second-lastName" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>G&eacute;nero</td>
                                        <td>
                                            <a id="form-gender" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el g&eacute;nero (M: Masculino, F: Femenino)"></a>
                                            <input type="hidden" id="failed-gender" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nacionalidad</td>
                                        <td>
                                            <a id="form-nationality" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese la nacionalidad"></a>
                                            <input type="hidden" id="failed-nationality" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tel&eacute;fono</td>
                                        <td>
                                            <a id="form-phone1" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el Teléfono"></a>
                                            <input type="hidden" id="failed-phone1" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Otro Tel&eacute;fono</td>
                                        <td>
                                            <a id="form-phone2" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese otro Teléfono"></a>
                                            <input type="hidden" id="failed-phone2" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>
                                            <a id="form-email" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el email"></a>
                                            <input type="hidden" id="failed-email" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Fecha de Nacimiento</td>
                                        <td>
                                            <a id="form-age" href="#" class="bt-editable" data-type="date" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese la fecha de nacimiento"></a>
                                            <input type="hidden" id="failed-age" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Direcci&oacute;n</td>
                                        <td>
                                            <a id="form-address" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese la dirección"></a>
                                            <input type="hidden" id="failed-address" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Informaci&oacute;n Adicional</td>
                                        <td>
                                            <a id="form-additionalInformation" class="bt-editable" href="#" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Información Adicional"></a>
                                            <input type="hidden" id="failed-additionalInformation" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col_full nobottommargin">                      
                            <input type="submit" value="Actualizar" class="button button-3d button-black nomargin form-control" style="display: block; text-align: center;"/>
                            <input type="hidden" id="warning"/>
                            <input type="hidden" id="success"/>
                            <input type="hidden" id="failed"/>
                        </div>
                    </form>
                </div>
                <!--</div>-->
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
                    <h4 style="text-align: center;">¿Realmente desea actualizar la información de este profesor?</h4>
                    <p>Consejos:
                    <li>Revisar que todos los campos tengan la informaci&oacute;n correcta</li>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="button" class="btn btn-primary button-black nomargin" id="form-submity" value="Actualizar"/>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    //Change Combobox
    $("#form-professor").change(function () {
        var parameters = {
            "id": $("#form-professor").val()
        };
        $.post("?controller=Professor&action=select", parameters, function (data) {
            if (data.identification) {
                $("#form-id").html(data.identification);
                $("#form-id-type").html(data.id_type);
                $("#form-name").html(data.name);
                $("#form-first-lastName").html(data.first_lastname);
                $("#form-second-lastName").html(data.second_lastname);
                $("#form-phone1").html(data.phone);
                $("#form-phone2").html(data.cel_phone);
                $("#form-email").html(data.email);
                $("#form-gender").html(data.gender);
                $("#form-nationality").html(data.nationality);
                $("#form-age").html(data.birthdate);
                $("#form-address").html(data.address);
                $("#form-additionalInformation").html(data.expedient);

            } else {
                $("#form-id").html("");
                $("#form-id-type").html("");
                $("#form-name").html("");
                $("#form-first-lastName").html("");
                $("#form-second-lastName").html("");
                $("#form-phone1").html("");
                $("#form-phone2").html("");
                $("#form-email").html("");
                $("#form-gender").html("");
                $("#form-nationality").html("");
                $("#form-age").html("");
                $("#form-address").html("");
                $("#form-additionalInformation").html("");
            }
        }, "json");
    });

    function validate() {
        var identification, typeId, nameP, firstLastName, secondLastName, additionalInformation, address, phone, phone2, nationality, gender;

        identification = $("#form-id").text().trim();
        typeId = $("#form-id-type").text().trim();
        nameP = $("#form-name").text().trim();
        firstLastName = $("#form-first-lastName").text().trim();
        secondLastName = $("#form-second-lastName").text().trim();
        additionalInformation = $("#form-additionalInformation").text().trim();
        address = $("#form-address").text().trim();
        phone = $("#form-phone1").text().trim();
        phone2 = $("#form-phone2").text().trim();
        nationality = $("#form-nationality").text().trim();
        gender = $("#form-gender").text().trim().toUpperCase();

        if (nameP.length < 3 || nameP.length > 49 || !isNaN(nameP)) {
            $("#failed-name").attr("data-notify-msg", "<i class=icon-remove-sign></i> Dato de Nombre Incorrecto. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-name"));
            return false;

        } else if (firstLastName.length < 3 || firstLastName.length > 49 || !isNaN(firstLastName)) {
            $("#failed-first-lastName").attr("data-notify-msg", "<i class=icon-remove-sign></i> Primer Apellido Incorrecto. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-firs-lastName"));
            return false;

        } else if (secondLastName.length < 3 || secondLastName.length > 49 || !isNaN(secondLastName)) {
            $("#failed-second-lastName").attr("data-notify-msg", "<i class=icon-remove-sign></i> Segundo Apellido Incorrecto. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-second-lastName"));
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

        } else if (gender.length > 1 || (gender != "M" && gender != "F")) {
            $("#failed-gender").attr("data-notify-msg", "<i class=icon-remove-sign></i> Genero erroneo. Datos validos M o F. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-gender"));
            return false;
        } else {
            if (typeId == "C") {
                if (isNaN(identification) || identification.length < 9 || identification.length > 9) {
                    $("#failed-id").attr("data-notify-msg", "<i class=icon-remove-sign></i> Formato de identificacion incorrecto. Complete e intente de nuevo!");
                    SEMICOLON.widget.notifications($("#failed-id"));
                    return false;
                }
            } else if (typeId == "D") {
                if (identification.length < 12 || identification.length > 12) {
                    $("#failed-id").attr("data-notify-msg", "<i class=icon-remove-sign></i> Formato de identificacion incorrecto. Complete e intente de nuevo!");
                    SEMICOLON.widget.notifications($("#failed-id"));
                    return false;
                }
            } else {
                $("#failed-id-type").attr("data-notify-msg", "<i class=icon-remove-sign></i> Tipo de identificación incorrecta. C - para nacionales, P - pasapote, D - DIMEX Complete e intente de nuevo!");
                SEMICOLON.widget.notifications($("#failed-id-type"));
                return false;
            }
        }//final

        $('#showModal').click();
        return false;
    }

    //UPDATE 
    $("#form-submity").click(function () {
        var parameters = {
            "id": $('#form-professor').val(),
            "identification": $("#form-id").text().trim(),
            "name": $("#form-name").text().trim(),
            "firstLastName": $("#form-first-lastName").text().trim(),
            "secondLastName": $("#form-second-lastName").text().trim(),
            "gender": $("#form-gender").text().trim(),
            "nationality": $("#form-nationality").text().trim(),
            "address": $("#form-address").text().trim(),
            "typeId": $("#form-id-type").text().trim(),
            "phone": $("#form-phone1").text().trim(),
            "phone2": $("#form-phone2").text().trim(),
            "additionalInformation": $("#form-additionalInformation").text().trim(),
            "email": $("#form-email").text().trim(),
            "age": $("#form-age").text().trim()
        };
        $.post("?controller=Professor&action=update", parameters, function (data) {
            if (data.result === "1") {
                $("#success").attr({
                    "data-notify-type": "success",
                    "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!",
                    "data-notify-position": "bottom-full-width"
                });
                SEMICOLON.widget.notifications($("#success"));
                setTimeout("location.href = '?controller=Professor&action=update';", 2000);
            } else {
                $("#warning").attr({
                    "data-notify-type": "warning",
                    "data-notify-msg": "<i class=icon-warning-sign></i> Operacion Incompleta, intente de nuevo!",
                    "data-notify-position": "bottom-full-width"
                });
                SEMICOLON.widget.notifications($("#warning"));
            }
        }, "json");
    });

    $(document).ready(function () {
        $('.bt-editable').editable();
    });
</script>

<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';
