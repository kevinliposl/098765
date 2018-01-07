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
        $.post("?controller=ClassActivity&action=selectRecordStudentClassActivity", parameters, function (data) {
            $('#form-activity').append($("<option></option>").attr("value", "-1").text("Seleccione una Actividad"));
            for (var i = 0; i < data.length; i++) {
                $('#form-activity').append($("<option></option>").attr("value", data[i].consecutive_class).text(data[i].date));//AGREGAR OPCIONES
            }
            $("#form-activity").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
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
