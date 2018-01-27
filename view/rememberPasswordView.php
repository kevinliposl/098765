<?php
include_once 'public/header.php';
?>

<section id="page-title">
    <div class="container clearfix">
        <h1>Recuperar Contraseña</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin" style="max-width: 550px;">
                <div class="acc_content clearfix">
                    <form id="form" class="nobottommargin" onsubmit="return val()">
                        <div class="col_full">
                            <label for="form-password">Correo electr&oacute;nico:</label>
                            <input type="email" id="form-email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required/>
                            <input type="hidden" id="failed-email" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                        </div>
                        <div class="col_full nobottommargin">                      
                            <input type="submit" value="Obtener" class="button button-3d button-black nomargin form-control" style="display: block; text-align: center;"/>
                            <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i> El envio no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="success" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Envio realizado, revise en breve...!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="wait" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="public/js/jquery.min.js" type="text/javascript"></script>
<script src="public/js/Views/rememberPasswordView.js" type="text/javascript"></script>

<?php

include_once 'public/footer.php';
