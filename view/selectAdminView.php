<?php
$session = SSession::getInstance();

if (isset($session->permissions)) {
    if ($session->permissions == 'R') {
        include_once 'public/headerRoot.php';
    } else {
        header('Location:?action=notFound');
    }
} else {
    header('Location:?action=notFound');
}
?>

<section id="page-title">
    <div class="container clearfix">
        <h1>Obtener Administrador</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <form id="form" class="nobottommargin">
                <div class="col_three_fourth">
                    <label for="form-admin">Administradores:</label>
                    <select id="form-admin" class="selectpicker form-control" data-live-search="true">
                        <option value="-1" data-tokens="">Seleccione un Administrador</option>
                        <?php
                        foreach ($vars as $var) {
                            if (isset($var["identification"])) {
                                ?>
                                <option value="<?php echo $var["identification"] ?> " data-tokens="">
                                    <?php echo $var["identification"] . " | " . $var["name"] . " " . $var["first_lastname"] . " " . $var["second_lastname"]; ?>
                                </option>
                                <?php
                            }
                        }
                        ?>
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
                    <table id="datatable" class="table table-bordered table-striped table-responsive">
                        <h5 style="text-align: center;">Informaci&oacute;n del Administrador</h5>
                        <colgroup>
                            <col class="col-xs-4">
                            <col class="col-xs-8">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td>Cedula</td>
                                <td><a id="form-id-table"></a></td>
                            </tr>
                            <tr>
                                <td>Correo</td>
                                <td><a id="form-email-table"></a></td>
                            </tr>
                            <tr>
                                <td>Nombre</td>
                                <td><a id="form-name-table"></a></td>
                            </tr>
                            <tr>
                                <td>Primer Apellido</td>
                                <td><a id="form-firstLastName-table"></a></td>
                            </tr>
                            <tr>
                                <td>Segundo Apellido</td>
                                <td><a id="form-secondLastName-table"></a></td>
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
        if ($("#form-admin").val() !== "-1") {
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
                        pdf.save('Informe Administrador.pdf');
                    }, margins);
        }
    }

    function exportExcel() {
        if ($("#form-admin").val() !== "-1") {
            $("#datatable").table2excel({
                exclude: ".noExl",
                filename: $("#form-admin option:selected").text().trim(),
                fileext: ".xls",
                name: "Administrador",
                exclude_img: true,
                exclude_links: true,
                exclude_inputs: true
            });
        }
    }

    //Change Combobox
    $("#form-admin").change(function () {
        if ($("#form-admin").val() !== "-1") {
            var parameters = {
                "id": $("#form-admin").val()
            };
            SEMICOLON.widget.notifications($("#wait"));

            $.post("?controller=Admin&action=select", parameters, function (data) {
                if (data.identification) {
                    $("#form-id-table").html(data.identification);
                    $("#form-name-table").html(data.name);
                    $("#form-email-table").html(data.email);
                    $("#form-firstLastName-table").html(data.first_lastname);
                    $("#form-secondLastName-table").html(data.second_lastname);
                    SEMICOLON.widget.notifications($("#success"));
                } else {
                    $("#form-id-table").html("");
                    $("#form-name-table").html("");
                    $("#form-email-table").html("");
                    $("#form-firstLastName-table").html("");
                    $("#form-secondLastName-table").html("");
                    SEMICOLON.widget.notifications($("#warning"));
                }
            }, "json");
        }
    });

</script>

<?php
include_once 'public/footer.php';
?>

<script src="public/js/jquery.table2excel.min.js" type="text/javascript"></script>
<script src="public/js/pdf/html2pdf.js" type="text/javascript"></script>
<script src="public/js/pdf/jspdf.debug.js" type="text/javascript"></script>