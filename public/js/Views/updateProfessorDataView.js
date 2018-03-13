function val() {
    var nameP, firstLastName, secondLastName, additionalInformation, address, phone, phone2, nationality, gender;

    nameP = $("#form-name").text().trim();
    firstLastName = $("#form-first-lastName").text().trim();
    secondLastName = $("#form-second-lastName").text().trim();
    additionalInformation = $("#form-additionalInformation").text().trim();
    address = $("#form-address").text().trim();
    phone = $("#form-phone1").text().trim();
    phone2 = $("#form-phone2").text().trim();
    nationality = $("#form-nationality").text().trim();
    gender = $("#form-gender").text().trim().toUpperCase();

    if (nameP.length < 3 || nameP.length > 49 || !isNaN(nameP)) {
        $("#failed-name").attr("data-notify-msg", "<i class=icon-remove-sign></i> Dato de Nombre Incorrecto. Complete e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-name"));
        return false;

    } else if (firstLastName.length < 3 || firstLastName.length > 49 || !isNaN(firstLastName)) {
        $("#failed-first-lastName").attr("data-notify-msg", "<i class=icon-remove-sign></i> Primer Apellido Incorrecto. Complete e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-firs-lastName"));
        return false;

    } else if (secondLastName.length < 3 || secondLastName.length > 49 || !isNaN(secondLastName)) {
        $("#failed-second-lastName").attr("data-notify-msg", "<i class=icon-remove-sign></i> Segundo Apellido Incorrecto. Complete e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-second-lastName"));
        return false;

    } else if (phone.length < 8 || phone.length > 8 || isNaN(phone)) {
        $("#failed-phone1").attr("data-notify-msg", "<i class=icon-remove-sign></i> Formato de telefono incorrecto. Complete e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-phone1"));
        return false;

    } else if (phone2.length < 8 || phone2.length > 8 || isNaN(phone2)) {
        $("#failed-phone2").attr("data-notify-msg", "<i class=icon-remove-sign></i> Formato de otro telefono incorrecto. Complete e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-phone2"));
        return false;

    } else if (nationality.length < 6 || nationality.length > 49) {
        $("#failed-nationality").attr("data-notify-msg", "<i class=icon-remove-sign></i> Formato de nacionalidad incorrecto. Complete e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-nationality"));
        return false;

    } else if (address.length > 200) {
        $("#failed-address").attr("data-notify-msg", "<i class=icon-remove-sign></i> Dirección muy extensa. Complete e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-address"));
        return false;

    } else if (additionalInformation.length > 2000) {
        $("#failed-additionalInformation").attr("data-notify-msg", "<i class=icon-remove-sign></i> Información adicional muy extensa. Complete e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-additionalInformation"));
        return false;

    } else if (gender.length > 1 || (gender != "M" && gender != "F")) {
        $("#failed-gender").attr("data-notify-msg", "<i class=icon-remove-sign></i> Genero erroneo. Datos validos M o F. Complete e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-gender"));
        return false;
    } else if (!validateEmail()) {
        return false;
    }

    $('#showModal').click();
    return false;
}

function validateEmail() {
    var emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    var email = document.getElementById("form-email").innerHTML.trim();
    if (emailRegex.test(email)) {
        return true;
    } else {
        SEMICOLON.widget.notifications($("#warningEmail"));
        return false;
    }
}
$("#form-submity").click(function () {
    var parameters = {
        "identification": $("#form-id").text().trim(),
        "name": $("#form-name").text().trim(),
        "firstLastName": $("#form-first-lastName").text().trim(),
        "secondLastName": $("#form-second-lastName").text().trim(),
        "gender": $("#form-gender").text().trim(),
        "nationality": $("#form-nationality").text().trim(),
        "address": $("#form-address").text().trim(),
        "typeId": $("#form-id-type").text().trim(),
        "phone": $("#form-phone1").text().trim(),
        "phone2": $("#form-phone2").text().trim(),
        "additionalInformation": $("#form-additionalInformation").text().trim(),
        "email": $("#form-email").text().trim(),
        "age": $("#form-age").text().trim()
    };
    $.post("?controller=Professor&action=updatePersonal", parameters, function (data) {
        if (data.result === "1") {
            $("#success").attr({
                "data-notify-type": "success",
                "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!",
                "data-notify-position": "bottom-full-width"
            });
            SEMICOLON.widget.notifications($("#success"));
            setTimeout("location.href = '?controller=Professor&action=updatePersonal';", 2000);
        } else {
            $("#warning").attr({
                "data-notify-type": "warning",
                "data-notify-msg": "<i class=icon-warning-sign></i> Operacion Incompleta, intente de nuevo!",
                "data-notify-position": "bottom-full-width"
            });
            SEMICOLON.widget.notifications($("#warning"));
        }
    }, "json");
});