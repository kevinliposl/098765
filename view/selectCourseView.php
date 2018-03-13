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
        <h1>Ver Cursos</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin">
                <div class="acc_content clearfix">
                    <form id="form" class="nobottommargin">
                        <div class="white-section">
                            <label for="form-initials">Cursos:</label>
                            <select id="form-courses" class="selectpicker form-control" data-live-search="true">
                                <option value="-1"data-tokens="">Seleccione un Curso</option>
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
                                        <td>Siglas</td>
                                        <td><a id="form-initials-table"></a></td>
                                    </tr>
                                    <tr>
                                        <td>Nombre</td>
                                        <td><a id="form-name-table"></a></td>
                                    </tr>
                                    <tr>
                                        <td>Instrumento</td>
                                        <td><a id="form-instrument-table"></a></td>
                                    </tr>
                                    <tr>
                                        <td>Descripci&oacute;n</td>
                                        <td><a id="form-description-table"></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> 
                        <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i>La operacion no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
                        <input type="hidden" id="success" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Operaci&oacute;n exitosa, revise en breve...!" data-notify-position="bottom-full-width"/>
                        <input type="hidden" id="wait" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="public/js/jquery.min.js" type="text/javascript"></script>
<script src="public/js/Views/selectCourseView.js" type="text/javascript"></script>

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
