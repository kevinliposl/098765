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
        <h1>Actualizar Profesor</h1>
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
                            <div class="white-section">
                                <label for="form-professor">Profesores:</label>
                                <select id="form-professor" class="selectpicker form-control" data-live-search="true">
                                    <option value="-1" data-tokens="">Seleccione un Profesor</option>
                                <?php foreach ($vars as $var) { ?>
                                    <option value="<?php echo $var["identification"] ?>" data-tokens="">
                                        <?php echo $var["Name"] ?></option>
                                <?php } ?>
                                </select>
                            </div>
                            <div class="acc_content clearfix"></div>
                            <div class="table-responsive">

                                <table class="table table-bordered table-striped" style="clear: both">
                                    <tbody>
                                        <tr>
                                            <td width="15%">Identificaci&oacute;n</td>
                                            <td width="55%">
                                                <a id="form-id" href="#" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese la identificación"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tipo de Identificaci&oacute;n</td>
                                            <td>
                                                <a id="form-id-type" class="bt-editable" href="#" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el tipo de identificación"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nombre</td>
                                            <td>
                                                <a id="form-name" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el nombre"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Primer Apellido</td>
                                            <td>
                                                <a id="form-first-lastName" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el Primer Apellido"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Segundo Apellido</td>
                                            <td>
                                                <a id="form-second-lastName" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el Segundo Apellido"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>G&eacute;nero</td>
                                            <td>
                                                <a id="form-gender" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el g&eacute;nero (M: Masculino, F: Femenino)"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nacionalidad</td>
                                            <td>
                                                <a id="form-nationality" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese la nacionalidad"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tel&eacute;fono 1</td>
                                            <td>
                                                <a id="form-phone1" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el Teléfono"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tel&eacute;fono 2</td>
                                            <td>
                                                <a id="form-phone2" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese otro Teléfono"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>
                                                <a id="form-email" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el email"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Fecha de Nacimiento</td>
                                            <td>
                                                <a id="form-age" href="#" class="bt-editable" data-type="date" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese la fecha de nacimiento"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dirección:</td>
                                            <td>
                                                <a id="form-address" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese la dirección"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Informacion Adicional:</td>
                                            <td>
                                                <a id="form-additionalInformation" class="bt-editable" href="#" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Información Adicional"></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
    $("#form-professor").change(function () {
        if ($("#form-professor").val() !== "-1") {
            var parameters = {
                "id": $("#form-professor").val()
            };
            $.post("?controller=Professor&action=selectProfessor", parameters, function (data) {
                document.getElementById("form-id").innerHTML = data.identification;
                document.getElementById("form-id-type").innerHTML = data.id_type;
                document.getElementById("form-name").innerHTML = data.name;
                document.getElementById("form-first-lastName").innerHTML = data.first_lastname;
                document.getElementById("form-second-lastName").innerHTML = data.second_lastname;
                document.getElementById("form-phone1").innerHTML = data.phone;
                document.getElementById("form-phone2").innerHTML = data.cel_phone;
                document.getElementById("form-email").innerHTML = data.email;
                document.getElementById("form-gender").innerHTML = data.gender;
                document.getElementById("form-nationality").innerHTML = data.nationality;
                document.getElementById("form-age").innerHTML = data.birthdate;
                document.getElementById("form-address").innerHTML = data.address;
                document.getElementById("form-additionalInformation").innerHTML = data.expedient;
                document.getElementById("form-submit").style.display = "block";
            }, "json");
        } else {
            document.getElementById("form-submit").style.display = "none";
        }
    });</script>

<script>

     $("#form-actualizar").click(function () {
        $('#form-actualizar').attr('data-target', '#myModal');
    });
    function Redirect() {
        window.location = "?controller=Professor&action=updateProfessor";
    }

    $("#form-submity").click(function () {
        var parameters = {
            "id": $("#form-id").text().trim(),
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

        $.post("?controller=Professor&action=updateProfessorFunction", parameters, function (data) {
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
