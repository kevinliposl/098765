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
<!-- Page Title
    ============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>Actualizar Datos de Profesor</h1>
        </div>
    </section>
<!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="accordion-lg divcenter nobottommargin">
                    <div class="acc_content clearfix">
                        <form id="form" class="nobottommargin" onsubmit="return false;">
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
                                                <a id="form-id" class="bt-editable" href="#" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese la identificación"><?php echo $vars['identification'];?></a>
                                                <input type="hidden" id="failed-id" data-notify-type= "error" data-notify-position="bottom-full-width"
                                                data-notify-msg="<i class=icon-remove-sign></i> Identificación Incorrecta. Verifique e intente de nuevo!"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>
                                                <a id="form-email" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el email"><?php echo $vars['email'];?></a>
                                                <input type="hidden" id="failed-email" data-notify-type= "error" data-notify-position="bottom-full-width"
                                                data-notify-msg="<i class=icon-remove-sign></i> Email Incorrecto. Verifique e intente de nuevo!"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nombre</td>
                                            <td>
                                                <a id="form-name" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el nombre"><?php echo $vars['name'];?></a>
                                                <input type="hidden" id="failed-name" data-notify-type= "error" data-notify-position="bottom-full-width"
                                                data-notify-msg="<i class=icon-remove-sign></i> Nombre Incorrecto. Verifique e intente de nuevo!"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Primer Apellido</td>
                                            <td>
                                                <a id="form-first-lastName" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el Primer Apellido"> <?php echo $vars['first_lastname'];?></a>
                                                <input type="hidden" id="failed-first-lastName" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> Primer Apellido Incorrecto. Verifique e intente de nuevo!"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Segundo Apellido</td>
                                            <td>
                                                <a id="form-second-lastName" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el Segundo Apellido"><?php echo $vars['second_lastname'];?></a>
                                                <input type="hidden" id="failed-second-lastName" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> Segundo Apellido Incorrecto. Verifique e intente de nuevo!"/>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col_full nobottommargin">                      
                                
                                <input type="submit" id="form-submit" value="Actualizar" class="button button-3d button-black nomargin form-control" style="display: block; text-align: center;"/>

                                <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class=icon-warning-sign></i> Operacion Incompleta, intente de nuevo!" data-notify-position="bottom-full-width"/>
                                <input type="hidden" id="success" data-notify-type="success" data-notify-msg="<i class=icon-ok-sign></i> Operacion Exitosa!"
                                data-notify-position = "bottom-full-width"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--MODAL -->
    <a id="showModal" style="display: none;" class="button button-3d button-black nomargin" data-target="#myModal" data-toggle="modal">Modal</a>
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
                        <p>Consejos:</br>
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

        $("#form-submit").click(function () {

            var identification = $("#form-id").text().trim();
            var email = $("#form-email").text().trim();
            var name = $("#form-name").text().trim();
            var firstLastName = $("#form-first-lastName").text().trim();
            var secondLastName = $("#form-second-lastName").text().trim();

            if (!/\w+@\w+\.+[a-z]/.test(email) || email.length < 4 || email.length > 50 || email.split(" ", 2).length > 1) {
                SEMICOLON.widget.notifications($("#failed-email"));
                return false;
            } else if (identification.length < 8 || identification.length > 20 || identification.split(" ", 2).length > 1) {
                SEMICOLON.widget.notifications($("#failed-name"));
                return false;
            } else if (firstLastName.length < 3 || firstLastName.length > 49 || !isNaN(firstLastName) || firstLastName.split(" ", 2).length > 1) {
                SEMICOLON.widget.notifications($("#failed-first-lastName"));
                return false;
            } else if (secondLastName.length < 3 || secondLastName.length > 49 || !isNaN(secondLastName) || secondLastName.split(" ", 2).length > 1) {
                SEMICOLON.widget.notifications($("#failed-second-lastName"));
                return false;
            }

            $('#showModal').click();
        });

        $("#form-submity").click(function () {
            var parameters = {
                "id": $("#form-id").text().trim(),
                "name": $("#form-name").text().trim(),
                "firstLastName": $("#form-first-lastName").text().trim(),
                "secondLastName": $("#form-second-lastName").text().trim(),
                "email": $("#form-email").text().trim()
            };
            $.post("?controller=Admin&action=updatePersonalData", parameters, function (data) {
                if (data.result === "1") {
                    SEMICOLON.widget.notifications($("#success"));
                    setTimeout("location.href = '?controller=Admin&action=updatePersonalData';", 1500);
                } else {
                    SEMICOLON.widget.notifications($("#warning"));
                }
            }, "json");
        });

        $(document).ready(function () {
            $('.bt-editable').editable();
        });

    </script>

    <?php
    include_once 'public/footer.php';
