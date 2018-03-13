$("#form-semester").change(function () {
    if ($("#form-semester").val() === "-1") {
        SEMICOLON.widget.notifications($("#failed-form-semester"));
        return false;
    } else {
        var parameters = {
            "ID_Semester": $("#form-semester").val()
        };
        SEMICOLON.widget.notifications($("#wait"));

        document.getElementById("form-courses").options.length = 0;
        document.getElementById("form-professors").options.length = 0;

        $('#form-professors').append($("<option></option>").attr("value", "-1").text("Seleccione el profesor"));

        $.post("?controller=CourseSemester&action=selectAllCoursesSemester", parameters, function (data) {
            $('#form-courses').append($("<option></option>").attr("value", "-1").text("Seleccione un Curso"));
            for (var i = 0; i < data.length; i++) {
                $('#form-courses').append($("<option></option>").attr("value", data[i].initials).text(data[i].name));//AGREGAR OPCIONES
            }
            $("#form-courses").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
        }, "json");
    }
});

$("#form-courses").change(function () {
    if ($("#form-semester").val() === "-1") {
        SEMICOLON.widget.notifications($("#failed-form-semester"));
        return false;
    } else if ($("#form-courses").val() === "-1") {
        SEMICOLON.widget.notifications($("#failed-form-courses"));
        return false;
    } else {
        var parameters = {
            "ID_Semester": $("#form-semester").val(),
            "initials": $("#form-courses").val()
        };
        SEMICOLON.widget.notifications($("#wait"));

        document.getElementById("form-professors").options.length = 0;
        $.post("?controller=CourseSemester&action=selectAllProfessorsCourseSemester", parameters, function (data) {
            $('#form-professors').append($("<option></option>").attr("value", "-1").text("Seleccione el profesor"));
            for (var i = 0; i < data.length; i++) {
                $('#form-professors').append($("<option></option>").attr("value", data[i].identification).text(data[i].name));//AGREGAR OPCIONES
            }
            $("#form-professors").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
        }, "json");
    }
});

$("#form-submit").click(function () {
    if ($("#form-semester").val() === "-1") {
        SEMICOLON.widget.notifications($("#failed-form-semester"));
        return false;
    } else if ($("#form-courses").val() === "-1") {
        SEMICOLON.widget.notifications($("#failed-form-courses"));
        return false;
    } else if ($("#form-professors").val() === "-1") {
        SEMICOLON.widget.notifications($("#failed-form-professors"));
        return false;
    } else {
        $('#form-submit').attr('data-target', '#myModal');
    }
});

$("#form-submity").click(function () {

    $("#form-submity").attr('disabled', 'disabled');
    $("#form-close").attr('disabled', 'disabled');

    SEMICOLON.widget.notifications($("#wait"));

    var parameters = {
        "ID_Semester": $("#form-semester").val(),
        "initials": $("#form-courses").val(),
        "identification": $("#form-professors").val()
    };


    $.post("?controller=CourseSemester&action=deleteProfessor", parameters, function (data) {
        if (data.result === "1") {
            SEMICOLON.widget.notifications($("#success"));
            setTimeout("location.href = '?controller=CourseSemester&action=deleteProfessor';", 1500);
        } else {
            SEMICOLON.widget.notifications($("#warning"));
            $("#form-submity").removeAttr('disabled');
            $("#form-close").removeAttr('disabled');
        }
    }, "json");
});
