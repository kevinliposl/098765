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
        <h1>Ver Profesores</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <form class="nobottommargin" onsubmit="return false;">
                <div class="col_three_fourth">
                    <label for="form-professor">Profesores:</label>
                    <select id="form-professor" class="selectpicker form-control" data-live-search="true">
                        <option value="-1" data-tokens="">Seleccione un Profesor</option>
                        <?php foreach ($vars as $var) { ?>
                            <option value="<?php echo $var["identification"] ?>" data-tokens="">
                                <?php echo $var["Name"] ?></option>
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
                        <h5 style="text-align: center;">Informaci&oacute;n del Profesor</h5>
                        <colgroup>
                            <col class="col-xs-4">
                            <col class="col-xs-8">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td>Identificaci&oacute;n</td>
                                <td>
                                    <a id="form-id"></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Tipo de Identificaci&oacute;n</td>
                                <td>
                                    <a id="form-id-type"></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Nombre</td>
                                <td>
                                    <a id="form-name"></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Primer Apellido</td>
                                <td>
                                    <a id="form-first-lastName"></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Segundo Apellido</td>
                                <td>
                                    <a id="form-second-lastName"></a>
                                </td>
                            </tr>
                            <tr>
                                <td>G&eacute;nero</td>
                                <td>
                                    <a id="form-gender"></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Nacionalidad</td>
                                <td>
                                    <a id="form-nationality"></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Tel&eacute;fono</td>
                                <td>
                                    <a id="form-phone1"></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Otro Tel&eacute;fono</td>
                                <td>
                                    <a id="form-phone2"></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <a id="form-email"></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Fecha de Nacimiento</td>
                                <td>
                                    <a id="form-age"></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Direcci&oacute;n</td>
                                <td>
                                    <a id="form-address"></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Informaci&oacute;n Adicional</td>
                                <td>
                                    <a id="form-additionalInformation"></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function exportPdf() {
        var pdf = new jsPDF('l', 'pt', 'letter');
        source = $('#data').get(0);

        specialElementHandlers = {
            '#bypassme': function (element, renderer) {
                return true;
            }
        };

        margins = {
            top: 40,
            bottom: 20,
            left: 10,
            width: "100%"
        };

        pdf.fromHTML(
                source,
                margins.left,
                margins.top, {
                    'width': margins.width,
                    'elementHandlers': specialElementHandlers
                },
                function (dispose) {
                    pdf.save('Test.pdf');
                }, margins);
    }
</script>

<script>
    function exportExcel() {
        if ($("#form-professor").val() !== "-1") {
            $("#datatable").table2excel({
                exclude: ".noExl",
                filename: $("#form-professor option:selected").text().trim(),
                fileext: ".xls",
                name: "Profesor",
                exclude_img: true,
                exclude_links: true,
                exclude_inputs: true
            });
        }
    }
</script>

<script>

    //Change Combobox
    $("#form-professor").change(function () {
        if ($("#form-professor").val() !== "-1") {
            var parameters = {
                "id": $("#form-professor").val()
            };

            SEMICOLON.widget.notifications($("#wait"));

            $.post("?controller=Professor&action=select", parameters, function (data) {
                if (data.identification) {
                    $("#form-id").html(data.identification);
                    $("#form-id-type").html(data.id_type);
                    $("#form-name").html(data.name);
                    $("#form-first-lastName").html(data.first_lastname);
                    $("#form-second-lastName").html(data.second_lastname);
                    $("#form-phone1").html(data.phone);
                    $("#form-phone2").html(data.cel_phone);
                    $("#form-email").html(data.email);
                    $("#form-gender").html(data.gender);
                    $("#form-nationality").html(data.nationality);
                    $("#form-age").html(data.birthdate);
                    $("#form-address").html(data.address);
                    $("#form-additionalInformation").html(data.expedient);

                    SEMICOLON.widget.notifications($("#success"));
                } else {
                    $("#form-id").html("");
                    $("#form-id-type").html("");
                    $("#form-name").html("");
                    $("#form-first-lastName").html("");
                    $("#form-second-lastName").html("");
                    $("#form-phone1").html("");
                    $("#form-phone2").html("");
                    $("#form-email").html("");
                    $("#form-gender").html("");
                    $("#form-nationality").html("");
                    $("#form-age").html("");
                    $("#form-address").html("");
                    $("#form-additionalInformation").html("");
                }
            }, "json");
        } else {
            $("#form-id").html("");
            $("#form-id-type").html("");
            $("#form-name").html("");
            $("#form-first-lastName").html("");
            $("#form-second-lastName").html("");
            $("#form-phone1").html("");
            $("#form-phone2").html("");
            $("#form-email").html("");
            $("#form-gender").html("");
            $("#form-nationality").html("");
            $("#form-age").html("");
            $("#form-address").html("");
            $("#form-additionalInformation").html("");
        }
    });
</script>

<?php
include_once 'public/footer.php';
?>

<script src="public/js/jquery.table2excel.min.js" type="text/javascript"></script>


<script src="public/js/pdf/html2pdf.js" type="text/javascript"></script>
<script src="public/js/pdf/jspdf.debug.js" type="text/javascript"></script>