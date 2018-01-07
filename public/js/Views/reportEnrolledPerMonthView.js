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
                pdf.save('Informe de matriculados.pdf');
            }, margins);
}

function exportExcel() {
    $("#datatable").table2excel({
        exclude: ".noExl",
        filename: "Informe de matriculados",
        fileext: ".xls",
        name: "Matriculados",
        exclude_img: true,
        exclude_links: true,
        exclude_inputs: true
    });
}