<?php
$session = SSession::getInstance();

if (isset($session->permissions)) {
    include_once 'public/headerAdmin.php';
} else {
    include_once 'public/header.php';
}
?>

<!-- Page Title
============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Obtener Datos Personales de Profesores</h1>
    </div>
</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin" style="max-width: 550px;">
                <div class="acc_content clearfix">
                    <form id="form" class="nobottommargin">
                        <div class="white-section">
                            <label for="form-professor">Profesores:</label>
                            <select id="form-professor" class="selectpicker form-control" data-live-search="true">
                                <option data-tokens="">Seleccione un Profesor</option>
                                <?php foreach ($vars as $var) { ?>
                                    <option value="<?php echo $var["identification"] ?>" data-tokens="">
                                        <?php echo $var["Name"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <br>
                        <div class="acc_content clearfix"></div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <h5 style="text-align: center;">Informaci&oacute;n del Profesor</h5>
                                <colgroup>
                                    <col class="col-xs-5">
                                    <col class="col-xs-8">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td><code>Identificaci&oacute;n</code></td>
                                        <td>
                                            <a id="form-id"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><code>Tipo de Identificaci&oacute;n</code></td>
                                        <td>
                                            <a id="form-id-type"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><code>Nombre</code></td>
                                        <td>
                                            <a id="form-name"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><code>Primer Apellido</code></td>
                                        <td>
                                            <a id="form-first-lastName"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><code>Segundo Apellido</code></td>
                                        <td>
                                            <a id="form-second-lastName"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><code>G&eacute;nero</code></td>
                                        <td>
                                            <a id="form-gender"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><code>Nacionalidad</code></td>
                                        <td>
                                            <a id="form-nationality"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><code>Tel&eacute;fono</code></td>
                                        <td>
                                            <a id="form-phone1"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><code>Otro Tel&eacute;fono</code></td>
                                        <td>
                                            <a id="form-phone2"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><code>Email</code></td>
                                        <td>
                                            <a id="form-email"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><code>Fecha de Nacimiento</code></td>
                                        <td>
                                            <a id="form-age"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><code>Direcci&oacute;n</code></td>
                                        <td>
                                            <a id="form-address"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><code>Informaci&oacute;n Adicional</code></td>
                                        <td>
                                            <a id="form-additionalInformation"></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section><!-- #content end -->


<script>

    //Change Combobox
    $("#form-professor").change(function () {
        var parameters = {
            "id": $("#form-professor").val()
        };
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
            }
        }, "json");
    });
</script>

<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';