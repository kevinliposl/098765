function Redirect() {
    window.location = "?controller=Student&action=updatePersonalDataStudent";
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
        var parameters = {
            "id": document.getElementById("form-id").innerHTML.trim(),
            "oldId": document.getElementById("form-old-id").value.trim(),
            "idType": document.getElementById("form-id-type").innerHTML.trim(),
            "email": document.getElementById("form-email").innerHTML.trim(),
            "name": document.getElementById("form-name").innerHTML.trim(),
            "firstLastName": document.getElementById("form-first-lastName").innerHTML.trim(),
            "secondLastName": document.getElementById("form-second-lastName").innerHTML.trim(),
            "age": document.getElementById("form-age").innerHTML.trim(),
            "address": " ",
            "gender": document.getElementById("form-gender").innerHTML.trim(),
            "nationality": document.getElementById("form-nationality").innerHTML.trim(),
            "phoneOne": document.getElementById("form-phone1").innerHTML.trim(),
            "phoneTwo": document.getElementById("form-phone2").innerHTML.trim(),
            "contactName": document.getElementById("form-contact-name").innerHTML.trim(),
            "contactRelationship": document.getElementById("form-relationship").innerHTML.trim(),
            "contactPhone": document.getElementById("form-contact-phone").innerHTML.trim(),
            "contactEmail": document.getElementById("form-contact-email").innerHTML.trim()
        };
        $.post("?controller=Student&action=updatePersonalDataStudent", parameters, function (data) {
            if (data.result === "1") {
                SEMICOLON.widget.notifications($("#success"));
                setTimeout('Redirect()', 1000);
            } else {
                SEMICOLON.widget.notifications($("#warning"));
            }
        }, "json");
    } else {

    }

});