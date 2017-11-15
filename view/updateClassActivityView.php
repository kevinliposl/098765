<?php
$session = SSession::getInstance();

if (isset($session->permissions)) {
    if ($session->permissions == 'T') {
        include_once 'public/headerProfessor.php';
    } else {
        header("Location:?controller=Index&action=notFound");
    }
} else {
    include_once 'public/header.php';
}
?>

<!-- Page Title
============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Actualizar Actividad y Asistencia en Clase</h1>
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
                        <form id="form" class="nobottommargin">

                            <div class="white-section">
                                <label for="form-courses">Cursos Disponibles:</label>
                                <select id="form-courses" class="selectpicker form-control" data-live-search="true">
                                    <option value="-1" data-tokens="">Seleccione un Curso</option>
                                    <?php
                                    foreach ($vars as $var) {
                                        if (isset($var["ID"])) {
                                            ?>
                                            <option value="<?php echo $var["ID"] ?> " data-tokens="">
                                                <?php echo $var["name"] ?>
                                            </option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <input type="hidden" id="failed-form-courses" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            <br>
                            <div class="white-section">
                                <label for="form-student">Estudiantes Disponibles:</label>
                                <select id="form-student" class="form-control selectpicker" data-live-search="true">
                                    <option value="-1" data-tokens="">Seleccione un Estudiante</option>
                                </select>
                                <input type="hidden" id="failed-form-student" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div> 
                            <br>
                            <div class="white-section">
                                <label for="form-activity">Actividades Disponibles:</label>
                                <select id="form-activity" class="form-control selectpicker" data-live-search="true">
                                    <option value="-1" data-tokens="">Seleccione una Actividad</option>
                                </select>
                                <input type="hidden" id="failed-form-activity" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div> 
                            <br>
                            <div class="col_full">
                                <label for="form-consecutive">Consecutivo de Actividad:</label>
                                <input type="text" id="form-consecutive" class="form-control" readonly="readonly" />
                                <input type="hidden" id="failed-consecutive" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            <div class="col_full">
                                <label for="form-date">Fecha de Realizaci&oacute;n:</label>
                                <input type="date" id="form-date" class="form-control" required/>
                                <input type="hidden" id="failed-date" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            <div class="col_full">
                                <label for="form-typeId">Control de Asistencia:</label>
                                <input type="radio" id='radio_1' name="form-typeA" value="P" checked/><label>Puntual</label>
                                <input type="radio" id='radio_2' name="form-typeA" value="I"/> <label>Ausencia Injustificada</label>
                                <input type="radio" id='radio_3' name="form-typeA" value="J"/><label>Ausencia Justificada</label>
                            </div>
                            <div class="col_full">
                                <label for="form-content">Contenido de Clase:</label>
                                <input type="text" id="form-content" class="form-control" required/>
                                <input type="hidden" id="failed-content" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            <br>
                            <div class="col_full nobottommargin">
                                <a id="form-save"  class="button button-3d button-black nomargin" style="display : block; text-align: center;" >Guardar Contenido</a>
                                <input type="hidden" id="warning" value="w"/>
                                <input type="hidden" id="success" value="s"/>
                                <input type="hidden" id="failed" value="f"/>
                            </div>  
                            <br>
                            <div class="white-section">
                                <label for="form-addContent">Contenidos Agregados:</label>
                                <select id="form-addContent" class="form-control selectpicker" data-live-search="true">
                                    <option value="-1" data-tokens="">Seleccione un contenido</option>
                                </select>
                                <input type="hidden" id="failed-addContent" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table  class="table table-bordered table-striped" style="clear: both;">
                                    <tbody id="bodyTable">
                                        <tr>
                                            <th  width="55%" style="text-align: center;">Actividades</th>
                                            <th width="10%" style="text-align: center;">Acci&oacute;n</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div class="col_full nobottommargin">
                                <a id="form-delete"  class="button button-3d button-black nomargin" style="display : block; text-align: center;" >Eliminar Contenido</a>
                                <input type="hidden" id="warning" value="w"/>
                                <input type="hidden" id="success" value="s"/>
                                <input type="hidden" id="failed" value="f"/>
                            </div>  
                            <br>
                            <div class="col_full">
                                <label for="form-observation">Observaci&oacute;n General:</label>
                                <input type="text" id="form-observation" class="form-control" required/>
                                <input type="hidden" id="failed-observation" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            <div class="col_full nobottommargin">
                                <a id="form-submit" data-toggle="modal" class="button button-3d button-black nomargin" style="display : block; text-align: center;" data-target="#myModal">Actualizar</a>
                                <input type="hidden" id="warning" value="w"/>
                                <input type="hidden" id="success" value="s"/>
                                <input type="hidden" id="failed" value="f"/>
                            </div>  
                            <div class="white-section" style="display : none;">
                                <select id="form-backup" class="form-control selectpicker" data-live-search="true">
                                </select>
                            </div>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section><!-- #content end -->

<!--MODAL -->
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
                    <h4 style="text-align: center;">¿Realmente desea Actualizar esta Actividad de Clase?</h4>
                    <p>Consejos:
                    <li>Revisar que todos los campos tengan la informaci&oacute;n correcta</li>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="button" class="btn btn-primary button-black nomargin" id="form-submity" value="Actualizar"/>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#form-courses").change(function () {
        if ($("#form-courses").val() === "-1") {
            $("#failed-form-courses").attr("data-notify-msg", "<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-courses"));
            return false;
        } else {
            var parameters = {
                "appointment": $("#form-courses").val()
            };
            document.getElementById("form-student").options.length = 0;
            document.getElementById("form-activity").options.length = 0;
            $('#form-activity').append($("<option></option>").attr("value", "-1").text("Seleccione una Actividad"));
            document.getElementById("form-addContent").options.length = 0;
            $('#form-addContent').append($("<option></option>").attr("value", "-1").text("Seleccione un Contenido"));
            document.getElementById("form-backup").options.length = 0;
            $.post("?controller=ClassActivity&action=selectStudentClassActivity", parameters, function (data) {
                $('#form-student').append($("<option></option>").attr("value", "-1").text("Seleccione un Estudiante"));
                for (var i = 0; i < data.length; i++) {
                    $('#form-student').append($("<option></option>").attr("value", data[i].identification).text(data[i].name));//AGREGAR OPCIONES
                }
                $("#form-student").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
            }, "json");
        }
    });

    $("#form-student").change(function () {
        if ($("#form-courses").val() === "-1") {
            $("#failed-form-courses").attr("data-notify-msg", "<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-courses"));
            return false;
        } else if ($("#form-student").val() === "-1") {
            $("#failed-form-student").attr("data-notify-msg", "<i class=icon-remove-sign></i> Estudiante inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-student"));
            return false;
        } else {
            var parameters = {
                "appointment": $("#form-courses").val(),
                "identification": $("#form-student").val()
            };
            document.getElementById("form-activity").options.length = 0;
            document.getElementById("form-addContent").options.length = 0;
            $('#form-addContent').append($("<option></option>").attr("value", "-1").text("Seleccione un Contenido"));
            document.getElementById("form-backup").options.length = 0;
            $.post("?controller=ClassActivity&action=selectRecordStudentClassActivity", parameters, function (data) {
                $('#form-activity').append($("<option></option>").attr("value", "-1").text("Seleccione una Actividad"));
                for (var i = 0; i < data.length; i++) {
                    $('#form-activity').append($("<option></option>").attr("value", data[i].consecutive_class).text(data[i].date));//AGREGAR OPCIONES
                }
                $("#form-activity").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
            }, "json");
        }
    });

    $("#form-activity").change(function () {
        if ($("#form-courses").val() === "-1") {
            $("#failed-form-courses").attr("data-notify-msg", "<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-courses"));
            return false;
        } else if ($("#form-student").val() === "-1") {
            $("#failed-form-student").attr("data-notify-msg", "<i class=icon-remove-sign></i> Estudiante inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-student"));
            return false;
        } else if ($("#form-activity").val() === "-1") {
            $("#failed-form-activity").attr("data-notify-msg", "<i class=icon-remove-sign></i> Estudiante inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-activity"));
            return false;
        } else {
            var parameters = {
                "appointment": $("#form-courses").val(),
                "identification": $("#form-student").val(),
                "consecutive": $("#form-activity").val()
            };
            document.getElementById("form-addContent").options.length = 0;
            document.getElementById("form-backup").options.length = 0;
            $.post("?controller=ClassActivity&action=selectClassActivity", parameters, function (data) {
                document.getElementById("form-consecutive").value = data.consecutive_class;
                document.getElementById("form-date").value = data.date;
                if (data.assistance === "P") {
                    $("#radio_1").attr('checked', 'checked');
                } else if (data.assistance === "I") {
                    $("#radio_2").attr('checked', 'checked');
                } else {
                    $("#radio_1").attr('checked', 'checked');
                }
                document.getElementById("form-observation").value = data.observation;
                var parameters2 = {
                    "appointment": $("#form-courses").val(),
                    "identification": $("#form-student").val(),
                    "consecutive": data.consecutive_class
                };
                $.post("?controller=ClassActivity&action=selectRecordContentClassActivity", parameters2, function (data2) {
                    $('#form-addContent').append($("<option></option>").attr("value", "-1").text("Seleccione un Contenido"));
                    for (var i = 0; i < data2.length; i++) {
                        $('#form-addContent').append($("<option></option>").attr("value", data2[i].ID).text(data2[i].content));//AGREGAR OPCIONES
                    }
                    $("#form-addContent").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
                }, "json");
            }, "json");
        }
    });

    $("#form-submit").click(function () {
        $('#form-submit').attr('data-target', '#myModal');
    });

    $("#form-save").click(function () {
        var content;
        content = $("#form-content").val().trim();
        if (!isNaN(content) || content.length < 4 || content > 255) {
            $("#failed-content").attr("data-notify-msg", "<i class=icon-remove-sign></i> Inicial de curso Incorrecta. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-content"));
        } else {
            $('#form-addContent').append($("<option></option>").attr("value", content).text(content));//AGREGAR OPCIONES
            $("#form-addContent").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS               
        }
    });

    $("#form-delete").click(function () {
        if ($("#form-addContent").val() === "-1") {
            $("#failed-form-addContent").attr("data-notify-msg", "<i class=icon-remove-sign></i> Estudiante inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-addContent"));
            return false;
        } else {
            $('#form-backup').append($("<option></option>").attr("value", $("#form-addContent").val()).text($("#form-addContent").val()));//AGREGAR OPCIONES
            $("#form-backup").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
            var sel = document.getElementById("form-addContent");
            sel.remove(sel.selectedIndex);
            $("#form-addContent").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS 
        }
    });

    $("#form-submity").click(function () {
        var content;
        content = $("#form-observation").val().trim();

        var sel = document.getElementById("form-addContent");
        var dat = "";
        var counter = 0;
        for (var i = 0; i < sel.length; i++) {
            var opt = sel[i];
            if (i === sel.length - 1) {
                if (isNaN(opt.value)) {
                    dat += opt.value;
                    counter += 1;
                }
            } else {
                if (isNaN(opt.value)) {
                    dat += opt.value + ",";
                    counter += 1;
                }
            }
        }

        var sel2 = document.getElementById("form-backup");
        var dat2 = "";
        for (var i = 0; i < sel2.length; i++) {
            var opt2 = sel2[i];
            if (i === sel2.length - 1) {
                dat2 += opt2.value;
            } else {
                dat2 += opt2.value + ",";
            }
        }

        if ($("#form-courses").val() === "-1") {
            $("#failed-form-courses").attr("data-notify-msg", "<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-courses"));
            return false;
        } else if ($("#form-student").val() === "-1") {
            $("#failed-form-student").attr("data-notify-msg", "<i class=icon-remove-sign></i> Estudiante inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-student"));
            return false;
        } else if (!isNaN(content) || content.length < 4 || content.length > 255) {
            $("#failed-observation").attr("data-notify-msg", "<i class=icon-remove-sign></i> Inicial de curso Incorrecta. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-observation"));
            return false;
        } else {
            var parameters = {
                "appointment": $("#form-courses").val(),
                "student": $("#form-student").val(),
                "consecutive": $("#form-consecutive").val(),
                "date": $("#form-date").val().trim(),
                "typeA": $("input:radio[name='form-typeA']:checked").val().trim(),
                "contentsNew": dat,
                "countNew": counter,
                "contentsDelete": dat2,
                "countDelete": sel2.length,
                "observation": $("#form-observation").val()
            };
            $.post("?controller=ClassActivity&action=update", parameters, function (data) {
                if (data.result === "1") {
                    $("#success").attr({
                        "data-notify-type": "success",
                        "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!",
                        "data-notify-position": "bottom-full-width"
                    });
                    SEMICOLON.widget.notifications($("#success"));
                    setTimeout("location.href = '?controller=ClassActivity&action=update';", 2000);
                } else {
                    $("#warning").attr({
                        "data-notify-type": "warning",
                        "data-notify-msg": "<i class=icon-warning-sign></i> Operacion Incompleta, intente de nuevo!",
                        "data-notify-position": "bottom-full-width"
                    });
                    SEMICOLON.widget.notifications($("#warning"));
                }
            }, "json");
        }
    });
</script>

<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';
