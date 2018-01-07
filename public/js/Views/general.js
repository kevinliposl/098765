$(document).ready(function () {
    $('#datatable').DataTable();
});

$(document).ready(function () {
    $('.bt-editable').editable();
});

$("#form-submit").click(function () {
    $('#form-submit').attr('data-target', '#myModal');
});

$(document).ready(function () {
    $('.bt-editable').editable();
    $('.bt-group').editable({
        showbuttons: false,
        source: [
            {value: 1, text: 'M'},
            {value: 2, text: 'F'}
        ]
    });
});