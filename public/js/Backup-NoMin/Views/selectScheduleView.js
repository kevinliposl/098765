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
});