function val() {

    var initials = $("#form-initials").val().toUpperCase().trim();
    var name = $("#form-name").val().trim();
    var description = $("#form-description").val().trim();
    var instrument = $("#form-instrument").val().trim();

    if (isNaN(initials.substr(3, 3)) || /^[a-z][a-z]*/.test(initials.substr(0, 3)) || initials.split(" ", 2).length > 1) {
        SEMICOLON.widget.notifications($("#failed-initials"));
        return false;

    } else if (!isNaN(name)) {
        SEMICOLON.widget.notifications($("#failed-name"));
        return false;

    } else if (!isNaN(description)) {
        SEMICOLON.widget.notifications($("#failed-description"));
        return false;

    } else if (!isNaN(instrument)) {
        SEMICOLON.widget.notifications($("#failed-instrument"));
        return false;
    }
    $('#showModal').click();
    return false;
}
//Insert
$("#form-submity").click(function () {

    $("#form-submity").attr('disabled', 'disabled');
    $("#form-close").attr('disabled', 'disabled');

    var args = {
        'initials': $("#form-initials").val().toUpperCase().trim(),
        'name': $("#form-name").val().trim(),
        'description': $("#form-description").val().trim(),
        'instrument': $("#form-instrument").val().trim()
    };
    SEMICOLON.widget.notifications($("#wait"));

    $.post("?controller=Course&action=insert", args, function (data) {
        if (data.result === "1") {
            SEMICOLON.widget.notifications($("#success"));
            setTimeout("location.href = '?controller=Course&action=insert';", 1500);
        } else {
            SEMICOLON.widget.notifications($("#warning"));
            $("#form-submity").removeAttr('disabled');
            $("#form-close").removeAttr('disabled');
        }
    }, "json");
});