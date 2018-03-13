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
    var parameters = {
        "ID_Semester": $("#form-semester").val()
    };

    $.post("?controller=Schedule&action=selectWithSchedule", parameters, function (data) {
        $('#form-courses').removeAttr('disabled');
        $('#form-courses').empty();
        $('#form-courses').append($("<option></option>").attr("value", -1).text('Seleccione un Curso'));
        for (var i = 0; i < data.length; i++) {
            $('#form-courses').append($("<option></option>").attr("value", data[i].ID).text(data[i].initials + ' | ' + data[i].name)); //AGREGAR OPCIONES
        }
        $("#form-courses").selectpicker("refresh"); ///REFRESCA SELECT PARA QUE AGARRE AGREGADOS

    }, "json");

    for (var k = 1; k <= 7; k++) {
        for (var x = 7; x <= 19; x++) {
            $("#" + days[k] + '' + x).removeClass();
            $("#" + days[k] + '' + x).text('');
        }
    }

    $.post("?controller=Schedule&action=select", parameters, function (data) {
        for (var i = 0; i < data.length; i++) {
            var temp = getRandomArbitrary(0, 3);
            for (var j = parseInt(data[i].start); j <= parseInt(data[i].end); j++) {
                $("#" + data[i].day + '' + j).addClass(colorClass[temp]);
                $("#" + data[i].day + '' + j).text(data[i].initials + ' | ' + data[i].name);
            }
        }
    }, "json");
});

$("#form-courses").change(function () {
    $('#form-hour-end').removeAttr('disabled');
    $('#form-hour-init').removeAttr('disabled');
});

$("#form-hour-init").change(function () {
    if ($("#form-hour-init").val() !== '-1' && $("#form-hour-end").val() !== '-1') {
        $('#form-days').removeAttr('disabled');
        $('#form-days').selectpicker("refresh");
    }
});

$("#form-hour-end").change(function () {
    if ($("#form-hour-init").val() !== '-1' && $("#form-hour-end").val() !== '-1') {
        $('#form-days').removeAttr('disabled');
        $('#form-days').selectpicker("refresh");
    }
});

$('#form-submit').click(function () {
    $("#form-submity").attr('disabled', 'disabled');
    $("#form-close").attr('disabled', 'disabled');
    SEMICOLON.widget.notifications($("#wait"));

    var parameters = {
        "ID": $("#form-courses").val(),
        "start": $("#form-hour-init").val(),
        "end": $("#form-hour-end").val(),
        "day": $("#form-days").val()
    };

    $.post("?controller=Schedule&action=insert", parameters, function (data) {
        if (data.result === '1') {
            var temp = getRandomArbitrary(0, 3);
            for (var j = parseInt($("#form-hour-init").val()); j <= parseInt($("#form-hour-end").val()); j++) {
                $("#" + $("#form-days").val() + j).addClass(colorClass[temp]);
                $("#" + $("#form-days").val() + j).text($("#form-courses option:selected").text().trim());
            }
            SEMICOLON.widget.notifications($("#success"));
        } else {
            SEMICOLON.widget.notifications($("#warning"));
            $("#form-submity").removeAttr('disabled');
            $("#form-close").removeAttr('disabled');
        }
    }, "json");
});