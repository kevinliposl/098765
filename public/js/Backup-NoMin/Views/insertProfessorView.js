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

function val() {

    var typeId = $("input[name*='form-typeId']").val();
    var id = $("#form-id").val().trim();
    var email = $("#form-email").val().trim();
    var name = $("#form-name").val().trim();
    var firstLastName = $("#form-firstLastName").val().trim();
    var secondLastName = $("#form-secondLastName").val().trim();
    var gender = $("input[name*='form-gender']").val();
    var nationality = $("#form-nationality").val().trim();
    var phone = $("#form-phone1").val().trim();
    var phone2 = $("#form-phone2").val().trim();
    var additionalInformation = $("#form-additionalInformation").val().trim();
    var address = $("#form-address").val().trim();
    var age = $("#form-age").val();


    if (name.length < 3 || name.length > 49 || !isNaN(name)) {
        SEMICOLON.widget.notifications($("#failed-name"));
        return false;

    } else if (firstLastName.length < 3 || firstLastName.length > 49 || !isNaN(firstLastName)) {
        SEMICOLON.widget.notifications($("#failed-firsLastName"));
        return false;

    } else if (secondLastName.length < 3 || secondLastName.length > 49 || !isNaN(secondLastName)) {
        SEMICOLON.widget.notifications($("#failed-secondLastName"));
        return false;

    } else if (phone.length < 8 || phone.length > 8 || isNaN(phone)) {
        SEMICOLON.widget.notifications($("#failed-phone1"));
        return false;

    } else if (phone2.length < 8 || phone2.length > 8 || isNaN(phone2)) {
        SEMICOLON.widget.notifications($("#failed-phone2"));
        return false;

    } else if (address.length > 200) {
        SEMICOLON.widget.notifications($("#failed-address"));
        return false;

    } else if (additionalInformation.length > 2000) {
        SEMICOLON.widget.notifications($("#failed-additionalInformation"));
        return false;

    }
    $('#showModal').click();
    return false;
}

//Insert
$("#form-submity").click(function () {
    $("#form-submity").attr('disabled', 'disabled');
    $("#form-close").attr('disabled', 'disabled');

    var parameters = {
        "identification": $("#form-id").val().trim(),
        "name": $("#form-name").val().trim(),
        "firstLastName": $("#form-firstLastName").val().trim(),
        "secondLastName": $("#form-secondLastName").val().trim(),
        "gender": $('input[name="form-gender"]:checked').val(),
        "nationality": $("#form-nationality").val(),
        "address": $("#form-address").val().trim(),
        "typeId": $('input[name="form-typeId"]:checked').val(),
        "phone": $("#form-phone1").val().trim(),
        "cel_phone": $("#form-phone2").val().trim(),
        "expedient": $("#form-additionalInformation").val().trim(),
        "email": $("#form-email").val().trim(),
        "birthdate": $("#form-age").val()
    };

    SEMICOLON.widget.notifications($("#wait"));

    $.post("?controller=Professor&action=insert", parameters, function (data) {
        if (data.result === "1") {
            SEMICOLON.widget.notifications($("#success"));
            setTimeout("location.href='?controller=Professor&action=insert';", 1500);
        } else if (data.result === "0") {
            SEMICOLON.widget.notifications($("#warning"));
            $("#form-submity").removeAttr('disabled');
            $("#form-close").removeAttr('disabled');
        } else {
            SEMICOLON.widget.notifications($("#alert"));
            setTimeout("location.href = '?controller=Professor&action=insert';", 1500);
        }
    }, "json");

});