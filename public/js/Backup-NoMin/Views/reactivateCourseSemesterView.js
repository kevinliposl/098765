$("#form-semester").change(function () {
    if ($("#form-semester").val() === "-1") {
        SEMICOLON.widget.notifications($("#failed-form-semester"));
    } else {
        var parameters = {
            "ID_Semester": $("#form-semester").val()
        };

        SEMICOLON.widget.notifications($("#wait-course"));
        $('#form-course-course').empty();

        $.post("?controller=Course&action=selectAllCourseDeleted", parameters, function (data) {
            $('#form-course-course').append($("<option></option>").attr("value", "-1").text("Seleccione un Curso"));
            for (var i = 0; i < data.length; i++) {
                $('#form-course-course').append($("<option></option>").attr("value", data[i].initials).text(data[i].name));//AGREGAR OPCIONES
            }
            $("#form-course-course").selectpicker("refresh");

            SEMICOLON.widget.notifications($("#success-course"));
        }, "json");
    }
});

$("#form-submit-course").click(function () {
    var sel2 = document.getElementById("form-professors");
    var dat2 = 0;
    for (var i = 0; i < sel2.length; i++) {
        if (sel2.options[i].selected) {
            dat2 += 1;
        }
    }

    if ($("#form-semester").val() === "-1") {
        SEMICOLON.widget.notifications($("#failed-form-semester"));
        return false;
    } else if ($("#form-course-course").val() === "-1") {
        SEMICOLON.widget.notifications($("#failed-form-courses"));
        return false;
    } else {
        $('#form-submit-course').attr('data-target', '#myModal-course');
    }
});

$("#form-submity-course").click(function () {
    var parameters = {
        "ID_Semester": $("#form-semester").val(),
        "initials": $("#form-course-course").val()
    };
    SEMICOLON.widget.notifications($("#wait-course"));

    $.post("?controller=CourseSemester&action=reactivare", parameters, function (data) {
        if (data.result === "1") {
            SEMICOLON.widget.notifications($("#success-course"));
            setTimeout("location.href = '?controller=CourseSemester&action=reactivare';", 2000);
        } else {
            SEMICOLON.widget.notifications($("#warning-course"));
        }
    }, "json");
});

$("#form-course-professor").change(function () {
    if ($("#form-course-professor").val() === "-1") {
        SEMICOLON.widget.notifications($("#failed-form-courses"));
        return false;
    } else {
        var parameters = {
            "id": $("#form-course-professor").val()
        };

        SEMICOLON.widget.notifications($("#wait-professor"));
        $("#form-professors").empty();

        $.post("?controller=CourseSemester&action=selectNotAllProfessorsWithOutApp", parameters, function (data) {
            for (var i = 0; i < data.length; i++) {
                $('#form-professors').append($("<option></option>").attr("value", data[i].identification).text(data[i].name + ' ' + data[i].first_lastname + ' ' + data[i].second_lastname));//AGREGAR OPCIONES
            }
            $("#form-professors").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
            SEMICOLON.widget.notifications($("#success-professor"));
        }, "json");
    }
});

$("#form-submit-professor").click(function () {

    var sel2 = document.getElementById("form-professors");
    var dat2 = 0;
    for (var i = 0; i < sel2.length; i++) {
        if (sel2.options[i].selected) {
            dat2 += 1;
        }
    }

    if ($("#form-course-professor").val() === "-1") {
        SEMICOLON.widget.notifications($("#failed-form-courses-professor"));
        return false;
    } else if (dat2 < 1) {
        SEMICOLON.widget.notifications($("#failed-form-professors"));
        return false;
    } else {
        $('#form-submit-professor').attr('data-target', '#myModal-professor');
    }
});

$("#form-submity-professor").click(function () {
    var parameters = {
        "id_course_semester": $("#form-course-professor").val(),
        "professor": $("#form-professors").val()
    };
    alert(JSON.stringify(parameters));

    SEMICOLON.widget.notifications($("#wait-professor"));

    $.post("?controller=CourseSemester&action=reactivare", parameters, function (data) {
        if (data.result === "1") {
            SEMICOLON.widget.notifications($("#success-professor"));
            setTimeout("location.href = '?controller=CourseSemester&action=reactivare';", 2000);
        } else {
            SEMICOLON.widget.notifications($("#warning-professor"));
        }
    }, "json");
});