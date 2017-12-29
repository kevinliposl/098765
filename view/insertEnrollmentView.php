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
        <h1>Matricular</h1>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="accordion-lg divcenter nobottommargin" style="max-width: 550px;">
                <div class="acc_content clearfix">
                    <form id="form" class="nobottommargin">
                        <div class="white-section">
                            <label for="form-student">Estudiantes:</label>
                            <select id="form-student" class="selectpicker form-control" data-live-search="true">
                                <option value="-1" data-tokens="">Seleccione un estudiante</option>
                                <?php
                                foreach ($vars as $var) {
                                    if (isset($var["identification"])) {
                                        ?>
                                        <option value="<?php echo $var["identification"] ?> " data-tokens=""> 
                                            <?php echo $var["name"] . " " . $var["first_lastname"] . " " . $var["second_lastname"]; ?>
                                        </option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <br>
                        <div class="white-section">
                            <label for="form-professors">Profesores:</label>
                            <select multiple name="form-professors[]" id="form-professors" class="form-control selectpicker" data-live-search="true">
                            </select>
                        </div>
                        <br>
                        <div class="col_full nobottommargin">
                            <a id="form-submit" data-toggle="modal" class="button button-3d button-black nomargin" style="display : block; text-align: center;" data-target="#myModal">Insertar</a>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">¡Aviso!</h4>
                </div>
                <div class="modal-body">
                    <h4 style="text-align: center;">¿Realmente desea insertar esta matricula?</h4>
                    <p>Consejos:
                    <li>Verificar bien, si es el curso y estudiante correcto</li>
                    <li>La matricula puede ser eliminada posteriormente</li></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"id="form-close">Cerrar</button>
                    <input type="button" class="btn btn-primary button-black nomargin" id="form-submity" value="Insertar"/>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    //Change Combobox
    $("#form-student").change(function () {
        if ($("#form-student").val() !== "-1") {
            var args = {
                "identification": $("#form-student").val()
            };
            SEMICOLON.widget.notifications($("#wait"));

            document.getElementById("form-professors").options.length = 0;

            $.post("?controller=Enrollment&action=selectCourseNotStudent", args, function (data) {
                if (data.length > 0) {
                    for (var i = 0; i < data.length; i++) {
                        $('#form-professors').append($("<option></option>").attr("value", data[i].ID).text("Curso: " + data[i].name + "-Profesor(a): " + data[i].Name)); //AGREGAR OPCIONES
                        alert(data[i].ID);
                    }
                    $("#form-professors").selectpicker("refresh");
                    SEMICOLON.widget.notifications($("#success"));
                } else {
                    SEMICOLON.widget.notifications($("#warning"));
                }
            }, "json");
        }
    });

    //Open Modal
    $("#form-submit").click(function () {
        $('#form-submit').attr('data-target', '#myModal');
    });

    $("#form-submity").click(function () {
        $("#form-submity").attr('disabled', 'disabled');
        $("#form-close").attr('disabled', 'disabled');

        SEMICOLON.widget.notifications($("#wait"));

        var args = {
            "id-student": $("#form-student").val(),
            "id-courses": $("#form-professors").val()
        };

        $.post("?controller=Enrollment&action=insert", args, function (data) {
            if (data.result === "1") {
                SEMICOLON.widget.notifications($("#success"));
                setTimeout("location.href = '?controller=Enrollment&action=insert';", 2000);
            } else {
                SEMICOLON.widget.notifications($("#warning"));
                $("#form-submity").removeAttr('disabled');
                $("#form-close").removeAttr('disabled');
            }
        }, "json");
    });

</script>

<?php
include_once 'public/footer.php';
