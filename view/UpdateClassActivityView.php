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
                                    <option data-tokens="">Seleccione un Curso</option>
                                    <?php
                                    foreach ($vars as $var) {
                                        if (isset($var["ID"])) {
                                            ?>
                                            <option value="<?php echo $var["ID"] ?> " data-tokens="">
                                                <?php echo $var["name"]?>
                                            </option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <br>
                            <div class="white-section">
                                <label for="form-student">Estudiantes Disponibles:</label>
                                <select id="form-student" class="form-control selectpicker" data-live-search="true">
                                    <option value="-1" data-tokens="">Seleccione un Estudiante</option>
                                </select>
                            </div>                          
                            <div class="white-section">
                                <label for="form-activity">Actividades Disponibles:</label>
                                <select id="form-activity" class="form-control selectpicker" data-live-search="true">
                                    <!--<option value="-1" data-tokens="">Seleccione una Actividad</option>-->
                                </select>
                            </div>     
                            <div class="col_full">
                                <label for="form-consecutive">Consecutivo de Actividad:</label>
                                <input type="text" id="form-consecutive" class="form-control" />
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
                            <div class="col_full nobottommargin">
                                <a id="form-save"  class="button button-3d button-black nomargin" style="display : block; text-align: center;" >Guardar Contenido</a>
                                <input type="hidden" id="warning" value="w"/>
                                <input type="hidden" id="success" value="s"/>
                                <input type="hidden" id="failed" value="f"/>
                            </div>    
                            <div class="white-section">
                                <label for="form-addContent">Contenidos Agregados:</label>
                                <select id="form-addContent" class="form-control selectpicker" data-live-search="true">
                                </select>
                            </div> 
                            <div class="col_full nobottommargin">
                                <a id="form-delete"  class="button button-3d button-black nomargin" style="display : block; text-align: center;" >Eliminar Contenido</a>
                                <input type="hidden" id="warning" value="w"/>
                                <input type="hidden" id="success" value="s"/>
                                <input type="hidden" id="failed" value="f"/>
                            </div>  
                            <div class="col_full">
                                <label for="form-observation">Observaci&oacute;n General:</label>
                                <input type="text" id="form-observation" class="form-control" required/>
                                <input type="hidden" id="failed-observation" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                           <div class="white-section">
                                <select id="form-backup" class="form-control selectpicker" data-live-search="true">
                                </select>
                            </div>  
                            <div class="col_full nobottommargin">
                                <a id="form-submit" data-toggle="modal" class="button button-3d button-black nomargin" style="display : block; text-align: center;" data-target="#myModal">Insertar</a>
                                <input type="hidden" id="warning" value="w"/>
                                <input type="hidden" id="success" value="s"/>
                                <input type="hidden" id="failed" value="f"/>
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
    $("#form-courses").change(function () {
        var parameters = {
            "appointment": $("#form-courses").val()
        };
        document.getElementById("form-student").options.length = 0;
        document.getElementById("form-addContent").options.length = 0;
        $.post("?controller=ClassActivity&action=selectStudentClassActivity", parameters, function (data) {
            $('#form-student').append($("<option></option>").attr("value", "-1").text("Seleccione un Estudiante"));
            for (var i = 0; i < data.length; i++) {
                $('#form-student').append($("<option></option>").attr("value", data[i].identification).text(data[i].name));//AGREGAR OPCIONES
            }
            $("#form-student").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
        }, "json");
    });
    
    $("#form-student").change(function () {
        var parameters = {
            "appointment": $("#form-courses").val(),
            "identification": $("#form-student").val()
        };
        $.post("?controller=ClassActivity&action=selectRecordStudentClassActivity", parameters, function (data) {
            $('#form-activity').append($("<option></option>").attr("value", "-1").text("Seleccione una Actividad"));
            for (var i = 0; i < data.length; i++) {
                $('#form-activity').append($("<option></option>").attr("value", data[i].consecutive_class).text(data[i].date));//AGREGAR OPCIONES
            }
            $("#form-activity").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
        }, "json");
    });
    
    $("#form-activity").change(function () {
        var parameters = {
            "appointment": $("#form-courses").val(),
            "identification": $("#form-student").val(),
            "consecutive": $("#form-activity").val()
        };
        $.post("?controller=ClassActivity&action=selectClassActivity", parameters, function (data) {
            document.getElementById("form-consecutive").value =data.consecutive_class;
            document.getElementById("form-date").value =data.date;
            if(data.assistance==="P"){
                $("#radio_1").attr('checked', 'checked');
            }else if(data.assistance==="I"){
                $("#radio_2").attr('checked', 'checked');
            }else{
                $("#radio_1").attr('checked', 'checked');
            }
            document.getElementById("form-observation").value =data.observation;
        }, "json");
        $.post("?controller=ClassActivity&action=selectRecordContentClassActivity", parameters, function (data) {
            for (var i = 0; i < data.length; i++) {
                $('#form-addContent').append($("<option></option>").attr("value", data[i].ID).text(data[i].content));//AGREGAR OPCIONES
            }
            $("#form-addContent").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
        }, "json");
    });

    $("#form-submit").click(function () {
        $('#form-submit').attr('data-target', '#myModal');
    });
    
    $("#form-save").click(function () {
        var content;
        content = $("#form-content").val().trim();
        if (!isNaN(content) || content.length < 4) {
            $("#failed-content").attr("data-notify-msg", "<i class=icon-remove-sign></i> Inicial de curso Incorrecta. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-content"));
        }else{
            $('#form-addContent').append($("<option></option>").attr("value", content).text(content));//AGREGAR OPCIONES
            $("#form-addContent").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS               
        }
    });
    
    $("#form-delete").click(function () {
    
        $('#form-backup').append($("<option></option>").attr("value", $("#form-addContent").val()).text($("#form-addContent").val()));//AGREGAR OPCIONES
        $("#form-backup").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
        var sel = document.getElementById("form-addContent");
        sel.remove(sel.selectedIndex);
        $("#form-addContent").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS 
    });
    
    $("#form-submity").click(function () {     
        var content;
        content = $("#form-observation").val().trim();
        if (!isNaN(content) || content.length < 4) {
            $("#failed-observation").attr("data-notify-msg", "<i class=icon-remove-sign></i> Inicial de curso Incorrecta. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-observation"));
        }else{           
            var sel = document.getElementById("form-addContent"); 
            var dat="";
            for (var i = 0; i < sel.length; i++) {
                var opt = sel[i];
                if(i===sel.length-1){
                  dat+=opt.value;
                }else{
                  dat+=opt.value+",";
                }
            }
        var parameters = {
            "appointment": $("#form-courses").val(),
            "student": $("#form-student").val(),
            "consecutive": $("#form-consecutive").val(),
            "date": $("#form-date").val().trim(),
            "typeA": $("input:radio[name='form-typeA']:checked").val().trim(),
            "contents":dat,
            "count":sel.length,
            "observation": $("#form-observation").val()
        };
        $.post("?controller=ClassActivity&action=insert", parameters, function (data) {
            if (data.result === "1") {
                $("#success").attr({
                    "data-notify-type": "success",
                    "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!",
                    "data-notify-position": "bottom-full-width"
                });
                SEMICOLON.widget.notifications($("#success"));
                location.href = "?controller=ClassActivity&action=insert";
            } else {
                $("#warning").attr({
                    "data-notify-type": "warning",
                    "data-notify-msg": "<i class=icon-warning-sign></i> Operacion Fallida!",
                    "data-notify-position": "bottom-full-width"
                });
                SEMICOLON.widget.notifications($("#warning"));
            }
            ;
        }, "json");
        }
    });
</script>

<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';