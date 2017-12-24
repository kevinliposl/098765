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
        <h1>Obtener Asignaciones de Profesores a Cursos en Semestres</h1>
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
                                <label for="form-semester">Semestres:</label>
                                <select id="form-semester" class="selectpicker form-control" data-live-search="true">
                                    <option value="-1" data-tokens="">Seleccione un Semestre</option>
                                    <?php
                                    foreach ($vars as $var) {
                                        if (isset($var["ID"])) {
                                            ?>
                                            <option value="<?php echo $var["ID"] ?> " data-tokens="">
                                                <?php
                                                if ($var["semester"] == '1') {
                                                    echo "I semestre" . " " . $var["year"];
                                                } else {
                                                    echo "II semestre" . " " . $var["year"];
                                                }
                                                ?>
                                            </option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <br>
                            <div class="white-section">
                                <label for="form-courses">Cursos:</label>
                                <select id="form-courses" class="form-control selectpicker" data-live-search="true">
                                    <option value="-1" data-tokens="">Seleccione un Curso</option>
                                </select>
                                <input type="hidden" id="failed-form-courses" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            <br>
                            <div class="acc_content clearfix"></div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="table-professor">
                                    <h5 style="text-align: center;">Profesores Asociados</h5>
                                    <colgroup>
                                        <col class="col-xs-8">
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
    $("#form-semester").change(function () {
        if ($("#form-semester").val() === "-1") {
            $("#failed-form-semester").attr("data-notify-msg", "<i class=icon-remove-sign></i> Semestre inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-semester"));
            return false;
        } else {
            var parameters = {
                "ID_Semester": $("#form-semester").val()
            };
            document.getElementById("form-courses").options.length = 0;
            var Table = document.getElementById("table-professor");
            Table.innerHTML = "";
            $.post("?controller=CourseSemester&action=selectAllCoursesSemester", parameters, function (data) {
                $('#form-courses').append($("<option></option>").attr("value", "-1").text("Seleccione un Curso"));
                for (var i = 0; i < data.length; i++) {
                    $('#form-courses').append($("<option></option>").attr("value", data[i].initials).text(data[i].name));//AGREGAR OPCIONES
                }
                $("#form-courses").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
            }, "json");
        }
    });

    //Change Combobox
    $("#form-courses").change(function () {
        if ($("#form-semester").val() === "-1") {
            $("#failed-form-semester").attr("data-notify-msg", "<i class=icon-remove-sign></i> Semestre inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-semester"));
            return false;
        } else if ($("#form-courses").val() === "-1") {
            $("#failed-form-courses").attr("data-notify-msg", "<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-courses"));
            return false;
        } else {
            var parameters = {
                "ID_Semester": $("#form-semester").val(),
                "initials": $("#form-courses").val()
            };
            var table = document.getElementById("table-professor");
            table.innerHTML = "";
            $.post("?controller=CourseSemester&action=selectAllProfessorsCourseSemester", parameters, function (data) {
                for (var i = 0; i < data.length; i++) {
                    var row = table.insertRow(0);
                    var cell1 = row.insertCell(0);
                    cell1.innerHTML = data[i].name;
                }
            }, "json");
        }
    });
</script>

<?php
include_once 'public/footer.php';
