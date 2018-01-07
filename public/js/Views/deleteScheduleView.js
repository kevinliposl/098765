var days = {1: 'Lunes', 2: 'Martes', 3: 'Miercoles', 4: 'Jueves', 5: 'Viernes', 6: 'Sabado', 7: 'Domingo'};
var colorClass = {0: 'info', 1: 'success', 2: 'danger', 3: 'warning'};

function getRandomArbitrary(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}

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

