/* global SEMICOLON */

function exportPdf() {
    if ($("#form-admin").val() !== "-1") {
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
                    pdf.save('Informe Administrador.pdf');
                }, margins);
    }
}

function exportExcel() {
    if ($("#form-admin").val() !== "-1") {
        $("#datatable").table2excel({
            exclude: ".noExl",
            filename: $("#form-admin option:selected").text().trim(),
            fileext: ".xls",
            name: "Administrador",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    }
}

$("#form-admin").change(function () {
    if ($("#form-admin").val() !== "-1") {

        var parameters = {
            "id": $("#form-admin").val()
        };
        SEMICOLON.widget.notifications($("#wait"));

        $.post("?controller=Admin&action=select", parameters, function (data) {
            if (data.identification) {
                $("#form-id-table").html(data.identification);
                $("#form-name-table").html(data.name);
                $("#form-email-table").html(data.email);
                $("#form-firstLastName-table").html(data.first_lastname);
                $("#form-secondLastName-table").html(data.second_lastname);
                SEMICOLON.widget.notifications($("#success"));
            } else {
                $("#form-id-table").html("");
                $("#form-name-table").html("");
                $("#form-email-table").html("");
                $("#form-firstLastName-table").html("");
                $("#form-secondLastName-table").html("");
                SEMICOLON.widget.notifications($("#warning"));
            }
        }, "json");
    }
});
