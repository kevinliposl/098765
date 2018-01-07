$("#form-semester").change(function () {
    if ($("#form-semester").val() === "-1") {
        SEMICOLON.widget.notifications($("#failed-form-semester"));
        return false;
    } else {
        var parameters = {
            "ID_Semester": $("#form-semester").val()
        };
        document.getElementById("form-courses").options.length = 0;

        SEMICOLON.widget.notifications($("#wait"));

        $.post("?controller=CourseSemester&action=selectAllCoursesSemester", parameters, function (data) {
            $('#form-courses').append($("<option></option>").attr("value", "-1").text("Seleccione un Curso"));
            for (var i = 0; i < data.length; i++) {
                $('#form-courses').append($("<option></option>").attr("value", data[i].initials).text(data[i].name));//AGREGAR OPCIONES
            }
            $("#form-courses").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
            SEMICOLON.widget.notifications($("#success"));
        }, "json");
    }
});

$("#form-courses").change(function () {
    if ($("#form-courses").val() === "-1" && $("#form-semester").val() === "-1") {
        SEMICOLON.widget.notifications($("#failed-form-semester"));
        $("#form-submit").css("display", "none");
        return false;
    } else {
        $("#form-submit").css("display", "block");
    }
});

function val() {
    if ($("#form-semester").val() === "-1") {
        SEMICOLON.widget.notifications($("#failed-form-semester"));
        return false;
    } else if ($("#form-courses").val() === "-1") {
        SEMICOLON.widget.notifications($("#failed-form-courses"));
        return false;
    } else {
        $('#showModal').click();
        return false;
    }
}

$("#form-submity").click(function () {

    $("#form-submity").attr('disabled', 'disabled');
    $("#form-close").attr('disabled', 'disabled');

    SEMICOLON.widget.notifications($("#wait"));

    var parameters = {
        "ID_Semester": $("#form-semester").val(),
        "initials": $("#form-courses").val()
    };

    $.post("?controller=CourseSemester&action=deleteCourse", parameters, function (data) {
        if (data.result === "1") {
            SEMICOLON.widget.notifications($("#success"));
            setTimeout("location.href = '?controller=CourseSemester&action=deleteCourse';", 1500);
        } else {
            SEMICOLON.widget.notifications($("#warning"));
            $("#form-submity").removeAttr('disabled');
            $("#form-close").removeAttr('disabled');
        }
    }, "json");
});

