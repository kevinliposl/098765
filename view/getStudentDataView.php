<?php
include_once 'public/headerAdmin.php';
?>

<!-- Page Title
    ============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>Ver Estudiantes</h1>
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
                                    <label for="form-student">Estudiantes:</label>
                                    <select id="form-student" class="selectpicker form-control" data-live-search="true">
                                        <option value="-1" data-tokens="">Seleccione un Estudiante</option>
                                        <?php foreach ($vars as $var) { ?>
                                        <option value="<?php echo $var["identification"] ?>" data-tokens="">
                                            <?php echo $var["identification"] . " | " . $var["name"] . " " . $var["first_lastname"] . " " . $var["second_lastname"]; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="acc_content clearfix"></div>
                                    <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i> No se pudo obtener la informaci&oacute;n necesaria!" data-notify-position="bottom-full-width"/>
                                    <input type="hidden" id="success" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i>Operaci&oacute;n Exitosa. Informaci&oacute;n visualizada!" data-notify-position="bottom-full-width"/>
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
                                            <h4 style="text-align: center;">¿Realmente desea actualizar los datos de este Estudiante?</h4>
                                            <p>Consejos:
                                                <li>Verificar bien, si es el estudiante que realmente desea actualizar</li>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                <input type="button" class="btn btn-primary" button-black nomargin id="form-submity" value="Actualizar"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container clearfix">

                        <input type="hidden" id="form-old-id" name="form-old-id" value="">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" style="clear: both">
                                <h5 style="text-align: center;">Informaci&oacute;n del Estudiante</h5>    
                                <tbody>
                                    <tr>
                                        <td width="15%">Identificaci&oacute;n</td>
                                        <td width="55%">
                                            <a id="form-id" href="#" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese la identificación"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tipo de Identificaci&oacute;n</td>
                                        <td>
                                            <a id="form-id-type"  href="#" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el tipo de identificación"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nombre</td>
                                        <td>
                                            <a id="form-name" href="#" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el nombre"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Primer Apellido</td>
                                        <td>
                                            <a id="form-first-lastName" href="#"  data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el Primer Apellido"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Segundo Apellido</td>
                                        <td>
                                            <a id="form-second-lastName" href="#"  data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el Segundo Apellido"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>G&eacute;nero</td>
                                        <td>
                                            <a id="form-gender" href="#"  data-type="select" data-pk="1" data-value="" data-title="Seleccione el género"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nacionalidad</td>
                                        <td>
                                            <a id="form-nationality" href="#"  data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese la nacionalidad"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tel&eacute;fono 1</td>
                                        <td>
                                            <a id="form-phone1" href="#"  data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el Teléfono"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tel&eacute;fono 2</td>
                                        <td>
                                            <a id="form-phone2" href="#"  data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese otro Teléfono"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>
                                            <a id="form-email" href="#"  data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el email"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Fecha de Nacimiento</td>
                                        <td>
                                            <a id="form-age" href="#"  data-type="combodate" data-value="1984-05-15" data-format="YYYY-MM-DD" data-viewformat="YYYY-MM-DD" data-template="YYYY / MMM / D" data-pk="1"  data-title="Ingrese la fecha de nacimiento"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nombre del Contacto</td>
                                        <td>
                                            <a id="form-contact-name" href="#"  data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el nombre completo del contacto"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tel&eacute;fono del Contacto</td>
                                        <td>
                                            <a id="form-contact-phone" href="#"  data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el teléfono"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Relaci&oacute;n</td>
                                        <td>
                                            <a id="form-relationship" href="#"  data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese la relación con el estudiante"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email del Contacto</td>
                                        <td>
                                            <a id="form-contact-email" href="#"  data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Ingrese el email"></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section><!-- #content end -->
            
            <script>
                $("#form-student").change(function () {
                    if ($("#form-student").val() !== "-1") {
                        var parameters = {
                            "id": $("#form-student").val()
                        };
                        $.post("?controller=Student&action=selectStudent", parameters, function (data) {
                            if(data.identification){
                                document.getElementById("form-id").innerHTML = data.identification;
                                document.getElementById("form-old-id").value = data.identification;
                                document.getElementById("form-id-type").innerHTML = data.id_type;
                                document.getElementById("form-name").innerHTML = data.name;
                                document.getElementById("form-first-lastName").innerHTML = data.first_lastname;
                                document.getElementById("form-second-lastName").innerHTML = data.second_lastname;
                                document.getElementById("form-phone1").innerHTML = data.phoneOne;
                                document.getElementById("form-phone2").innerHTML = data.phoneTwo;
                                document.getElementById("form-email").innerHTML = data.email;
                                document.getElementById("form-gender").innerHTML = data.gender;
                                document.getElementById("form-nationality").innerHTML = data.nationality;
                                document.getElementById("form-age").innerHTML = data.birthdate;
                                document.getElementById("form-contact-name").innerHTML = data.full_contact_name;
                                document.getElementById("form-contact-phone").innerHTML = data.telephone_contact;
                                document.getElementById("form-relationship").innerHTML = data.relationship;
                                document.getElementById("form-contact-email").innerHTML = data.contact_email;

                                SEMICOLON.widget.notifications($("#success"));
                            }else{
                                SEMICOLON.widget.notifications($("#warning"));
                            }
                        }, "json");
                    } else {
                        document.getElementById("form-submit").style.display = "none";
                    }
                });

            </script>

        <!-- End Content
            ============================================= -->    
            <?php
            include_once 'public/footer.php';


