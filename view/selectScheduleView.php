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
        <h1>Horarios</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <form class="nobottommargin" onsubmit="return false;">
                <div class="col_three_fourth">
                    <label for="form-semester">Semestre:</label>
                    <select id="form-semester" class="selectpicker form-control" data-live-search="true">
                        <option value="-1" data-tokens="">Seleccione un Semestre</option>
                        <?php
                        foreach ($vars as $var) {
                            if (isset($var["ID"])) {
                                ?>
                                <option value="<?php echo $var["ID"] ?> " data-tokens="">
                                    <?php
                                    echo "Año " . $var["year"] . " | Semestre ";
                                    echo $var["semester"] == 1 ? 'I' : 'II';
                                    ?>
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
                    <table id="datatable" class="table table-bordered nobottommargin table-striped">
                        <thead>
                            <tr>
                                <th>Horas</th>
                                <th>(L) Lunes</th>
                                <th>(K) Martes</th>
                                <th>(M) Miercoles</th>
                                <th>(J) Jueves</th>
                                <th>(V) Viernes</th>
                                <th>(S) Sabado</th>
                                <th>(D) Domingo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>07:00 - 07:50</td>
                                <td id="Lunes7"></td>
                                <td id="Martes7"></td>
                                <td id="Miercoles7"></td>
                                <td id="Jueves7"></td>
                                <td id="Viernes7"></td>
                                <td id="Sabado7"></td>
                                <td id="Domingo7"></td>
                            </tr>
                            <tr>
                                <td>08:00 - 08:50</td>
                                <td id="Lunes8"></td>
                                <td id="Martes8"></td>
                                <td id="Miercoles8"></td>
                                <td id="Jueves8"></td>
                                <td id="Viernes8"></td>
                                <td id="Sabado8"></td>
                                <td id="Domingo8"></td>
                            </tr>
                            <tr>
                                <td>09:00 - 09:50</td>
                                <td id="Lunes9"></td>
                                <td id="Martes9"></td>
                                <td id="Miercoles9"></td>
                                <td id="Jueves9"></td>
                                <td id="Viernes9"></td>
                                <td id="Sabado9"></td>
                                <td id="Domingo9"></td>
                            </tr>
                            <tr>
                                <td>10:00 - 10:50</td>
                                <td id="Lunes10"></td>
                                <td id="Martes10"></td>
                                <td id="Miercoles10"></td>
                                <td id="Jueves10"></td>
                                <td id="Viernes10"></td>
                                <td id="Sabado10"></td>
                                <td id="Domingo10"></td>
                            </tr>
                            <tr>
                                <td>11:00 - 11:50</td>
                                <td id="Lunes11"></td>
                                <td id="Martes11"></td>
                                <td id="Miercoles11"></td>
                                <td id="Jueves11"></td>
                                <td id="Viernes11"></td>
                                <td id="Sabado11"></td>
                                <td id="Domingo11"></td>
                            </tr>
                            <tr>
                                <td>12:00 - 12:50</td>
                                <td id="Lunes12"></td>
                                <td id="Martes12"></td>
                                <td id="Miercoles12"></td>
                                <td id="Jueves12"></td>
                                <td id="Viernes12"></td>
                                <td id="Sabado12"></td>
                                <td id="Domingo12"></td>
                            </tr>
                            <tr>
                                <td>13:00 - 13:50</td>
                                <td id="Lunes13"></td>
                                <td id="Martes13"></td>
                                <td id="Miercoles13"></td>
                                <td id="Jueves13"></td>
                                <td id="Viernes13"></td>
                                <td id="Sabado13"></td>
                                <td id="Domingo13"></td>
                            </tr>
                            <tr>
                                <td>14:00 - 14:50</td>
                                <td id="Lunes14"></td>
                                <td id="Martes14"></td>
                                <td id="Miercoles14"></td>
                                <td id="Jueves14"></td>
                                <td id="Viernes14"></td>
                                <td id="Sabado14"></td>
                                <td id="Domingo14"></td>
                            </tr>
                            <tr>
                                <td>15:00 - 15:50</td>
                                <td id="Lunes15"></td>
                                <td id="Martes15"></td>
                                <td id="Miercoles15"></td>
                                <td id="Jueves15"></td>
                                <td id="Viernes15"></td>
                                <td id="Sabado15"></td>
                                <td id="Domingo15"></td>
                            </tr>
                            <tr>
                                <td>16:00 - 16:50</td>
                                <td id="Lunes16"></td>
                                <td id="Martes16"></td>
                                <td id="Miercoles16"></td>
                                <td id="Jueves16"></td>
                                <td id="Viernes16"></td>
                                <td id="Sabado16"></td>
                                <td id="Domingo16"></td>
                            </tr>
                            <tr>
                                <td>17:00 - 17:50</td>
                                <td id="Lunes17"></td>
                                <td id="Martes17"></td>
                                <td id="Miercoles17"></td>
                                <td id="Jueves17"></td>
                                <td id="Viernes17"></td>
                                <td id="Sabado17"></td>
                                <td id="Domingo17"></td>
                            </tr>
                            <tr>
                                <td>18:00 - 18:50</td>
                                <td id="Lunes18"></td>
                                <td id="Martes18"></td>
                                <td id="Miercoles18"></td>
                                <td id="Jueves18"></td>
                                <td id="Viernes18"></td>
                                <td id="Sabado18"></td>
                                <td id="Domingo18"></td>
                            </tr>
                            <tr>
                                <td>19:00 - 19:50</td>
                                <td id="Lunes19"></td>
                                <td id="Martes19"></td>
                                <td id="Miercoles19"></td>
                                <td id="Jueves19"></td>
                                <td id="Viernes19"></td>
                                <td id="Sabado19"></td>
                                <td id="Domingo19"></td>
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
        var pdf = new jsPDF('p', 'pt', 'letter');
        source = $('#data').get(0);
        specialElementHandlers = {
            '#bypassme': function (element, renderer) {
                return true;
            }
        };
        margins = {
            top: 40,
            bottom: 20,
            left: 40,
            width: 700
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
        if ($("#form-semester").val() !== "-1") {
            $("#datatable").table2excel({
                exclude: ".noExl",
                filename: $("#form-semester option:selected").text().trim(),
                fileext: ".xls",
                name: "Horario",
                exclude_img: true,
                exclude_links: true,
                exclude_inputs: true
            });
        }
    }
</script>

<script>

    var days = {
        1: 'Lunes',
        2: 'Martes',
        3: 'Miercoles',
        4: 'Jueves',
        5: 'Viernes',
        6: 'Sabado',
        7: 'Domingo'
    };
    var colorClass = {
        0: 'info',
        1: 'success',
        2: 'danger',
        3: 'warning'
    };
    function getRandomArbitrary(min, max) {
        return Math.floor(Math.random() * (max - min)) + min;
    }

    $("#form-semester").change(function () {
        if ($("#form-semester").val() !== "") {

            var parameters = {
                "ID_Semester": $("#form-semester").val()
            };
            SEMICOLON.widget.notifications($("#wait"));
            $.post("?controller=Schedule&action=select", parameters, function (data) {
                for (var k = 1; k <= 7; k++) {
                    for (var x = 7; x <= 19; x++) {
                        $("#" + days[k] + '' + x).removeClass();
                        $("#" + days[k] + '' + x).text('');
                    }
                }
                for (var i = 0; i < data.length; i++) {
                    var temp = getRandomArbitrary(0, 4);
                    for (var j = parseInt(data[i].start); j <= parseInt(data[i].end); j++) {
                        $("#" + data[i].day + '' + j).addClass(colorClass[temp]);
                        $("#" + data[i].day + '' + j).text(data[i].initials + ' | ' + data[i].name);
                    }
                }
            }, "json");
        } else {
            for (var k = 1; k <= 7; k++) {
                for (var x = 7; x <= 19; x++) {
                    $("#" + days[k] + '' + x).removeClass();
                    $("#" + days[k] + '' + x).text('');
                }
            }
        }
    });</script>

<?php
include_once 'public/footer.php';
?>

<script src="public/js/jquery.table2excel.min.js" type="text/javascript"></script>


<script src="public/js/pdf/html2pdf.js" type="text/javascript"></script>
<script src="public/js/pdf/jspdf.debug.js" type="text/javascript"></script>
<script src="public/js/pdf/from_html.js" type="text/javascript"></script>