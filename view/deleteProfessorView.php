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
            <h1>Desactivar Profesor</h1>
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
                                    <label for="form-prof">Profesores:</label>
                                    <select id="form-prof" class="selectpicker form-control" data-live-search="true">
                                        <option data-tokens="">Seleccione un Profesor</option>
                                        <?php
                                        foreach ($vars as $var) {
                                            if (isset($var["identification"])) {
                                                ?>
                                                <option value="<?php echo $var["identification"]?> " data-tokens="">
                                                    <?php echo $var["Name"]?>
                                                </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
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
                                                <td>Identificaci&oacute;n</td>
                                                <td>
                                                    <a id="form-id"></a>
                                                    <input type="hidden" id="failed-id" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nombre</td>
                                                <td>
                                                    <a id="form-name"></a>
                                                    <input type="hidden" id="failed-name" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Primer Apellido</td>
                                                <td>
                                                    <a id="form-first-lastName"></a>
                                                    <input type="hidden" id="failed-first-lastName" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Segundo Apellido</td>
                                                <td>
                                                    <a id="form-second-lastName"></a>
                                                    <input type="hidden" id="failed-second-lastName" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>
                                                    <a id="form-email"></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col_full nobottommargin">
                                    <a id="form-submit" data-toggle="modal" class="button button-3d button-black nomargin" style="display : block; text-align: center;" data-target="#myModal">Desactivar</a>
                                    <!--<input type="submit" value="Eliminar" class="button button-3d button-black nomargin form-control" style="display: block; text-align: center;"/>-->
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

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-body">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">¡Aviso!</h4>
                        </div>
                        <div class="modal-body">
                            <h4 style="text-align: center;">¿Realmente desea desactivar este profesor?</h4>
                            <p>Consejos:
                                <li>Verificar bien, si es el profesor que realmente desea desactivar</li>
                                <li>Los datps del profesor pueden ser restaurado con servicio t&eacute;cnico</li></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <input type="button" class="btn btn-primary button-black nomargin" id="form-submity" value="Desactivar"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>

    //Change Combobox
    $("#form-prof").change(function () {
        var parameters = {
            "id": $("#form-prof").val()
        };
        $.post("?controller=Professor&action=select", parameters, function (data) {
            if (data.identification) {
                $("#form-id").html(data.identification);
                $("#form-name").html(data.name);
                $("#form-first-lastName").html(data.first_lastname);
                $("#form-second-lastName").html(data.second_lastname);
                $("#form-email").html(data.email);

//                $("#success").attr({
//                    "data-notify-type": "success",
//                    "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!",
//                    "data-notify-position": "bottom-full-width"
//                });
//                SEMICOLON.widget.notifications($("#success"));
} else {
    $("#form-id").html("");
    $("#form-name").html("");
    $("#form-first-lastName").html("");
    $("#form-second-lastName").html("");
    $("#form-email").html("");

}
}, "json");
    });

    //Open Modal
    $("#form-submit").click(function () {
        $('#form-submit').attr('data-target', '#myModal');
    });

    //Delete 
    $("#form-submity").click(function () {
        var parameters = {
            "id": $("#form-prof").val()
        };
        $.post("?controller=Professor&action=delete", parameters, function (data) {
            if (data.result === "1") {
                $("#success").attr({
                    "data-notify-type": "success",
                    "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!",
                    "data-notify-position": "bottom-full-width"
                });
                SEMICOLON.widget.notifications($("#success"));
                setTimeout("location.href = '?controller=Professor&action=delete';", 2000);
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

</script>


<!-- End Content
    ============================================= -->    
    <?php
    include_once 'public/footer.php';
