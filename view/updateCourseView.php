<?php
$session = SSession::getInstance();

if (isset($session->permissions)) {
    if($session->permissions=='A'){
        include_once 'public/headerAdmin.php';
    }else{
        header("Location:?action=notFound");
    }
} else {
    include_once 'public/header.php';
}
?>

<!-- Page Title
============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Actualizar Curso</h1>
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
                                <label for="form-initials">Cursos:</label>
                                <select id="form-courses" class="selectpicker form-control" data-live-search="true">
                                    <option value="-1" data-tokens="">Seleccione un Curso</option>
                                    <?php
                                    foreach ($vars as $var) {
                                        if (isset($var["initials"])) {
                                            ?>
                                            <option value="<?php echo $var["initials"] ?> " data-tokens="">
                                                <?php echo $var["name"] ?>
                                            </option>
                                            <?php
                                        }
                                    }?>
                                </select>
                                <input type="hidden" id="failed-form-courses" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            <br>
                            <div class="acc_content clearfix"></div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <h5 style="text-align: center;">Informaci&oacute;n del Curso</h5>
                                    <colgroup>
                                        <col class="col-xs-3">
                                        <col class="col-xs-8">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td>
                                                Siglas
                                            </td>
                                            <td id="form-initials-table"><?php echo "" ?></td>
                                            <input type="hidden" id="failed-initials" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </tr>
                                        <tr>
                                            <td>
                                               Nombre
                                            </td>
                                            <td id="form-name-table" class="bt-editable" href="#" data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese el nombre"><?php echo " " ?></td>
                                            <input type="hidden" id="failed-name" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </tr>
                                        <tr>
                                            <td>
                                                Instrumento
                                            </td>
                                            <td id="form-instrument-table" class="bt-editable" href="#" data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese el instrumento"><?php echo " " ?></td>
                                             <input type="hidden" id="failed-instrument" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </tr>
                                        <tr>
                                            <td>
                                                Descripci&oacute;n
                                            </td>
                                            <td id="form-description-table" class="bt-editable" href="#" data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese la descripcion"><?php echo " " ?></td>
                                            <input type="hidden" id="failed-description" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col_full nobottommargin">                      
                                <input type="submit" value="Actualizar" class="button button-3d button-black nomargin form-control" style="display: block; text-align: center;"/>
                                <input type="hidden" id="warning"/>
                                <input type="hidden" id="success"/>
                                <input type="hidden" id="failed"/>
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
                    <h4 style="text-align: center;">¿Realmente desea actualizar este Curso?</h4>
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

    //Change Combobox
    $("#form-courses").change(function () {
        var parameters = {
            "initials": $("#form-courses").val()
        };
        $.post("?controller=Course&action=select", parameters, function (data) {
            if (data.initials) {
                $("#form-initials-table").html(data.initials);
                $("#form-name-table").html(data.name);
                $("#form-instrument-table").html(data.instrument);
                $("#form-description-table").html(data.description);

                $("#success").attr({
                    "data-notify-type": "success",
                    "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!",
                    "data-notify-position": "bottom-full-width"
                });
                SEMICOLON.widget.notifications($("#success"));
            } else {
                $("#form-initials-table").html("");
                $("#form-name-table").html("");
                $("#form-instrument-table").html("");
                $("#form-description-table").html("");
                $("#form-secondLastName-table").html("");
                $("#warning").attr({
                    "data-notify-type": "warning",
                    "data-notify-msg": "<i class=icon-warning-sign></i> Operacion Incompleta, intente de nuevo!",
                    "data-notify-position": "bottom-full-width"
                });
                SEMICOLON.widget.notifications($("#warning"));
            }
        }, "json");
    });

    function validate() {
        var initials, name, description, instrument;

        initials = $("#form-initials-table").text().trim();
        name = $("#form-name-table").text().trim();
        description = $("#form-description-table").text().trim();
        instrument = $("#form-instrument-table").text().trim();

        if($("#form-courses").val()==="-1"){
            $("#failed-form-courses").attr("data-notify-msg", "<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-courses"));
            return false;
            
        }else if (!isNaN(name) || name.length < 4 || name.length>50) {
            $("#failed-name").attr("data-notify-msg", "<i class=icon-remove-sign></i> Nombre Incorrecto. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-name"));
            return false;

        } else if (!isNaN(description) || description.length < 4 || description.length>100) {
            $("#failed-description").attr("data-notify-msg", "<i class=icon-remove-sign></i> Descripción Incorrecto. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-description"));
            return false;

        } else if (!isNaN(instrument) || instrument.length < 2 || instrument.length>100) {
            $("#failed-instrument").attr("data-notify-msg", "<i class=icon-remove-sign></i> Instrumento Incorrecto. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-instrument"));
            return false;
        }
        $('#showModal').click();
        return false;
    }

    //Delete 
    $("#form-submity").click(function () {
        var parameters = {
            "initials": $("#form-initials-table").text().trim(),
            "name": $("#form-name-table").text().trim(),
            "description": $("#form-description-table").text().trim(),
            "instrument": $("#form-instrument-table").text().trim()
        };
        $.post("?controller=Course&action=update", parameters, function (data) {
            if (data.result === "1") {
                $("#success").attr({
                    "data-notify-type": "success",
                    "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!",
                    "data-notify-position": "bottom-full-width"
                });
                SEMICOLON.widget.notifications($("#success"));
                setTimeout("location.href = '?controller=Course&action=update';",2000);
            } else {
                $("#warning").attr({
                    "data-notify-type": "warning",
                    "data-notify-msg": "<i class=icon-warning-sign></i> Operacion Incompleta, intente de nuevo!",
                    "data-notify-position": "bottom-full-width"
                });
                SEMICOLON.widget.notifications($("#warning"));
            }
        }, "json");
    });

    $(document).ready(function () {
        $('.bt-editable').editable();
    });
</script>

<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';
