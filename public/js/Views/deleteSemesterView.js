function val() {

    if ($("#form-id").val() === "-1") {
        SEMICOLON.widget.notifications($("#failed-id"));
        return false;
    } else {
        $('#showModal').click();
        return false;
    }
}

$("#form-id").change(function () {
    if ($("#form-id").val() !== "-1") {
        var parameters = {
            "id": $("#form-id").val()
        };
        SEMICOLON.widget.notifications($("#wait"));
        $.post("?controller=Semester&action=select", parameters, function (data) {
            if (data.ID) {
                $("#form-year-table").html(data.year);
                $("#form-semester-table").html(data.semester);
                $("#form-semester-table").html(data.semester);
                $("#form-submit").css("display", 'block');
                SEMICOLON.widget.notifications($("#success"));
            } else {
                $("#form-year-table").html("");
                $("#form-semester-table").html("");
                $("#form-submit").css("display", 'none');
                SEMICOLON.widget.notifications($("#warning"));
            }
        }, "json");
    } else {
        $("#form-year-table").html("");
        $("#form-semester-table").html("");
        $("#form-submit").css("display", 'none');
    }
});

$("#form-submity").click(function () {

    $("#form-submity").attr('disabled', 'disabled');
    $("#form-close").attr('disabled', 'disabled');

    SEMICOLON.widget.notifications($("#wait"));

    var parameters = {
        "id": $("#form-id").val()
    };

    $.post("?controller=Semester&action=delete", parameters, function (data) {
        if (data.result === "1") {
            SEMICOLON.widget.notifications($("#success"));
            setTimeout("location.href='?controller=Semester&action=delete';", 1500);
        } else {
            SEMICOLON.widget.notifications($("#warning"));
            $("#form-submity").removeAttr('disabled');
            $("#form-close").removeAttr('disabled');
        }
    }, "json");
});