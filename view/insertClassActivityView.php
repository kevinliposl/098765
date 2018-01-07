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
        <h1>Registrar Actividad y Asistencia en Clase</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin ">
                <div class="acc_content clearfix">
                    <form id="form" class="nobottommargin">                            
                        <div class="col-lg-6" style="padding: 10px;">
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
                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-student">Estudiantes Disponibles:</label>
                            <select id="form-student" class="form-control selectpicker" data-live-search="true">
                                <option value="-1" data-tokens="">Seleccione un Estudiante</option>
                            </select>
                            <input type="hidden" id="failed-form-student" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                        </div>
                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-consecutive">Consecutivo de Actividad:</label>
                            <input type="text" id="form-consecutive" class="form-control" readonly="readonly" />
                            <input type="hidden" id="failed-consecutive" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                        </div>
                        <div class="col-lg-6" style="padding: 10px;">
                            <label for="form-date">Fecha de Realizaci&oacute;n:</label>
                            <input type="date" id="form-date" class="form-control" required/>
                            <input type="hidden" id="failed-date" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                        </div>
                        <div class="col_full" style="padding: 10px;">
                            <label for="form-typeId">Control de Asistencia:</label>
                            <input type="radio" name="form-typeA" value="P" checked/><label>Puntual</label>
                            <input type="radio" name="form-typeA" value="I"/><label>Ausencia Injustificada</label>
                            <input type="radio" name="form-typeA" value="J"/><label>Ausencia Justificada</label>
                        </div>
                        <div class="line line-sm"></div>
                        <div class="col_full" style="padding: 10px;">
                            <label for="form-content">Contenido de Clase:</label>    
                            <input type="text" id="form-content" class="form-control" required/>
                            <input type="hidden" id="failed-content" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                        </div>
                        <div class="col_full" style="padding: 10px;">
                            <a id="form-save"  class="button button-3d button-black nomargin" style="display : block; text-align: center;" >Guardar Contenido</a>
                        </div>
                        <div class="white-section" style="text-align: center;">
                            <label for="form-addContent" >Contenidos Agregados</label>
                            <input type="hidden" id="failed-addContent" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                        </div>
                        <div class="table-responsive col_full" style="padding: 10px;">
                            <table  class="table table-bordered table-striped" style="clear: both;">
                                <tbody id="bodyTable">
                                    <tr>
                                        <th  width="40%" style="text-align: center;">Actividades</th>
                                        <th width="20%" style="text-align: center;">Acci&oacute;n</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="line line-sm"></div>
                        <div class="col_full" style="padding: 10px;">
                            <label for="form-observation">Observaci&oacute;n General:</label>
                            <input type="text" rows="4" cols="50"    id="form-observation" class="form-control" required/>
                            <input type="hidden" id="failed-observation" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                        </div>
                        <div class="col_full" style="padding: 10px;">
                            <a id="form-submit" data-toggle="modal" class="button button-3d button-black nomargin" style="display : block; text-align: center;" data-target="#myModal">Insertar</a>
                            <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i>La operacion no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="success" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Operaci&oacute;n exitosa, revise en breve...!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="wait" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!-- #content end -->

<!--MODAL -->
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
                    <h4 style="text-align: center;">¿Realmente desea insertar esta Actividad de Clase?</h4>
                    <p>Consejos:
                    <li>Revisar que todos los campos tengan la informaci&oacute;n correcta</li>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="button" class="btn btn-primary button-black nomargin" id="form-submity" value="Insertar"/>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="public/js/Views/insertClassActivityView.js" type="text/javascript"></script>

<?php
include_once 'public/footer.php';
