<?php
$session = SSession::getInstance();

if (isset($session->permissions)) {
    include_once 'public/headerAdmin.php';
} else {
    include_once 'public/header.php';
}
?>

<!-- Page Title
============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Eliminar Semestre</h1>
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
                                <label for="form-id">Semestre:</label>
                                <select id="form-id" class="selectpicker form-control" data-live-search="true">
                                    <option value="-1" data-tokens="">Seleccione un Semestre</option>
                                    <?php
                                    foreach ($vars as $var) {
                                        if (isset($var["ID"])) {
                                            ?>
                                            <option value="<?php echo $var["ID"] ?> " data-tokens="">
                                                <?php echo $var["year"] . " - " . (($var["semester"] === '1') ? 'I' : 'II'); ?>
                                            </option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <input type="hidden" id="success-id" data-notify-type="success" data-notify-position="bottom-full-width"/>
                                <input type="hidden" id="failed-id" data-notify-type="error" data-notify-position="bottom-full-width"/>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <h5 style="text-align: center;">Informaci&oacute;n del Administrador</h5>
                                    <colgroup>
                                        <col class="col-xs-3">
                                        <col class="col-xs-8">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <code>A&ncaron;o</code>
                                            </td>
                                            <td id="form-year-table"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <code>Semestre</code>
                                            </td>
                                            <td id="form-semester-table"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col_full nobottommargin">
                                <input type="submit" value="Eliminar" class="button button-3d button-black nomargin form-control" style="display: block; text-align: center;"/>
                                <input type="hidden" id="warning" data-notify-position="bottom-full-width" data-notify-type= "warning"/>
                                <input type="hidden" id="success" data-notify-position="bottom-full-width" data-notify-type= "success"/>
                                <input type="hidden" id="failed" data-notify-position="bottom-full-width" data-notify-type= "failed"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section><!-- #content end -->

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
                    <h4 style="text-align: center;">¿Realmente desea eliminar este Administrador?</h4>
                    <p>Consejos:
                    <li>Verificar bien, si es el administrador que realmente desea eliminar</li>
                    <li>El administrador puede ser restaurado con servicio t&eacute;cnico</li></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="button" class="btn btn-primary button-black nomargin" id="form-submity" value="Eliminar"/>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validate() {

        var id = $("#form-id").val();

        if (id === "-1") {
            $("#failed-id").attr("data-notify-msg", "<i class=icon-remove-sign></i> Seleccione un item. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-id"));
            return false;
        }

        $('#showModal').click();
        return false;
    }

    //Change Combobox
    $("#form-id").change(function () {
        var parameters = {
            "id": $("#form-id").val()
        };
        if ($("#form-id").val() !== "-1")
            $.post("?controller=Semester&action=select", parameters, function (data) {
                if (data.ID) {
                    $("#form-year-table").html(data.year);
                    $("#form-semester-table").html(data.semester);

                    $("#success-id").attr("data-notify-msg", "<i class=icon-ok-sign></i> Operacion Exitosa!");

                    SEMICOLON.widget.notifications($("#success-id"));
                } else {
                    $("#form-year-table").html("");
                    $("#form-semester-table").html("");
                }
            }, "json");
    });

    //Delete 
    $("#form-submity").click(function () {
        var parameters = {
            "id": $("#form-id").val()
        };
        if ($("#form-id").val() !== "-1")
        $.post("?controller=Semester&action=delete", parameters, function (data) {
            if (data.result === "1") {
                $("#success").attr({
                    "data-notify-type": "success",
                    "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!",
                    "data-notify-position": "bottom-full-width"
                });
                SEMICOLON.widget.notifications($("#success"));
                location.href = "?controller=Semester&action=delete";
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
    );

</script>

<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';
