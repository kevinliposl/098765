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
        <h1>Registar Curso</h1>
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
                                <label for="form-initials">Siglas:</label>
                                <input type="text" id="form-initials" class="form-control" maxlength="5" minlength="5"/>
                            </div>
                            
                            <div class="col_full">
                                <label for="form-name">Nombre:</label>
                                <input type="email" id="form-name" class="form-control" required/>
                            </div>

                            <div class="col_full">
                                <label for="form-instrument">Instrumento:</label>
                                <input type="text" id="form-instrument" class="form-control" required/>
                            </div>

                            <div class="col_full">
                                <label for="form-description">Breve Descripci&oacute;n:</label>
                                <input type="text" id="form-description"class="form-control" required/>
                            </div>

                            <div class="col_full nobottommargin">
                                <input type="button" class="button button-3d button-black nomargin" data-toggle="modal" id="insert" data-target="" onclick="" value="Registrar"/>
                            </div>
                            <div id="message"></div>
                        </form>
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
                                    <h4 style="text-align: center;">¿Realmente desea registrar el curso?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <input type="button" class="btn btn-primary" button-black nomargin id="insertButton" value="Confirmar"/>
                                    <input type="hidden" id="warning" value="w"/>
                                    <input type="hidden" id="success" value="s"/>
                                    <input type="hidden" id="failed" value="f"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section><!-- #content end -->

<script>
    $("#insert").click(function () {
        $('#insert').attr('data-target', '#myModal');
    });
    
    function Redirect() {
        window.location = "?controller=Course&action=defaultInsertCourse";
    }
    $("#insertButton").click(function () {

        var parameters = {
            "initials": $("#form-initials").val().trim(),
            "name": $("#form-name").val().trim(),
            "instrument": $("#form-instrument").val().trim(),
            "description": $("#form-description").val().trim()
        };

        $("#message").html("Processing, please wait...");
        $.post("?controller=Course&action=insertCourse", parameters, function (data) {
            if (data.result === "1") {
                $("#success").attr({
                    "data-notify-type": "success",
                    "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!"
                });
                SEMICOLON.widget.notifications($("#success"));
                setTimeout('Redirect()', 2000);
            } else {
                $("#warning").attr({
                    "data-notify-type": "warning",
                    "data-notify-msg": "<i class=icon-warning-sign></i> No se pudo insertar el curso!"
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