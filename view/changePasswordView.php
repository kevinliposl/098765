<?php
$session = SSession::getInstance();

if ($session->permissions == 'A') {
    include_once 'public/headerAdmin.php';
} else if ($session->permissions == 'T'){
    include_once 'public/headerProfessor.php';
}else if ($session->permissions == 'S'){
    include_once 'public/headerStudent.php';
}else{
    include_once 'public/header.php';
}
?>

<!-- Page Title
============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Cambiar Contraseña</h1>
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
                        <form id="form" class="nobottommargin" onsubmit="return validate();">
                            <div class="col_full">
                                <label for="form-password">Nueva Contraseña:</label>
                                <input type="password" id="form-password" class="form-control" required/>
                                <input type="hidden" id="failed-password" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            
                            <div class="col_full">
                                <label for="form-password2">Digite nuevamente la nueva contraseña:</label>
                                <input type="password" id="form-password2" class="form-control" required/>
                                <input type="hidden" id="failed-password2" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>

                            <div class="col_full nobottommargin">                      
                                <input type="submit" value="Cambiar" class="button button-3d button-black nomargin form-control" style="display: block; text-align: center;"/>
                                <input type="hidden" id="warning"/>
                                <input type="hidden" id="success"/>
                                <input type="hidden" id="failed"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section><!-- #content end -->

<!--MODAL -->
<a id="showModal" style="display: none;"class="button button-3d button-black nomargin" data-target="#myModal" data-toggle="modal">Modal</a>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">¡Aviso!</h4>
                </div>
                <div class="modal-body">
                    <h4 style="text-align: center;">¿Realmente desea cambiar su contraseña?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="button" class="btn btn-primary button-black nomargin" id="form-submity" value="Cambiar"/>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validate() {

        var pass1, pass2;

        pass1 = $("#form-password").val().trim();
        pass2 = $("#form-password2").val().trim();

        if (pass1.length < 8 || pass1.length > 10 || pass1.split(" ", 2).length > 1) {
            $("#failed-password").attr("data-notify-msg", "<i class=icon-remove-sign></i> Formato de Contraseña no validom Minimo 8 caracteres. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-password"));
            return false;

        }else if (pass2.length < 8 || pass2.length > 10 || pass2.split(" ", 2).length > 1) {
            $("#failed-password2").attr("data-notify-msg", "<i class=icon-remove-sign></i> Formato de Contraseña no valido. Minimo 8 caracteres. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-password2"));
            return false;

        } else if (pass1!=pass2) {
            $("#failed-password").attr("data-notify-msg", "<i class=icon-remove-sign></i> Las contraseñas no coinciden. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-password"));
            return false;

        } 
        
        $('#showModal').click();
        return false;
    }

    //Insert
    $("#form-submity").click(function () {
        var parameters = {
            "new": $("#form-password").val().trim()
        };

        $.post("?controller=User&action=change", parameters, function (data) {
            if (data.result === "1") {
                $("#success").attr({
                    "data-notify-type": "success",
                    "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!",
                    "data-notify-position": "bottom-full-width"
                });
                SEMICOLON.widget.notifications($("#success"));
                location.href = "?controller=User&action=logIn";
            } else {
                $("#warning").attr({
                    "data-notify-type": "warning",
                    "data-notify-msg": "<i class=icon-warning-sign></i> Operacion Fallida!",
                    "data-notify-position": "bottom-full-width"
                });
                SEMICOLON.widget.notifications($("#warning"));
            }
            ;
        }, "json");
    });
</script>

<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';
