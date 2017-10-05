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
        <h1>Insertar Administrador</h1>
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
                                <input type="hidden" id="warning" value="w"/>
                                <input type="hidden" id="success" value="s"/>
                                <input type="hidden" id="failed" value="f"/>
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

        var i;
        var flag = true;
        var form = document.getElementById("form");
        var len = form.elements.length - 1;
        for (i = 0; i < len; i++) {
            if (form.elements[i].value.trim().split(" ", 10).length > 1 || form.elements[i].value.trim().length <= 0) {
                $("#failed").attr({
                    "data-notify-type": "error",
                    "data-notify-msg": "<i class=icon-remove-sign></i> Formulario incompleto. Complete e intente de nuevo!"
                });
                SEMICOLON.widget.notifications($("#failed"));
                flag = false;
            }
        }

        if (flag) {
            var parameters = {
                "id": $("#form-id").val().trim(),
                "email": $("#form-email").val().trim(),
                "name": $("#form-name").val().trim(),
                "firstLastName": $("#form-firstLastName").val().trim(),
                "secondLastName": $("#form-secondLastName").val().trim()
            };
            $.post("?controller=Admin&action=insertAdmin", parameters, function (data) {
                if (data.result === "1") {
                    $("#success").attr({
                        "data-notify-type": "success",
                        "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!"
                    });
                    SEMICOLON.widget.notifications($("#success"));
                } else {
                    $("#warning").attr({
                        "data-notify-type": "warning",
                        "data-notify-msg": "<i class=icon-warning-sign></i> El Administrador ya existe en el Sistema!"
                    });
                    SEMICOLON.widget.notifications($("#warning"));
                }
                ;
            }, "json");
        }
    }
    );
</script>

<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';


