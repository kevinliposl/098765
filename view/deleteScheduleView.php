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
        <h1>Borrar Horarios</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <form class="nobottommargin" onsubmit="return false;">
                <div class="col_one_fourth">
                    <label for="form-semester">Semestre:</label>
                    <select id="form-semester" class="selectpicker form-control" data-live-search="true">
                        <option value="-1" data-tokens="">Seleccione un Semestre</option>
                        <?php
                        foreach ($vars as $var) {
                            if (isset($var["ID"])) {
                                ?>
                                <option value="<?php echo $var["ID"] ?> " data-tokens="">
                                    <?php echo $var["year"] . " | " . $var["semester"]; ?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="col_one_fourth">
                    <label for="form-courses">Curso</label>
                    <select id="form-courses" class="selectpicker form-control" data-live-search="true" disabled="true">
                        <option value="-1" data-tokens="">Seleccione un Curso</option>
                    </select>
                </div>
                <div class="col_two_fifth">
                    <label for="form-hour">Horario</label>
                    <select id="form-hour" class="selectpicker form-control" data-live-search="true" disabled="true">
                        <option value="-1" data-tokens>Seleccione la Hora de Inicio</option>
                    </select>
                </div>
                <div class="col_full nobottommargin">
                    <input type="submit" id="form-submit" value="Eliminar horario" class="button button-3d button-black nomargin form-control"/>
                    <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i>La operacion no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
                    <input type="hidden" id="success" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Operaci&oacute;n exitosa, revise en breve...!" data-notify-position="bottom-full-width"/>
                    <input type="hidden" id="wait" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>      
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered nobottommargin table-striped" id="shedule">
                    <thead>
                        <tr>
                            <th style="width: 10%;">Horas</th>
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
</section>

<script>

    var days = {1: 'Lunes', 2: 'Martes', 3: 'Miercoles', 4: 'Jueves', 5: 'Viernes', 6: 'Sabado', 7: 'Domingo'};
    var colorClass = {0: 'info', 1: 'success', 2: 'danger', 3: 'warning'};

    function getRandomArbitrary(min, max) {
        return Math.floor(Math.random() * (max - min)) + min;
    }

    //CARGA CURSOS EN SELECT
    $("#form-semester").change(function () {
        if ($("#form-semester").val() !== "-1") {

            var parameters = {
                "ID_Semester": $("#form-semester").val()
            };
            SEMICOLON.widget.notifications($("#wait"));

            $.post("?controller=Schedule&action=select", parameters, function (data) {
                if (data[0].initials) {
                    for (var k = 1; k <= 7; k++) {
                        for (var x = 7; x <= 19; x++) {
                            $("#" + days[k] + '' + x).removeClass();
                            $("#" + days[k] + '' + x).text('');
                        }
                    }
                    for (var i = 0; i < data.length; i++) {
                        var temp = getRandomArbitrary(0, 3);
                        for (var j = parseInt(data[i].start); j <= parseInt(data[i].end); j++) {
                            $("#" + data[i].day + '' + j).addClass(colorClass[temp]);
                            $("#" + data[i].day + '' + j).text(data[i].initials + ' | ' + data[i].name);
                        }
                    }
                }
            }, "json");

            $.post("?controller=Schedule&action=selectWithSchedule", parameters, function (data) {
                if (data[0].ID) {
                    $('#form-courses').removeAttr('disabled');
                    $('#form-courses').empty();
                    $('#form-courses').append($("<option></option>").attr("value", -1).text('Seleccione un Curso'));
                    for (var i = 0; i < data.length; i++) {
                        $('#form-courses').append($("<option></option>").attr("value", data[i].ID).text(data[i].initials + ' | ' + data[i].name));
                    }
                    $("#form-courses").selectpicker("refresh");
                } else {
                    SEMICOLON.widget.notifications($("#warning"));
                }
            }, "json");

        } else {
            for (var k = 1; k <= 7; k++) {
                for (var x = 7; x <= 19; x++) {
                    $("#" + days[k] + '' + x).removeClass();
                    $("#" + days[k] + '' + x).text('');
                }
            }

            $("#form-courses").attr('disabled', 'disabled');
            $('#form-courses').empty();
            $('#form-courses').append($("<option></option>").attr("value", -1).text('Seleccione un Curso'));
            $("#form-courses").selectpicker("refresh");

            $("#form-hour").attr('disabled', 'disabled');
            $('#form-hour').empty();
            $('#form-hour').append($("<option></option>").attr("value", -1).text('Seleccione un Horario'));
            $("#form-hour").selectpicker("refresh");
            return;
        }
    });
    //CARGA HORARIOS EN SELECT

    $("#form-courses").change(function () {
        if ($("#form-courses").val() !== "-1") {

            var parameters = {
                "ID_appointment": $("#form-courses").val()
            };
            SEMICOLON.widget.notifications($("#wait"));

            $.post("?controller=Schedule&action=selectCourseSchedules", parameters, function (data) {
                if (data[0].day) {
                    $('#form-hour').removeAttr('disabled');
                    $('#form-hour').empty();
                    $('#form-hour').append($("<option></option>").attr("value", -1).text('Seleccione un Horario'));
                    for (var i = 0; i < data.length; i++) {
                        $('#form-hour').append($("<option></option>").attr("value", data[i].ID + "," + data[i].ID_schedule).text(data[i].day + ' | ' + data[i].start_time + ':00 a ' + data[i].end_time + ':50.')); //AGREGAR OPCIONES
                    }
                    $("#form-hour").selectpicker("refresh");

                } else {
                    SEMICOLON.widget.notifications($("#warning"));
                }
            }, "json");
        } else {
            $('#form-hour').empty();
            $('#form-hour').append($("<option></option>").attr("value", -1).text('Seleccione un Horario'));
            $("#form-hour").selectpicker("refresh");
        }
    });

    $('#form-submit').click(function () {
        if ($("#form-hour").val() !== "-1") {

            var temp = $("#form-hour").val();
            var arr = temp.split(",");
            var parameters = {
                "ID": arr[0],
                "ID_schedule": arr[1]
            };
            SEMICOLON.widget.notifications($("#wait"));

            $.post("?controller=Schedule&action=delete", parameters, function (data) {
                if (data.result === '1') {
                    $('#form-hour').find('option:selected').remove();
                    $("#form-hour").selectpicker("refresh");
                    SEMICOLON.widget.notifications($("#success"));
                } else {
                    SEMICOLON.widget.notifications($("#warning"));
                }
            }, "json");

            var args = {
                "ID_Semester": $("#form-semester").val()
            };

            $.post("?controller=Schedule&action=select", args, function (data) {
                for (var k = 1; k <= 7; k++) {
                    for (var x = 7; x <= 19; x++) {
                        $("#" + days[k] + '' + x).removeClass();
                        $("#" + days[k] + '' + x).text('');
                    }
                }
                if (data[0].day) {
                    for (var i = 0; i < data.length; i++) {
                        var temp = getRandomArbitrary(0, 3);
                        for (var j = parseInt(data[i].start); j <= parseInt(data[i].end); j++) {
                            $("#" + data[i].day + '' + j).addClass(colorClass[temp]);
                            $("#" + data[i].day + '' + j).text(data[i].initials + ' | ' + data[i].name);
                        }
                    }
                }
            }, "json");
        }
    });
</script>

<?php
include_once 'public/footer.php';
