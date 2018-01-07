$("#form-student").change(function () {
    if ($("#form-student").val() !== "-1") {
        var args = {
            "identification": $("#form-student").val()
        };
        SEMICOLON.widget.notifications($("#wait"));

        document.getElementById("form-professors").options.length = 0;

        $.post("?controller=Enrollment&action=selectCourseNotStudent", args, function (data) {
            if (data.length > 0) {
                for (var i = 0; i < data.length; i++) {
                    $('#form-professors').append($("<option></option>").attr("value", data[i].ID).text("Curso: " + data[i].name + "-Profesor(a): " + data[i].Name)); //AGREGAR OPCIONES
                }
                $("#form-professors").selectpicker("refresh");
                SEMICOLON.widget.notifications($("#success"));
            } else {
                SEMICOLON.widget.notifications($("#warning"));
            }
        }, "json");
    }
});

$("#form-submit").click(function () {
    $('#form-submit').attr('data-target', '#myModal');
});

$("#form-submity").click(function () {
    $("#form-submity").attr('disabled', 'disabled');
    $("#form-close").attr('disabled', 'disabled');

    SEMICOLON.widget.notifications($("#wait"));

    var args = {
        "id-student": $("#form-student").val(),
        "id-courses": $("#form-professors").val()
    };

    $.post("?controller=Enrollment&action=insert", args, function (data) {
        if (data.result === "1") {
            SEMICOLON.widget.notifications($("#success"));
            setTimeout("location.href = '?controller=Enrollment&action=insert';", 2000);
        } else {
            SEMICOLON.widget.notifications($("#warning"));
            $("#form-submity").removeAttr('disabled');
            $("#form-close").removeAttr('disabled');
        }
    }, "json");
});
