<?php

$session = SSession::getInstance();

if (isset($session->email)) {
    //include_once 'public/headerUser.php';
} else {
    include_once 'public/header.php';
}
?>

<section id="page-title">

    <div class="container clearfix">
        <h1>Insertar Estudiante</h1>
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

                        <form id="form-25" class="nobottommargin">
                            <h1 style="text-align: center;">Informaci&oacute;n Personal</h1>
                            <div class="acc_content clearfix"></div>
                            <div class="col_full">
                                <label for="form-id">Número de Identificación:</label>
                                <input type="text" id="form-id" class="form-control" maxlength="9" minlength="9"/>
                            </div>
                            <div class="col_full">
                                <label for="form-typeId">Tipo de Identificación:</label>
                                <input type="radio" name="form-typeId" value="N" checked/><label>Cédula Nacional</label>
                                <input type="radio" name="form-typeId" value="D"/> <label>Dimex</label>
                                <input type="radio" name="form-typeId" value="E"/><label>Pasaporte</label>
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
                                <input type="text" id="form-secondLastName"class="form-control" required pattern="{4-16}"/>
                            </div>

                            <div class="col_full">
                                <label for="form-age">Fecha de Nacimiento:</label>
                                <input type="date" id="form-age"class="form-control" required pattern="{4-10}"/>
                            </div>
                        </form>

                        <form id="form-50" class="nobottommargin" style="display: none;">
                            <h1 style="text-align: center;">Informaci&oacute;n Personal</h1>
                            <div class="acc_content clearfix"></div>
                            <div class="col_full">
                                <label for="form-address">Lugar de Residencia:</label>
                                <input type="text" id="form-address"class="form-control" required pattern="{4-16}"/>
                            </div>
                            <div class="col_full">
                                <label for="form-gender">Género:</label>
                                <input type="radio" name="form-gender" value="M" checked/> <label>Masculino</label>
                                <input type="radio" name="form-gender" value="F"/><label>Femenino</label>
                            </div>
                            <div class="col_full">
                                <label for="form-nationality">Nacionalidad:</label>
                                <input type="text" id="form-nationality"class="form-control" required pattern="{4-16}"/>
                            </div>
                            <div class="col_full">
                                <label for="form-phone1">Telefono:</label>
                                <input type="text" id="form-phone1"class="form-control" required pattern="{4-16}"/>
                            </div>
                            <div class="col_full">
                                <label for="form-phone2">Otro teléfono:</label>
                                <input type="text" id="form-phone2"class="form-control" required pattern="{4-16}"/>
                            </div>
                            <div class="col_full">
                                <label for="form-email">Correo Electronico:</label>
                                <input type="email" id="form-email" class="form-control" required/>
                            </div>
                        </form>

                        <form id="form-75" class="nobottommargin" style="display: none;">
                            <h1 style="text-align: center;">Informaci&oacute;n de contacto</h1>
                            <div class="acc_content clearfix"></div>
                            <div class="col_full">
                                <label for="form-contact-name">Nombre completo:</label>
                                <input type="text" id="form-contact-name"class="form-control" required pattern="{4-16}"/>
                            </div>
                            <div class="col_full">
                                <label for="form-contact-phone">Telefono:</label>
                                <input type="text" id="form-contact-phone"class="form-control" required pattern="{4-16}"/>
                            </div>
                            <div class="col_full">
                                <label for="form-relationship">Relaci&oacute;n:</label>
                                <input type="text" id="form-relationship"class="form-control" required pattern="{4-16}"/>
                            </div>
                            <div class="col_full">
                                <label for="form-contact-email">Correo Electronico:</label>
                                <input type="email" id="form-contact-email" class="form-control" required/>
                            </div>
<!--                            <div class="col_full nobottommargin">
                                <input type="button" class="button button-3d button-black nomargin" id="form-submit" value="Registrar"/>
                            </div>
                            <div id="message"></div>-->
                        </form>
                        
                        <form id="form-100" class="nobottommargin" style="display: none;">
                            <h1 style="text-align: center;">Resumen</h1>
<!--                            <div class="col_full nobottommargin">
                                <input type="button" class="button button-3d button-black nomargin" id="form-submit" value="Registrar"/>
                            </div>
                            <div id="message"></div>-->
                        </form>
                        <ul class="pager">
                            <li><a id="previous" onclick="">Previous</a></li>
                            <li><a id="next" onclick="">Next</a></li>
                        </ul>

                        <div class="progress progress-striped active">
                            <div id="progressBar" class="progress-bar"  role="progressbar" aria-valuenow="25" aria-valuemin="10" aria-valuemax="100" style="width: 10%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

</section><!-- #content end -->

<script>
    $("#form-submit").click(function () {

        var parameters = {
            "typeId": $("#form-id").val,
            "id": $("#form-id").val(),
            "email": $("#form-email").val(),
            "name": $("#form-name").val(),
            "firstLastName": $("#form-firstLastName").val(),
            "secondLastName": $("#form-secondLastName").val(),
            "gender": $("#form-gender").val(),
            "nationality": $("#form-nationality").val(),
            "phone": $("#form-phone").val(),
            "phone2": $("#form-phone2").val(),
            "additionalInformation": $("#form-additionalInformation").val()
        };

        $("#message").html("Processing, please wait...");
        $.post("?controller=Admin&action=insertProfessor", parameters, function (data) {
            if (data.result === "1") {
                $("#message").html("Success");
            } else {
                $("#message").html("Failed");
            }
            ;
        }, "json");
    });
</script>
<script>
    $("#next").click(function () {
        var jump = 25;
        var cant = parseInt($('#progressBar').attr('aria-valuenow'));
        document.getElementById("form-" + cant).style.display = "none";

        var cant = cant + jump;
        document.getElementById("form-" + cant).style.display = "block";
        $('#progressBar').attr('aria-valuenow', (cant)).css('width', cant + '%');
        $("#message").html($('#progressBar').attr('aria-valuenow'));


    });
</script>
<script>
    $("#previous").click(function () {
        var jump = 25;
        var cant = parseInt($('#progressBar').attr('aria-valuenow'));
        document.getElementById("form-" + cant).style.display = "none";

        var cant = cant - jump;
        document.getElementById("form-" + cant).style.display = "block";
        $('#progressBar').attr('aria-valuenow', (cant)).css('width', cant + '%');
        $("#message").html($('#progressBar').attr('aria-valuenow'));


    });
</script>




<?php

include_once 'public/footer.php';


