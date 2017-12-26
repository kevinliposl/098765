<?php
$session = SSession::getInstance();

if (isset($session->permissions)) {
    if ($session->permissions == 'S') {
        include_once 'public/headerStudent.php';
    } else {
        header('Location:?action=notFound');
    }
} else {
    header('Location:?action=notFound');
}
?>

<section id="page-title">
    <div class="container clearfix">
        <h1>Expediente Academico</h1>
    </div>
</section>

<section id="content">
    <div class="container">
        <br>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                    <tr>
                        <th width="10%">Siglas</th>
                        <th width="25%">Nombre</th>
                        <th width="25%">Instrumento</th>
                        <th width="10%">Ciclo</th>
                        <th width="10%">Estado</th>
                        <th width="10%">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vars as $var) { ?>
                        <tr>
                            <td><?php echo $var["initials"]; ?></td>
                            <td><?php echo $var["name"]; ?></td>
                            <td><?php echo $var["instrument"]; ?></td>
                            <td><?php echo $var["cicle"]; ?></td>
                            <td><?php echo ($var["state"] == 1) ? "Matriculado" : "Terminado/retirado"; ?></td>
                            <td><?php echo $var["date"]; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div><
    </div>
</section>
<script>
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
    });</script>


<script>
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
</script>

<?php
include_once 'public/footer.php';
