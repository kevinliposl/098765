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

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <h1 class="center">Asignaciones</h1>
            <br><br>
            <div class="accordion-lg divcenter nobottommargin" style="max-width: 550px;">
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
                            <input type="hidden" id="failed-form-semester" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                        </div> 
                        <br>
                        <div class="white-section">
                            <label for="form-courses">Cursos:</label>
                            <select id="form-courses" class="form-control selectpicker" data-live-search="true" >
                                <option value="-1" data-tokens="">Seleccione un Curso</option>
                            </select>
                            <input type="hidden" id="failed-form-courses" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                        </div>
                        <br>
                        <div class="white-section">
                            <label for="form-professors">Profesores:</label>
                            <select multiple name="form-professors[]" id="form-professors" class="form-control selectpicker" data-live-search="true">
                            </select>
                            <input type="hidden" id="failed-form-professors" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                        </div>
                        <br>
                        <div class="col_full nobottommargin">
                            <a id="form-submit" data-toggle="modal" class="button button-3d button-black nomargin" style="display : block; text-align: center;" data-target="#myModal">Asignar</a>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">¡Aviso!</h4>
                </div>
                <div class="modal-body">
                    <h4 style="text-align: center;">¿Realmente desea Asignar los Profesores al Curso en el Semestre?</h4>
                    <p>Consejos:
                    <li>Verificar bien si la asignaci&oacute;n esta completa</li></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="button" class="btn btn-primary button-black nomargin" id="form-submity" value="Asignar"/>
                </div>
            </div>
        </div>
    </div>
</div>

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
            SEMICOLON.widget.notifications($("#wait"));

            document.getElementById("form-courses").options.length = 0;
            document.getElementById("form-professors").options.length = 0;
            $('#form-professors').append($("<option></option>").attr("value", "-1").text("Seleccione los profesores"));
            $.post("?controller=Course&action=selectAll", parameters, function (data) {
                $('#form-courses').append($("<option></option>").attr("value", "-1").text("Seleccione un Curso"));
                for (var i = 0; i < data.length; i++) {
                    $('#form-courses').append($("<option></option>").attr("value", data[i].initials).text(data[i].name));//AGREGAR OPCIONES
                }
                $("#form-courses").selectpicker("refresh");
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
            SEMICOLON.widget.notifications($("#wait"));

            document.getElementById("form-professors").options.length = 0;
            $.post("?controller=CourseSemester&action=selectNotAllProfessorsCourseSemester", parameters, function (data) {
                for (var i = 0; i < data.length; i++) {
                    $('#form-professors').append($("<option></option>").attr("value", data[i].identification).text(data[i].name));//AGREGAR OPCIONES
                }
                $("#form-professors").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
            }, "json");
        }
    });

    //Open Modal
    $("#form-submit").click(function () {

        var sel2 = document.getElementById("form-professors");
        var dat2 = 0;
        for (var i = 0; i < sel2.length; i++) {
            if (sel2.options[i].selected) {
                dat2 += 1;
            }
        }
        if ($("#form-semester").val() === "-1") {
            $("#failed-form-semester").attr("data-notify-msg", "<i class=icon-remove-sign></i> Semestre inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-semester"));
            return false;
        } else if ($("#form-courses").val() === "-1") {
            $("#failed-form-courses").attr("data-notify-msg", "<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-courses"));
            return false;
        } else if (dat2 < 1) {
            $("#failed-form-professors").attr("data-notify-msg", "<i class=icon-remove-sign></i> Profesor inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-professors"));
            return false;
        } else {
            $('#form-submit').attr('data-target', '#myModal');
        }
    });

    //Delete 
    $("#form-submity").click(function () {
        var parameters = {
            "ID_Semester": $("#form-semester").val(),
            "initials": $("#form-courses").val(),
            "professors": $("#form-professors").val()
        };

        SEMICOLON.widget.notifications($("#wait"));

        $.post("?controller=CourseSemester&action=insert", parameters, function (data) {
            if (data.result === "1") {
                SEMICOLON.widget.notifications($("#success"));
                setTimeout("location.href = '?controller=CourseSemester&action=insert';", 2000);
            } else {
                SEMICOLON.widget.notifications($("#warning"));
            }
        }, "json");
    });
</script>

<?php
include_once 'public/footer.php';
