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
        <h1>Administrador</h1>
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
                                <label for="form-id">Cedula:</label>
                                <input type="text" id="form-id" class="form-control" maxlength="9" minlength="9"/>
                            </div>

                            <div class="col_full">
                                <label for="form-email">Correo Electronico:</label>
                                <input type="email" id="form-email" class="form-control" required/>
                            </div>

                            <div class="col_full">
                                <label for="form-name">Nombre:</label>
                                <input type="text" id="form-name" class="form-control" required/>
                            </div>

                            <div class="col_full">
                                <label for="form-firstlastname">Primer Apellido:</label>
                                <input type="text" id="form-firstLastName"class="form-control" required/>
                            </div>

                            <div class="col_full">
                                <label for="form-secondlastname">Segundo Apellido:</label>
                                <input type="text" id="form-secondLastName"class="form-control" required />
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
            "id": $("#form-id").val(),
            "email": $("#form-email").val(),
            "name": $("#form-name").val(),
            "firstLastName": $("#form-firstLastName").val(),
            "secondLastName": $("#form-secondLastName").val()
        };

        $("#message").html("Processing, please wait...");
        $.post("?controller=Admin&action=insertAdmin", parameters, function (data) {
            if (data.result === "1") {
                $("#message").html("Success");
            } else {
                $("#message").html("Failed");
            }
            ;
        }, "json");
    });
</script>

<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';


