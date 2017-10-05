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
                                <label for="form-typeId">Tipo de Identificación:</label>
                                <input type="radio" name="form-typeId" value="N" checked/><label>Cédula Nacional</label>
                                <input type="radio" name="form-typeId" value="D"/> <label>Dimex</label>
                                <input type="radio" name="form-typeId" value="E"/><label>Pasaporte</label>
                            </div>
                            <div class="col_full">
                                <label for="form-id">Número de Identificación:</label>
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
                                <input type="text" id="form-secondLastName"class="form-control" required pattern="{4-16}"/>
                            </div>
                            <div class="col_full">
                                <label for="form-province">Provincia:</label>
                                <input type="text" id="form-province"class="form-control" required pattern="{4-16}"/>
                            </div>
                            <div class="col_full">
                                <label for="form-canton">Cantón:</label>
                                <input type="text" id="form-canton"class="form-control" required pattern="{4-16}"/>
                            </div>
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
                                <label for="form-birthdate">Fecha de Nacimiento:</label>
                                <input type="text" id="form-birthdate"class="form-control" required pattern="{4-16}"/>
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
                            <div class="col_full">
                                <label for="form-additionalInformation">Información Adicional:</label>
                                <input type="text" id="form-additionalInformation"class="form-control" required pattern="{4-16}"/>
                            </div>
                            <div class="col_full nobottommargin">
                                <input type="" class="button button-3d button-black nomargin" id="form-submit" value="Registrar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</section><!-- #content end -->




<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';
