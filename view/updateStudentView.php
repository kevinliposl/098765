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
        <h1>Actualizar Estudiante</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin">
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
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" style="clear: both">
                                <input type="hidden" id="form-old-id" name="form-old-id" value="">
                                <h5 style="text-align: center;">Informaci&oacute;n del Estudiante</h5>
                                <colgroup>
                                    <col class="col-xs-4">
                                    <col class="col-xs-8">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>Identificaci&oacute;n</td>
                                        <td>
                                            <a id="form-id" class="bt-editable" href="#" data-emptytext='' data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese la identificación"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tipo de Identificaci&oacute;n</td>
                                        <td>
                                            <a id="form-id-type" class="bt-editable" href="#" data-emptytext='' data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese el tipo de identificación"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nombre</td>
                                        <td>
                                            <a id="form-name" href="#" class="bt-editable" data-emptytext='' data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese el nombre"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Primer Apellido</td>
                                        <td>
                                            <a id="form-first-lastName" href="#" class="bt-editable" data-emptytext='' data-type="text" data-pk="1"  data-placeholder="Required" data-title="Ingrese el Primer Apellido"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Segundo Apellido</td>
                                        <td>
                                            <a id="form-second-lastName" href="#" class="bt-editable" data-emptytext='' data-type="text" data-pk="1"  data-placeholder="Required" data-title="Ingrese el Segundo Apellido"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>G&eacute;nero</td>
                                        <td>
                                            <a id="form-gender" href="#" class="bt-group" data-emptytext='' data-type="select" data-pk="1" data-value="" data-title="Ingresar Sexo"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nacionalidad</td>
                                        <td>
                                            <a id="form-nationality" href="#" class="bt-editable" data-emptytext='' data-type="text" data-pk="1"  data-placeholder="Required" data-title="Ingrese la nacionalidad"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tel&eacute;fono 1</td>
                                        <td>
                                            <a id="form-phone1" href="#" class="bt-editable" data-emptytext='' data-type="text" data-pk="1"  data-placeholder="Required" data-title="Ingrese el Teléfono"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tel&eacute;fono 2</td>
                                        <td>
                                            <a id="form-phone2" href="#" class="bt-editable" data-emptytext='' data-type="text" data-pk="1"  data-placeholder="Required" data-title="Ingrese otro Teléfono"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>
                                            <a id="form-email" href="#" class="bt-editable" data-emptytext='' data-type="email" data-pk="1"  data-placeholder="Required" data-title="Ingrese el email"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Fecha de Nacimiento</td>
                                        <td>
                                            <a id="form-age" href="#" class="bt-editable" data-emptytext='' data-type="combodate" data-format="YYYY-MM-DD" data-viewformat="YYYY-MM-DD" data-template="YYYY / MMM / D" data-pk="1"  data-title="Ingrese la fecha de nacimiento"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nombre del Contacto</td>
                                        <td>
                                            <a id="form-contact-name" href="#" class="bt-editable" data-emptytext='' data-type="text" data-pk="1" data-title="Ingrese el nombre completo del contacto"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tel&eacute;fono del Contacto</td>
                                        <td>
                                            <a id="form-contact-phone" href="#" class="bt-editable" data-emptytext='' data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese el teléfono"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Relaci&oacute;n</td>
                                        <td>
                                            <a id="form-relationship" href="#" class="bt-editable" data-emptytext='' data-type="text" data-pk="1" data-placeholder="Required" data-title="Ingrese la relación con el estudiante"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email del Contacto</td>
                                        <td>
                                            <a id="form-contact-email" href="#" class="bt-editable" data-emptytext='' data-type="email" data-pk="1" data-placeholder="Required" data-title="Ingrese el email"></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a id="form-submit" data-toggle="modal" class="button button-3d button-black nomargin" data-target="#myModal" id="next" data-target="" style="display: none; text-align: center;">Actualizar</a>
                        </div>
                        <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i>La operacion no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
                        <input type="hidden" id="success" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Operaci&oacute;n exitosa, revise en breve...!" data-notify-position="bottom-full-width"/>
                        <input type="hidden" id="warningEmail" data-notify-type="warning" data-notify-msg="<i class='icon-ok-sign'></i> Formato de correos incorrectos!" data-notify-position="bottom-full-width"/>
                        <input type="hidden" id="wait" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>
                    </form>
                </div>
            </div>
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
                    <h4 style="text-align: center;">¿Realmente desea actualizar los datos de este Estudiante?</h4>
                    <p>Consejos:
                    <li>Verificar bien, si es el estudiante que realmente desea actualizar</li>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="form-close">Cerrar</button>
                    <input type="button" class="btn btn-primary" button-black nomargin id="form-submity" value="Actualizar"/>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="public/js/Views/updateStudentView.js" type="text/javascript"></script>
<script src="public/js/Views/general.js" type="text/javascript"></script>

<?php
include_once 'public/footer.php';


