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
        var Table = document.getElementById("table-professor");
        Table.innerHTML = "";
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
        var table = document.getElementById("table-professor");
        table.innerHTML = "";
        $.post("?controller=CourseSemester&action=selectAllProfessorsCourseSemester", parameters, function (data) {
            for (var i = 0; i < data.length; i++) {
                var row = table.insertRow(0);
                var cell1 = row.insertCell(0);
                cell1.innerHTML = data[i].name;
            }
        }, "json");
    }
});