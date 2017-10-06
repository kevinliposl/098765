<?php
$session = SSession::getInstance();

if (isset($session->email)) {
    //include_once 'public/headerUser.php';
} else {
    include_once 'public/header.php';
}
?>

<!-- Page Title
============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Insertar Profesor</h1>
    </div>
</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin" style="max-width: 550px;">
                <div class="acctitle">
                    <div class="acc_content clearfix">
                        <form class="nobottommargin">
                            <div class="col_full">
                                <label for="form-typeId">Tipo de Identificaci&acute;n:</label>
                                <input type="radio" name="form-typeId" value="N" checked/><label>Cédula Nacional</label>
                                <input type="radio" name="form-typeId" value="D"/> <label>Dimex</label>
                                <input type="radio" name="form-typeId" value="E"/><label>Pasaporte</label>
                            </div>
                            <div class="col_full">
                                <label for="form-id">Número de Identificaci&oacute;n:</label>
                                <input type="text" id="form-id" class="form-control" maxlength="9" minlength="9"/>
                            </div>
                            <div class="col_full">
                                <label for="form-name">Nombre:</label>
                                <input type="text" id="form-name"class="form-control" required/>
                            </div>

                            <div class="col_full">
                                <label for="form-firstLastName">Primer Apellido:</label>
                                <input type="text" id="form-firstLastName"class="form-control" required/>
                            </div>

                            <div class="col_full">
                                <label for="form-secondLastName">Segundo Apellido:</label>
                                <input type="text" id="form-secondLastName"class="form-control" required/>
                            </div>
                            <div class="col_full">
                                <label for="form-address">Lugar de Residencia:</label>
                                <input type="text" id="form-address"class="form-control" required />
                            </div>
                            <div class="col_full">
                                <label for="form-gender">G&eacute;nero:</label>
                                <input type="radio" name="form-gender" value="M" checked/> <label>Masculino</label>
                                <input type="radio" name="form-gender" value="F"/><label>Femenino</label>
                            </div>
                            <div class="col_full">
                                <label for="form-nationality">Nacionalidad:</label>
                                <input type="text" id="form-nationality"class="form-control" required/>
                            </div>
                            <div class="col_full">
                                <label for="form-phone1">Tel&eacute;fono:</label>
                                <input type="text" id="form-phone1"class="form-control" required/>
                            </div>
                            <div class="col_full">
                                <label for="form-phone2">Otro tel&eacute;fono:</label>
                                <input type="text" id="form-phone2"class="form-control" required/>
                            </div>
                            <div class="col_full">
                                <label for="form-email">Correo Electr&oacute;nico:</label>
                                <input type="email" id="form-email" class="form-control" required/>
                            </div>
                            <div class="col_full">
                                <label for="form-age">Fecha de nacimiento:</label>
                                <input type="date" id="form-age" class="form-control" required/>
                            </div>
                            <div class="col_full">
                                <label for="form-additionalInformation">Informaci&oacute;n Adicional:</label>
                                <input type="text" id="form-additionalInformation"class="form-control" required/>
                            </div>
                            
                            <div class="col_full nobottommargin">
                                <input type="button" class="button button-3d button-black nomargin" id="form-submit" value="Registrar"/>
                            </div>
                            <div id="message"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</section><!-- #content end -->

<script>
    $("#form-submit").click(function () {

        var parameters = {
            "typeId": $("input[name*='form-typeId']").val(),
            "id": $("#form-id").val(),
            "email": $("#form-email").val(),
            "name": $("#form-name").val(),
            "firstLastName": $("#form-firstLastName").val(),
            "secondLastName": $("#form-secondLastName").val(),
            "gender": $("input[name*='form-gender']").val(),
            "nationality": $("#form-nationality").val(),
            "phone": $("#form-phone1").val(),
            "phone2": $("#form-phone2").val(),
            "additionalInformation": $("#form-additionalInformation").val(),
            "address": $("#form-address").val(),
            "age": $("#form-age").val()
        };

        $("#message").html("Processing, please wait...");
        $.post("?controller=Professor&action=insertProfessorFuntion", parameters, function (data) {
            if (data.result === "1") {
                $("#message").html("Profesor Registrado Correctamente");
            } else {
                $("#message").html("Error: No se ha completado el registro. Revise los datos");
            }
            ;
        }, "json");
    });
</script>


<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';
