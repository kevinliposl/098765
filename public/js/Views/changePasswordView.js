function val() {
    pass1 = $("#form-password").val().trim();
    pass2 = $("#form-password2").val().trim();

    if (pass1.length < 8 || pass1.length > 15 || pass1.split(" ", 2).length > 1) {
        SEMICOLON.widget.notifications($("#failed-password"));
        return false;

    } else if (pass2.length < 8 || pass2.length > 15 || pass2.split(" ", 2).length > 1) {
        SEMICOLON.widget.notifications($("#failed-password"));
        return false;

    } else if (pass1 !== pass2) {
        SEMICOLON.widget.notifications($("#failed-password2"));
        return false;
    }
    $('#showModal').click();
    return false;
}

$("#form-submity").click(function () {

    $("#form-submity").attr('disabled', 'disabled');
    $("#form-close").attr('disabled', 'disabled');

    SEMICOLON.widget.notifications($("#wait"));

    var parameters = {
        "newPass": pass1
    };

    $.post("?controller=User&action=changePassword", parameters, function (data) {
        if (data.result === "1") {
            SEMICOLON.widget.notifications($("#success"));
            setTimeout("location.href = '?';", 1500);
        } else {
            SEMICOLON.widget.notifications($("#warning"));
            $("#form-submity").removeAttr('disabled');
            $("#form-close").removeAttr('disabled');
        }
    }, "json");
});