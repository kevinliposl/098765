<?php
$session = SSession::getInstance();

if (isset($session->permissions)) {
    if($session->permissions=='T'){
        include_once 'public/headerProfessor.php';
    }else{
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
        <h1>Registar Actividad y Asistencia en Clase</h1>
    </div>
</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin">
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
                                                <?php echo $var["name"]?>
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
                                <input type="radio" name="form-typeA" value="P" checked/><label>Puntual</label>
                                <input type="radio" name="form-typeA" value="I"/> <label>Ausencia Injustificada</label>
                                <input type="radio" name="form-typeA" value="J"/><label>Ausencia Justificada</label>
                            </div>
                            <br>
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
                                    <option value="-1" data-tokens="">Seleccione un Contenido</option>
                                </select>
                                <input type="hidden" id="failed-addContent" data-notify-type= "error" data-notify-position="bottom-full-width"/>
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
        alert("entro");
        if($("#form-courses").val()==="-1"){
            $("#failed-form-courses").attr("data-notify-msg", "<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-courses"));
            return false;
        }else{
            var parameters = {
                "appointment": $("#form-courses").val()
            };
            document.getElementById("form-student").options.length = 0;
            document.getElementById("form-addContent").options.length = 0;
            $('#form-addContent').append($("<option></option>").attr("value", "-1").text("Seleccione un Contenido"));
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
        if($("#form-courses").val()==="-1"){
            $("#failed-form-courses").attr("data-notify-msg", "<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-courses"));
            return false;
        }else if($("#form-student").val()==="-1"){
            $("#failed-form-student").attr("data-notify-msg", "<i class=icon-remove-sign></i> Estudiante inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-student"));
            return false;
        }else{
            var parameters = {
                "appointment": $("#form-courses").val(),
                "identification": $("#form-student").val()
            };
            document.getElementById("form-addContent").options.length = 0;
            $('#form-addContent').append($("<option></option>").attr("value", "-1").text("Seleccione un Contenido"));
            $.post("?controller=ClassActivity&action=selectConsecutiveClassActivity", parameters, function (data) {
                document.getElementById("form-consecutive").value = parseInt(data.consecutive_class)+1;
            }, "json");
        }
    });

    $("#form-submit").click(function () {
        $('#form-submit').attr('data-target', '#myModal');
    });
    
    $("#form-save").click(function () {
        var content;
        content = $("#form-content").val().trim();
        if (!isNaN(content) || content.length < 4 || content.length>255) {
            $("#failed-content").attr("data-notify-msg", "<i class=icon-remove-sign></i> Contenido Incorrecto. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-content"));
        }else{
            $('#form-addContent').append($("<option></option>").attr("value", content).text(content));//AGREGAR OPCIONES
            $("#form-addContent").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS               
        }
    });
    
    $("#form-delete").click(function () {
        if($("#form-addContent").val()==="-1"){
            $("#failed-form-addContent").attr("data-notify-msg", "<i class=icon-remove-sign></i> Contenido inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-addContent"));
            return false;
        }else{
            var sel = document.getElementById("form-addContent");
            sel.remove(sel.selectedIndex);
            $("#form-addContent").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
        }   
    });
    
    $("#form-submity").click(function () {     
        var content;
        content = $("#form-observation").val().trim();
        
        var sel = document.getElementById("form-addContent"); 
        var dat="";
        for (var i = 0; i < sel.length; i++) {
            var opt = sel[i];
            if(opt.value!=="-1"){
                if(i===sel.length-1){
                     dat+=opt.value;
                }else{
                    dat+=opt.value+",";
                }
            }
        }
        if($("#form-courses").val()==="-1"){
            $("#failed-form-courses").attr("data-notify-msg", "<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-courses"));
            return false;
        }else if($("#form-student").val()==="-1"){
            $("#failed-form-student").attr("data-notify-msg", "<i class=icon-remove-sign></i> Estudiante inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-student"));
            return false;
        }else if (!isNaN(content) || content.length < 4 || content.length>255) {
            $("#failed-observation").attr("data-notify-msg", "<i class=icon-remove-sign></i> Observación Incorrecta. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-observation"));
        }else if(sel.length<1){
            $("#failed-addContent").attr("data-notify-msg", "<i class=icon-remove-sign></i> Cantidad de Contenidos inválidos. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-addContent"));
        }else{  
            var parameters = {
                "appointment": $("#form-courses").val(),
                "student": $("#form-student").val(),
                "consecutive": $("#form-consecutive").val(),
                "date": $("#form-date").val().trim(),
                "typeA": $("input:radio[name='form-typeA']:checked").val().trim(),
                "contents":dat,
                "count":((sel.length)-1),
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
                    setTimeout("location.href = '?controller=ClassActivity&action=insert';",2000);
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