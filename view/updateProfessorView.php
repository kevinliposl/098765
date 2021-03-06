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
        <h1>Actualizar Datos de Profesor</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin">
                <div class="acc_content clearfix">
                    <form id="form" class="nobottommargin" onsubmit="return validate();">
                        <div class="white-section">
                            <label for="form-professor">Profesores:</label>
                            <select id="form-professor" class="selectpicker form-control" data-live-search="true">
                                <option value="-1" data-tokens="">Seleccione un Profesor</option>
                                <?php foreach ($vars as $var) { ?>
                                    <option value="<?php echo $var["identification"] ?>" data-tokens="">
                                        <?php echo $var["Name"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <h5 style="text-align: center;">Informaci&oacute;n del Profesor</h5>
                                <colgroup>
                                    <col class="col-xs-4">
                                    <col class="col-xs-8">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>Identificaci&oacute;n</td>
                                        <td>
                                            <a id="form-id" class="bt-editable" data-emptytext='' href="#" data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese la identificación"></a>
                                            <input type="hidden" id="failed-id" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tipo de Identificaci&oacute;n</td>
                                        <td>
                                            <a id="form-id-type" class="bt-editable" data-emptytext='' href="#" data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese el tipo de identificación"></a>
                                            <input type="hidden" id="failed-id-type" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nombre</td>
                                        <td>
                                            <a id="form-name" href="#" class="bt-editable" data-emptytext='' data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese el nombre"></a>
                                            <input type="hidden" id="failed-name" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class='icon-remove-sign'></i> Dato de Nombre Incorrecto. Complete e intente de nuevo!"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Primer Apellido</td>
                                        <td>
                                            <a id="form-first-lastName" href="#" class="bt-editable" data-emptytext='' data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese el Primer Apellido"></a>
                                            <input type="hidden" id="failed-first-lastName" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class='icon-remove-sign'></i> Primer Apellido Incorrecto. Complete e intente de nuevo!"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Segundo Apellido</td>
                                        <td>
                                            <a id="form-second-lastName" href="#" class="bt-editable" data-emptytext='' data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese el Segundo Apellido"></a>
                                            <input type="hidden" id="failed-second-lastName" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class='icon-remove-sign'></i> Segundo Apellido Incorrecto. Complete e intente de nuevo!"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>G&eacute;nero</td>
                                        <td>
                                            <a id="form-gender" href="#" class="bt-editable" data-emptytext='' data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese el g&eacute;nero (M: Masculino, F: Femenino)"></a>
                                            <input type="hidden" id="failed-gender" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class='icon-remove-sign'></i> Genero erroneo. Datos validos M o F. Complete e intente de nuevo!"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nacionalidad</td>
                                        <td>
                                            <a id="form-nationality" href="#" class="bt-editable" data-emptytext='' data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese la nacionalidad"></a>
                                            <input type="hidden" id="failed-nationality" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class='icon-remove-sign'></i> Formato de nacionalidad incorrecto. Complete e intente de nuevo!"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tel&eacute;fono</td>
                                        <td>
                                            <a id="form-phone1" href="#" class="bt-editable" data-emptytext='' data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese el Teléfono"></a>
                                            <input type="hidden" id="failed-phone1" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class='icon-remove-sign'></i> Formato de telefono incorrecto. Complete e intente de nuevo!"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Otro Tel&eacute;fono</td>
                                        <td>
                                            <a id="form-phone2" href="#" class="bt-editable" data-emptytext='' data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese otro Teléfono"></a>
                                            <input type="hidden" id="failed-phone2" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg= "<i class='icon-remove-sign'></i> Formato de otro telefono incorrecto. Complete e intente de nuevo!"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>
                                            <a id="form-email" href="#" class="bt-editable" data-emptytext='' data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese el email"></a>
                                            <input type="hidden" id="failed-email" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Fecha de Nacimiento</td>
                                        <td>
                                            <a id="form-age" href="#" class="bt-editable" data-emptytext='' data-type="date" data-pk="1" data-placeholder="Required" data-title="Ingrese la fecha de nacimiento"></a>
                                            <input type="hidden" id="failed-age" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Direcci&oacute;n</td>
                                        <td>
                                            <a id="form-address" href="#" class="bt-editable" data-emptytext='' data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese la dirección"></a>
                                            <input type="hidden" id="failed-address" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class='icon-remove-sign'></i> Dirección muy extensa. Complete e intente de nuevo!"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Informaci&oacute;n Adicional</td>
                                        <td>
                                            <a id="form-additionalInformation" class="bt-editable" href="#" data-emptytext='' data-type="text" data-pk="1" data-placeholder="Required" data-title="Información Adicional"></a>
                                            <input type="hidden" id="failed-additionalInformation" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class='icon-remove-sign'></i> Información adicional muy extensa. Complete e intente de nuevo!"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col_full nobottommargin">                      
                            <input type="submit" id="form-submit" value="Actualizar" class="button button-3d button-black nomargin form-control" style="display: none; text-align: center;"/>
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
                    <h4 style="text-align: center;">¿Realmente desea actualizar la información de este profesor?</h4>
                    <p>Consejos:
                    <li>Revisar que todos los campos tengan la informaci&oacute;n correcta</li>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="button" class="btn btn-primary button-black nomargin" id="form-submity" value="Actualizar"/>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="public/js/jquery.min.js" type="text/javascript"></script>
<script src="public/js/Views/updateProfessorView.js" type="text/javascript"></script>
<script src="public/js/Views/general.js" type="text/javascript"></script>

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
?>

<script src="public/js/bs-editable.js" type="text/javascript"></script>