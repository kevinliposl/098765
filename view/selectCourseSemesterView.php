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
        <h1>Obtener Asignaciones de Profesores a Cursos en Semestres</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin" style="max-width: 550px;">
                <div class="acc_content clearfix">
                    <form id="form" class="nobottommargin">
                        <div class="white-section">
                            <label for="form-semester">Semestres:</label>
                            <select id="form-semester" class="selectpicker form-control" data-live-search="true">
                                <option value="-1" data-tokens="">Seleccione un Semestre</option>
                                <?php
                                foreach ($vars as $var) {
                                    if (isset($var["ID"])) {
                                        ?>
                                        <option value="<?php echo $var["ID"] ?> " data-tokens="">
                                            <?php
                                            if ($var["semester"] == '1') {
                                                echo "I semestre" . " " . $var["year"];
                                            } else {
                                                echo "II semestre" . " " . $var["year"];
                                            }
                                            ?>
                                        </option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <br>
                        <div class="white-section">
                            <label for="form-courses">Cursos:</label>
                            <select id="form-courses" class="form-control selectpicker" data-live-search="true">
                                <option value="-1" data-tokens="">Seleccione un Curso</option>
                            </select>
                            <input type="hidden" id="failed-form-courses" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                        </div>
                        <br>
                        <div class="acc_content clearfix"></div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="table-professor">
                                <h5 style="text-align: center;">Profesores Asociados</h5>
                                <colgroup>
                                    <col class="col-xs-8">
                                </colgroup>
                                <tbody>
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

<script src="public/js/Views/selectCourseSemesterView.js" type="text/javascript"></script>

<?php
include_once 'public/footer.php';
