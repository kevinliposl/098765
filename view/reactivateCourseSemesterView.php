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
        <h1>Reactivar Asignaciones</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin">
                <div class="acc_content clearfix">
                    <form id="form" class="nobottommargin">
                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-semester">Semestres:</label>
                            <select id="form-semester" class="selectpicker form-control" data-live-search="true">
                                <option value="-1" data-tokens="">Seleccione un Semestre</option>
                                <?php
                                foreach ($vars[0] as $var) {
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
                            <input type="hidden" id="failed-form-semester" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> Semestre inválido. Seleccione e intente de nuevo!"/>
                        </div> 
                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-course-professor">Cursos:</label>
                            <select id="form-course-professor" class="selectpicker form-control" data-live-search="true">
                                <option value="-1" data-tokens="">Seleccione un Curso</option>
                                <?php
                                foreach ($vars[1] as $var) {
                                    if (isset($var["ID_course_semester"])) {
                                        ?>
                                        <option value="<?php echo $var["ID_course_semester"] ?> " data-tokens="">
                                            <?php
                                            echo "Curso: " . $var["initials"] . " | Año: " . $var["year"] . " | Semestre ";
                                            echo $var["semester"] == '1' ? 'I' : 'II';
                                            ?>
                                        </option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                            <input type="hidden" id="failed-form-courses-professor" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!"/>           
                        </div>

                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-course-course">Cursos:</label>
                            <select id="form-course-course" class="selectpicker form-control" data-live-search="true">
                                <option value="-1" data-tokens="">Seleccione un Curso</option>
                            </select>
                            <input type="hidden" id="failed-form-courses" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!"/>           
                        </div>

                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-professors">Profesores:</label>
                            <select id="form-professors" class="selectpicker form-control" data-live-search="true">
                                <option value="-1" data-tokens="">Seleccione un Curso</option>
                            </select>
                            <input type="hidden" id="failed-form-professors" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> Profesor inválido. Seleccione e intente de nuevo!"/>
                        </div>

                        <div class="col-lg-6" style="padding: 10px; margin-top: 20px;">
                            <a id="form-submit-course" data-toggle="modal" class="button button-3d button-black nomargin" style="display : block; text-align: center;" data-target="#myModal">Reactivar Curso</a>
                            <input type="hidden" id="warning-course" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i>La operacion no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="success-course" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Operaci&oacute;n exitosa, revise en breve...!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="wait-course" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>
                        </div> 
                        <div class="col-lg-6" style="padding: 10px; margin-top: 20px;">
                            <a id="form-submit-professor" data-toggle="modal" class="button button-3d button-black nomargin" style="display : block; text-align: center;" data-target="#myModal">Reactivar Profesor</a>
                            <input type="hidden" id="warning-professor" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i>La operacion no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="success-professor" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Operaci&oacute;n exitosa, revise en breve...!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="wait-professor" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div class="modal fade" id="myModal-course" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">¡Aviso!</h4>
                </div>
                <div class="modal-body">
                    <h4 style="text-align: center;">¿Realmente reactivar este Curso?</h4>
                    <p>Consejos:
                    <li>Verificar bien si la asignaci&oacute;n esta completa</li>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="form-close-course">Cerrar</button>
                    <input type="button" class="btn btn-primary button-black nomargin" id="form-submity-course" value="Reactivar"/>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal-professor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">¡Aviso!</h4>
                </div>
                <div class="modal-body">
                    <h4 style="text-align:center;">¿Realmente desea reactivar los Profesores a este Curso?</h4>
                    <p>Consejos:
                    <li>Verificar bien si la asignaci&oacute;n esta completa</li></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"id="form-close-professor">Cerrar</button>
                    <input type="button" class="btn btn-primary button-black nomargin" id="form-submity-professor" value="Asignar"/>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="public/js/jquery.min.js" type="text/javascript"></script>
<script src="public/js/Views/reactivateCourseSemester.js" type="text/javascript"></script>

<?php
include_once 'public/footer.php';
