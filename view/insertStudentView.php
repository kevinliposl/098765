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
                        <form id="form-insert-student" class="nobottommargin">
                            <div id="form-25" class="nobottommargin">
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
                            </div>

                            <div id="form-50" class="nobottommargin" style="display: none;">
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
                            </div>

                            <div id="form-75" class="nobottommargin" style="display: none;">
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
                            </div>


                            <div id="form-100" class="nobottommargin" style="display: none;">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <h5 style="text-align: center;">Informaci&oacute;n del Estudiante</h5>
                                        <colgroup>
                                            <col class="col-xs-3">
                                            <col class="col-xs-8">
                                        </colgroup>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <code>Identificaci&oacute;n</code>
                                                </td>
                                                <td id="form-id-table"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <code>Nombre</code>
                                                </td>
                                                <td id="form-name-table"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <code>Apellidos</code>
                                                </td>
                                                <td id="form-lastName-table"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <code>Fecha N.</code>
                                                </td>
                                                <td id="form-age-table"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <code>Residencia</code>
                                                </td>
                                                <td id="form-address-table"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <code>G&eacute;nero</code>
                                                </td>
                                                <td id="form-gender-table"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <code>Nacionalidad</code>
                                                </td>
                                                <td id="form-nationality-table"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <code>Tel&eacute;fonos</code>
                                                </td>
                                                <td id="form-phones-table"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <code>Email</code>
                                                </td>
                                                <td id="form-email-table"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered table-striped">
                                        <h5 style="text-align: center;">Informaci&oacute;n del Contacto</h5>
                                        <colgroup>
                                            <col class="col-xs-3">
                                            <col class="col-xs-8">
                                        </colgroup>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <code>Nombre Contacto</code>
                                                </td>
                                                <td id="form-contact-name-table"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <code>Tel&eacute;fono</code>
                                                </td>
                                                <td id="form-contact-phone-table"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <code>Relaci&oacute;n</code>
                                                </td>
                                                <td id="form-relationship-table"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <code>Email</code>
                                                </td>
                                                <td id="form-contact-email-table"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>

                        <ul class="pager">
                            <li><a id="previous" onclick="">Anterior</a></li>
                            <li><a data-toggle="modal" id="next" data-target="" onclick="">Siguiente</a></li>
                        </ul>

                        <div class="progress progress-striped active">
                            <div id="progressBar" class="progress-bar"  role="progressbar" aria-valuenow="25" aria-valuemin="10" aria-valuemax="100" style="width: 10%">
                                <span class="sr-only"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-body">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">¡Aviso!</h4>
                                </div>
                                <div class="modal-body">
                                    <h4>¿Realmente desea insertar este nuevo Estudiante?</h4>
                                    <p>Consejos:
                                    <li style="text-align: center;">Revisar que todos los campos tengan la informaci&oacute;n correcta</li>
                                    <li style="text-align: center;">Revisar con ateci&oacute;n cada item de los cuadro resumen</li></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <button id="insertButton" type="button" class="btn btn-primary">Guardar estudiante</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

</section><!-- #content end -->

<script>
    $("#next").click(function () {
        var jump = 25;
        var cant = parseInt($('#progressBar').attr('aria-valuenow'));

        if (cant !== 100) {
            document.getElementById("form-" + cant).style.display = "none";

            var cant = cant + jump;
            document.getElementById("form-" + cant).style.display = "block";
            $('#progressBar').attr('aria-valuenow', (cant)).css('width', cant + '%');
            $("#message").html($('#progressBar').attr('aria-valuenow'));
            if (cant === 100) {
                $('#next').html("Registrar");

                document.getElementById("form-id-table").innerHTML = document.getElementById("form-id").value
                        + " (" + $("input:radio[name='form-typeId']:checked").val() + ")";
                document.getElementById("form-name-table").innerHTML = document.getElementById("form-name").value;
                document.getElementById("form-lastName-table").innerHTML = document.getElementById("form-firstLastName").value
                        + " " + document.getElementById("form-secondLastName").value;
                document.getElementById("form-age-table").innerHTML = document.getElementById("form-age").value;
                document.getElementById("form-address-table").innerHTML = document.getElementById("form-address").value;
                document.getElementById("form-gender-table").innerHTML = $("input:radio[name='form-gender']:checked").val();
                document.getElementById("form-nationality-table").innerHTML = document.getElementById("form-nationality").value;
                document.getElementById("form-phones-table").innerHTML = document.getElementById("form-phone1").value
                        + ", " + document.getElementById("form-phone2").value;
                document.getElementById("form-email-table").innerHTML = document.getElementById("form-email").value;
                document.getElementById("form-contact-name-table").innerHTML = document.getElementById("form-contact-name").value;
                document.getElementById("form-relationship-table").innerHTML = document.getElementById("form-relationship").value;
                document.getElementById("form-contact-phone-table").innerHTML = document.getElementById("form-contact-phone").value;
                document.getElementById("form-contact-email-table").innerHTML = document.getElementById("form-contact-email").value;
            }
        } else {
            $('#next').attr('data-target', '#myModal');
        }

    });
</script>

<script>
    $("#previous").click(function () {
        var jump = 25;
        var cant = parseInt($('#progressBar').attr('aria-valuenow'));
        if (cant !== jump) {
            if (cant === 100) {
                $('#next').html("Siguiente");
            }

            document.getElementById("form-" + cant).style.display = "none";

            var cant = cant - jump;
            document.getElementById("form-" + cant).style.display = "block";
            $('#progressBar').attr('aria-valuenow', (cant)).css('width', cant + '%');
            $("#message").html($('#progressBar').attr('aria-valuenow'));
        }

    });
</script>




<?php

include_once 'public/footer.php';


