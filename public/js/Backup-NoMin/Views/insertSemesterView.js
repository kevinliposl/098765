function val() {
    args = {
        'year': $("#form-year").val().trim(),
        'semester': $("#form-semester").val().trim()
    };

    if (args['year'] < 2000 && !isNaN(args['year'])) {
        SEMICOLON.widget.notifications($("#failed-year"));
        return false;
    } else if (args['semester'] < 1) {
        SEMICOLON.widget.notifications($("#failed-semester"));
        return false;
    }

    $('#showModal').click();
    return false;
}

$("#form-submity").click(function () {

    $("#form-submity").attr('disabled', 'disabled');
    $("#form-close").attr('disabled', 'disabled');

    SEMICOLON.widget.notifications($("#wait"));

    $.post("?controller=Semester&action=insert", args, function (data) {
        if (data.result === "1") {
            SEMICOLON.widget.notifications($("#success"));
            setTimeout("location.href = '?controller=Semester&action=insert';", 2000);
        } else {
            SEMICOLON.widget.notifications($("#warning"));
            $("#form-submity").removeAttr('disabled');
            $("#form-close").removeAttr('disabled');
        }
    }, "json");
});
