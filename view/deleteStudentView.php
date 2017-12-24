<?php
$session = SSession::getInstance();

if (isset($session->permissions)) {
    if ($session->permissions == 'R') {
        include_once 'public/headerRoot.php';
    } else {
        header('Location:?action=notFound');
    }
} else {
    header('Location:?action=notFound');
}
?>
<section id="page-title">
    <div class="container clearfix">
        <h1>Desactivar Estudiante</h1>
    </div>
</section>
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin" style="max-width: 550px;">
                <div class="acctitle">
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
                            <div class="acc_content clearfix"></div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <h5 style="text-align: center;">Informaci&oacute;n del Estudiante</h5>
                                    <colgroup>
                                        <col class="col-xs-3">
                                        <col class="col-xs-8">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td>Identificaci&oacute;n</td>
                                            <td id="form-id-table"></td>
                                        </tr>
                                        <tr>
                                            <td>Nombre</td>
                                            <td id="form-name-table"></td>
                                        </tr>
                                        <tr>
                                            <td>Apellidos</td>
                                            <td id="form-lastName-table"></td>
                                        </tr>
                                        <tr>
                                            <td>Tel&eacute;fonos</td>
                                            <td id="form-phones-table"></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td id="form-email-table"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a id="form-submit" data-toggle="modal" class="button button-3d button-black nomargin" data-target="#myModal" id="next" data-target="" style="display: none; text-align: center;">Desactivar</a>
                                                            <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i>La operacion no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
                                <input type="hidden" id="success" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Operaci&oacute;n exitosa, revise en breve...!" data-notify-position="bottom-full-width"/>
                                <input type="hidden" id="wait" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>
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
                                    <h4 style="text-align: center;">¿Realmente desea desactivar este Estudiante?</h4>
                                    <p>Consejos:
                                    <li>Verificar bien, si es el estudiante que realmente desea desactivar</li>
                                    <li>El estudiante puede ser restaurado con servicio t&eacute;cnico</li>
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"id="form-close">Cerrar</button>
                                    <input type="button" class="btn btn-primary" button-black nomargin id="form-submity" value="Desactivar"/>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $("#form-student").change(function () {
        if ($("#form-student").val() !== "-1") {
            var parameters = {
                "id": $("#form-student").val()
            };
            SEMICOLON.widget.notifications($("#wait"));
            $.post("?controller=Student&action=selectStudent", parameters, function (data) {
                if (data.identification) {
                    $("#form-id-table").text(data.identification);
                    $("#form-name-table").text(data.name);
                    $("#form-lastName-table").text(data.first_lastname + " " + data.second_lastname);
                    $("#form-phones-table").text(data.phoneOne + ", " + data.phoneTwo);
                    $("#form-email-table").text(data.email);
                    $("#form-submit").css('display', "block");
                    SEMICOLON.widget.notifications($("#success"));
                } else {
                    SEMICOLON.widget.notifications($("#warning"));
                }
            }, "json");
        } else {
            $("#form-id-table").text("");
            $("#form-name-table").text("");
            $("#form-lastName-table").text("");
            $("form-phones-table").text("");
            $("#form-email-table").text("");
            $("#form-submit").style.display = "none";
        }
    });

    function Redirect() {
        window.location = "?controller=Student&action=deleteStudent";
    }

    $("#form-submity").click(function () {
        $("#form-submity").attr('disabled', 'disabled');
        $("#form-close").attr('disabled', 'disabled');

        SEMICOLON.widget.notifications($("#wait"));

        var parameters = {
            "id": $("#form-student").val()
        };
        $.post("?controller=Student&action=deleteStudent", parameters, function (data) {
            if (data.result === "1") {
                SEMICOLON.widget.notifications($("#success"));
                setTimeout('Redirect()', 1000);
            } else {
                SEMICOLON.widget.notifications($("#warning"));
            }
            $("#form-submity").removeAttr('disabled');
            $("#form-close").removeAttr('disabled');
        }, "json");
    });

</script>

<!-- End Content
    ============================================= -->    
<?php
include_once 'public/footer.php';


