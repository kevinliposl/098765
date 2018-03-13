function exportPdf() {
    var pdf = new jsPDF('l', 'pt', 'letter');
    source = $('#data').get(0);

    specialElementHandlers = {
        '#bypassme': function (element, renderer) {
            return true;
        }
    };

    margins = {
        top: 40,
        bottom: 20,
        left: 10,
        width: "100%"
    };

    pdf.fromHTML(
            source,
            margins.left,
            margins.top, {
                'width': margins.width,
                'elementHandlers': specialElementHandlers
            },
            function (dispose) {
                pdf.save('Test.pdf');
            }, margins);
}

function exportExcel() {
    if ($("#form-professor").val() !== "-1") {
        $("#datatable").table2excel({
            exclude: ".noExl",
            filename: $("#form-professor option:selected").text().trim(),
            fileext: ".xls",
            name: "Profesor",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    }
}

$("#form-professor").change(function () {
    if ($("#form-professor").val() !== "-1") {
        var parameters = {
            "id": $("#form-professor").val()
        };

        SEMICOLON.widget.notifications($("#wait"));

        $.post("?controller=Professor&action=select", parameters, function (data) {
            if (data.identification) {
                $("#form-id").html(data.identification);
                $("#form-id-type").html(data.id_type);
                $("#form-name").html(data.name);
                $("#form-first-lastName").html(data.first_lastname);
                $("#form-second-lastName").html(data.second_lastname);
                $("#form-phone1").html(data.phone);
                $("#form-phone2").html(data.cel_phone);
                $("#form-email").html(data.email);
                $("#form-gender").html(data.gender);
                $("#form-nationality").html(data.nationality);
                $("#form-age").html(data.birthdate);
                $("#form-address").html(data.address);
                $("#form-additionalInformation").html(data.expedient);

                SEMICOLON.widget.notifications($("#success"));
            } else {
                $("#form-id").html("");
                $("#form-id-type").html("");
                $("#form-name").html("");
                $("#form-first-lastName").html("");
                $("#form-second-lastName").html("");
                $("#form-phone1").html("");
                $("#form-phone2").html("");
                $("#form-email").html("");
                $("#form-gender").html("");
                $("#form-nationality").html("");
                $("#form-age").html("");
                $("#form-address").html("");
                $("#form-additionalInformation").html("");
            }
        }, "json");
    } else {
        $("#form-id").html("");
        $("#form-id-type").html("");
        $("#form-name").html("");
        $("#form-first-lastName").html("");
        $("#form-second-lastName").html("");
        $("#form-phone1").html("");
        $("#form-phone2").html("");
        $("#form-email").html("");
        $("#form-gender").html("");
        $("#form-nationality").html("");
        $("#form-age").html("");
        $("#form-address").html("");
        $("#form-additionalInformation").html("");
    }
});
