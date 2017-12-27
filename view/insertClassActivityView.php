<?php
$session = SSession::getInstance();

if (isset($session->permissions)) {
    if ($session->permissions == 'T') {
        include_once 'public/headerProfessor.php';
    } else {
        header("Location:?action=notFound");
    }
} else {
    header("Location:?action=notFound");
}
?>
<section id="page-title">
    <div class="container clearfix">
        <h1>Registrar Actividad y Asistencia en Clase</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin ">
                <div class="acc_content clearfix">
                    <form id="form" class="nobottommargin">                            
                        <div class="col-lg-6" style="padding: 10px;">
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
                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-student">Estudiantes Disponibles:</label>
                            <select id="form-student" class="form-control selectpicker" data-live-search="true">
                                <option value="-1" data-tokens="">Seleccione un Estudiante</option>
                            </select>
                            <input type="hidden" id="failed-form-student" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                        </div>
                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-consecutive">Consecutivo de Actividad:</label>
                            <input type="text" id="form-consecutive" class="form-control" readonly="readonly" />
                            <input type="hidden" id="failed-consecutive" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                        </div>
                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-date">Fecha de Realizaci&oacute;n:</label>
                            <input type="date" id="form-date" class="form-control" required/>
                            <input type="hidden" id="failed-date" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                        </div>
                        <div class="col_full" style="padding: 10px;">
                            <label for="form-typeId">Control de Asistencia:</label>
                            <input type="radio" name="form-typeA" value="P" checked/><label>Puntual</label>
                            <input type="radio" name="form-typeA" value="I"/><label>Ausencia Injustificada</label>
                            <input type="radio" name="form-typeA" value="J"/><label>Ausencia Justificada</label>
                        </div>
                        <div class="line line-sm"></div>
                        <div class="col_full" style="padding: 10px;">
                            <label for="form-content">Contenido de Clase:</label>    
                            <input type="text" id="form-content" class="form-control" required/>
                            <input type="hidden" id="failed-content" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                        </div>
                        <div class="col_full" style="padding: 10px;">
                            <a id="form-save"  class="button button-3d button-black nomargin" style="display : block; text-align: center;" >Guardar Contenido</a>
                        </div>
                        <div class="white-section" style="text-align: center;">
                            <label for="form-addContent" >Contenidos Agregados</label>
                            <input type="hidden" id="failed-addContent" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                        </div>
                        <div class="table-responsive col_full" style="padding: 10px;">
                            <table  class="table table-bordered table-striped" style="clear: both;">
                                <tbody id="bodyTable">
                                    <tr>
                                        <th  width="40%" style="text-align: center;">Actividades</th>
                                        <th width="20%" style="text-align: center;">Acci&oacute;n</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="line line-sm"></div>
                        <div class="col_full" style="padding: 10px;">
                            <label for="form-observation">Observaci&oacute;n General:</label>
                            <input type="text" rows="4" cols="50"    id="form-observation" class="form-control" required/>
                            <input type="hidden" id="failed-observation" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                        </div>
                        <div class="col_full" style="padding: 10px;">
                            <a id="form-submit" data-toggle="modal" class="button button-3d button-black nomargin" style="display : block; text-align: center;" data-target="#myModal">Insertar</a>
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
                    <h4 style="text-align: center;">¿Realmente desea insertar esta Actividad de Clase?</h4>
                    <p>Consejos:
                    <li>Revisar que todos los campos tengan la informaci&oacute;n correcta</li>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="button" class="btn btn-primary button-black nomargin" id="form-submity" value="Insertar"/>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var totalRowNumber = 1;

    function appendRow(text) {
        var tbl = document.getElementById('bodyTable'), // table reference
                row = tbl.insertRow(tbl.rows.length);
        createCell(row.insertCell(0), tbl.rows.length, text, 'row');
        createCell(row.insertCell(1), tbl.rows.length, "", 'row');
        row.id = totalRowNumber;
        totalRowNumber = totalRowNumber + 1;
    }

    function createCell(cell, len, text, style) {
        if (text !== "") {
            var a = document.createElement('a');
            a.setAttribute('id', "form-id-table-" + len);
            a.setAttribute('class', "bt-editable");
            a.setAttribute('href', "#form-addContent");
            a.setAttribute('data-type', "text");
            a.setAttribute('data-pk', "1");
            a.setAttribute('data-placeholder', "Required");
            a.setAttribute('data-title', " Actualización de la Actividad");
            a.innerHTML = text;
            cell.appendChild(a);
        } else {
            var a = document.createElement('a');
            a.setAttribute('class', "button button-mini button-circle button-red");
            a.setAttribute('style', "display : block; text-align: center;");
            a.setAttribute('onclick', "deleteActivity(" + totalRowNumber + ");return false;");
            a.innerHTML = "Eliminar";
            cell.appendChild(a);
        }
    }

    function deleteActivity(rowNumber) {
        var row = document.getElementById(rowNumber);
        row.parentNode.removeChild(row);
    }

</script>


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

            SEMICOLON.widget.notifications($("#wait"));

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
            $.post("?controller=ClassActivity&action=selectConsecutiveClassActivity", parameters, function (data) {
                document.getElementById("form-consecutive").value = parseInt(data.consecutive_class) + 1;
            }, "json");
        }
    });

    $("#form-submit").click(function () {
        $('#form-submit').attr('data-target', '#myModal');
    });

    $("#form-save").click(function () {
        var content;
        content = $("#form-content").val().trim();
        if (!isNaN(content) || content.length < 4 || content.length > 255) {
            $("#failed-content").attr("data-notify-msg", "<i class=icon-remove-sign></i> Contenido Incorrecto. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-content"));
        } else {
            appendRow(content);

        }
    });

    $("#form-submity").click(function () {
        var content;
        content = $("#form-observation").val().trim();

        var tableReg = document.getElementById('bodyTable');
        var cellsOfRow = "";
        var cont = "";
        var dat = "";
        for (var i = 1; i < tableReg.rows.length; i++) {
            cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
            cont = cellsOfRow[0].getElementsByTagName('a');
            dat += cont[0].textContent + ",";
        }

        dat = dat.substring(0, dat.length - 1);


        if ($("#form-courses").val() === "-1") {
            $("#failed-form-courses").attr("data-notify-msg", "<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-courses"));
            return false;
        } else if ($("#form-student").val() === "-1") {
            $("#failed-form-student").attr("data-notify-msg", "<i class=icon-remove-sign></i> Estudiante inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-student"));
            return false;
        } else if (!isNaN(content) || content.length < 4 || content.length > 255) {
            $("#failed-observation").attr("data-notify-msg", "<i class=icon-remove-sign></i> Observación Incorrecta. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-observation"));
        } else if (tableReg.rows.length < 2) {
            $("#failed-addContent").attr("data-notify-msg", "<i class=icon-remove-sign></i> Cantidad de Contenidos inválidos. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-addContent"));
        } else {
            var parameters = {
                "appointment": $("#form-courses").val(),
                "student": $("#form-student").val(),
                "consecutive": $("#form-consecutive").val(),
                "date": $("#form-date").val().trim(),
                "typeA": $("input:radio[name='form-typeA']:checked").val().trim(),
                "contents": dat,
                "count": ((tableReg.rows.length) - 1),
                "observation": $("#form-observation").val()
            };

            SEMICOLON.widget.notifications($("#wait"));

            $.post("?controller=ClassActivity&action=insert", parameters, function (data) {
                if (data.result === "1") {
                    SEMICOLON.widget.notifications($("#success"));
                    setTimeout("location.href = '?controller=ClassActivity&action=insert';", 2000);
                } else {
                    SEMICOLON.widget.notifications($("#warning"));
                }
            }, "json");
        }
    });
</script>

<script>
    $(document).ready(function () {
        $('.bt-editable').editable();
    });
</script>

<?php
include_once 'public/footer.php';
