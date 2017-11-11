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
        <h1>Insertar Semestre</h1>
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
                        <form id="form" class="nobottommargin" onsubmit="return false">
                            <div class="col_full">
                                <label for="form-year">A&ncaron;o:</label>
                                <input type="number" id="form-year" class="form-control" required minlength="4" maxlength="4" placeholder="2000"/>
                                <input type="hidden" id="failed-year" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>

                            <div class="col_full">
                                <label for="form-semester">Semestre:</label>
                                <select id="form-semester" class="form-control" data-live-search="true">
                                    <option value="-1" data-tokens="">Seleccione un Semestre</option>
                                    <option value="1" data-tokens=""> I Semestre</option>
                                    <option value="2" data-tokens="">II Semestre</option>
                                </select>
                                <input type="hidden" id="failed-semester" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>

                            <div class="col_full nobottommargin">                      
                                <input type="submit" value="Insertar" class="button button-3d button-black nomargin form-control" id="submit" style="display: block; text-align: center;"/>
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
                    <h4 style="text-align: center;">¿Realmente desea insertar este Semestre?</h4>
                    <p>Consejos:
                    <li>Revisar que todos los campos tengan la informaci&oacute;n correcta</li>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="button" class="btn btn-primary button-black nomargin" id="form-submity" value="Insertar"/>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#submit").click(function () {

        var year = $("#form-year").val().trim();
        var semester = $("#form-semester").val().trim();

        if (year < 2000 && !isNaN(year)) {
            $("#failed-year").attr("data-notify-msg", "<i class=icon-remove-sign></i> A&ncaron;o Incorrecto. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-year"));
            return false;
        } else if (semester < 1) {
            $("#failed-semester").attr("data-notify-msg", "<i class=icon-remove-sign></i> Semestre no Seleccionado. Complete e intente de nuevo!");
            SEMICOLON.widget.notifications($("#failed-semester"));
            return false;
        }

        $('#showModal').click();
        return false;
    });

    //Insert
    $("#form-submity").click(function () {
        
        var parameters = {
            'year': $("#form-year").val().trim(),
            'semester': $("#form-semester").val().trim()
        };
        
        $.post("?controller=Semester&action=insert", parameters, function (data) {
            alert(data);
            if (data.result === "1") {
                $("#success").attr({
                    "data-notify-type": "success",
                    "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!",
                    "data-notify-position": "bottom-full-width"
                });
                SEMICOLON.widget.notifications($("#success"));
                setTimeout("location.href = '?controller=Semester&action=insert';", 2000);
            } else {
                $("#warning").attr({
                    "data-notify-type": "warning",
                    "data-notify-msg": "<i class=icon-warning-sign></i> El Semestre ya existe en el Sistema!",
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

