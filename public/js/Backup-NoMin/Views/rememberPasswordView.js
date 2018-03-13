function val() {
    var email = $("#form-email").val().trim();

    if (!/\w+@\w+\.+[a-z]/.test(email) || email.split(" ", 2).length > 1) {
        $("#failed-email").attr("data-notify-msg", "<i class=icon-remove-sign></i> Correo Incorrecto. Complete e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-email"));
        return false;
    }
    SEMICOLON.widget.notifications($("#wait"));

    var parameters = {
        "email": email
    };
    $.post("?controller=User&action=rememberPassword", parameters, function (data) {
        if (data.result === "1") {
            SEMICOLON.widget.notifications($("#success"));
            setTimeout("location.href = '?controller=User&action=logIn';", 1000);
        } else {
            SEMICOLON.widget.notifications($("#warning"));
        }
        ;
    }, "json");
    return false;
}

