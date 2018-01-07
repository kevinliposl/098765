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
        <h1>Reporte Usuarios</h1>
        <span>Usuarios Ordenados por Permiso, activos en el Sistema</span>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Rol</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($vars as $var) {
                            if (isset($var["permissions"])) {
                                ?>
                                <tr>
                                    <td><?php echo $var["permissions"] == "A" ? 'Administrador' : ($var["permissions"] == "S" ? 'Estudiante' : 'Profesor'); ?></td>
                                    <td><?php echo $var["data"]; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script src="public/js/Views/reportUserStateView.js" type="text/javascript"></script>
<script src="public/js/Views/general.js" type="text/javascript"></script>

<?php
include_once 'public/footer.php';
