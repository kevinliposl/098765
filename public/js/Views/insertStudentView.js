function checkTypeId(type) {
    if (type === 'C') {
        $("#form-id").attr('minlength', '9');
        $("#form-id").attr('maxlength', '9');
        $("#form-id").val('');
    } else {
        $("#form-id").attr('minlength', '9');
        $("#form-id").attr('maxlength', '20');
        $("#form-id").val('');

    }
}

function sendData() {
    $('#showModal').click();
    return false;
}

function Redirect() {
    window.location = "?controller=Student&action=insertStudent";
}

$("#form-submity").click(function () {
    var parameters = {
        "id": $("#form-id").val().trim(),
        "idType": $("input:radio[name='form-typeId']:checked").val().trim(),
        "email": $("#form-email").val().trim(),
        "name": $("#form-name").val().trim(),
        "firstLastName": $("#form-firstLastName").val().trim(),
        "secondLastName": $("#form-secondLastName").val().trim(),
        "age": $("#form-age").val().trim(),
        "address": $("#form-address").val().trim(),
        "gender": $("input:radio[name='form-gender']:checked").val().trim(),
        "nationality": $("#form-nationality").val().trim(),
        "phoneOne": $("#form-phone1").val().trim(),
        "phoneTwo": $("#form-phone2").val().trim(),
        "contactName": $("#form-contact-name").val().trim(),
        "contactRelationship": $("#form-relationship").val().trim(),
        "contactPhone": $("#form-contact-phone").val().trim(),
        "contactEmail": $("#form-contact-email").val().trim()
    };
    $.ajax({
        data: parameters,
        url: "?controller=Student&action=insertStudent",
        type: 'POST',
        beforeSend: function () {
            $("#form-submity").attr('disabled', 'disabled');
            $("#form-close").attr('disabled', 'disabled');
            SEMICOLON.widget.notifications($("#wait"));
        },
        success: function (response) {
            var data = JSON.parse(response);
            if (data[0] === '1') {
                SEMICOLON.widget.notifications($("#success"));
                setTimeout('Redirect()', 1500);
            } else {
                SEMICOLON.widget.notifications($("#warning"));
                $("#form-submity").removeAttr('disabled');
                $("#form-close").removeAttr('disabled');
            }
        }
    }
    );
});