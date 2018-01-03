<?php
$session = SSession::getInstance();

if (isset($session->permissions)) {
    if ($session->permissions == 'S') {
        include_once 'public/headerStudent.php';
    } else {
        header('Location:?action=notFound');
    }
} else {
    header('Location:?action=notFound');
}
?>
<section id="page-title">
    <div class="container clearfix">
        <h1>Actualizar Estudiante</h1>
    </div>
</section>s

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin" style="max-width: 550px;">
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-body">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">¡Aviso!</h4>
                                </div>
                                <div class="modal-body">
                                    <h4 style="text-align: center;">¿Realmente desea actualizar sus datos personales?</h4>
                                    <p>Consejos:
                                    <li>Verificar si los datos ingresados están correctamente</li>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal" id="form-close">Cerrar</button>
                                    <input type="button" class="btn btn-primary" button-black nomargin id="form-submity" value="Actualizar"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container clearfix"> 
            <input type="hidden" id="form-old-id" name="form-old-id" value="<?php echo $vars['identification']; ?>">
            <table class="table table-bordered table-striped" style="clear: both">
                <colgroup>
                    <col class="col-xs-4">
                    <col class="col-xs-8">
                </colgroup>
                <tbody>
                    <tr>
                        <td>Identificaci&oacute;n</td>
                        <td>
                            <a id="form-id"  href="#" data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese la identificación"><?php echo $vars['identification']; ?></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Tipo de Identificaci&oacute;n</td>
                        <td>
                            <a id="form-id-type" class="bt-editable" href="#" data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese el tipo de identificación"><?php echo $vars['id_type']; ?></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td>
                            <a id="form-name" href="#" class="bt-editable" data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese el nombre"><?php echo $vars['name']; ?></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Primer Apellido</td>
                        <td>
                            <a id="form-first-lastName" href="#" class="bt-editable" data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese el Primer Apellido"><?php echo $vars['first_lastname']; ?></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Segundo Apellido</td>
                        <td>
                            <a id="form-second-lastName" href="#" class="bt-editable" data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese el Segundo Apellido"><?php echo $vars['second_lastname']; ?></a>
                        </td>
                    </tr>
                    <tr>
                        <td>G&eacute;nero</td>
                        <td>
                            <a id="form-gender" href="#" class="bt-group" data-type="select" data-pk="1" data-value="" data-title="Seleccione el género"><?php echo $vars['gender']; ?></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Nacionalidad</td>
                        <td>
                            <a id="form-nationality" href="#" class="bt-editable" data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese la nacionalidad"><?php echo $vars['nationality']; ?></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Tel&eacute;fono 1</td>
                        <td>
                            <a id="form-phone1" href="#" class="bt-editable" data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese el Teléfono"><?php echo $vars['phoneOne']; ?></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Tel&eacute;fono 2</td>
                        <td>
                            <a id="form-phone2" href="#" class="bt-editable" data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese otro Teléfono"><?php echo $vars['phoneTwo']; ?></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <a id="form-email" href="#" class="bt-editable" data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese el email"><?php echo $vars['email']; ?></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Fecha de Nacimiento</td>
                        <td>
                            <a id="form-age" href="#" class="bt-editable" data-type="combodate" data-value="1984-05-15" data-format="YYYY-MM-DD" data-viewformat="YYYY-MM-DD" data-template="YYYY / MMM / D" data-pk="1"  data-title="Ingrese la fecha de nacimiento"><?php echo $vars['birthdate']; ?></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Nombre del Contacto</td>
                        <td>
                            <a id="form-contact-name" href="#" class="bt-editable" data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese el nombre completo del contacto"><?php echo $vars['full_contact_name']; ?></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Tel&eacute;fono del Contacto</td>
                        <td>
                            <a id="form-contact-phone" href="#" class="bt-editable" data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese el teléfono"><?php echo $vars['telephone_contact']; ?></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Relaci&oacute;n</td>
                        <td>
                            <a id="form-relationship" href="#" class="bt-editable" data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese la relación con el estudiante"><?php echo $vars['relationship']; ?></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Email del Contacto</td>
                        <td>
                            <a id="form-contact-email" href="#" class="bt-editable" data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese el email"><?php echo $vars['contact_email']; ?></a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <a id="form-submit" data-toggle="modal" class="button button-3d button-black nomargin" data-target="#myModal" id="next" data-target="" style="text-align: center;">Actualizar</a>
            <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i>La operacion no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
            <input type="hidden" id="success" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Operaci&oacute;n exitosa, revise en breve...!" data-notify-position="bottom-full-width"/>
            <input type="hidden" id="wait" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Un momento por favor..." data-notify-position="bottom-full-width"/>

        </div>
    </div>
</section>

<script>

    function Redirect() {
        window.location = "?controller=Student&action=updatePersonalDataStudent";
    }

    $("#form-submity").click(function () {
        var parameters = {
            "id": document.getElementById("form-id").innerHTML.trim(),
            "oldId": document.getElementById("form-old-id").value.trim(),
            "idType": document.getElementById("form-id-type").innerHTML.trim(),
            "email": document.getElementById("form-email").innerHTML.trim(),
            "name": document.getElementById("form-name").innerHTML.trim(),
            "firstLastName": document.getElementById("form-first-lastName").innerHTML.trim(),
            "secondLastName": document.getElementById("form-second-lastName").innerHTML.trim(),
            "age": document.getElementById("form-age").innerHTML.trim(),
            "address": " ",
            "gender": document.getElementById("form-gender").innerHTML.trim(),
            "nationality": document.getElementById("form-nationality").innerHTML.trim(),
            "phoneOne": document.getElementById("form-phone1").innerHTML.trim(),
            "phoneTwo": document.getElementById("form-phone2").innerHTML.trim(),
            "contactName": document.getElementById("form-contact-name").innerHTML.trim(),
            "contactRelationship": document.getElementById("form-relationship").innerHTML.trim(),
            "contactPhone": document.getElementById("form-contact-phone").innerHTML.trim(),
            "contactEmail": document.getElementById("form-contact-email").innerHTML.trim()
        };
        $.post("?controller=Student&action=updatePersonalDataStudent", parameters, function (data) {
            if (data.result === "1") {
                SEMICOLON.widget.notifications($("#success"));
                setTimeout('Redirect()', 1000);
            } else {
                SEMICOLON.widget.notifications($("#warning"));
            }
        }, "json");
    }
    );
</script>

<script>
    $(document).ready(function () {
        $('.bt-editable').editable();

        $('.bt-group').editable({
            showbuttons: false,
            source: [
                {value: 1, text: 'M'},
                {value: 2, text: 'F'}
            ]
        });
    });
</script>
<?php
include_once 'public/footer.php';


