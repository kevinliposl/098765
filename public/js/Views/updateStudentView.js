$("#form-student").change(function () {
    if ($("#form-student").val() !== "-1") {
        var parameters = {
            "id": $("#form-student").val()
        };

        SEMICOLON.widget.notifications($("#wait"));

        $.post("?controller=Student&action=selectStudent", parameters, function (data) {
            if (data.identification) {
                $("#form-id").text(data.identification);
                $("#form-old-id").val(data.identification);
                $("#form-id-type").text(data.id_type);
                $("#form-name").text(data.name);
                $("#form-first-lastName").text(data.first_lastname);
                $("#form-second-lastName").text(data.second_lastname);
                $("#form-phone1").text(data.phoneOne);
                $("#form-gender").text(data.gender);
                $("#form-nationality").text(data.nationality);
                $("#form-email").text(data.email);
                $("#form-age").text(data.birthdate);
                $("#form-phone2").text(data.phoneTwo);
                $("#form-contact-name").text(data.full_contact_name);
                $("#form-contact-phone").text(data.telephone_contact);
                $("#form-relationship").text(data.relationship);
                $("#form-contact-email").text(data.contact_email);
                SEMICOLON.widget.notifications($("#success"));
                $("#form-submit").css("display", "block");
            } else {
                $("#form-id").text("");
                $("#form-old-id").text("");
                $("#form-id-type").text("");
                $("#form-name").text("");
                $("#form-first-lastName").text("");
                $("#form-second-lastName").text("");
                $("#form-phone1").text("");
                $("#form-phone2").text("");
                $("#form-email").text("");
                $("#form-gender").text("");
                $("#form-nationality").text("");
                $("#form-age").text("");
                $("#form-contact-name").text("");
                $("#form-contact-phone").text("");
                $("#form-relationship").text("");
                $("#form-contact-email").text("");
                SEMICOLON.widget.notifications($("#warning"));
                $("#form-submit").css("display", "none");
            }
        }, "json");
    } else {
        $("#form-id").text("");
        $("#form-old-id").text("");
        $("#form-id-type").text("");
        $("#form-name").text("");
        $("#form-first-lastName").text("");
        $("#form-second-lastName").text("");
        $("#form-phone1").text("");
        $("#form-phone2").text("");
        $("#form-email").text("");
        $("#form-gender").text("");
        $("#form-nationality").text("");
        $("#form-age").text("");
        $("#form-contact-name").text("");
        $("#form-contact-phone").text("");
        $("#form-relationship").text("");
        $("#form-contact-email").text("");
        $("#form-submit").css("display", "none");
    }
});

function Redirect() {
    window.location = "?controller=Student&action=updateStudent";
}

function validateEmail() {
    var emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    var contactEmail = document.getElementById("form-contact-email").innerHTML.trim();
    var email = document.getElementById("form-email").innerHTML.trim();
    if (emailRegex.test(email) && emailRegex.test(contactEmail)) {
        return true;
    } else {
        SEMICOLON.widget.notifications($("#warningEmail"));
        return false;
    }
}

$("#form-submity").click(function () {

    if (validateEmail()) {

        $("#form-submity").attr('disabled', 'disabled');
        $("#form-close").attr('disabled', 'disabled');

        SEMICOLON.widget.notifications($("#wait"));

        var parameters = {
            "id": $("#form-id").text().trim(),
            "oldId": $("#form-old-id").val().trim(),
            "idType": $("#form-id-type").text().trim(),
            "email": $("#form-email").text().trim(),
            "name": $("#form-name").text().trim(),
            "firstLastName": $("#form-first-lastName").text().trim(),
            "secondLastName": $("#form-second-lastName").text().trim(),
            "age": $("#form-age").text().trim(),
            "address": " ",
            "gender": $("#form-gender").text().trim(),
            "nationality": $("#form-nationality").text().trim(),
            "phoneOne": $("#form-phone1").text().trim(),
            "phoneTwo": $("#form-phone2").text().trim(),
            "contactName": $("#form-contact-name").text().trim(),
            "contactRelationship": $("#form-relationship").text().trim(),
            "contactPhone": $("#form-contact-phone").text().trim(),
            "contactEmail": $("#form-contact-email").text().trim()
        };

        $.post("?controller=Student&action=updateStudent", parameters, function (data) {
            if (data.result === "1") {
                SEMICOLON.widget.notifications($("#success"));
                setTimeout('Redirect()', 1000);
            } else {
                SEMICOLON.widget.notifications($("#warning"));
            }

            $("#form-submity").removeAttr('disabled');
            $("#form-close").removeAttr('disabled');

        }, "json");
    } else {
        SEMICOLON.widget.notifications($("#warningEmail"));
    }
});


