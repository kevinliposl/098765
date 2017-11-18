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
        <h1>Reporte Matricula</h1>
        <span>Cantidad de matriculas por mes y año</span>
    </div>
</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Matriculados</th>
                            <th>Mes</th>
                            <th>A&ncaron;o</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Matriculados</th>
                            <th>Mes</th>
                            <th>A&ncaron;o</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($vars as $var) {
                            if (isset($var["enrollment"])) {
                                ?>
                                <tr>
                                    <td><?php echo $var["enrollment"]; ?></td>
                                    <td><?php echo $var["month"]; ?></td>
                                    <td><?php echo $var["year"]; ?></td>
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
</section><!-- #content end -->

<script>
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>
<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';