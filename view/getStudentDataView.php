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
        <h1>Ver Estudiantes</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <form id="form" class="nobottommargin">
                <div class="col_three_fourth">
                    <label for="form-student">Estudiantes:</label>
                    <select id="form-student" class="selectpicker form-control" data-live-search="true">
                        <option value="-1" data-tokens="">Seleccione un Estudiante</option>
                        <?php foreach ($vars as $var) { ?>
                            <option value="<?php echo $var["identification"] ?>" data-tokens="">
                                <?php echo $var["identification"] . " | " . $var["name"] . " " . $var["first_lastname"] . " " . $var["second_lastname"]; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col_one_fifth">
                    <input type="button" onclick="javascript:exportPdf();" value="Exportar PDF" class="button button-3d button-black form-control"/>
                    <input type="button" onclick="javascript:exportExcel()" value="Exportar EXCEL" class="button button-3d button-black form-control"/>
                </div>
                <div class="col_full nobottommargin">
                    <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i>La operacion no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
                    <input type="hidden" id="success" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Operaci&oacute;n exitosa, revise en breve...!" data-notify-position="bottom-full-width"/>
                    <input type="hidden" id="wait" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>
                </div>
            </form>
            <div id="data">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table-striped">
                        <input type="hidden" id="form-old-id" name="form-old-id" value="">
                        <h5 style="text-align: center;">Informaci&oacute;n del Estudiante</h5>    
                        <colgroup>
                            <col class="col-xs-4">
                            <col class="col-xs-8">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td>Identificaci&oacute;n</td>
                                <td><a id="form-id"></a></td>
                            </tr>
                            <tr>
                                <td>Tipo de Identificaci&oacute;n</td>
                                <td><a id="form-id-type"></a></td>
                            </tr>
                            <tr>
                                <td>Nombre</td>
                                <td><a id="form-name"></a></td>
                            </tr>
                            <tr>
                                <td>Primer Apellido</td>
                                <td><a id="form-first-lastName"></a></td>
                            </tr>
                            <tr>
                                <td>Segundo Apellido</td>
                                <td><a id="form-second-lastName"></a></td>
                            </tr>
                            <tr>
                                <td>G&eacute;nero</td>
                                <td><a id="form-gender"></a></td>
                            </tr>
                            <tr>
                                <td>Nacionalidad</td>
                                <td><a id="form-nationality"></a></td>
                            </tr>
                            <tr>
                                <td>Tel&eacute;fono 1</td>
                                <td><a id="form-phone1"></a> </td>
                            </tr>
                            <tr>
                                <td>Tel&eacute;fono 2</td>
                                <td><a id="form-phone2"></a></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><a id="form-email"></a></td>
                            </tr>
                            <tr>
                                <td>Fecha de Nacimiento</td>
                                <td><a id="form-age"></a></td>
                            </tr>
                            <tr>
                                <td>Nombre del Contacto</td>
                                <td><a id="form-contact-name"></a></td>
                            </tr>
                            <tr>
                                <td>Teléfono del Contacto</td>
                                <td><a id="form-contact-phone"></a></td>
                            </tr>
                            <tr>
                                <td>Relaci&oacute;n</td>
                                <td><a id="form-relationship"></a></td>
                            </tr>
                            <tr>
                                <td>Email del Contacto</td>
                                <td><a id="form-contact-email"></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="public/js/jquery.min.js" type="text/javascript"></script>
<script src="public/js/Views/getStudentDataView.js" type="text/javascript"></script>


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

<script src="public/js/jquery.table2excel.min.js" type="text/javascript"></script>
<script src="public/js/pdf/html2pdf.js" type="text/javascript"></script>
<script src="public/js/pdf/jspdf.debug.js" type="text/javascript"></script>
