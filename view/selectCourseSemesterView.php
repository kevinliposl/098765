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
        <h1>Obtener Asignaciones de Profesores a Cursos en Semestres</h1>
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
                                <label for="form-semester">Semestres:</label>
                                <select id="form-semester" class="selectpicker form-control" data-live-search="true">
                                    <option data-tokens="">Seleccione un Semestre</option>
                                    <?php
                                    foreach ($vars as $var) {
                                        if (isset($var["ID"])) {
                                            ?>
                                            <option value="<?php echo $var["ID"] ?> " data-tokens="">
                                                <?php
                                                        if($var["semester"]=='1'){
                                                            echo "I semestre"." ".$var["year"];
                                                        }else{
                                                            echo "II semestre"." ".$var["year"];
                                                        }
                                                ?>
                                            </option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <br>
                            <div class="white-section">
                                <label for="form-courses">Cursos:</label>
                                <select id="form-courses" class="form-control selectpicker" data-live-search="true">
                                    <option value="-1" data-tokens="">Seleccione un Curso</option>
                                </select>
                            </div>
                            <br>
                           <div class="acc_content clearfix"></div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="table-professor">
                                    <h5 style="text-align: center;">Profesores Asociados</h5>
                                    <colgroup>
                                        <col class="col-xs-8">
                                    </colgroup>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
<!--                            <div class="white-section">
                                <label for="form-professors">Profesores:</label>
                                <select id="form-professors" class="form-control selectpicker" data-live-search="true">
                                    <option value="-1" data-tokens="">Seleccione los profesores</option>
                                </select>
                            </div>               -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section><!-- #content end -->

<script>

    //Change Combobox
    $("#form-semester").change(function () {
        var parameters = {
            "ID_Semester": $("#form-semester").val()
        };
        document.getElementById("form-courses").options.length = 0;
        document.getElementById("form-professors").options.length = 0;
        $.post("?controller=CourseSemester&action=selectAllCoursesSemester", parameters, function (data) {
            $('#form-courses').append($("<option></option>").attr("value", "-1").text("Seleccione un Curso"));
            for (var i = 0; i < data.length; i++) {
                $('#form-courses').append($("<option></option>").attr("value", data[i].initials).text(data[i].name));//AGREGAR OPCIONES
            }
            $("#form-courses").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
        }, "json");
    });
    
//    //Change Combobox
//    $("#form-courses").change(function () {
//        var parameters = {
//            "ID_Semester": $("#form-semester").val(),
//            "initials": $("#form-courses").val()
//        };
//        document.getElementById("form-professors").options.length = 0;
//        $.post("?controller=CourseSemester&action=selectAllProfessorsCourseSemester", parameters, function (data) {
////            $('#form-professors').append($("<option></option>").attr("value", "-1").text("Seleccione los profesores"));
//            for (var i = 0; i < data.length; i++) {
//                $('#form-professors').append($("<option></option>").attr("value", data[i].identification).text(data[i].name));//AGREGAR OPCIONES
//            }
//            $("#form-professors").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
//        }, "json");
//    });
    
    //Change Combobox
    $("#form-courses").change(function () {
        var parameters = {
            "ID_Semester": $("#form-semester").val(),
            "initials": $("#form-courses").val()
        };
        //document.getElementById("form-professors").options.length = 0;
        var Table = document.getElementById("table-professor");
Table.innerHTML = "";
        $.post("?controller=CourseSemester&action=selectAllProfessorsCourseSemester", parameters, function (data) {
//            $('#form-professors').append($("<option></option>").attr("value", "-1").text("Seleccione los profesores"));
            var table = document.getElementById("table-professor");
            for (var i = 0; i < data.length; i++) {
                //$('#table-professor').append($("<option></option>").attr("value", data[i].identification).text(data[i].name));//AGREGAR OPCIONES
                var row = table.insertRow(0);
                var cell1 = row.insertCell(0);
                cell1.innerHTML = data[i].name;
            }
           // $("#form-professors").selectpicker("refresh");///REFRESCA SELECT PARA QUE AGARRE AGREGADOS
        }, "json");
    });

</script>


<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';