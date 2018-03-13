<?php
$session = SSession::getInstance();

if (isset($session->permissions)) {
    if ($session->permissions == 'A') {
        include_once 'public/headerAdmin.php';
    } else {
        header('Location:?action=notFound');
    }
} else {
    header('Location:?action=notFound');
}
?>
<section id="page-title">
    <div class="container clearfix">
        <h1>Reactivar Cursos</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <form id="form" class="nobottommargin">
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
                    <input type="hidden" id="failed-form-courses" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <h5 style="text-align: center;">Informaci&oacute;n del Curso</h5>
                        <colgroup>
                            <col class="col-xs-4">
                            <col class="col-xs-8">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td>
                                    Siglas
                                </td>
                                <td>
                                    <a id="form-initials-table"></a> 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Nombre
                                </td>
                                <td>
                                    <a id="form-name-table"></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Instrumento
                                </td>
                                <td>
                                    <a id="form-instrument-table"></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Descripci&oacute;n
                                </td>
                                <td>
                                    <a id="form-description-table"></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col_full nobottommargin">
                    <a id="form-submit" data-toggle="modal" class="button button-3d button-black nomargin" style="display : none; text-align: center;" data-target="#myModal">Reactivar</a>
                    <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i>La operacion no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
                    <input type="hidden" id="success" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Operaci&oacute;n exitosa, revise en breve...!" data-notify-position="bottom-full-width"/>
                    <input type="hidden" id="wait" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>                        
                </div>                     
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
                    <h4 style="text-align: center;">¿Realmente desea reactivar este Curso?</h4>
                    <p>Consejos:
                    <li>Verificar bien, si es el Curso que realmente desea reactivar</li>
                    <li>El Curso puede ser restaurado con servicio t&eacute;cnico</li></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"id="form-close">Cerrar</button>
                    <input type="button" class="btn btn-primary button-black nomargin" id="form-submity" value="Reactivar"/>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="public/js/jquery.min.js" type="text/javascript"></script>
<script src="public/js/Views/reactivateCourseView.js" type="text/javascript"></script>

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
