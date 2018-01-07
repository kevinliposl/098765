<?php

$session = SSession::getInstance();

if (isset($session->permissions)) {
    if ($session->permissions == 'T') {
        include_once 'public/headerProfessor.php';
    } else if ($session->permissions == 'S') {
        include_once 'public/headerStudent.php';
    } else if ($session->permissions == 'A') {
        include_once 'public/headerAdmin.php';
    } else if ($session->permissions == 'R') {
        include_once 'public/headerRoot.php';
    } else {
        header("Location:?action=notFound");
    }
} else {
    header("Location:?action=notFound");
}
?>
<section id="page-title">
    <div class="container clearfix">
        <h1>Cambiar Contraseña</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin" style="max-width: 550px;">
                <div class="acc_content clearfix">
                    <form class="nobottommargin" onsubmit="return val();">

                        <div class="col_full">
                            <label for="form-password">Nueva Contraseña:</label>
                            <input type="password" id="form-password" class="form-control" minlength="8" maxlength="15" required/>
                            <input type="hidden" id="failed-password" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class='icon-remove-sign'></i> Formato no valido, Minimo 8 caracteres. Complete e intente de nuevo!"/>
                        </div>

                        <div class="col_full">
                            <label for="form-password2">Digite nuevamente la nueva contraseña:</label>
                            <input type="password" id="form-password2" class="form-control" minlength="8" maxlength="15" required/>
                            <input type="hidden" id="failed-password2" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class='icon-remove-sign'></i> Las contraseñas no coinciden. Complete e intente de nuevo!"/>
                        </div>

                        <div class="col_full nobottommargin">                      
                            <input type="submit" value="Cambiar" class="button button-3d button-black nomargin form-control" style="display: block; text-align: center;"/>
                            <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i> Operacion Fallida!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="success" data-notify-type="success" data-notify-msg ="<i class='icon-ok-sign'></i> Operacion Exitosa!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="wait" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<a id="showModal" style="display: none;" class="button button-3d button-black nomargin" data-target="#myModal" data-toggle="modal">Modal</a>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal"id="form-close">Cerrar</button>
                    <input type="button" class="btn btn-primary button-black nomargin" id="form-submity" value="Cambiar"/>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="public/js/Views/changePasswordView.js" type="text/javascript"></script>

<?php
include_once 'public/footer.php';
