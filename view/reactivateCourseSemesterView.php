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

<section id="page-title">
    <div class="container clearfix">
        <h1>Reactivar Asignaciones</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin">
                <div class="acc_content clearfix">
                    <form id="form" class="nobottommargin">
                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-semester">Semestres:</label>
                            <select id="form-semester" class="selectpicker form-control" data-live-search="true">
                                <option value="-1" data-tokens="">Seleccione un Semestre</option>
                                <?php
                                foreach ($vars[0] as $var) {
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
                            <input type="hidden" id="failed-form-semester" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> Semestre inválido. Seleccione e intente de nuevo!"/>
                        </div> 
                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-course-professor">Cursos:</label>
                            <select id="form-course-professor" class="selectpicker form-control" data-live-search="true">
                                <option value="-1" data-tokens="">Seleccione un Curso</option>
                                <?php
                                foreach ($vars[1] as $var) {
                                    if (isset($var["ID_course_semester"])) {
                                        ?>
                                        <option value="<?php echo $var["ID_course_semester"] ?> " data-tokens="">
                                            <?php
                                            echo "Curso: " . $var["initials"] . " | Año: " . $var["year"] . " | Semestre ";
                                            echo $var["semester"] == '1' ? 'I' : 'II';
                                            ?>
                                        </option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                            <input type="hidden" id="failed-form-courses-professor" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!"/>           
                        </div>

                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-course-course">Cursos:</label>
                            <select id="form-course-course" class="selectpicker form-control" data-live-search="true">
                                <option value="-1" data-tokens="">Seleccione un Curso</option>
                            </select>
                            <input type="hidden" id="failed-form-courses" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!"/>           
                        </div>

                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-professors">Profesores:</label>
                            <select id="form-professors" class="selectpicker form-control" data-live-search="true">
                                <option value="-1" data-tokens="">Seleccione un Curso</option>
                            </select>
                            <input type="hidden" id="failed-form-professors" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> Profesor inválido. Seleccione e intente de nuevo!"/>
                        </div>

                        <div class="col-lg-6" style="padding: 10px; margin-top: 20px;">
                            <a id="form-submit-course" data-toggle="modal" class="button button-3d button-black nomargin" style="display : block; text-align: center;" data-target="#myModal">Reactivar Curso</a>
                            <input type="hidden" id="warning-course" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i>La operacion no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="success-course" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Operaci&oacute;n exitosa, revise en breve...!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="wait-course" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>
                        </div> 
                        <div class="col-lg-6" style="padding: 10px; margin-top: 20px;">
                            <a id="form-submit-professor" data-toggle="modal" class="button button-3d button-black nomargin" style="display : block; text-align: center;" data-target="#myModal">Reactivar Profesor</a>
                            <input type="hidden" id="warning-professor" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i>La operacion no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="success-professor" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Operaci&oacute;n exitosa, revise en breve...!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="wait-professor" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div class="modal fade" id="myModal-course" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">¡Aviso!</h4>
                </div>
                <div class="modal-body">
                    <h4 style="text-align: center;">¿Realmente reactivar este Curso?</h4>
                    <p>Consejos:
                    <li>Verificar bien si la asignaci&oacute;n esta completa</li>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="form-close-course">Cerrar</button>
                    <input type="button" class="btn btn-primary button-black nomargin" id="form-submity-course" value="Reactivar"/>
                </div>
            </div>
        </div>
    </div>
</div>

<!--///////COLUMN IZQUIERDA////////
    ///////COLUMN IZQUIERDA////////
    ///////COLUMN IZQUIERDA////////
    ///////COLUMN IZQUIERDA////////-->
<script>
    $("#form-semester").change(function () {
        if ($("#form-semester").val() === "-1") {
            SEMICOLON.widget.notifications($("#failed-form-semester"));
        } else {
            var parameters = {
                "ID_Semester": $("#form-semester").val()
            };

            SEMICOLON.widget.notifications($("#wait-course"));
            $('#form-course-course').empty();

            $.post("?controller=Course&action=selectAllCourseDeleted", parameters, function (data) {
                $('#form-course-course').append($("<option></option>").attr("value", "-1").text("Seleccione un Curso"));
                for (var i = 0; i < data.length; i++) {
                    $('#form-course-course').append($("<option></option>").attr("value", data[i].initials).text(data[i].name));//AGREGAR OPCIONES
                }
                $("#form-course-course").selectpicker("refresh");

                SEMICOLON.widget.notifications($("#success-course"));
            }, "json");
        }
    });

    $("#form-submit-course").click(function () {
        var sel2 = document.getElementById("form-professors");
        var dat2 = 0;
        for (var i = 0; i < sel2.length; i++) {
            if (sel2.options[i].selected) {
                dat2 += 1;
            }
        }

        if ($("#form-semester").val() === "-1") {
            SEMICOLON.widget.notifications($("#failed-form-semester"));
            return false;
        } else if ($("#form-course-course").val() === "-1") {
            SEMICOLON.widget.notifications($("#failed-form-courses"));
            return false;
        } else {
            $('#form-submit-course').attr('data-target', '#myModal-course');
        }
    });

    $("#form-submity-course").click(function () {
        var parameters = {
            "ID_Semester": $("#form-semester").val(),
            "initials": $("#form-course-course").val()
        };
        SEMICOLON.widget.notifications($("#wait-course"));

        $.post("?controller=CourseSemester&action=reactivare", parameters, function (data) {
            if (data.result === "1") {
                SEMICOLON.widget.notifications($("#success-course"));
                setTimeout("location.href = '?controller=CourseSemester&action=reactivare';", 2000);
            } else {
                SEMICOLON.widget.notifications($("#warning-course"));
            }
        }, "json");
    });
</script>


<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div class="modal fade" id="myModal-professor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">¡Aviso!</h4>
                </div>
                <div class="modal-body">
                    <h4 style="text-align:center;">¿Realmente desea reactivar los Profesores a este Curso?</h4>
                    <p>Consejos:
                    <li>Verificar bien si la asignaci&oacute;n esta completa</li></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"id="form-close-professor">Cerrar</button>
                    <input type="button" class="btn btn-primary button-black nomargin" id="form-submity-professor" value="Asignar"/>
                </div>
            </div>
        </div>
    </div>
</div>


<!--///////COLUMN DERECHA////////
    ///////COLUMN DERECHA////////
    ///////COLUMN DERECHA////////
    ///////COLUMN DERECHA////////-->
<script>
    $("#form-course-professor").change(function () {
        if ($("#form-course-professor").val() === "-1") {
            SEMICOLON.widget.notifications($("#failed-form-courses"));
            return false;
        } else {
            var parameters = {
                "id": $("#form-course-professor").val()
            };

            SEMICOLON.widget.notifications($("#wait-professor"));
            $("#form-professors").empty();

            $.post("?controller=CourseSemester&action=selectNotAllProfessorsWithOutApp", parameters, function (data) {
                for (var i = 0; i < data.length; i++) {
                    $('#form-professors').append($("<option></option>").attr("value", data[i].identification).text(data[i].name + ' ' + data[i].first_lastname + ' ' + data[i].second_lastname));//AGREGAR OPCIONES
                }
                $("#form-professors").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
                SEMICOLON.widget.notifications($("#success-professor"));
            }, "json");
        }
    });

    //MODAL
    $("#form-submit-professor").click(function () {

        var sel2 = document.getElementById("form-professors");
        var dat2 = 0;
        for (var i = 0; i < sel2.length; i++) {
            if (sel2.options[i].selected) {
                dat2 += 1;
            }
        }

        if ($("#form-course-professor").val() === "-1") {
            SEMICOLON.widget.notifications($("#failed-form-courses-professor"));
            return false;
        } else if (dat2 < 1) {
            SEMICOLON.widget.notifications($("#failed-form-professors"));
            return false;
        } else {
            $('#form-submit-professor').attr('data-target', '#myModal-professor');
        }
    });

    //REACTIVATE 
    $("#form-submity-professor").click(function () {
        var parameters = {
            "id_course_semester": $("#form-course-professor").val(),
            "professor": $("#form-professors").val()
        };
        alert(JSON.stringify(parameters));
        
        SEMICOLON.widget.notifications($("#wait-professor"));

        $.post("?controller=CourseSemester&action=reactivare", parameters, function (data) {
            if (data.result === "1") {
                SEMICOLON.widget.notifications($("#success-professor"));
                setTimeout("location.href = '?controller=CourseSemester&action=reactivare';", 2000);
            } else {
                SEMICOLON.widget.notifications($("#warning-professor"));
            }
        }, "json");
    });
</script>

<?php
include_once 'public/footer.php';
