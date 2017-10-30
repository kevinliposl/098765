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
        <h1>Obtener Administrador</h1>
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
                        <form id="form" class="nobottommargin" onsubmit="return validate();">
                            <div class="white-section">
                                <label for="form-id">Administradores:</label>
                                <select id="form-admin" class="selectpicker form-control" data-live-search="true">
                                    <option value="-1" data-tokens="">Seleccione un Administrador</option>
                                    <?php
                                    foreach ($vars as $var) {
                                        if (isset($var["identification"])) {
                                            ?>
                                            <option value="<?php echo $var["ID"] ?> " data-tokens="">
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
                                <table class="table table-bordered table-striped">
                                    <h5 style="text-align: center;">Informaci&oacute;n del Administrador</h5>
                                    <colgroup>
                                        <col class="col-xs-3">
                                        <col class="col-xs-8">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <code>Cedula</code>
                                            </td>
                                            <td id="form-id-table"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <code>Correo</code>
                                            </td>
                                            <td id="form-email-table"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <code>Nombre</code>
                                            </td>
                                            <td id="form-name-table"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <code>Primer Apellido</code>
                                            </td>
                                            <td id="form-firstLastName-table"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <code>Segundo Apellido</code>
                                            </td>
                                            <td id="form-secondLastName-table"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col_full nobottommargin">
                                <input type="hidden" id="warning" data-notify-position="bottom-full-width" data-notify-type= "warning"/>
                                <input type="hidden" id="success" data-notify-position="bottom-full-width" data-notify-type= "success"/>
                                <input type="hidden" id="failed" data-notify-position="bottom-full-width" data-notify-type= "error"/>
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