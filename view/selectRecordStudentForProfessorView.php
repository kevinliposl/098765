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
        <h1>Expedientes Academicos</h1>
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
                        <div class="table-responsive" id="personal">
                            <table class="table table-bordered table-striped">
                                <h5 style="text-align: center;">Informaci&oacute;n del Estudiante</h5>
                                <colgroup>
                                    <col class="col-xs-4">
                                    <col class="col-xs-8">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td>
                                            Identificacion
                                        </td>
                                        <td>
                                            <a id="form-identification-table"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Nombre Completo
                                        </td>
                                        <td>
                                            <a id="form-name-table"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Telefono
                                        </td>
                                        <td>
                                            <a id="form-phone-table"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Nombre del Contacto
                                        </td>
                                        <td>
                                            <a id="form-contactName-table"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Telefono del Contacto
                                        </td>
                                        <td>
                                            <a id="form-contactPhone-table"></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
                        <div class="acc_content clearfix"></div>
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
                                        <td>
                                            <a id="form-consecutive-table"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Fecha de Realizaci&oacute;n
                                        </td>
                                        <td>
                                            <a id="form-date-table"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Asistencia
                                        </td>
                                        <td>
                                            <a id="form-typeA-table"></a> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Observaci&oacute;n General
                                        </td>
                                        <td>
                                            <a id="form-observation-table"></a>
                                        </td>
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
                        <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i>La operacion no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
                        <input type="hidden" id="success" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Operaci&oacute;n exitosa, revise en breve...!" data-notify-position="bottom-full-width"/>
                        <input type="hidden" id="wait" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>
                    </form>
                    <button onclick="javascript:demoFromHTML();">PDF</button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $("#form-courses").change(function () {
        if ($("#form-courses").val() === "-1") {
            $("#failed-form-courses").attr("data-notify-msg", "<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-courses"));
            return false;
        } else {
            var parameters = {
                "appointment": $("#form-courses").val()
            };
            document.getElementById("form-student").options.length = 0;
            document.getElementById("form-activity").options.length = 0;
            $("#form-identification-table").html("");
            $("#form-name-table").html("");
            $("#form-phone-table").html("");
            $("#form-contactName-table").html("");
            $("#form-contactPhone-table").html("");
            $('#form-activity').append($("<option></option>").attr("value", "-1").text("Seleccione una Actividad"));
            $.post("?controller=ClassActivity&action=selectStudentClassActivity", parameters, function (data) {
                $('#form-student').append($("<option></option>").attr("value", "-1").text("Seleccione un Estudiante"));
                for (var i = 0; i < data.length; i++) {
                    $('#form-student').append($("<option></option>").attr("value", data[i].identification).text(data[i].name));//AGREGAR OPCIONES
                }
                $("#form-student").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
            }, "json");
        }
    });

    $("#form-student").change(function () {
        if ($("#form-courses").val() === "-1") {
            $("#failed-form-courses").attr("data-notify-msg", "<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-courses"));
            return false;
        } else if ($("#form-student").val() === "-1") {
            $("#failed-form-student").attr("data-notify-msg", "<i class=icon-remove-sign></i> Estudiante inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-student"));
            return false;
        } else {
            var parameters = {
                "appointment": $("#form-courses").val(),
                "identification": $("#form-student").val()
            };
            document.getElementById("form-activity").options.length = 0;
            var table = document.getElementById("table-contents");
            table.innerHTML = "";
            $.post("?controller=ClassActivity&action=selectRecordStudentClassActivity", parameters, function (data) {
                $('#form-activity').append($("<option></option>").attr("value", "-1").text("Seleccione una Actividad"));
                for (var i = 0; i < data.length; i++) {
                    $('#form-activity').append($("<option></option>").attr("value", data[i].consecutive_class).text(data[i].date));//AGREGAR OPCIONES
                }
                $("#form-activity").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
            }, "json");
            var parameters2 = {
                "identification": $("#form-student").val()
            };
            $.post("?controller=ClassActivity&action=selectInformationStudentClassActivity", parameters2, function (data2) {
                $("#form-identification-table").html(data2.identification);
                $("#form-name-table").html(data2.name);
                $("#form-phone-table").html(data2.phone);
                $("#form-contactName-table").html(data2.full_contact_name);
                $("#form-contactPhone-table").html(data2.telephone_contact);
            }, "json");
        }
    });

    $("#form-activity").change(function () {
        if ($("#form-courses").val() === "-1") {
            $("#failed-form-courses").attr("data-notify-msg", "<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-courses"));
            return false;
        } else if ($("#form-student").val() === "-1") {
            $("#failed-form-student").attr("data-notify-msg", "<i class=icon-remove-sign></i> Estudiante inválido. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-student"));
            return false;
        } else if ($("#form-activity").val() === "-1") {
            $("#failed-form-activity").attr("data-notify-msg", "<i class=icon-remove-sign></i> Actividad de clase inválida. Seleccione e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-form-activity"));
            return false;
        } else {
            var parameters = {
                "appointment": $("#form-courses").val(),
                "identification": $("#form-student").val(),
                "consecutive": $("#form-activity").val()
            };
            $.post("?controller=ClassActivity&action=selectClassActivity", parameters, function (data) {
                if (data.consecutive_class) {
                    $("#form-consecutive-table").html(data.consecutive_class);
                    $("#form-date-table").html(data.date);
                    if (data.assistance === "P") {
                        $("#form-typeA-table").html("Puntual");
                    } else if (data.assistance === "I") {
                        $("#form-typeA-table").html("Asuncia Injustificada");
                    } else {
                        $("#form-typeA-table").html("Ausencia Justificada");
                    }
                    $("#form-observation-table").html(data.observation);

                    var parameters2 = {
                        "appointment": $("#form-courses").val(),
                        "identification": $("#form-student").val(),
                        "consecutive": data.consecutive_class
                    };
                    $.post("?controller=ClassActivity&action=selectRecordContentClassActivity", parameters2, function (data2) {
                        var table = document.getElementById("table-contents");
                        table.innerHTML = "";
                        for (var i = 0; i < data2.length; i++) {
                            var row = table.insertRow(0);
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            cell1.innerHTML = "Contenido" + " " + (data2.length - i);
                            cell2.innerHTML = data2[i].content;
                        }
                    }, "json");
                    $("#success").attr({
                        "data-notify-type": "success",
                        "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!",
                        "data-notify-position": "bottom-full-width"
                    });
                    SEMICOLON.widget.notifications($("#success"));
                } else {
                    $("#form-consecutive-table").html("");
                    $("#form-date-table").html("");
                    $("#form-typeA-table").html("");
                    $("#form-observation-table").html("");
                    $("#warning").attr({
                        "data-notify-type": "warning",
                        "data-notify-msg": "<i class=icon-warning-sign></i> Operacion Incompleta, intente de nuevo!",
                        "data-notify-position": "bottom-full-width"
                    });
                    SEMICOLON.widget.notifications($("#warning"));
                }
            }, "json");
        }
    });

    function demoFromHTML() {
        alert('1');
        var pdf = new jsPDF('p', 'pt', 'letter');
        // source can be HTML-formatted string, or a reference
        // to an actual DOM element from which the text will be scraped.
        alert('2');
        source = $('#personal')[0];
        alert('3');
        // we support special element handlers. Register them with jQuery-style 
        // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
        // There is no support for any other type of selectors 
        // (class, of compound) at this time.
        specialElementHandlers = {
            // element with id of "bypass" - jQuery style selector
            '#bypassme': function (element, renderer) {
                // true = "handled elsewhere, bypass text extraction"
                return true
            }
        };
        margins = {
            top: 80,
            bottom: 60,
            left: 10,
            width: 700
        };
        // all coords and widths are in jsPDF instance's declared units
        // 'inches' in this case
        pdf.fromHTML(
                source, // HTML string or DOM elem ref.
                margins.left, // x coord
                margins.top, {// y coord
                    'width': margins.width, // max width of content on PDF
                    'elementHandlers': specialElementHandlers
                },
                function (dispose) {
                    // dispose: object with X, Y of the last line add to the PDF 
                    //          this allow the insertion of new lines after html
                    pdf.save('Test.pdf');
                }, margins);
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<?php
include_once 'public/footer.php';
