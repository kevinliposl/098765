<?php
$session = SSession::getInstance();

if (isset($session->permissions)) {
    if ($session->permissions == 'A') {
        include_once 'public/headerAdmin.php';
    } else {
        header("Location:?action=notFound");
    }
} else {
    header("Location:?action=notFound");
}
?>

<section id="page-title">
    <div class="container clearfix">
        <h1>Actualizar Curso</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin">
                <div class="acc_content clearfix">
                    <form id="form" class="nobottommargin" onsubmit="return val();">
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
                                }
                                ?>
                            </select>
                            <input type="hidden" id="failed-form-courses" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!"/>
                        </div>
                        <br>
                        <div class="acc_content clearfix"></div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <h5 style="text-align: center;">Informaci&oacute;n del Curso</h5>
                                <colgroup>
                                    <col class="col-xs-4">
                                    <col class="col-xs-8">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>Siglas</td>
                                        <td>
                                            <a id="form-initials-table" class="bt-editable" data-emptytext='' href="#" data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese las iniciales"></a>
                                            <input type="hidden" id="failed-initials" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nombre</td>
                                        <td>
                                            <a id="form-name-table" class="bt-editable" data-emptytext='' href="#" data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese el nombre"></a>
                                            <input type="hidden" id="failed-name" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> Nombre Incorrecto. Complete e intente de nuevo!"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Instrumento</td>
                                        <td>
                                            <a id="form-instrument-table" class="bt-editable" data-emptytext='' href="#" data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese el instrumento"></a>
                                            <input type="hidden" id="failed-instrument" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> Instrumento Incorrecto. Complete e intente de nuevo!"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Descripci&oacute;n</td>
                                        <td>
                                            <a id="form-description-table" class="bt-editable" data-emptytext='' href="#" data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese una descripci&oacute;n"></a>
                                            <input type="hidden" id="failed-description" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg= "<i class=icon-remove-sign></i> Descripción Incorrecto. Complete e intente de nuevo!"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col_full nobottommargin">                      
                            <input type="submit" value="Actualizar" class="button button-3d button-black nomargin form-control" style="display: none; text-align: center;"/>
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

        if ($("#form-courses").val() !== "-1") {
            var parameters = {
                "initials": $("#form-courses").val()
            };

            SEMICOLON.widget.notifications($("#wait"));

            $.post("?controller=Course&action=select", parameters, function (data) {
                if (data.initials) {
                    $("#form-initials-table").html(data.initials);
                    $("#form-name-table").html(data.name);
                    $("#form-instrument-table").html(data.instrument);
                    $("#form-description-table").html(data.description);
                    $("#form-submit").css("display", "block");

                    SEMICOLON.widget.notifications($("#success"));
                } else {
                    $("#form-initials-table").html("");
                    $("#form-name-table").html("");
                    $("#form-instrument-table").html("");
                    $("#form-description-table").html("");
                    $("#form-secondLastName-table").html("");
                    $("#form-submit").css("display", "none");

                    SEMICOLON.widget.notifications($("#warning"));
                }
            }, "json");
        } else {
            $("#form-initials-table").html("");
            $("#form-name-table").html("");
            $("#form-instrument-table").html("");
            $("#form-description-table").html("");
            $("#form-secondLastName-table").html("");
            $("#form-submit").attr("display", "none");
        }
    });

    function val() {

        args = {
            "initials": $("#form-initials-table").text().trim(),
            "name": $("#form-name-table").text().trim(),
            "description": $("#form-description-table").text().trim(),
            "instrument": $("#form-instrument-table").text().trim()
        };

        if ($("#form-courses").val() === "-1") {
            SEMICOLON.widget.notifications($("#failed-form-courses"));
            return false;

        } else if (!isNaN(args['name']) || args['name'].length < 4 || args['name'].length > 50) {
            SEMICOLON.widget.notifications($("#failed-name"));
            return false;

        } else if (!isNaN(args['description']) || args['description'].length < 4 || args['description'].length > 100) {
            SEMICOLON.widget.notifications($("#failed-description"));
            return false;

        } else if (!isNaN(args['instrument']) || args['instrument'].length < 2 || args['instrument'].length > 100) {
            SEMICOLON.widget.notifications($("#failed-instrument"));
            return false;
        }
        $('#showModal').click();
        return false;
    }

    //Delete 
    $("#form-submity").click(function () {

        $("#form-submity").attr('disabled', 'disabled');
        $("#form-close").attr('disabled', 'disabled');

        SEMICOLON.widget.notifications($("#wait"));

        $.post("?controller=Course&action=update", args, function (data) {
            if (data.result === "1") {
                SEMICOLON.widget.notifications($("#success"));
                setTimeout("location.href = '?controller=Course&action=update';", 1500);
            } else {
                SEMICOLON.widget.notifications($("#warning"));
                $("#form-submity").removeAttr('disabled');
                $("#form-close").removeAttr('disabled');
            }
        }, "json");
    });

    $(document).ready(function () {
        $('.bt-editable').editable();
    });
</script>

<?php
include_once 'public/footer.php';
