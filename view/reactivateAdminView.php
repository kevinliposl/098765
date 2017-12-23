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
        <h1>Reactivar Administrador</h1>
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
                                <label for="form-admin">Estudiantes:</label>
                                <select id="form-admin" class="selectpicker form-control" data-live-search="true">
                                    <option value="-1" data-tokens="">Seleccione un Administrador</option>
                                    <?php foreach ($vars as $var) { ?>
                                        <option value="<?php echo $var["identification"]; ?>" data-tokens="">
                                            <?php echo $var["identification"] . " | " . $var["name"] . " " . $var["first_lastname"] . " " . $var["second_lastname"]; ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <div class="acc_content clearfix"></div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <h5 style="text-align: center;">Informaci&oacute;n del Administrador</h5>
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
                                            <td>Email</td>
                                            <td id="form-email-table"></td>
                                        </tr>
                                        <tr>
                                            <td>Nombre</td>
                                            <td id="form-name-table"></td>
                                        </tr>
                                        <tr>
                                            <td>Primer Apellido</td>
                                            <td id="form-first-lastName-table"></td>
                                        </tr>
                                        <tr>
                                            <td>Segundo Apellido</td>
                                            <td id="form-second-lastName-table"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col_full nobottommargin">                      
                                    <input type="button" id="form-submit" value="Reactivar" class="button button-3d button-black nomargin form-control" style="display: none; text-align: center;"/>
                                    <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i>La operacion no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
                                    <input type="hidden" id="success" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Operaci&oacute;n exitosa, revise en breve...!" data-notify-position="bottom-full-width"/>
                                    <input type="hidden" id="wait" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>
                                </div>
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
                    <h4 style="text-align: center;">¿Realmente desea reactivar este Administrador?</h4>
                    <p>Consejos:
                    <li>Revisar que administrador tenga la informaci&oacute;n correcta</li>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="form-close">Cerrar</button>
                    <input type="button" class="btn btn-primary button-black nomargin" id="form-submity" value="Reactivar"/>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#form-admin").change(function () {
        SEMICOLON.widget.notifications($("#wait"));

        if ($("#form-admin").val() !== "-1") {

            var parameters = {
                "id": $("#form-admin").val()
            };

            SEMICOLON.widget.notifications($("#wait"));

            $.post("?controller=Admin&action=select", parameters, function (data) {
                if (data.identification) {
                    $("#form-id-table").text(data.identification);
                    $("#form-name-table").text(data.name);
                    $("#form-first-lastName-table").text(data.first_lastname);
                    $("#form-second-lastName-table").text(data.second_lastname);
                    $("#form-email-table").text(data.email);
                    $("#form-submit").css('display', "block");
                    SEMICOLON.widget.notifications($("#success"));
                } else {
                    SEMICOLON.widget.notifications($("#warning"));
                }
            }, "json");
        } else {
            document.getElementById("form-submit").style.display = "none";
        }
    });


    function Redirect() {
        window.location = "?controller=Student&action=reactivateStudent";
    }

    $("#form-submit").click(function () {
        $("#showModal").click();
    });

    $("#form-submity").click(function () {
        var parameters = {
            "id": $("#form-admin").val()
        };
        SEMICOLON.widget.notifications($("#wait"));
        $.post("?controller=Admin&action=reactivate", parameters, function (data) {

            if (data.result === "1") {
                SEMICOLON.widget.notifications($("#success"));
                setTimeout('Redirect()', 1000);
            } else {
                SEMICOLON.widget.notifications($("#warning"));
            };
        }, "json");
    });

</script>

<!-- End Content
    ============================================= -->    
<?php
include_once 'public/footer.php';


