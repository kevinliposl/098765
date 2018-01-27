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
        <h1>Datos Personales</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin">
                <div class="acc_content clearfix">
                    <form id="form" class="nobottommargin" onsubmit="return val();">
                        <div class="acc_content clearfix"></div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <h5 style="text-align: center;">Datos Personales</h5>
                                <colgroup>
                                    <col class="col-xs-4">
                                    <col class="col-xs-8">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>Identificaci&oacute;n</td>
                                        <td>
                                            <a id="form-id"><?php echo $vars[0]['identification']; ?></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tipo de Identificaci&oacute;n</td>
                                        <td>
                                            <a id="form-id-type"><?php echo $vars[0]['id_type']; ?></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nombre</td>
                                        <td>
                                            <a id="form-name" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el nombre"><?php echo $vars[0]['name']; ?></a>
                                            <input type="hidden" id="failed-name" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Primer Apellido</td>
                                        <td>
                                            <a id="form-first-lastName" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el Primer Apellido"><?php echo $vars[0]['first_lastname']; ?></a>
                                            <input type="hidden" id="failed-first-lastName" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Segundo Apellido</td>
                                        <td>
                                            <a id="form-second-lastName" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el Segundo Apellido"><?php echo $vars[0]['second_lastname']; ?></a>
                                            <input type="hidden" id="failed-second-lastName" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>G&eacute;nero</td>
                                        <td>
                                            <a id="form-gender" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el g&eacute;nero (M: Masculino, F: Femenino)"><?php echo $vars[0]['gender']; ?></a>
                                            <input type="hidden" id="failed-gender" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nacionalidad</td>
                                        <td>
                                            <a id="form-nationality" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese la nacionalidad"><?php echo $vars[0]['nationality']; ?></a>
                                            <input type="hidden" id="failed-nationality" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tel&eacute;fono</td>
                                        <td>
                                            <a id="form-phone1" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el Teléfono"><?php echo $vars[0]['phone']; ?></a>
                                            <input type="hidden" id="failed-phone1" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Otro Tel&eacute;fono</td>
                                        <td>
                                            <a id="form-phone2" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese otro Teléfono"><?php echo $vars[0]['cel_phone']; ?></a>
                                            <input type="hidden" id="failed-phone2" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>
                                            <a id="form-email" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el email"><?php echo $vars[0]['email']; ?></a>
                                            <input type="hidden" id="failed-email" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Fecha de Nacimiento</td>
                                        <td>
                                            <a id="form-age" href="#" class="bt-editable" data-type="date" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese la fecha de nacimiento"><?php echo $vars[0]['birthdate']; ?></a>
                                            <input type="hidden" id="failed-age" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Direcci&oacute;n</td>
                                        <td>
                                            <a id="form-address" href="#" class="bt-editable" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese la dirección"><?php echo $vars[0]['address']; ?></a>
                                            <input type="hidden" id="failed-address" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Informaci&oacute;n Adicional</td>
                                        <td>
                                            <a id="form-additionalInformation" class="bt-editable" href="#" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Información Adicional"><?php echo $vars[0]['expedient']; ?></a>
                                            <input type="hidden" id="failed-additionalInformation" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col_full nobottommargin">                      
                            <input type="submit" value="Actualizar" class="button button-3d button-black nomargin form-control" style="display: block; text-align: center;"/>
                            <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i>La operacion no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="warningEmail" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i>Formato de Correo incorrecto!" data-notify-position="bottom-full-width"/>
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
                    <h4 style="text-align: center;">¿Realmente desea actualizar su información personal?</h4>
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
<script src="public/js/Views/updateProfessorDataView.js" type="text/javascript"></script>
<script src="public/js/Views/general.js" type="text/javascript"></script>

<?php
include_once 'public/footer.php';
