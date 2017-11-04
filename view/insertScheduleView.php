<?php
$session = SSession::getInstance();

if (isset($session->email)) {
    include_once 'public/headerUser.php';
} else {
    include_once 'public/header.php';
}
?>

<!-- Page Title
============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Insertar Horario</h1>
    </div>
</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <form class="nobottommargin" onsubmit="return validate();">
                <div class="col_one_fifth">
                    <label for="billing-form-name">Semestre:</label>
                    <select id="form-admin" class="selectpicker form-control" data-live-search="true">
                        <option value="-1" data-tokens="">Seleccione un Semestre</option>
                        <?php
                        foreach ($vars as $var) {
                            if (isset($var["identification"])) {
                                ?>
                                <option value="<?php echo $var["ID"] ?> " data-tokens="">
                                    <?php echo $var["identification"] . " | " . $var["name"] . " " . $var["first_lastname"] . " " . $var["second_lastname"]; ?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="col_one_fourth">
                    <label for="billing-form-lname">Curso</label>
                    <select id="form-admin" class="selectpicker form-control" data-live-search="true" disabled>
                        <option value="-1" data-tokens="">Seleccione un Curso</option>
                        <?php
                        foreach ($vars as $var) {
                            if (isset($var["identification"])) {
                                ?>
                                <option value="<?php echo $var["ID"] ?> " data-tokens="">
                                    <?php echo $var["identification"] . " | " . $var["name"] . " " . $var["first_lastname"] . " " . $var["second_lastname"]; ?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="col_one_fourth">
                    <label for="billing-form-lname">Horario</label>
                    <select id="form-admin" class="form-control" data-live-search="true" disabled>
                        <option value="-1" data-tokens="">Seleccione la Hora de Inicio</option>
                        <option value="7" data-tokens="">7:00</option>
                        <option value="8" data-tokens="">8:00</option>
                        <option value="9" data-tokens="">9:00</option>
                        <option value="10" data-tokens="">10:00</option>
                        <option value="11" data-tokens="">11:00</option>
                        <option value="12" data-tokens="">12:00</option>
                        <option value="13" data-tokens="">13:00</option>
                        <option value="14" data-tokens="">14:00</option>
                        <option value="15" data-tokens="">15:00</option>
                        <option value="16" data-tokens="">16:00</option>
                        <option value="17" data-tokens="">17:00</option>
                        <option value="18" data-tokens="">18:00</option>
                        <option value="19" data-tokens="">19:00</option>
                        <option value="20" data-tokens="">20:00</option>
                        <option value="21" data-tokens="">21:00</option>
                        <option value="22" data-tokens="">22:00</option>
                    </select>
                    </br>
                    <select id="form-admin" class="form-control" data-live-search="true" disabled>
                        <option value="-1" data-tokens="">Seleccione la Hora de Finalizaci&oacute;n</option>
                        <option value="0">7:50</option>
                        <option value="1">8:50</option>
                        <option value="2">9:50</option>
                        <option value="3">10:50</option>
                        <option value="4">11:50</option>
                        <option value="5">12:50</option>
                        <option value="6">13:50</option>
                        <option value="7">14:50</option>
                        <option value="8">15:50</option>
                        <option value="9">16:50</option>
                        <option value="10">17:50</option>
                        <option value="11">18:50</option>
                        <option value="12">19:50</option>
                        <option value="13">20:50</option>
                        <option value="14">21:50</option>
                        <option value="15">22:50</option>
                    </select>
                </div>

                <div class="col_one_fourth">
                    <label for="billing-form-lname">Dias:</label>
                    <select multiple id="form-professors" class="form-control selectpicker" data-live-search="true" disabled>
                        <option value="Lunes" data-tokens="">L</option>
                        <option value="Martes" data-tokens="">K</option>
                        <option value="Miercoles" data-tokens="">M</option>
                        <option value="Jueves" data-tokens="">J</option>
                        <option value="Viernes" data-tokens="">V</option>
                        <option value="Sabado" data-tokens="">S</option>
                        <option value="Domingo" data-tokens="">D</option>
                    </select>
                </div>
                <div class="col_full nobottommargin">
                    <input type="hidden" id="warning" data-notify-position="bottom-full-width" data-notify-type= "warning"/>
                    <input type="hidden" id="success" data-notify-position="bottom-full-width" data-notify-type= "success"/>
                    <input type="hidden" id="failed" data-notify-position="bottom-full-width" data-notify-type= "error"/>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered nobottommargin table-striped" id="horario">
                    <thead>
                        <tr>
                            <th>Horas</th>
                            <th>(L) Lunes</th>
                            <th>(K) Martes</th>
                            <th>(M) Miercoles</th>
                            <th>(J) Jueves</th>
                            <th>(V) Viernes</th>
                            <th>(S) Sabado</th>
                            <th>(D) Domingo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>07:00 - 07:50</td>
                            <td id="Lunes7"></td>
                            <td id="Martes7"></td>
                            <td id="Miercoles7"></td>
                            <td id="Jueves7"></td>
                            <td id="Viernes7"></td>
                            <td id="Sabado7"></td>
                            <td id="Domingo7"></td>
                        </tr>
                        <tr>
                            <td>08:00 - 08:50</td>
                            <td id="Lunes8"></td>
                            <td id="Martes8"></td>
                            <td id="Miercoles8"></td>
                            <td id="Jueves8"></td>
                            <td id="Viernes8"></td>
                            <td id="Sabado8"></td>
                            <td id="Domingo8"></td>
                        </tr>
                        <tr>
                            <td>09:00 - 09:50</td>
                            <td id="Lunes9"></td>
                            <td id="Martes9"></td>
                            <td id="Miercoles9"></td>
                            <td id="Jueves9"></td>
                            <td id="Viernes9"></td>
                            <td id="Sabado9"></td>
                            <td id="Domingo9"></td>
                        </tr>
                        <tr>
                            <td class="hora">10:00 - 10:50</td>
                            <td id="Lunes10"></td>
                            <td id="Martes10"></td>
                            <td id="Miercoles10"></td>
                            <td id="Jueves10"></td>
                            <td id="Viernes10"></td>
                            <td id="Sabado10"></td>
                            <td id="Domingo10"></td>
                        </tr>
                        <tr>
                            <td class="hora">11:00 - 11:50</td>
                            <td id="Lunes11"></td>
                            <td id="Martes11"></td>
                            <td id="Miercoles11"></td>
                            <td id="Jueves11"></td>
                            <td id="Viernes11"></td>
                            <td id="Sabado11"></td>
                            <td id="Domingo11"></td>
                        </tr>
                        <tr>
                            <td class="hora">12:00 - 12:50</td>
                            <td id="Lunes12"></td>
                            <td id="Martes12"></td>
                            <td id="Miercoles12"></td>
                            <td id="Jueves12"></td>
                            <td id="Viernes12"></td>
                            <td id="Sabado12"></td>
                            <td id="Domingo12"></td>
                        </tr>
                        <tr>
                            <td class="hora">13:00 - 13:50</td>
                            <td id="Lunes13"></td>
                            <td id="Martes13"></td>
                            <td id="Miercoles13"></td>
                            <td id="Jueves13"></td>
                            <td id="Viernes13"></td>
                            <td id="Sabado13"></td>
                            <td id="Domingo13"></td>
                        </tr>
                        <tr>
                            <td class="hora">14:00 - 14:50</td>
                            <td id="Lunes14"></td>
                            <td id="Martes14"></td>
                            <td id="Miercoles14"></td>
                            <td id="Jueves14"></td>
                            <td id="Viernes14"></td>
                            <td id="Sabado14"></td>
                            <td id="Domingo14"></td>
                        </tr>
                        <tr>
                            <td class="hora">15:00 - 15:50</td>
                            <td id="Lunes15"></td>
                            <td id="Martes15"></td>
                            <td id="Miercoles15"></td>
                            <td id="Jueves15"></td>
                            <td id="Viernes15"></td>
                            <td id="Sabado15"></td>
                            <td id="Domingo15"></td>
                        </tr>
                        <tr>
                            <td class="hora">16:00 - 16:50</td>
                            <td id="Lunes16"></td>
                            <td id="Martes16"></td>
                            <td id="Miercoles16"></td>
                            <td id="Jueves16"></td>
                            <td id="Viernes16"></td>
                            <td id="Sabado16"></td>
                            <td id="Domingo16"></td>
                        </tr>
                        <tr>
                            <td class="hora">17:00 - 17:50</td>
                            <td id="Lunes17"></td>
                            <td id="Martes17"></td>
                            <td id="Miercoles17"></td>
                            <td id="Jueves17"></td>
                            <td id="Viernes17"></td>
                            <td id="Sabado17"></td>
                            <td id="Domingo17"></td>
                        </tr>
                        <tr>
                            <td class="hora">18:00 - 18:50</td>
                            <td id="Lunes18"></td>
                            <td id="Martes18"></td>
                            <td id="Miercoles18"></td>
                            <td id="Jueves18"></td>
                            <td id="Viernes18"></td>
                            <td id="Sabado18"></td>
                            <td id="Domingo18"></td>
                        </tr>
                        <tr>
                            <td class="hora">19:00 - 19:50</td>
                            <td id="Lunes19"></td>
                            <td id="Martes19"></td>
                            <td id="Miercoles19"></td>
                            <td id="Jueves19"></td>
                            <td id="Viernes19"></td>
                            <td id="Sabado19"></td>
                            <td id="Domingo19"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section><!-- #content end -->

<script>

    //Change Combobox
    $("#form-admin").change(function () {
        var parameters = {
            "id": $("#form-admin").val()
        };

        $.post("?controller=Admin&action=select", parameters, function (data) {
            if (data.identification) {
                $("#form-id-table").html(data.identification);
                $("#form-name-table").html(data.name);
                
                $("#success").attr("data-notify-msg", "<i class=icon-ok-sign></i> Operacion Exitosa!");

                SEMICOLON.widget.notifications($("#success"));
            } else {
                $("#form-id-table").html("");
                $("#form-name-table").html("");

            }
        }, "json");
    });

</script>

<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';
