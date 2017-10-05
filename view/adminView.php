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
                        <form id="form" class="nobottommargin">
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

        var separador = " ";
        var limite = 10;
        var parameters = {
            "id": $("#form-id").val().trim(),
            "email": $("#form-email").val().trim(),
            "name": $("#form-name").val().trim(),
            "firstLastName": $("#form-firstLastName").val().trim(),
            "secondLastName": $("#form-secondLastName").val().trim()
        };
        var i;
        var form = document.getElementById("form");
        var len= form.elements.length;
        for (i = 0; i < len; i++) {
            if (form.elements[i].split(separador, limite).length > 1) {
                alert("Tiene Espacios");
            }
        }







//        $.post("?controller=Admin&action=insertAdmin", parameters, function (data) {
//            if (data.result === "1") {
//                $("#message").html("Exitoso");
//            } else {
//                $("#message").html("Fallido");
//            }
//            ;
//        }, "json");
    }
    );

//        $("#form-submit").attr(
//                {
//                    "data-notify-type": "success",
//                    "data-notify-msg": "<i class=icon-ok-sign></i> Message Sent Successfully!"
//                });
//        SEMICOLON.widget.notifications(this);
//                $("#form-submit").attr({
//                    "data-notify-type": "error",
//                    "data-notify-msg": "<i class=icon-remove-sign></i> Incorrect Input. Please Try Again!"
//                });
//                SEMICOLON.widget.notifications(this);


</script>

<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';


