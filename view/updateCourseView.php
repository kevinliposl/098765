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
        <h1>Actualizar Curso</h1>
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
                            <div class="white-section">
                                <label for="form-id">Cursos:</label>
                                <select id="form-courses" class="selectpicker form-control" data-live-search="true">
                                    <?php foreach ($vars as $var) { ?>
                                        <option value="<?php echo $var["id"] ?>" data-tokens="">
                                            <?php echo $var["Course"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <br>
                            <div class="col_full">
                                <label for="form-initials">Siglas:</label>
                                <input type="text" id="form-initials" class="form-control" readonly="readonly"/>
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
                                <input type="button" class="button button-3d button-black nomargin" data-toggle="modal" id="update" data-target="" onclick="" value="Actualizar"/>
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
                                    <button type="button" class="close" data-dismiss="modal" value="as" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">¡Aviso!</h4>
                                </div>
                                <div class="modal-body">
                                    <h4 style="text-align: center;">¿Realmente desea actualizar el curso seleccionado?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <input type="button" class="btn btn-primary" button-black nomargin id="updateButton" value="Confirmar"/>
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

    $("#form-courses").change(function () {
        var parameters = {
            "id": $("#form-courses").val()
        };
        $.post("?controller=Course&action=selectCourse", parameters, function (data) {
            $("#form-initials").val(data.initials);
            $("#form-name").val(data.name);
            $("#form-instrument").val(data.instrument);
            $("#form-description").val(data.description);
            
            $("#success").attr({
                "data-notify-type": "success",
                "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!",
                "data-notify-position":"bottom-full-width"
            });
            SEMICOLON.widget.notifications($("#success"));
        }, "json");
    });


</script>

<script>
    $("#update").click(function () {
        $('#update').attr('data-target', '#myModal');
    });
    
    function Redirect() {
        window.location = "?controller=Course&action=defaultUpdateCourse";
    }
    
    $("#updateButton").click(function () {

//        var i;
//        var flag = true;
//        var form = document.getElementById("form");
//        var len = form.elements.length - 1;
//        for (i = 0; i < len; i++) {
//            if (form.elements[i].value.trim().split(" ", 10).length > 1 || form.elements[i].value.trim().length <= 0) {
//                $("#failed").attr({
//                    "data-notify-type": "error",
//                    "data-notify-msg": "<i class=icon-remove-sign></i> Formulario incompleto. Complete e intente de nuevo!"
//                });
//                SEMICOLON.widget.notifications($("#failed"));
//                flag = false;
//            }
//        }

        if (true) {
            var parameters = {
                "id": $("#form-courses").val().trim(),
                "name": $("#form-name").val().trim(),
                "description": $("#form-description").val().trim(),
                "instrument": $("#form-instrument").val().trim()
            };
            $.post("?controller=Course&action=updateCourse", parameters, function (data) {
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
                        "data-notify-msg": "<i class=icon-warning-sign></i> No se pudo actualizar el curso!"
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
