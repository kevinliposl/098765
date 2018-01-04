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
        <h1>Registrar Estudiante</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin" style="max-width: 550px;">
                <div class="acc_content clearfix">
                    <form id="form" class="nobottommargin" onsubmit="return sendData();">
                        <h1 style="text-align: center;">Informaci&oacute;n Personal</h1>
                        <div class="acc_content clearfix"></div>
                        <div class="col_full">
                            <label for="form-typeId">Tipo de Identificación:</label>
                            <input type="radio" name="form-typeId" value="C" onclick="checkTypeId('C');" checked/><label>Cédula Nacional</label>
                            <input type="radio" name="form-typeId" value="D" onclick="checkTypeId('D');"/> <label>Dimex</label>
                            <input type="radio" name="form-typeId" value="P" onclick="checkTypeId('P');"/><label>Pasaporte</label>
                        </div>
                        <div class="col_full">
                            <label for="form-id">Número de Identificación:</label>
                            <input type="text" id="form-id" class="form-control" maxlength="9" minlength="9" placeholder="301230123" required/>
                        </div>
                        <div class="col_full">
                            <label for="form-name">Nombre:</label>
                            <input type="text" id="form-name"class="form-control" minlength="3" maxlength="49" pattern="[a-zA-Z]{3,49}" required placeholder="Marco"/>
                        </div>
                        <div class="col_full">
                            <label for="form-firstLastName">Primer Apellido:</label>
                            <input type="text" id="form-firstLastName"class="form-control" minlength="3" maxlength="49" pattern="[a-zA-Z]{3,49}" required placeholder="Castro"/>
                        </div>
                        <div class="col_full">
                            <label for="form-secondLastName">Segundo Apellido:</label>
                            <input type="text" id="form-secondLastName"class="form-control" required minlength="3" maxlength="49" pattern="[a-zA-Z]{3,49}" placeholder="Madriz"/>
                        </div>
                        <div class="col_full">
                            <label for="form-age">Fecha de Nacimiento:</label>
                            <input type="date" id="form-age"class="form-control" required pattern="{4-10}"/>
                        </div>
                        <div class="col_full">
                            <label for="form-address">Lugar de Residencia:</label>
                            <input type="text" id="form-address"class="form-control" minlength="5" maxlength="49" required pattern="{5,49}" placeholder="Turrialba"/>
                        </div>
                        <div class="col_full">
                            <label for="form-gender">Género:</label>
                            <input type="radio" name="form-gender" value="M" checked/> <label>Masculino</label>
                            <input type="radio" name="form-gender" value="F"/><label>Femenino</label>
                        </div>
                        <div class="col_full">
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
                        </div>
                        <div class="col_full">
                            <label for="form-phone1">Telefono:</label>
                            <input type="text" id="form-phone1"class="form-control" minlength="8" maxlength="8" required pattern="[0-9]{8,8}" placeholder="88888888"/>
                        </div>
                        <div class="col_full">
                            <label for="form-phone2">Otro teléfono:</label>
                            <input type="text" id="form-phone2"class="form-control" minlength="8" maxlength="8" required pattern="[0-9]{8,8}" placeholder="88888888"/>
                        </div>
                        <div class="col_full">
                            <label for="form-email">Correo Electronico:</label>
                            <input type="email" id="form-email" class="form-control" required placeholder="hola@dominio.com"/>
                        </div>

                        <h1 style="text-align: center;">Informaci&oacute;n de contacto</h1>

                        <div class="acc_content clearfix"></div>
                        <div class="col_full">
                            <label for="form-contact-name">Nombre completo:</label>
                            <input type="text" id="form-contact-name"class="form-control"  minlength="3" maxlength="49" required pattern="[a-zA-Z]{3,49}" placeholder="Laura"/>
                        </div>
                        <div class="col_full">
                            <label for="form-contact-phone">Telefono:</label>
                            <input type="text" id="form-contact-phone"class="form-control" minlength="8" maxlength="8" pattern="[0-9]{8,8}" required pattern="{4-16}" placeholder="88888888"/>
                        </div>
                        <div class="col_full">
                            <label for="form-relationship">Relaci&oacute;n:</label>
                            <input type="text" id="form-relationship"class="form-control" minlength="3" maxlength="49" required pattern="[a-zA-Z]{3,49}" placeholder="Abuela"/>
                        </div>
                        <div class="col_full">
                            <label for="form-contact-email">Correo Electronico del contacto:</label>
                            <input type="email" id="form-contact-email" class="form-control" required placeholder="hola@dominio.com"/>
                        </div>
                        <div class="col_full nobottommargin">                      
                            <input type="submit" value="Registrar" class="button button-3d button-black nomargin form-control" style="display: block; text-align: center;"/>
                            <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i>La operacion no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="success" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Operaci&oacute;n exitosa, revise en breve...!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="wait" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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
                            <h4 style="text-align: center;">¿Realmente desea insertar este nuevo Estudiante?</h4>
                            <p>Consejos:
                            <li>Revisar que todos los campos tengan la informaci&oacute;n correcta</li>
                            <li>Revisar con ateci&oacute;n cada item de los cuadro resumen</li>
                            <li>Recuerde que el correo electr&oacute;nico es un dato &uacute;nico por usuario</li></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" id="form-close">Cerrar</button>
                            <input type="button" class="btn btn-primary" button-black nomargin id="form-submity" value="Registrar"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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

    function sendData() {
        $('#showModal').click();
        return false;
    }

    function Redirect() {
        window.location = "?controller=Student&action=insertStudent";
    }

    $("#form-submity").click(function () {
        var parameters = {
            "id": $("#form-id").val().trim(),
            "idType": $("input:radio[name='form-typeId']:checked").val().trim(),
            "email": $("#form-email").val().trim(),
            "name": $("#form-name").val().trim(),
            "firstLastName": $("#form-firstLastName").val().trim(),
            "secondLastName": $("#form-secondLastName").val().trim(),
            "age": $("#form-age").val().trim(),
            "address": $("#form-address").val().trim(),
            "gender": $("input:radio[name='form-gender']:checked").val().trim(),
            "nationality": $("#form-nationality").val().trim(),
            "phoneOne": $("#form-phone1").val().trim(),
            "phoneTwo": $("#form-phone2").val().trim(),
            "contactName": $("#form-contact-name").val().trim(),
            "contactRelationship": $("#form-relationship").val().trim(),
            "contactPhone": $("#form-contact-phone").val().trim(),
            "contactEmail": $("#form-contact-email").val().trim()
        };
        $.ajax({
            data: parameters,
            url: "?controller=Student&action=insertStudent",
            type: 'POST',
            beforeSend: function () {
                $("#form-submity").attr('disabled', 'disabled');
                $("#form-close").attr('disabled', 'disabled');
                SEMICOLON.widget.notifications($("#wait"));
            },
            success: function (response) {
                var data = JSON.parse(response);
                if (data[0] === '1') {
                    SEMICOLON.widget.notifications($("#success"));
                    setTimeout('Redirect()', 1500);
                } else {
                    SEMICOLON.widget.notifications($("#warning"));
                    $("#form-submity").removeAttr('disabled');
                    $("#form-close").removeAttr('disabled');
                }
            }
        }
        );
    });
</script>

<?php
include_once 'public/footer.php';
