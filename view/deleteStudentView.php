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
        <h1>Eliminar Estudiante</h1>
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
                                <label for="form-student">Estudiantes:</label>
                                <select id="form-student" class="selectpicker form-control" data-live-search="true">
                                    <option value="-1" data-tokens="">Seleccione un Estudiante</option>
                                    <?php foreach ($vars as $var) { ?>
                                        <option value="<?php echo $var["identification"] ?>" data-tokens="">
                                            <?php echo $var["identification"] . " | " . $var["name"] . " " . $var["first_lastname"] . " " . $var["second_lastname"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="acc_content clearfix"></div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <h5 style="text-align: center;">Informaci&oacute;n del Estudiante</h5>
                                    <colgroup>
                                        <col class="col-xs-3">
                                        <col class="col-xs-8">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <code>Identificaci&oacute;n</code>
                                            </td>
                                            <td id="form-id-table"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <code>Nombre</code>
                                            </td>
                                            <td id="form-name-table"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <code>Apellidos</code>
                                            </td>
                                            <td id="form-lastName-table"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <code>Tel&eacute;fonos</code>
                                            </td>
                                            <td id="form-phones-table"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <code>Email</code>
                                            </td>
                                            <td id="form-email-table"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a id="form-submit" data-toggle="modal" class="button button-3d button-black nomargin" data-target="#myModal" id="next" data-target="" style="display: none; text-align: center;">Eliminar</a>
                            <input type="hidden" id="warning" value="w"/>
                            <input type="hidden" id="success" value="s"/>
                            <input type="hidden" id="failed" value="f"/>
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
                                    <h4 style="text-align: center;">¿Realmente desea eliminar este Estudiante?</h4>
                                    <p>Consejos:
                                    <li>Verificar bien, si es el estudiante que realmente desea eliminar</li>
                                    <li>El estudiante puede ser restaurado con servicio t&eacute;cnico</li></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <input type="button" class="btn btn-primary" button-black nomargin id="form-submity" value="Eliminar"/>
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
    $("#form-student").change(function () {
        if ($("#form-student").val() !== "-1") {
            var parameters = {
                "id": $("#form-student").val()
            };
            $.post("?controller=Student&action=selectStudent", parameters, function (data) {
                document.getElementById("form-id-table").innerHTML = data.identification;
                document.getElementById("form-name-table").innerHTML = data.name;
                document.getElementById("form-lastName-table").innerHTML = data.first_lastname + " " + data.second_lastname;
                document.getElementById("form-phones-table").innerHTML = data.phoneOne + ", " + data.phoneTwo;
                document.getElementById("form-email-table").innerHTML = data.email;
                document.getElementById("form-submit").style.display = "block";
                $("#success").attr({
                    "data-notify-type": "success",
                    "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!",
                    "data-notify-position": "bottom-full-width"
                });
                SEMICOLON.widget.notifications($("#success"));
            }, "json");
        } else {
            document.getElementById("form-submit").style.display = "none";
        }
    });</script>

<script>

    function Redirect() {
        window.location = "?controller=Student&action=deleteStudent";
    }

    $("#form-submity").click(function () {
        var parameters = {
            "id": $("#form-student").val()
        };
        $.post("?controller=Student&action=deleteStudent", parameters, function (data) {
            if (data.result === "1") {
                $("#success").attr({
                    "data-notify-type": "success",
                    "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!"
                });
                SEMICOLON.widget.notifications($("#success"));
                setTimeout('Redirect()', 1500);
            } else {
                $("#warning").attr({
                    "data-notify-type": "warning",
                    "data-notify-msg": "<i class=icon-warning-sign></i> El Estudiante no se pudo eliminar!"
                });
                SEMICOLON.widget.notifications($("#warning"));
            }
            ;
        }, "json");
    }
    );
</script>

<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';


