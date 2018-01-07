$("#form-courses").change(function () {
    if ($("#form-courses").val() !== "-1") {

        SEMICOLON.widget.notifications($("#wait"));

        var parameters = {
            "initials": $("#form-courses").val()
        };

        $.post("?controller=Course&action=select", parameters, function (data) {
            if (data.initials) {
                $("#form-initials-table").html(data.initials);
                $("#form-name-table").html(data.name);
                $("#form-instrument-table").html(data.instrument);
                $("#form-description-table").html(data.description);
                SEMICOLON.widget.notifications($("#success"));
            } else {
                $("#form-initials-table").html("");
                $("#form-name-table").html("");
                $("#form-instrument-table").html("");
                $("#form-description-table").html("");
                $("#form-secondLastName-table").html("");
                SEMICOLON.widget.notifications($("#warning"));
            }
        }, "json");
    } else {
        $("#form-initials-table").html("");
        $("#form-name-table").html("");
        $("#form-instrument-table").html("");
        $("#form-description-table").html("");
        $("#form-secondLastName-table").html("");
    }
});
