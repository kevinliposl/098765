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
    if ($("#form-student").val() !== "-1") {
        $("#datatable").table2excel({
            exclude: ".noExl",
            filename: $("#form-student option:selected").text().trim(),
            fileext: ".xls",
            name: "Estudiante",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    }
}

$("#form-student").change(function () {
    if ($("#form-student").val() !== "-1") {
        var parameters = {
            "id": $("#form-student").val()
        };
        SEMICOLON.widget.notifications($("#wait"));

        $.post("?controller=Student&action=selectStudent", parameters, function (data) {
            if (data.identification) {
                $("#form-id").text(data.identification);
                $("#form-old-id").text(data.identification);
                $("#form-id-type").text(data.id_type);
                $("#form-name").text(data.name);
                $("#form-first-lastName").text(data.first_lastname);
                $("#form-second-lastName").text(data.second_lastname);
                $("#form-phone1").text(data.phoneOne);
                $("#form-phone2").text(data.phoneTwo);
                $("#form-email").text(data.email);
                $("#form-gender").text(data.gender);
                $("#form-nationality").text(data.nationality);
                $("#form-age").text(data.birthdate);
                $("#form-contact-name").text(data.full_contact_name);
                $("#form-contact-phone").text(data.telephone_contact);
                $("#form-relationship").text(data.relationship);
                $("#form-contact-email").text(data.contact_email);

                SEMICOLON.widget.notifications($("#success"));
            } else {
                $("#form-id").text("");
                $("#form-old-id").text("");
                $("#form-id-type").text('');
                $("#form-name").text('');
                $("#form-first-lastName").text('');
                $("#form-second-lastName").text('');
                $("#form-phone1").text('');
                $("#form-phone2").text('');
                $("#form-email").text('');
                $("#form-gender").text('');
                $("#form-nationality").text('');
                $("#form-age").text('');
                $("#form-contact-name").text('');
                $("#form-contact-phone").text('');
                $("#form-relationship").text('');
                $("#form-contact-email").text('');

                SEMICOLON.widget.notifications($("#warning"));
            }
        }, "json");
    } else {
        $("#form-id").text("");
        $("#form-old-id").text("");
        $("#form-id-type").text('');
        $("#form-name").text('');
        $("#form-first-lastName").text('');
        $("#form-second-lastName").text('');
        $("#form-phone1").text('');
        $("#form-phone2").text('');
        $("#form-email").text('');
        $("#form-gender").text('');
        $("#form-nationality").text('');
        $("#form-age").text('');
        $("#form-contact-name").text('');
        $("#form-contact-phone").text('');
        $("#form-relationship").text('');
        $("#form-contact-email").text('');
    }
});
