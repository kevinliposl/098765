<?php
include_once 'public/headerAdmin.php';
?>

<section id="page-title">
    <div class="container clearfix">
        <h1>Reactivar Usuario</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <form id="form" class="nobottommargin">
                <div class="white-section">
                    <label for="form-student">Usuarios:</label>
                    <select id="form-student" class="selectpicker form-control" data-live-search="true">
                        <option value="-1" data-tokens="">Seleccione un Usuario</option>
                        <?php foreach ($vars as $var) { ?>
                            <option value="<?php echo $var["identification"] . ';' . $var["tipo"]; ?>" data-tokens="">
                                <?php echo $var["identification"] . " | " . $var["name"] . " " . $var["first_lastname"] . " " . $var["second_lastname"] . " | " . (($var["tipo"] === 'S') ? 'Estudiante' : (($var["tipo"] === 'T') ? 'Profesor' : 'Administrador')); ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <h5 style="text-align: center;">Informaci&oacute;n del Usuario</h5>
                        <colgroup>
                            <col class="col-xs-4">
                            <col class="col-xs-8">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td>Identificaci&oacute;n</td>
                                <td><a id="form-id-table"></a></td>
                            </tr>
                            <tr>
                                <td>Nombre</td>
                                <td><a id="form-name-table"></a></td>
                            </tr>
                            <tr>
                                <td>Apellidos</td>
                                <td><a id="form-lastName-table"></a></td>
                            </tr>
                            <tr>
                                <td>Tel&eacute;fonos</td>
                                <td><a id="form-phones-table"></a></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><a id="form-email-table"></a></td>
                            </tr>
                            <tr>
                                <td>Rango</td>
                                <td><a id="form-rango"></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a id="form-submit" data-toggle="modal" class="button button-3d button-black nomargin" data-target="#myModal" id="next" data-target="" style="display: none; text-align: center;">Reactivar</a>
                <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i>La operacion no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
                <input type="hidden" id="success" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Operaci&oacute;n exitosa, revise en breve...!" data-notify-position="bottom-full-width"/>
                <input type="hidden" id="wait" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>                              
            </form>
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
                    <h4 style="text-align: center;">¿Realmente desea reactivar este Usuario?</h4>
                    <p>Consejos:
                    <li>Verificar bien, si es el usuario que realmente desea reactivar</li>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="form-close">Cerrar</button>
                    <input type="button" class="btn btn-primary" button-black nomargin id="form-submity" value="Reactivar"/>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="public/js/jquery.min.js" type="text/javascript"></script>
<script src="public/js/Views/reactivateView.js" type="text/javascript"></script>

<script src="public/js/bs-select.js" type="text/javascript"></script>
<script src="public/js/selectsplitter.js" type="text/javascript"></script>

<script type="text/javascript">
    $('.selectpicker').selectpicker({
        size: 4,
        dropupAuto: false
    });
</script>

<?php
include_once 'public/footer.php';
