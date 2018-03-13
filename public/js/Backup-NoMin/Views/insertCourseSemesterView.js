$("#form-semester").change(function () {
    if ($("#form-semester").val() === "-1") {
        $("#failed-form-semester").attr("data-notify-msg", "<i class=icon-remove-sign></i> Semestre inválido. Seleccione e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-form-semester"));
        return false;
    } else {
        var parameters = {
            "ID_Semester": $("#form-semester").val()
        };

        document.getElementById("form-courses").options.length = 0;
        document.getElementById("form-professors").options.length = 0;
        $('#form-professors').append($("<option></option>").attr("value", "-1").text("Seleccione los profesores"));
        $.post("?controller=Course&action=selectAll", parameters, function (data) {
            $('#form-courses').append($("<option></option>").attr("value", "-1").text("Seleccione un Curso"));
            for (var i = 0; i < data.length; i++) {
                $('#form-courses').append($("<option></option>").attr("value", data[i].initials).text(data[i].name));//AGREGAR OPCIONES
            }
            $("#form-courses").selectpicker("refresh");
        }, "json");
    }
});

$("#form-courses").change(function () {
    if ($("#form-semester").val() === "-1") {
        $("#failed-form-semester").attr("data-notify-msg", "<i class=icon-remove-sign></i> Semestre inválido. Seleccione e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-form-semester"));
        return false;
    } else if ($("#form-courses").val() === "-1") {
        $("#failed-form-courses").attr("data-notify-msg", "<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-form-courses"));
        return false;
    } else {
        var parameters = {
            "ID_Semester": $("#form-semester").val(),
            "initials": $("#form-courses").val()
        };

        document.getElementById("form-professors").options.length = 0;
        $.post("?controller=CourseSemester&action=selectNotAllProfessorsCourseSemester", parameters, function (data) {
            for (var i = 0; i < data.length; i++) {
                $('#form-professors').append($("<option></option>").attr("value", data[i].identification).text(data[i].name));//AGREGAR OPCIONES
            }
            $("#form-professors").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
        }, "json");
    }
});

$("#form-submit").click(function () {

    var sel2 = document.getElementById("form-professors");
    var dat2 = 0;
    for (var i = 0; i < sel2.length; i++) {
        if (sel2.options[i].selected) {
            dat2 += 1;
        }
    }
    if ($("#form-semester").val() === "-1") {
        $("#failed-form-semester").attr("data-notify-msg", "<i class=icon-remove-sign></i> Semestre inválido. Seleccione e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-form-semester"));
        return false;
    } else if ($("#form-courses").val() === "-1") {
        $("#failed-form-courses").attr("data-notify-msg", "<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-form-courses"));
        return false;
    } else if (dat2 < 1) {
        $("#failed-form-professors").attr("data-notify-msg", "<i class=icon-remove-sign></i> Profesor inválido. Seleccione e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-form-professors"));
        return false;
    } else {
        $('#form-submit').attr('data-target', '#myModal');
    }
});

$("#form-submity").click(function () {
    var parameters = {
        "ID_Semester": $("#form-semester").val(),
        "initials": $("#form-courses").val(),
        "professors": $("#form-professors").val()
    };

    SEMICOLON.widget.notifications($("#wait"));

    $.post("?controller=CourseSemester&action=insert", parameters, function (data) {
        if (data.result === "1") {
            SEMICOLON.widget.notifications($("#success"));
            setTimeout("location.href = '?controller=CourseSemester&action=insert';", 2000);
        } else {
            SEMICOLON.widget.notifications($("#warning"));
        }
    }, "json");
});