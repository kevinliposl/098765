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
        <h1>Eliminar Curso</h1>
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
                                <label for="form-courses">Cursos:</label>
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
                                <input type="hidden" id="failed-form-courses" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class='icon-remove-sign'></i> Curso inválido. Seleccione e intente de nuevo!"/>
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
                                        </tr>
                                        <tr>
                                            <td>
                                                Nombre
                                            </td>
                                            <td id="form-name-table"><?php echo "" ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Instrumento
                                            </td>
                                            <td id="form-instrument-table"><?php echo "" ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Descripci&oacute;n
                                            </td>
                                            <td id="form-description-table"><?php echo "" ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col_full nobottommargin">
                                <a id="form-submit" data-toggle="modal" class="button button-3d button-black nomargin" style="display : none; text-align: center;" data-target="#myModal">Eliminar</a>
                                <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i>La operacion no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
                                <input type="hidden" id="success" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Operaci&oacute;n exitosa, revise en breve...!" data-notify-position="bottom-full-width"/>
                                <input type="hidden" id="wait" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>
                            </div>                     
                        </form>
                    </div>
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
                    <h4 style="text-align: center;">¿Realmente desea eliminar este Curso?</h4>
                    <p>Consejos:
                    <li>Verificar bien, si es el Curso que realmente desea eliminar</li>
                    <li>El Curso puede ser restaurado con servicio t&eacute;cnico</li></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="form-close" data-dismiss="modal">Cerrar</button>
                    <input type="button" class="btn btn-primary button-black nomargin" id="form-submity" value="Eliminar"/>
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
            $("#form-submit").css("display", "none");
        }
    });

    //Open Modal
    $("#form-submit").click(function () {
        if ($("#form-courses").val() === "-1") {
            SEMICOLON.widget.notifications($("#failed-form-courses"));
            return false;
        } else {
            $('#form-submit').attr('data-target', '#myModal');
        }
    });

    //Delete 
    $("#form-submity").click(function () {
        $("#form-submity").attr('disabled', 'disabled');
        $("#form-close").attr('disabled', 'disabled');

        SEMICOLON.widget.notifications($("#wait"));

        var parameters = {
            "initials": $("#form-courses").val()
        };
        $.post("?controller=Course&action=delete", parameters, function (data) {
            if (data.result === "1") {
                SEMICOLON.widget.notifications($("#success"));
                setTimeout("location.href = '?controller=Course&action=delete';", 1500);
            } else {
                SEMICOLON.widget.notifications($("#warning"));
                $("#form-submity").removeAttr('disabled');
                $("#form-close").removeAttr('disabled');
            }
        }, "json");
    });
</script>

<?php
include_once 'public/footer.php';
