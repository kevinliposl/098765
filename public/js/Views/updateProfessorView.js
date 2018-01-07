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
                $("#form-submit").css('display', 'block');
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
                $("#form-submit").css('display', 'none');
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
        $("#form-submit").css('display', 'none');
    }
});

function validate() {
    var identification, typeId, nameP, firstLastName, secondLastName, additionalInformation, address, phone, phone2, nationality, gender;

    identification = $("#form-id").text().trim();
    typeId = $("#form-id-type").text().trim();
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
        SEMICOLON.widget.notifications($("#failed-name"));
        return false;

    } else if (firstLastName.length < 3 || firstLastName.length > 49 || !isNaN(firstLastName)) {
        SEMICOLON.widget.notifications($("#failed-firs-lastName"));
        return false;

    } else if (secondLastName.length < 3 || secondLastName.length > 49 || !isNaN(secondLastName)) {
        SEMICOLON.widget.notifications($("#failed-second-lastName"));
        return false;

    } else if (phone.length < 8 || phone.length > 8 || isNaN(phone)) {
        SEMICOLON.widget.notifications($("#failed-phone1"));
        return false;

    } else if (phone2.length < 8 || phone2.length > 8 || isNaN(phone2)) {
        SEMICOLON.widget.notifications($("#failed-phone2"));
        return false;

    } else if (nationality.length < 6 || nationality.length > 49 || !isNaN(nationality) || nationality.split(" ", 2).length > 1) {
        SEMICOLON.widget.notifications($("#failed-nationality"));
        return false;

    } else if (address.length > 200) {
        SEMICOLON.widget.notifications($("#failed-address"));
        return false;

    } else if (additionalInformation.length > 2000) {
        SEMICOLON.widget.notifications($("#failed-additionalInformation"));
        return false;

    } else if (gender.length > 1 || (gender !== "M" && gender !== "F")) {
        SEMICOLON.widget.notifications($("#failed-gender"));
        return false;
    } else {
        if (typeId === "C") {
            if (isNaN(identification) || identification.length < 9 || identification.length > 9) {
                $("#failed-id").attr("data-notify-msg", "<i class=icon-remove-sign></i> Formato de identificacion incorrecto. Complete e intente de nuevo!");
                SEMICOLON.widget.notifications($("#failed-id"));
                return false;
            }
        } else if (typeId === "D") {
            if (identification.length < 12 || identification.length > 12) {
                $("#failed-id").attr("data-notify-msg", "<i class=icon-remove-sign></i> Formato de identificacion incorrecto. Complete e intente de nuevo!");
                SEMICOLON.widget.notifications($("#failed-id"));
                return false;
            }
        } else {
            $("#failed-id-type").attr("data-notify-msg", "<i class=icon-remove-sign></i> Tipo de identificación incorrecta. C - para nacionales, P - pasapote, D - DIMEX Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-id-type"));
            return false;
        }
    }

    $('#showModal').click();
    return false;
}

$("#form-submity").click(function () {

    $("#form-submity").attr('disabled', 'disabled');
    $("#form-close").attr('disabled', 'disabled');

    SEMICOLON.widget.notifications($("#wait"));

    var parameters = {
        "id": $('#form-professor').val(),
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
    $.post("?controller=Professor&action=update", parameters, function (data) {
        if (data.result === "1") {
            SEMICOLON.widget.notifications($("#success"));
            setTimeout("location.href = '?controller=Professor&action=update';", 1500);
        } else {
            SEMICOLON.widget.notifications($("#warning"));
        }
        $("#form-submity").removeAttr('disabled');
        $("#form-close").removeAttr('disabled');
    }, "json");
});