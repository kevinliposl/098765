$("#form-id").change(function () {

    if ($("#form-id").val() !== "-1") {

        SEMICOLON.widget.notifications($("#wait"));

        var parameters = {
            "id": $("#form-id").val()
        };

        $.post("?controller=Semester&action=select", parameters, function (data) {
            if (data.ID) {
                $("#form-year-table").text(data.year);
                $("#form-semester-table").text(data.semester);

                SEMICOLON.widget.notifications($("#success"));
            } else {
                $("#form-year-table").text("");
                $("#form-semester-table").text("");

                SEMICOLON.widget.notifications($("#warning"));
            }
        }, "json");
    } else {
        $("#form-year-table").text("");
        $("#form-semester-table").text("");
    }
});
