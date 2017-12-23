<?php
$session = SSession::getInstance();

if (isset($session->permissions)) {
    include_once 'public/headerAdmin.php';
} else {
    include_once 'public/header.php';
}
?>

<!-- Page Title
============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Obtener Semestre</h1>
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
                                        <col class="col-xs-3">
                                        <col class="col-xs-8">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <code>A&ncaron;o</code>
                                            </td>
                                            <td id="form-year-table"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <code>Semestre</code>
                                            </td>
                                            <td id="form-semester-table"></td>
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
    $("#form-id").change(function () {
        var parameters = {
            "id": $("#form-id").val()
        };

        $.post("?controller=Semester&action=select", parameters, function (data) {
            if (data.ID) {
                $("#form-year-table").html(data.year);
                $("#form-semester-table").html(data.semester);

                $("#success").attr("data-notify-msg", "<i class=icon-ok-sign></i> Operacion Exitosa!");

                SEMICOLON.widget.notifications($("#success"));
            } else {
                $("#form-year-table").html("");
                $("#form-semester-table").html("");

            }
        }, "json");
    });

</script>

<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';

