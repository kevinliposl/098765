<?php
$session = SSession::getInstance();

if (isset($session->permissions)) {
    if ($session->permissions == 'A') {
        include_once 'public/headerAdmin.php';
    } else {
        header("Location:?action=notFound");
    }
} else {
    header("Location:?action=n.otFound");
}
?>

<section id="page-title">
    <div class="container clearfix">
        <h1>Obtener Semestre</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin" style="max-width: 550px;">
                <div class="acc_content clearfix">
                    <form id="form" class="nobottommargin">
                        <div class="white-section">
                            <label for="form-id">Semestres:</label>
                            <select id="form-id" class="selectpicker form-control" data-live-search="true">
                                <option value="-1" data-tokens="">Seleccione un Semestre</option>
                                <?php
                                foreach ($vars as $var) {
                                    if (isset($var["ID"])) {
                                        ?>
                                        <option value="<?php echo $var["ID"] ?> " data-tokens="">
                                            <?php echo $var["year"] . " - " . (($var["semester"] === '1') ? 'I' : 'II'); ?>
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
                                <h5 style="text-align: center;">Informaci&oacute;n del Semestre</h5>
                                <colgroup>
                                    <col class="col-xs-4">
                                    <col class="col-xs-8">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>
                                            A&ncaron;o
                                        </td>
                                        <td>
                                            <a id="form-year-table"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Semestre
                                        </td>
                                        <td>
                                            <a id="form-semester-table"></a>
                                        </td>
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
</section>

<script>
    //Change Combobox
    $("#form-id").change(function () {

        if ($("#form-id").val() !== "-1") {

            SEMICOLON.widget.notifications($("#wait"));

            var parameters = {
                "id": $("#form-id").val()
            };

            $.post("?controller=Semester&action=select", parameters, function (data) {
                if (data.ID) {
                    $("#form-year-table").text(data.year);
                    $("#form-semester-table").text(data.semester);

                    SEMICOLON.widget.notifications($("#success"));
                } else {
                    $("#form-year-table").text("");
                    $("#form-semester-table").text("");

                    SEMICOLON.widget.notifications($("#warning"));
                }
            }, "json");
        } else {
            $("#form-year-table").text("");
            $("#form-semester-table").text("");
        }
    });
</script>

<?php
include_once 'public/footer.php';

