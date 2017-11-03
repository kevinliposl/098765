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
        <h1>Actualizar Datos Personales</h1>
    </div>
</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin" style="max-width: 550px;">
                <div class="acc_content clearfix">
                    <form id="form" class="nobottommargin" onsubmit="return validate();">
                        <div class="acc_content clearfix"></div>
                        <div class="table-responsive">


                            <?php foreach ($vars as $var) { ?>
                                <table class="table table-bordered table-striped">
                                    <h5 style="text-align: center;">Informaci&oacute;n Personal</h5>
                                    <colgroup>
                                        <col class="col-xs-5">
                                        <col class="col-xs-8">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td><code>Identificaci&oacute;n</code></td>
                                            <td>
                                                <a id="form-id"><?php echo $var[0]; ?></a>
                                                <input type="hidden" id="failed-id" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><code>Tipo de Identificaci&oacute;n</code></td>
                                            <td>
                                                <a id="form-id-type" class="bt-editable" href="#" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el tipo de identificación"><?php echo $var[6]; ?></a>
                                                <input type="hidden" id="failed-id-type" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><code>Nombre</code></td>
                                            <td>
                                                <a id="form-name" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el nombre"><?php echo $var[1]; ?></a>
                                                <input type="hidden" id="failed-name" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><code>Primer Apellido</code></td>
                                            <td>
                                                <a id="form-first-lastName" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el Primer Apellido"><?php echo $var[2]; ?></a>
                                                <input type="hidden" id="failed-first-lastName" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><code>Segundo Apellido</code></td>
                                            <td>
                                                <a id="form-second-lastName" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el Segundo Apellido"><?php echo $var[3]; ?></a>
                                                <input type="hidden" id="failed-second-lastName" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><code>G&eacute;nero</code></td>
                                            <td>
                                                <a id="form-gender" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el g&eacute;nero (M: Masculino, F: Femenino)"><?php echo $var[4]; ?></a>
                                                <input type="hidden" id="failed-gender" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><code>Nacionalidad</code></td>
                                            <td>
                                                <a id="form-nationality" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese la nacionalidad"><?php echo $var[5]; ?></a>
                                                <input type="hidden" id="failed-nationality" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><code>Tel&eacute;fono</code></td>
                                            <td>
                                                <a id="form-phone1" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el Teléfono"><?php echo $var[7]; ?></a>
                                                <input type="hidden" id="failed-phone1" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><code>Otro Tel&eacute;fono</code></td>
                                            <td>
                                                <a id="form-phone2" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese otro Teléfono"><?php echo $var[8]; ?></a>
                                                <input type="hidden" id="failed-phone2" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><code>Email</code></td>
                                            <td>
                                                <a id="form-email" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el email"><?php echo $var[12]; ?></a>
                                                <input type="hidden" id="failed-email" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><code>Fecha de Nacimiento</code></td>
                                            <td>
                                                <a id="form-age" href="#" class="bt-editable" data-type="date" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese la fecha de nacimiento"><?php echo $var[11]; ?></a>
                                                <input type="hidden" id="failed-age" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><code>Direcci&oacute;n</code></td>
                                            <td>
                                                <a id="form-address" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese la dirección"><?php echo $var[10]; ?></a>
                                                <input type="hidden" id="failed-address" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><code>Informaci&oacute;n Adicional</code></td>
                                            <td>
                                                <a id="form-additionalInformation" class="bt-editable" href="#" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Información Adicional"><?php echo $var[9]; ?></a>
                                                <input type="hidden" id="failed-additionalInformation" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            <?php } ?>
                        </div>
                        <div class="col_full nobottommargin">                      
                            <input type="submit" value="Actualizar" class="button button-3d button-black nomargin form-control" style="display: block; text-align: center;"/>
                            <input type="hidden" id="warning"/>
                            <input type="hidden" id="success"/>
                            <input type="hidden" id="failed"/>
                        </div>
                    </form>
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
                    <h4 style="text-align: center;">¿Realmente desea actualizar su información personal?</h4>
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

//    //Change Combobox
//    $("#form-professor").change(function () {
//        var parameters = {
//            "id": $("#form-professor").val()
//        };
//        $.post("?controller=Professor&action=selectProfessor", parameters, function (data) {
//            if (data.identification) {
//                $("#form-id").html(data.identification);
//                $("#form-id-type").html(data.id_type);
//                $("#form-name").html(data.name);
//                $("#form-first-lastName").html(data.first_lastname);
//                $("#form-second-lastName").html(data.second_lastname);
//                $("#form-phone1").html(data.phone);
//                $("#form-phone2").html(data.cel_phone);
//                $("#form-email").html(data.email);
//                $("#form-gender").html(data.gender);
//                $("#form-nationality").html(data.nationality);
//                $("#form-age").html(data.birthdate);
//                $("#form-address").html(data.address);
//                $("#form-additionalInformation").html(data.expedient);
//
//            } else {
//                $("#form-id").html("");
//                $("#form-id-type").html("");
//                $("#form-name").html("");
//                $("#form-first-lastName").html("");
//                $("#form-second-lastName").html("");
//                $("#form-phone1").html("");
//                $("#form-phone2").html("");
//                $("#form-email").html("");
//                $("#form-gender").html("");
//                $("#form-nationality").html("");
//                $("#form-age").html("");
//                $("#form-address").html("");
//                $("#form-additionalInformation").html("");
//            }
//        }, "json");
//    });

    function validate() {
//        var initials, name, description, instrument;
//
//        initials = $("#form-initials-table").text().trim();
//        name = $("#form-name-table").text().trim();
//        description = $("#form-description-table").text().trim();
//        instrument = $("#form-instrument-table").text().trim();
//
//        if (!isNaN(name) || name.length < 4 || name.split(" ", 2).length > 1) {
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

    //UPDATE 
    $("#form-submity").click(function () {
        var parameters = {
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
        $.post("?controller=Professor&action=updatePersonal", parameters, function (data) {
            if (data.result === "1") {
                $("#success").attr({
                    "data-notify-type": "success",
                    "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!",
                    "data-notify-position": "bottom-full-width"
                });
                SEMICOLON.widget.notifications($("#success"));
                setTimeout("location.href = '?controller=Professor&action=updatePersonal';", 2000);
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
