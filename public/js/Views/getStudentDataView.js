var tableToExcel = (function () {
    var uri = 'data:application/vnd.ms-excel;base64,'
            , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
            , base64 = function (s) {
                return window.btoa(unescape(encodeURIComponent(s)));
            }
    , format = function (s, c) {
        return s.replace(/{(\w+)}/g, function (m, p) {
            return c[p];
        }
        )
    }
    return function (table, name) {
        if (!table.nodeType)
            table = document.getElementById(table);
        var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML};
        window.location.href = uri + base64(format(template, ctx));
    };
})();

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
