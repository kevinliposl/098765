<?php

$session = SSession::getInstance();

if (isset($session->permissions)) {
    if ($session->permissions == 'A') {
        include_once 'public/headerAdmin.php';
    } else {
        header('Location:?action=notFound');
    }
} else {
    header('Location:?action=notFound');
}
?>

<section id="page-title">
    <div class="container clearfix">
        <h1>Insertar Semestre</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin" style="max-width: 550px;">
                <div class="acc_content clearfix">
                    <form id="form" class="nobottommargin" onsubmit="return val();">
                        <div class="col_full">
                            <label for="form-year">A&ncaron;o:</label>
                            <input type="number" id="form-year" class="form-control" pattern="[0-9]+$" required minlength="4" maxlength="4" placeholder="2000"/>
                            <input type="hidden" id="failed-year" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> A&ncaron;o Incorrecto. Complete e intente de nuevo!"/>
                        </div>

                        <div class="col_full">
                            <label for="form-semester">Semestre:</label>
                            <select id="form-semester" class="form-control" data-live-search="true">
                                <option value="-1" data-tokens="">Seleccione un Semestre</option>
                                <option value="1" data-tokens=""> I Semestre</option>
                                <option value="2" data-tokens="">II Semestre</option>
                            </select>
                            <input type="hidden" id="failed-semester" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> Semestre no Seleccionado. Complete e intente de nuevo!"/>
                        </div>
                        <div class="col_full nobottommargin">                      
                            <input type="submit" value="Insertar" class="button button-3d button-black nomargin form-control" id="submit" style="display: block; text-align: center;"/>
                            <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i>La operacion no se pudo realizar, intente de nuevo o m&aacute;s tarde!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="success" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Operaci&oacute;n exitosa, revise en breve...!" data-notify-position="bottom-full-width"/>
                            <input type="hidden" id="wait" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>      
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

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
                    <h4 style="text-align: center;">¿Realmente desea insertar este Semestre?</h4>
                    <p>Consejos:
                    <li>Revisar que todos los campos tengan la informaci&oacute;n correcta</li>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"id="form-close">Cerrar</button>
                    <input type="button" class="btn btn-primary button-black nomargin" id="form-submity" value="Insertar"/>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="public/js/Views/insertSemesterView.js" type="text/javascript"></script>

<?php

include_once 'public/footer.php';
