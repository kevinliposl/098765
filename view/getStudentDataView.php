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
        <h1>Ver Estudiantes</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin">
                <div class="acc_content clearfix">
                    <form id="form" class="nobottommargin">
                        <div class="white-section">
                            <label for="form-student">Estudiantes:</label>
                            <select id="form-student" class="selectpicker form-control" data-live-search="true">
                                <option value="-1" data-tokens="">Seleccione un Estudiante</option>
                                <?php foreach ($vars as $var) { ?>
                                    <option value="<?php echo $var["identification"] ?>" data-tokens="">
                                        <?php echo $var["identification"] . " | " . $var["name"] . " " . $var["first_lastname"] . " " . $var["second_lastname"]; ?></option>
                                    <?php } ?>
                            </select>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" style="clear: both">
                                <input type="hidden" id="form-old-id" name="form-old-id" value="">
                                <h5 style="text-align: center;">Informaci&oacute;n del Estudiante</h5>    
                                <colgroup>
                                    <col class="col-xs-5">
                                    <col class="col-xs-8">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>Identificaci&oacute;n</td>
                                        <td>
                                            <a id="form-id"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tipo de Identificaci&oacute;n</td>
                                        <td>
                                            <a id="form-id-type"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nombre</td>
                                        <td>
                                            <a id="form-name"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Primer Apellido</td>
                                        <td>
                                            <a id="form-first-lastName"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Segundo Apellido</td>
                                        <td >
                                            <a id="form-second-lastName"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>G&eacute;nero</td>
                                        <td >
                                            <a id="form-gender"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nacionalidad</td>
                                        <td>
                                            <a id="form-nationality"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tel&eacute;fono 1</td>
                                        <td>
                                            <a id="form-phone1"></a> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tel&eacute;fono 2</td>
                                        <td>
                                            <a id="form-phone2"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>
                                            <a id="form-email"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Fecha de Nacimiento</td>
                                        <td>
                                            <a id="form-age"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nombre del Contacto</td>
                                        <td> 
                                            <a id="form-contact-name"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tel&eacute;fono del Contacto</td>
                                        <td>
                                            <a id="form-contact-phone"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Relaci&oacute;n</td>
                                        <td>
                                            <a id="form-relationship"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email del Contacto</td>
                                        <td>
                                            <a id="form-contact-email"></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i> No se pudo obtener la informaci&oacute;n necesaria!" data-notify-position="bottom-full-width"/>
                        <input type="hidden" id="success" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i>Operaci&oacute;n Exitosa. Informaci&oacute;n visualizada!" data-notify-position="bottom-full-width"/>
                        <input type="hidden" id="wait" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">¡Aviso!</h4>
                </div>
                <div class="modal-body">
                    <h4 style="text-align: center;">¿Realmente desea actualizar los datos de este Estudiante?</h4>
                    <p>Consejos:
                    <li>Verificar bien, si es el estudiante que realmente desea actualizar</li>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="button" class="btn btn-primary" button-black nomargin id="form-submity" value="Actualizar"/>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#form-student").change(function () {
        if ($("#form-student").val() !== "-1") {
            var parameters = {
                "id": $("#form-student").val()
            };
            SEMICOLON.widget.notifications($("#wait"));

            $.post("?controller=Student&action=selectStudent", parameters, function (data) {
                if (data.identification) {
                    $("#form-id").text(data.identification);
                    $("#form-old-id").text(data.identification);
                    $("#form-id-type").text(data.id_type);
                    $("#form-name").text(data.name);
                    $("#form-first-lastName").text(data.first_lastname);
                    $("#form-second-lastName").text(data.second_lastname);
                    $("#form-phone1").text(data.phoneOne);
                    $("#form-phone2").text(data.phoneTwo);
                    $("#form-email").text(data.email);
                    $("#form-gender").text(data.gender);
                    $("#form-nationality").text(data.nationality);
                    $("#form-age").text(data.birthdate);
                    $("#form-contact-name").text(data.full_contact_name);
                    $("#form-contact-phone").text(data.telephone_contact);
                    $("#form-relationship").text(data.relationship);
                    $("#form-contact-email").text(data.contact_email);

                    SEMICOLON.widget.notifications($("#success"));
                } else {
                    $("#form-id").text("");
                    $("#form-old-id").text("");
                    $("#form-id-type").text('');
                    $("#form-name").text('');
                    $("#form-first-lastName").text('');
                    $("#form-second-lastName").text('');
                    $("#form-phone1").text('');
                    $("#form-phone2").text('');
                    $("#form-email").text('');
                    $("#form-gender").text('');
                    $("#form-nationality").text('');
                    $("#form-age").text('');
                    $("#form-contact-name").text('');
                    $("#form-contact-phone").text('');
                    $("#form-relationship").text('');
                    $("#form-contact-email").text('');

                    SEMICOLON.widget.notifications($("#warning"));
                }
            }, "json");
        } else {
            document.getElementById("form-submit").style.display = "none";
        }
    });

</script>
<?php
include_once 'public/footer.php';
