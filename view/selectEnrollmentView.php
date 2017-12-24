<?php
$session = SSession::getInstance();

if (isset($session->permissions)) {
    include_once 'public/headerAdmin.php';
} else {
    include_once 'public/header.php';
}
?>

<section id="page-title">
    <div class="container clearfix">
        <h1>Obtener cursos matriculados</h1>
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
                                    <option data-tokens="">Seleccione un Estudiante</option>
                                    <?php
                                    foreach ($vars as $var) {
                                        if (isset($var["identification"])) {
                                            ?>
                                            <option value="<?php echo $var["identification"] ?> " data-tokens="">
                                                <?php
                                                echo $var["Name"];
                                                ?>
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
                                <table class="table table-bordered table-striped" id="table-course-professor">
                                    <h5 style="text-align: center;">Matriculas Activas</h5>
                                    <colgroup>
                                        <col class="col-xs-4">
                                        <col class="col-xs-4">
                                        <col class="col-xs-4">
                                    </colgroup>
                                    <tbody>
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
    $("#form-student").change(function () {
        var parameters = {
            "identification": $("#form-student").val()
        };
        var Table = document.getElementById("table-course-professor");
        Table.innerHTML = "";
        $.post("?controller=Enrollment&action=selectCourses", parameters, function (data) {

            var table = document.getElementById("table-course-professor");

            for (var i = 0; i < data.length; i++) {
                var row = table.insertRow(0);

                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(0);
                var cell3 = row.insertCell(0);

                cell1.innerHTML = data[i].initials + ": " + data[i].name;
                cell2.innerHTML = data[i].Name;
                cell3.innerHTML = data[i].date;
            }

            var row = table.insertRow(0);

            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(0);
            var cell3 = row.insertCell(0);

            cell1.innerHTML = "Curso";
            cell2.innerHTML = "Profesor";
            cell3.innerHTML = "Fecha";
        }, "json");
    });

</script>

<?php
include_once 'public/footer.php';
