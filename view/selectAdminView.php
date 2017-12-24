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
        <h1>Obtener Administrador</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin" style="max-width: 550px;">
                <div class="acctitle">
                    <div class="acc_content clearfix">
                        <form id="form" class="nobottommargin" onsubmit="return validate();">
                            <div class="white-section">
                                <label for="form-id">Administradores:</label>
                                <select id="form-admin" class="selectpicker form-control" data-live-search="true">
                                    <option value="-1" data-tokens="">Seleccione un Administrador</option>
                                    <?php
                                    foreach ($vars as $var) {
                                        if (isset($var["identification"])) {
                                            ?>
                                            <option value="<?php echo $var["identification"] ?> " data-tokens="">
                                                <?php echo $var["identification"] . " | " . $var["name"] . " " . $var["first_lastname"] . " " . $var["second_lastname"]; ?>
                                            </option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-responsive">
                                    <h5 style="text-align: center;">Informaci&oacute;n del Administrador</h5>
                                    <colgroup>
                                        <col class="col-xs-3">
                                        <col class="col-xs-8">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td>
                                                Cedula
                                            </td>
                                            <td id="form-id-table"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Correo
                                            </td>
                                            <td id="form-email-table"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Nombre
                                            </td>
                                            <td id="form-name-table"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Primer Apellido
                                            </td>
                                            <td id="form-firstLastName-table"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Segundo Apellido
                                            </td>
                                            <td id="form-secondLastName-table"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col_full nobottommargin">
                                <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i>La operacion no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
                                <input type="hidden" id="success" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Operaci&oacute;n exitosa, revise en breve...!" data-notify-position="bottom-full-width"/>
                                <input type="hidden" id="wait" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section><!-- #content end -->

<script>

    //Change Combobox
    $("#form-admin").change(function () {
        var parameters = {
            "id": $("#form-admin").val()
        };

        $.post("?controller=Admin&action=select", parameters, function (data) {
            if (data.identification) {
                $("#form-id-table").html(data.identification);
                $("#form-name-table").html(data.name);
                $("#form-email-table").html(data.email);
                $("#form-firstLastName-table").html(data.first_lastname);
                $("#form-secondLastName-table").html(data.second_lastname);

                $("#success").attr("data-notify-msg", "<i class=icon-ok-sign></i> Operacion Exitosa!");

                SEMICOLON.widget.notifications($("#success"));
            } else {
                $("#form-id-table").html("");
                $("#form-name-table").html("");
                $("#form-email-table").html("");
                $("#form-firstLastName-table").html("");
                $("#form-secondLastName-table").html("");
            }
        }, "json");
    });

</script>

<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';
