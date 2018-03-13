<?php
$session = SSession::getInstance();

if (isset($session->permissions)) {
    if ($session->permissions == 'T') {
        include_once 'public/headerProfessor.php';
    } else {
        header("Location:?action=notFound");
    }
} else {
    header("Location:?action=notFound");
}
?>

<section id="page-title">
    <div class="container clearfix">
        <h1>Ver Actividad y Asistencia en Clase</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin">
                <div class="acc_content clearfix">
                    <form id="form" class="nobottommargin">                  
                        <div class="white-section">
                            <label for="form-courses">Cursos Disponibles:</label>
                            <select id="form-courses" class="selectpicker form-control" data-live-search="true">
                                <option value="-1" data-tokens="">Seleccione un Curso</option>
                                <?php
                                foreach ($vars as $var) {
                                    if (isset($var["ID"])) {
                                        ?>
                                        <option value="<?php echo $var["ID"] ?> " data-tokens="">
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
                        <div class="white-section">
                            <label for="form-student">Estudiantes Disponibles:</label>
                            <select id="form-student" class="form-control selectpicker" data-live-search="true">
                                <option value="-1" data-tokens="">Seleccione un Estudiante</option>
                            </select>
                            <input type="hidden" id="failed-form-student" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                        </div>  
                        <br>
                        <div class="white-section">
                            <label for="form-activity">Actividades Disponibles:</label>
                            <select id="form-activity" class="form-control selectpicker" data-live-search="true">
                                <option value="-1" data-tokens="">Seleccione una Actividad</option>
                            </select>
                            <input type="hidden" id="failed-form-activity" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                        </div> 
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <h5 style="text-align: center;">Informaci&oacute;n de la Actividad de Clase</h5>
                                <colgroup>
                                    <col class="col-xs-4">
                                    <col class="col-xs-8">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>
                                            Consecutivo
                                        </td>
                                        <td id="form-consecutive-table"><?php echo "" ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Fecha de Realizaci&oacute;n
                                        </td>
                                        <td id="form-date-table"><?php echo "" ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Asistencia
                                        </td>
                                        <td id="form-typeA-table"><?php echo "" ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Observaci&oacute;n General
                                        </td>
                                        <td id="form-observation-table"><?php echo "" ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>    
                        <br>
                        <div class="acc_content clearfix"></div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="table-contents">
                                <h5 style="text-align: center;">Contenidos de la Actividad</h5>
                                <colgroup>
                                    <col class="col-xs-4">
                                    <col class="col-xs-8">
                                </colgroup>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="col_full nobottommargin">                      
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

<script src="public/js/jquery.min.js" type="text/javascript"></script>
<script src="public/js/Views/selectClassActivityView.js" type="text/javascript"></script>

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
