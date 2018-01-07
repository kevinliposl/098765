var totalRowNumber = 1;

function appendRow(text) {
    var tbl = document.getElementById('bodyTable'), // table reference
            row = tbl.insertRow(tbl.rows.length);
    createCell(row.insertCell(0), tbl.rows.length, text, 'row');
    createCell(row.insertCell(1), tbl.rows.length, "", 'row');
    row.id = totalRowNumber;
    totalRowNumber = totalRowNumber + 1;
}

function createCell(cell, len, text, style) {
    if (text !== "") {
        var a = document.createElement('a');
        a.setAttribute('id', "form-id-table-" + len);
        a.setAttribute('class', "bt-editable");
        a.setAttribute('href', "#form-addContent");
        a.setAttribute('data-type', "text");
        a.setAttribute('data-pk', "1");
        a.setAttribute('data-placeholder', "Required");
        a.setAttribute('data-title', " Actualización de la Actividad");
        a.innerHTML = text;
        cell.appendChild(a);
    } else {
        var a = document.createElement('a');
        a.setAttribute('class', "button button-mini button-circle button-red");
        a.setAttribute('style', "display : block; text-align: center;");
        a.setAttribute('onclick', "deleteActivity(" + totalRowNumber + ");return false;");
        a.innerHTML = "Eliminar";
        cell.appendChild(a);
    }
}

function deleteActivity(rowNumber) {
    var row = document.getElementById(rowNumber);
    row.parentNode.removeChild(row);
}

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

        SEMICOLON.widget.notifications($("#wait"));

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
        $.post("?controller=ClassActivity&action=selectConsecutiveClassActivity", parameters, function (data) {
            document.getElementById("form-consecutive").value = parseInt(data.consecutive_class) + 1;
        }, "json");
    }
});

$("#form-submit").click(function () {
    $('#form-submit').attr('data-target', '#myModal');
});

$("#form-save").click(function () {
    var content;
    content = $("#form-content").val().trim();
    if (!isNaN(content) || content.length < 4 || content.length > 255) {
        $("#failed-content").attr("data-notify-msg", "<i class=icon-remove-sign></i> Contenido Incorrecto. Complete e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-content"));
    } else {
        appendRow(content);

    }
});

$("#form-submity").click(function () {
    var content;
    content = $("#form-observation").val().trim();

    var tableReg = document.getElementById('bodyTable');
    var cellsOfRow = "";
    var cont = "";
    var dat = "";
    for (var i = 1; i < tableReg.rows.length; i++) {
        cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
        cont = cellsOfRow[0].getElementsByTagName('a');
        dat += cont[0].textContent + ",";
    }

    dat = dat.substring(0, dat.length - 1);


    if ($("#form-courses").val() === "-1") {
        $("#failed-form-courses").attr("data-notify-msg", "<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-form-courses"));
        return false;
    } else if ($("#form-student").val() === "-1") {
        $("#failed-form-student").attr("data-notify-msg", "<i class=icon-remove-sign></i> Estudiante inválido. Seleccione e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-form-student"));
        return false;
    } else if (!isNaN(content) || content.length < 4 || content.length > 255) {
        $("#failed-observation").attr("data-notify-msg", "<i class=icon-remove-sign></i> Observación Incorrecta. Complete e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-observation"));
    } else if (tableReg.rows.length < 2) {
        $("#failed-addContent").attr("data-notify-msg", "<i class=icon-remove-sign></i> Cantidad de Contenidos inválidos. Complete e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-addContent"));
    } else {
        var parameters = {
            "appointment": $("#form-courses").val(),
            "student": $("#form-student").val(),
            "consecutive": $("#form-consecutive").val(),
            "date": $("#form-date").val().trim(),
            "typeA": $("input:radio[name='form-typeA']:checked").val().trim(),
            "contents": dat,
            "count": ((tableReg.rows.length) - 1),
            "observation": $("#form-observation").val()
        };

        SEMICOLON.widget.notifications($("#wait"));

        $.post("?controller=ClassActivity&action=insert", parameters, function (data) {
            if (data.result === "1") {
                SEMICOLON.widget.notifications($("#success"));
                setTimeout("location.href = '?controller=ClassActivity&action=insert';", 2000);
            } else {
                SEMICOLON.widget.notifications($("#warning"));
            }
        }, "json");
    }
});

$(document).ready(function () {
    $('.bt-editable').editable();
});
