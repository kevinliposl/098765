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
        <h1>Ver Actividad y Asistencia en Clase</h1>
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
                                <label for="form-courses">Cursos Disponibles:</label>
                                <select id="form-courses" class="selectpicker form-control" data-live-search="true">
                                    <option data-tokens="">Seleccione un Curso</option>
                                    <?php
                                    foreach ($vars as $var) {
                                        if (isset($var["ID"])) {
                                            ?>
                                            <option value="<?php echo $var["ID"] ?> " data-tokens="">
                                                <?php echo $var["name"]?>
                                            </option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <br>
                            <div class="white-section">
                                <label for="form-student">Estudiantes Disponibles:</label>
                                <select id="form-student" class="form-control selectpicker" data-live-search="true">
                                    <option value="-1" data-tokens="">Seleccione un Estudiante</option>
                                </select>
                            </div>                          
                            <div class="white-section">
                                <label for="form-activity">Actividades Disponibles:</label>
                                <select id="form-activity" class="form-control selectpicker" data-live-search="true">
                                    <!--<option value="-1" data-tokens="">Seleccione una Actividad</option>-->
                                </select>
                            </div> 
                            
                            <div class="acc_content clearfix"></div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <h5 style="text-align: center;">Informaci&oacute;n de la Actividad de Clase</h5>
                                    <colgroup>
                                        <col class="col-xs-3">
                                        <col class="col-xs-8">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <code>Consecutivo</code>
                                            </td>
                                            <td id="form-consecutive-table"><?php echo "" ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <code>Fecha de Realizaci&oacute;n</code>
                                            </td>
                                            <td id="form-date-table"><?php echo "" ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <code>Asistencia</code>
                                            </td>
                                            <td id="form-typeA-table"><?php echo "" ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <code>Observaci&oacute;n General</code>
                                            </td>
                                            <td id="form-observation-table"><?php echo "" ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>    
                            <br>
                            <div class="acc_content clearfix"></div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="table-contents">
                                    <h5 style="text-align: center;">Contenidos de la Actividad</h5>
                                    <colgroup>
                                        <col class="col-xs-8">
                                        <col class="col-xs-8">
                                    </colgroup>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section><!-- #content end -->


<script>  
    $("#form-courses").change(function () {
        var parameters = {
            "appointment": $("#form-courses").val()
        };
        document.getElementById("form-student").options.length = 0;
        $.post("?controller=ClassActivity&action=selectStudentClassActivity", parameters, function (data) {
            $('#form-student').append($("<option></option>").attr("value", "-1").text("Seleccione un Estudiante"));
            for (var i = 0; i < data.length; i++) {
                $('#form-student').append($("<option></option>").attr("value", data[i].identification).text(data[i].name));//AGREGAR OPCIONES
            }
            $("#form-student").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
        }, "json");
    });
    
    $("#form-student").change(function () {
        var parameters = {
            "appointment": $("#form-courses").val(),
            "identification": $("#form-student").val()
        };
        $.post("?controller=ClassActivity&action=selectRecordStudentClassActivity", parameters, function (data) {
            $('#form-activity').append($("<option></option>").attr("value", "-1").text("Seleccione una Actividad"));
            for (var i = 0; i < data.length; i++) {
                $('#form-activity').append($("<option></option>").attr("value", data[i].consecutive_class).text(data[i].date));//AGREGAR OPCIONES
            }
            $("#form-activity").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
        }, "json");
    });
    
    $("#form-activity").change(function () {
        var parameters = {
            "appointment": $("#form-courses").val(),
            "identification": $("#form-student").val(),
            "consecutive": $("#form-activity").val()
        };
        $.post("?controller=ClassActivity&action=selectClassActivity", parameters, function (data) {          
            if (data.consecutive_class) {
                $("#form-consecutive-table").html(data.consecutive_class);
                $("#form-date-table").html(data.date);
                if(data.assistance==="P"){
                    $("#form-typeA-table").html("Puntual");
                }else if(data.assistance==="I"){
                    $("#form-typeA-table").html("Asuncia Injustificada");
                }else{
                    $("#form-typeA-table").html("Ausencia Justificada");
                }
                $("#form-observation-table").html(data.observation);

                $("#success").attr({
                    "data-notify-type": "success",
                    "data-notify-msg": "<i class=icon-ok-sign></i> Operacion Exitosa!",
                    "data-notify-position": "bottom-full-width"
                });
                
                        var parameters2 = {
            "appointment": $("#form-courses").val(),
            "identification": $("#form-student").val(),
            "consecutive": data.consecutive_class
        };
        $.post("?controller=ClassActivity&action=selectRecordContentClassActivity", parameters2, function (data2) {
//        
                        var table = document.getElementById("table-contents");
                table.innerHTML = "";
                for (var i = 0; i < data2.length; i++) {
                    var row = table.insertRow(0);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    cell1.innerHTML = "Contenido"+" "+(data2.length-i);
                    cell2.innerHTML = data2[i].content;
                }
//                    
////            if(data[0].ID){
////                var table = document.getElementById("table-contents");
////                table.innerHTML = "";
////                for (var i = 0; i < data.length; i++) {
////                    var row = table.insertRow(0);
////                    var cell1 = row.insertCell(0);
////                    var cell2 = row.insertCell(1);
////                    cell1.innerHTML = "Contenido"+i;
////                    cell2.innerHTML = data[i].content;
////                }
////            }else{
////                var Table = document.getElementById("table-contents");
////                Table.innerHTML = "";
////            }
        }, "json");
                
                SEMICOLON.widget.notifications($("#success"));
            } else {
                $("#form-consecutive-table").html("");
                $("#form-date-table").html("");
                $("#form-typeA-table").html("");
                $("#form-observation-table").html("");

            }
        }, "json");

//        var parameters2 = {
//            "appointment": $("#form-courses").val(),
//            "identification": $("#form-student").val(),
//            "consecutive": initials
//        };
//        $.post("?controller=ClassActivity&action=selectRecordContentClassActivity", parameters2, function (data) {
////        
//                        var table = document.getElementById("table-contents");
//                table.innerHTML = "";
//                for (var i = 0; i < data.length; i++) {
//                    var row = table.insertRow(0);
//                    var cell1 = row.insertCell(0);
//                    var cell2 = row.insertCell(1);
//                    cell1.innerHTML = "Contenido"+" "+(data.length-i);
//                    cell2.innerHTML = data[i].content;
//                }
////                    
//////            if(data[0].ID){
//////                var table = document.getElementById("table-contents");
//////                table.innerHTML = "";
//////                for (var i = 0; i < data.length; i++) {
//////                    var row = table.insertRow(0);
//////                    var cell1 = row.insertCell(0);
//////                    var cell2 = row.insertCell(1);
//////                    cell1.innerHTML = "Contenido"+i;
//////                    cell2.innerHTML = data[i].content;
//////                }
//////            }else{
//////                var Table = document.getElementById("table-contents");
//////                Table.innerHTML = "";
//////            }
//        }, "json");
    });
</script>

<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';