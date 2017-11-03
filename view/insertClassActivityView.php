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
        <h1>Registar Actividad y Asistencia en Clase</h1>
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
                                                <?php echo $var["name"];?>
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
                            <div class="col_full">
                                <label for="form-consecutive">Consecutivo de Actividad:</label>
                                <input type="text" id="form-consecutive" class="form-control" required/>
                                <input type="hidden" id="failed-consecutive" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            <div class="col_full">
                                <label for="form-date">Fecha de Realizaci&oacute;n:</label>
                                <input type="date" id="form-date" class="form-control" required/>
                                <input type="hidden" id="failed-date" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            <div class="col_full">
                                <label for="form-typeId">Control de Asistencia:</label>
                                <input type="radio" name="form-typeId" value="P" checked/><label>Puntual</label>
                                <input type="radio" name="form-typeId" value="I"/> <label>Ausencia Injustificada</label>
                                <input type="radio" name="form-typeId" value="J"/><label>Ausencia Justificada</label>
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
    function validate() {

        var initials, name, description, instrument;

        initials = $("#form-initials").val().trim();
        name = $("#form-name").val().trim();
        description = $("#form-description").val().trim();
        instrument = $("#form-instrument").val().trim();

        if (initials.length < 6 || initials.length > 6 || isNaN(initials.substr(3,3)) || /^[a-z][a-z]*/.test(initials.substr(0,3)) || initials.split(" ", 2).length > 1) {
            $("#failed-initials").attr("data-notify-msg", "<i class=icon-remove-sign></i> Inicial de curso Incorrecta. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-initials"));
            return false;

        }else if (!isNaN(name) || name.length < 4 || name.split(" ", 2).length > 1) {
            $("#failed-name").attr("data-notify-msg", "<i class=icon-remove-sign></i> Nombre Incorrecto. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-name"));
            return false;

        } else if (!isNaN(description) || description.length < 4 || description.split(" ", 2).length > 1) {
            $("#failed-description").attr("data-notify-msg", "<i class=icon-remove-sign></i> Descripción Incorrecto. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-description"));
            return false;

        } else if (!isNaN(instrument) || instrument.length < 4 || instrument.split(" ", 2).length > 1) {
            $("#failed-instrument").attr("data-notify-msg", "<i class=icon-remove-sign></i> Instrumento Incorrecto. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-instrument"));
            return false;
        }
        $('#showModal').click();
        return false;
    }

    //Open Modal
    $("#form-submit").click(function () {
        $('#form-submit').attr('data-target', '#myModal');
    });
    
    //Insert
    $("#form-submity").click(function () {
        var parameters = {
            "initials": $("#form-initials").val().trim(),
            "name": $("#form-name").val().trim(),
            "description": $("#form-description").val().trim(),
            "instrument": $("#form-instrument").val().trim()
        };

        $.post("?controller=Course&action=insert", parameters, function (data) {
            if (data.result === "1") {
                $("#success").attr({
                    "data-notify-type": "success",
                    "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!",
                    "data-notify-position": "bottom-full-width"
                });
                SEMICOLON.widget.notifications($("#success"));
                location.href = "?controller=Course&action=insert";
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
    });
</script>

<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';