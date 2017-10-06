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
        <h1>Eliminar Profesor</h1>
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
                        <form class="nobottommargin">
                            <div class="white-section">
                                <label for="form-id">Profesores:</label>
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
                                    <h5 style="text-align: center;">Informaci&oacute;n del Profesor</h5>
                                    <colgroup>
                                        <col class="col-xs-3">
                                        <col class="col-xs-8">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td width="15%">Identificaci&oacute;n</td>
                                            <td width="55%">
                                                <a id="form-id" href="#" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese la identificación"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nombre</td>
                                            <td>
                                                <a id="form-name" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el nombre"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Primer Apellido</td>
                                            <td>
                                                <a id="form-first-lastName" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el Primer Apellido"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Segundo Apellido</td>
                                            <td>
                                                <a id="form-second-lastName" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el Segundo Apellido"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>
                                                <a id="form-email" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el email"></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col_full nobottommargin">
                                <input type="button" class="button button-3d button-black nomargin" data-toggle="modal" id="delete" data-target="" value="Eliminar"/>
                            </div>

                            <div id="message"></div>
                        </form>
                    </div>
                </div>

                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-body">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">¡Aviso!</h4>
                                </div>
                                <div class="modal-body">
                                    <h4 style="text-align: center;">¿Realmente desea eliminar el profesor seleccionado?</h4>
                                    <p>Consejos:
                                    <li>Verificar bien, si es el profesor que realmente desea eliminar</li>
                                    <li>El registro puede ser renovado con ayuda t&eacute;cnica</li></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <input type="button" class="btn btn-primary" button-black nomargin id="deleteButton" value="Confirmar"/>
                                    <input type="hidden" id="warning" value="w"/>
                                    <input type="hidden" id="success" value="s"/>
                                    <input type="hidden" id="failed" value="f"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section><!-- #content end -->

<script>
    $("#form-prof").change(function () {
        if ($("#form-prof").val() !== "-1") {
            var parameters = {
                "id": $("#form-prof").val()
            };
            $.post("?controller=Professor&action=selectProfessor", parameters, function (data) {
                document.getElementById("form-id").innerHTML = data.identification;
                document.getElementById("form-name").innerHTML = data.name;
                document.getElementById("form-first-lastName").innerHTML = data.first_lastname;
                document.getElementById("form-second-lastName").innerHTML = data.second_lastname;
                document.getElementById("form-email").innerHTML = data.email;

                $("#success").attr({
                    "data-notify-type": "success",
                    "data-notify-msg": "<i class=icon-ok-sign></i> cambio!",
                    "data-notify-position": "bottom-full-width"
                });
                SEMICOLON.widget.notifications($("#success"));
            }, "json");
        }
    });


</script>

<script>
    $("#delete").click(function () {
        $('#delete').attr('data-target', '#myModal');
    });

    function Redirect() {
        window.location = "?controller=Professor&action=deleteProfessor";
    }

    $("#deleteButton").click(function () {

        var parameters = {
            "id": $("#form-prof").val()
        };

        $("#message").html("Processing, please wait...");
        $.post("?controller=Professor&action=deleteProfessorFunction", parameters, function (data) {
            if (data.result === "1") {
                $("#success").attr({
                    "data-notify-type": "success",
                    "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!"
                });
                SEMICOLON.widget.notifications($("#success"));
                setTimeout('Redirect()', 2000);
            } else {
                $("#warning").attr({
                    "data-notify-type": "warning",
                    "data-notify-msg": "<i class=icon-warning-sign></i> No se pudo insertar el curso!"
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