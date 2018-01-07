$("#form-student").change(function () {
    if ($("#form-student").val() !== "-1") {
        var parameters = {
            "id": $("#form-student").val()
        };
        SEMICOLON.widget.notifications($("#wait"));
        $.post("?controller=Student&action=selectStudent", parameters, function (data) {
            if (data.identification) {
                $("#form-id-table").text(data.identification);
                $("#form-name-table").text(data.name);
                $("#form-lastName-table").text(data.first_lastname + " " + data.second_lastname);
                $("#form-phones-table").text(data.phoneOne + ", " + data.phoneTwo);
                $("#form-email-table").text(data.email);
                $("#form-submit").css('display', "block");
                SEMICOLON.widget.notifications($("#success"));
            } else {
                SEMICOLON.widget.notifications($("#warning"));
            }
        }, "json");
    } else {
        $("#form-id-table").text("");
        $("#form-name-table").text("");
        $("#form-lastName-table").text("");
        $("form-phones-table").text("");
        $("#form-email-table").text("");
        $("#form-submit").style.display = "none";
    }
});

function Redirect() {
    window.location = "?controller=Student&action=deleteStudent";
}

$("#form-submity").click(function () {
    $("#form-submity").attr('disabled', 'disabled');
    $("#form-close").attr('disabled', 'disabled');

    SEMICOLON.widget.notifications($("#wait"));

    var parameters = {
        "id": $("#form-student").val()
    };
    $.post("?controller=Student&action=deleteStudent", parameters, function (data) {
        if (data.result === "1") {
            SEMICOLON.widget.notifications($("#success"));
            setTimeout('Redirect()', 1000);
        } else {
            SEMICOLON.widget.notifications($("#warning"));
            $("#form-submity").removeAttr('disabled');
            $("#form-close").removeAttr('disabled');
        }
    }, "json");
});