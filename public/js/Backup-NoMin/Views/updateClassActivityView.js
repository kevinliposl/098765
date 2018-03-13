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
        document.getElementById("form-addContent").options.length = 0;
        $('#form-addContent').append($("<option></option>").attr("value", "-1").text("Seleccione un Contenido"));
        document.getElementById("form-backup").options.length = 0;
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
        document.getElementById("form-addContent").options.length = 0;
        $('#form-addContent').append($("<option></option>").attr("value", "-1").text("Seleccione un Contenido"));
        document.getElementById("form-backup").options.length = 0;
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
        $("#failed-form-activity").attr("data-notify-msg", "<i class=icon-remove-sign></i> Estudiante inválido. Seleccione e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-form-activity"));
        return false;
    } else {
        var parameters = {
            "appointment": $("#form-courses").val(),
            "identification": $("#form-student").val(),
            "consecutive": $("#form-activity").val()
        };
        document.getElementById("form-addContent").options.length = 0;
        document.getElementById("form-backup").options.length = 0;
        $.post("?controller=ClassActivity&action=selectClassActivity", parameters, function (data) {
            document.getElementById("form-consecutive").value = data.consecutive_class;
            document.getElementById("form-date").value = data.date;
            if (data.assistance === "P") {
                $("#radio_1").attr('checked', 'checked');
            } else if (data.assistance === "I") {
                $("#radio_2").attr('checked', 'checked');
            } else {
                $("#radio_1").attr('checked', 'checked');
            }
            document.getElementById("form-observation").value = data.observation;
            var parameters2 = {
                "appointment": $("#form-courses").val(),
                "identification": $("#form-student").val(),
                "consecutive": data.consecutive_class
            };
            $.post("?controller=ClassActivity&action=selectRecordContentClassActivity", parameters2, function (data2) {
                $('#form-addContent').append($("<option></option>").attr("value", "-1").text("Seleccione un Contenido"));
                for (var i = 0; i < data2.length; i++) {
                    $('#form-addContent').append($("<option></option>").attr("value", data2[i].ID).text(data2[i].content));//AGREGAR OPCIONES
                }
                $("#form-addContent").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
            }, "json");
        }, "json");
    }
});

$("#form-save").click(function () {
    var content;
    content = $("#form-content").val().trim();
    if (!isNaN(content) || content.length < 4 || content > 255) {
        $("#failed-content").attr("data-notify-msg", "<i class=icon-remove-sign></i> Inicial de curso Incorrecta. Complete e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-content"));
    } else {
        $('#form-addContent').append($("<option></option>").attr("value", content).text(content));//AGREGAR OPCIONES
        $("#form-addContent").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS               
    }
});

$("#form-delete").click(function () {
    if ($("#form-addContent").val() === "-1") {
        $("#failed-form-addContent").attr("data-notify-msg", "<i class=icon-remove-sign></i> Estudiante inválido. Seleccione e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-form-addContent"));
        return false;
    } else {
        $('#form-backup').append($("<option></option>").attr("value", $("#form-addContent").val()).text($("#form-addContent").val()));//AGREGAR OPCIONES
        $("#form-backup").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
        var sel = document.getElementById("form-addContent");
        sel.remove(sel.selectedIndex);
        $("#form-addContent").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS 
    }
});

$("#form-submity").click(function () {
    var content;
    content = $("#form-observation").val().trim();

    var sel = document.getElementById("form-addContent");
    var dat = "";
    var counter = 0;
    for (var i = 0; i < sel.length; i++) {
        var opt = sel[i];
        if (i === sel.length - 1) {
            if (isNaN(opt.value)) {
                dat += opt.value;
                counter += 1;
            }
        } else {
            if (isNaN(opt.value)) {
                dat += opt.value + ",";
                counter += 1;
            }
        }
    }

    var sel2 = document.getElementById("form-backup");
    var dat2 = "";
    for (var i = 0; i < sel2.length; i++) {
        var opt2 = sel2[i];
        if (i === sel2.length - 1) {
            dat2 += opt2.value;
        } else {
            dat2 += opt2.value + ",";
        }
    }

    if ($("#form-courses").val() === "-1") {
        $("#failed-form-courses").attr("data-notify-msg", "<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-form-courses"));
        return false;
    } else if ($("#form-student").val() === "-1") {
        $("#failed-form-student").attr("data-notify-msg", "<i class=icon-remove-sign></i> Estudiante inválido. Seleccione e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-form-student"));
        return false;
    } else if (!isNaN(content) || content.length < 4 || content.length > 255) {
        $("#failed-observation").attr("data-notify-msg", "<i class=icon-remove-sign></i> Inicial de curso Incorrecta. Complete e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-observation"));
        return false;
    } else {
        var parameters = {
            "appointment": $("#form-courses").val(),
            "student": $("#form-student").val(),
            "consecutive": $("#form-consecutive").val(),
            "date": $("#form-date").val().trim(),
            "typeA": $("input:radio[name='form-typeA']:checked").val().trim(),
            "contentsNew": dat,
            "countNew": counter,
            "contentsDelete": dat2,
            "countDelete": sel2.length,
            "observation": $("#form-observation").val()
        };
        $.post("?controller=ClassActivity&action=update", parameters, function (data) {
            if (data.result === "1") {
                $("#success").attr({
                    "data-notify-type": "success",
                    "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!",
                    "data-notify-position": "bottom-full-width"
                });
                SEMICOLON.widget.notifications($("#success"));
                setTimeout("location.href = '?controller=ClassActivity&action=update';", 2000);
            } else {
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