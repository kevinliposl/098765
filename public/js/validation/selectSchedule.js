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

//Change Combobox
$("#form-semester").change(function () {
    var parameters = {
        "ID_Semester": $("#form-semester").val()
    };

    for (var k = 1; k <= 7; k++) {
        for (var x = 7; x <= 19; x++) {
            $("#" + days[k] + '' + x).removeClass();
            $("#" + days[k] + '' + x).text('');
        }
    }

    $.post("?controller=Schedule&action=select", parameters, function (data) {
        for (var i = 0; i < data.length; i++) {
            var temp = getRandomArbitrary(0, 4);
            for (var j = parseInt(data[i].start); j <= parseInt(data[i].end); j++) {
                $("#" + data[i].day + '' + j).addClass(colorClass[temp]);
                $("#" + data[i].day + '' + j).text(data[i].initials + ' | ' + data[i].name);
            }
        }
    }, "json");
});


