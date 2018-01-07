$("#form-student").change(function () {
    if ($("#form-student").val() !== "-1") {
        var parameters = {
            "id": $("#form-student").val()
        };
        $.post("?controller=Student&action=selectStudent", parameters, function (data) {
            document.getElementById("form-id").innerHTML = data.identification;
            document.getElementById("form-old-id").value = data.identification;
            document.getElementById("form-id-type").innerHTML = data.id_type;
            document.getElementById("form-name").innerHTML = data.name;
            document.getElementById("form-first-lastName").innerHTML = data.first_lastname;
            document.getElementById("form-second-lastName").innerHTML = data.second_lastname;
            document.getElementById("form-phone1").innerHTML = data.phoneOne;
            document.getElementById("form-phone2").innerHTML = data.phoneTwo;
            document.getElementById("form-email").innerHTML = data.email;
            document.getElementById("form-gender").innerHTML = data.gender;
            document.getElementById("form-nationality").innerHTML = data.nationality;
            document.getElementById("form-age").innerHTML = data.birthdate;
            document.getElementById("form-contact-name").innerHTML = data.full_contact_name;
            document.getElementById("form-contact-phone").innerHTML = data.telephone_contact;
            document.getElementById("form-relationship").innerHTML = data.relationship;
            document.getElementById("form-contact-email").innerHTML = data.contact_email;
            document.getElementById("form-submit").style.display = "block";
        }, "json");
    } else {
        document.getElementById("form-submit").style.display = "none";
    }
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

