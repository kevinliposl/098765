$("#form-student").change(function () {
    var parameters = {
        "identification": $("#form-student").val()
    };
    document.getElementById("form-professors").options.length = 0;

    SEMICOLON.widget.notifications($("#wait"));

    $.post("?controller=Enrollment&action=selectCourses", parameters, function (data) {
        for (var i = 0; i < data.length; i++) {
            $('#form-professors').append($("<option></option>").attr("value", data[i].ID).text("Curso: " + data[i].name + "-Profesor(a): " + data[i].Name));//AGREGAR OPCIONES
        }
        $("#form-professors").selectpicker("refresh");

    }, "json");
});

$("#form-submit").click(function () {
    $('#form-submit').attr('data-target', '#myModal');
});

$("#form-submity").click(function () {

    $("#form-submity").attr('disabled', 'disabled');
    $("#form-close").attr('disabled', 'disabled');

    SEMICOLON.widget.notifications($("#wait"));

    var parameters = {
        "ID": $("#form-professors").val()
    };
    $.post("?controller=Enrollment&action=delete", parameters, function (data) {
        if (data.result === "1") {
            SEMICOLON.widget.notifications($("#success"));
            setTimeout("location.href = '?controller=Enrollment&action=delete';", 1500);
        } else {
            SEMICOLON.widget.notifications($("#warning"));
            $("#form-submity").removeAttr('disabled');
            $("#form-close").removeAttr('disabled');
        }
    }, "json");
});