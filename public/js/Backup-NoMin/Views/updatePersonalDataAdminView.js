
function val() {

    var identification = $("#form-id").text().trim();
    var email = $("#form-email").text().trim();
    var name = $("#form-name").text().trim();
    var firstLastName = $("#form-first-lastName").text().trim();
    var secondLastName = $("#form-second-lastName").text().trim();

    if (!/\w+@\w+\.+[a-z]/.test(email) || email.length < 4 || email.length > 50 || email.split(" ", 2).length > 1) {
        SEMICOLON.widget.notifications($("#failed-email"));
        return false;
    } else if (identification.length < 8 || identification.length > 20 || identification.split(" ", 2).length > 1) {
        SEMICOLON.widget.notifications($("#failed-name"));
        return false;
    } else if (firstLastName.length < 3 || firstLastName.length > 49 || !isNaN(firstLastName) || firstLastName.split(" ", 2).length > 1) {
        SEMICOLON.widget.notifications($("#failed-first-lastName"));
        return false;
    } else if (secondLastName.length < 3 || secondLastName.length > 49 || !isNaN(secondLastName) || secondLastName.split(" ", 2).length > 1) {
        SEMICOLON.widget.notifications($("#failed-second-lastName"));
        return false;
    }

    $('#showModal').click();
    return false;
}

$("#form-submity").click(function () {
    var parameters = {
        "id": $("#form-id").text().trim(),
        "name": $("#form-name").text().trim(),
        "firstLastName": $("#form-first-lastName").text().trim(),
        "secondLastName": $("#form-second-lastName").text().trim(),
        "email": $("#form-email").text().trim()
    };
    $.post("?controller=Admin&action=updatePersonalData", parameters, function (data) {
        if (data.result === "1") {
            SEMICOLON.widget.notifications($("#success"));
            setTimeout("location.href = '?controller=Admin&action=updatePersonalData';", 1500);
        } else {
            SEMICOLON.widget.notifications($("#warning"));
        }
    }, "json");
});