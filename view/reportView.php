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
<!-- Page Title
============================================= -->
<section id="page-title">
    <div class="container clearfix">
        <h1>Reporte</h1>
        <span>Sus Datos Importantes en Gráficos Interactivos</span>
    </div>
</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="col_full">
                <select id="form-report" class="selectpicker form-control" data-live-search="true">
                    <option value="null" data-tokens>Seleccione un Reporte</option>
                    <option value="usuariosActivos" data-tokens>Usuarios Activos</option>
                    <option value="us" data-tokens>2</option>
                    <option value="us" data-tokens>3</option>
                </select>
            </div>
            <table id="datatable" class="table table-responsive table-striped table-bordered" cellspacing="0" width="100%">
                <thead id="head">
                    <tr>
                        <th> </th>
                        <th> </th>
                    </tr>
                </thead>
                <tfoot id="foot">
                    <tr>
                        <th> </th>
                        <th> </th>
                    </tr>
                </tfoot>
                <tbody id="content">
                </tbody>
            </table>
        </div>
    </div>
</section><!-- #content end -->

<script>
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>

<script>
    $("#form-report").change(function () {
        var option = $('#form-report').val();
        if (option === "usuariosActivos") {
            $.post("?controller=Report&action=selectUserState", {}, function (data) {

                $('#datatable').DataTable().clear();
                $('#datatable thead').html('');
                $('#datatable tfoot').html('');
                $('#datatable thead').html("<tr><th>Permisos</th><th>Cantidad</th></tr>");
                $('#datatable tfoot').html("<tr><th>Permisos</th><th>Cantidad</th></tr>");

                for (var i = 0; i < data.length; i++) {
                    $('#datatable').dataTable().fnAddData([data[i].permissions === 'A' ? 'Administrador' : data[i].permissions === 'T' ? "Profesor" : 'Estudiante'
                                , data[i].data]);
                }

            }, "json");
        } else if (option === "") {
            $.post("?controller=Report&action=selectUserState", {}, function (data) {



            }, "json");
        } else if (option === "null") {
            $('#datatable').remove();
        }
    }
    );
</script>

<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';
