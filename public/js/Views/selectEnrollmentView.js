$("#form-student").change(function () {
    var parameters = {
        "identification": $("#form-student").val()
    };
    var Table = document.getElementById("table-course-professor");
    Table.innerHTML = "";
    $.post("?controller=Enrollment&action=selectCourses", parameters, function (data) {

        var table = document.getElementById("table-course-professor");

        for (var i = 0; i < data.length; i++) {
            var row = table.insertRow(0);

            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(0);
            var cell3 = row.insertCell(0);

            cell1.innerHTML = data[i].initials + ": " + data[i].name;
            cell2.innerHTML = data[i].Name;
            cell3.innerHTML = data[i].date;
        }

        var row = table.insertRow(0);

        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(0);
        var cell3 = row.insertCell(0);

        cell1.innerHTML = "Curso";
        cell2.innerHTML = "Profesor";
        cell3.innerHTML = "Fecha";
    }, "json");
});