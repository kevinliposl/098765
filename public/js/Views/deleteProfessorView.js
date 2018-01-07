$("#form-prof").change(function () {
    if ($("#form-prof").val() !== "-1") {
        var parameters = {
            "id": $("#form-prof").val()
        };
        SEMICOLON.widget.notifications($("#wait"));

        $.post("?controller=Professor&action=select", parameters, function (data) {
            if (data.identification) {
                $("#form-id").html(data.identification);
                $("#form-name").html(data.name);
                $("#form-first-lastName").html(data.first_lastname);
                $("#form-second-lastName").html(data.second_lastname);
                $("#form-email").html(data.email);
                $("#form-submit").css('display', 'block');
                SEMICOLON.widget.notifications($("#success"));
            } else {
                $("#form-id").html("");
                $("#form-name").html("");
                $("#form-first-lastName").html("");
                $("#form-second-lastName").html("");
                $("#form-email").html("");
                $("#form-submit").css('display', 'none');
                SEMICOLON.widget.notifications($("#warning"));
            }
        }, "json");
    } else {
        $("#form-id").html("");
        $("#form-name").html("");
        $("#form-first-lastName").html("");
        $("#form-second-lastName").html("");
        $("#form-email").html("");
        $("#form-submit").css('display', 'none');
    }
});

function val() {
    $('#showModal').click();
    return false;
}

$("#form-submity").click(function () {
    $("#form-submity").attr('disabled', 'disabled');
    $("#form-close").attr('disabled', 'disabled');

    SEMICOLON.widget.notifications($("#wait"));

    var parameters = {
        "id": $("#form-prof").val()
    };
    $.post("?controller=Professor&action=delete", parameters, function (data) {
        if (data.result === "1") {

            SEMICOLON.widget.notifications($("#success"));
            setTimeout("location.href = '?controller=Professor&action=delete';", 1500);
        } else {

            SEMICOLON.widget.notifications($("#warning"));
        }
        $("#form-submity").removeAttr('disabled');
        $("#form-close").removeAttr('disabled');
    }, "json");
});
