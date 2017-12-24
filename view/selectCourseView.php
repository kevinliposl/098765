<?php
$session = SSession::getInstance();

if (isset($session->permissions)) {
    if ($session->permissions == 'A') {
        include_once 'public/headerAdmin.php';
    } else {
        header("Location:?controller=Index&action=notFound");
    }
} else {
    include_once 'public/header.php';
}
?>

<section id="page-title">
    <div class="container clearfix">
        <h1>Ver Cursos</h1>
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
                                <label for="form-initials">Cursos:</label>
                                <select id="form-courses" class="selectpicker form-control" data-live-search="true">
                                    <option data-tokens="">Seleccione un Curso</option>
                                    <?php
                                    foreach ($vars as $var) {
                                        if (isset($var["initials"])) {
                                            ?>
                                            <option value="<?php echo $var["initials"] ?> " data-tokens="">
                                                <?php echo $var["name"] ?>
                                            </option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <br>
                            <div class="acc_content clearfix"></div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <h5 style="text-align: center;">Informaci&oacute;n del Curso</h5>
                                    <colgroup>
                                        <col class="col-xs-3">
                                        <col class="col-xs-8">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td>
                                                Siglas
                                            </td>
                                            <td id="form-initials-table"><?php echo "" ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Nombre
                                            </td>
                                            <td id="form-name-table"><?php echo "" ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Instrumento
                                            </td>
                                            <td id="form-instrument-table"><?php echo "" ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Descripci&oacute;n
                                            </td>
                                            <td id="form-description-table"><?php echo "" ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                            <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i>La operacion no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="success" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Operaci&oacute;n exitosa, revise en breve...!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="wait" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>

    //Change Combobox
    $("#form-courses").change(function () {
        var parameters = {
            "initials": $("#form-courses").val()
        };

        $.post("?controller=Course&action=select", parameters, function (data) {
            if (data.initials) {
                $("#form-initials-table").html(data.initials);
                $("#form-name-table").html(data.name);
                $("#form-instrument-table").html(data.instrument);
                $("#form-description-table").html(data.description);
            } else {
                $("#form-initials-table").html("");
                $("#form-name-table").html("");
                $("#form-instrument-table").html("");
                $("#form-description-table").html("");
                $("#form-secondLastName-table").html("");
            }
        }, "json");
    });

</script>

<?php
include_once 'public/footer.php';
