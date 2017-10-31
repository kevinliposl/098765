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
        <h1>Actualizar Datos Peresonales</h1>
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
                        <form id="form" class="nobottommargin">
                            <div class="acc_content clearfix"></div>
                            <div class="table-responsive">

                                 <?php foreach ($vars as $var) { ?>
                                
                                <table class="table table-bordered table-striped" style="clear: both">
                                    <tbody>
                                        <tr>
                                            <td width="30%">Identificaci&oacute;n</td>
                                            <td width="70%">
                                                <a id="form-id" class="bt-editable" href="#" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese la identificación"><?php echo $var[0];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tipo de Identificaci&oacute;n</td>
                                            <td>
                                                <a id="form-id-type" class="bt-editable" href="#" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el tipo de identificación"><?php echo $var[6];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nombre</td>
                                            <td>
                                                <a id="form-name" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el nombre"><?php echo $var[1];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Primer Apellido</td>
                                            <td>
                                                <a id="form-first-lastName" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el Primer Apellido"><?php echo $var[2];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Segundo Apellido</td>
                                            <td>
                                                <a id="form-second-lastName" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el Segundo Apellido"><?php echo $var[3];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>G&eacute;nero</td>
                                            <td>
                                                <a id="form-gender" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el g&eacute;nero (M: Masculino, F: Femenino)"><?php echo $var[4];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nacionalidad</td>
                                            <td>
                                                <a id="form-nationality" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese la nacionalidad"><?php echo $var[5];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tel&eacute;fono 1</td>
                                            <td>
                                                <a id="form-phone1" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el Teléfono"><?php echo $var[7];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tel&eacute;fono 2</td>
                                            <td>
                                                <a id="form-phone2" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese otro Teléfono"><?php echo $var[8];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>
                                                <a id="form-email" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el email"><?php echo $var[12];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Fecha de Nacimiento</td>
                                            <td>
                                                <a id="form-age" href="#" class="bt-editable" data-type="date" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese la fecha de nacimiento"><?php echo $var[11];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dirección:</td>
                                            <td>
                                                <a id="form-address" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese la dirección"><?php echo $var[10];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Informacion Adicional:</td>
                                            <td>
                                                <a id="form-additionalInformation" class="bt-editable" href="#" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Información Adicional"><?php echo $var[9];?></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php } ?>
                            </div>
                            
                            <div class="col_full nobottommargin">
                                <input type="button" class="button button-3d button-black nomargin" data-toggle="modal" id="form-actualizar" data-target="" value="Actualizar"/>
                            </div>

                            <div id="message"></div>
                        </form>
                    </div>
                </div>

                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-body">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">¡Aviso!</h4>
                                </div>
                                <div class="modal-body">
                                    <h4 style="text-align: center;">¿Realmente desea guardar los cambios?</h4>
                                    <p>Consejos:
                                    <li>Verificar que sea el profesor correcto</li>
                                    <li>Insertar los datos en el formato correcto</li></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <input type="button" class="btn btn-primary" button-black nomargin id="form-submity" value="Confirmar"/>
                                    <input type="hidden" id="warning" value="w"/>
                                    <input type="hidden" id="success" value="s"/>
                                    <input type="hidden" id="failed" value="f"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- #content end -->

<script>

     $("#form-actualizar").click(function () {
        $('#form-actualizar').attr('data-target', '#myModal');
    });
    function Redirect() {
        window.location = "?controller=Professor&action=updatePersonal";
    }

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

        $.post("?controller=Professor&action=updatePersonalData", parameters, function (data) {
            if (data.result === "1") {
                $("#success").attr({
                    "data-notify-type": "success",
                    "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!"
                });
                SEMICOLON.widget.notifications($("#success"));
                setTimeout('Redirect()', 1000);
            } else {
                $("#warning").attr({
                    "data-notify-type": "warning",
                    "data-notify-msg": "<i class=icon-warning-sign></i> El profesor no se pudo actualizar!"
                });
                SEMICOLON.widget.notifications($("#warning"));
            }
            ;
        }, "json");
    }
    );
</script>
<script>
    $(document).ready(function () {
        $('.bt-editable').editable();
    });
</script>

<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';
