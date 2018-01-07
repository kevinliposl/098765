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
        <h1>Reporte Matricula</h1>
        <span>Cantidad de matriculas por mes y año</span>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div id="data">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Matriculados</th>
                                <th>Mes</th>
                                <th>A&ncaron;o</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            function nombremes($mes) {
                                setlocale(LC_TIME, 'spanish');
                                $nombre = strftime("%B", mktime(0, 0, 0, $mes, 1, 2000));
                                return $nombre;
                            }

                            foreach ($vars as $var) {
                                if (isset($var["enrollment"])) {
                                    ?>
                                    <tr>
                                        <td><?php echo $var["enrollment"]; ?></td>
                                        <td><?php echo nombremes($var["month"]); ?></td>
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
            <div class="col_one_fifth">
                <input type="button" onclick="javascript:exportPdf();" value="Exportar PDF" class="button button-3d button-black form-control"/>
            </div>
            <div class="col_one_fifth">
                <input type="button" onclick="javascript:exportExcel()" value="Exportar EXCEL" class="button button-3d button-black form-control"/>
            </div>
        </div>
    </div>
</section>

<script src="public/js/Views/reportEnrolledPerMonthView.js" type="text/javascript"></script>
<script src="public/js/Views/general.js" type="text/javascript"></script>

<?php
include_once 'public/footer.php';
?>

<script src="public/js/jquery.table2excel.min.js" type="text/javascript"></script>
<script src="public/js/pdf/html2pdf.js" type="text/javascript"></script>
<script src="public/js/pdf/jspdf.debug.js" type="text/javascript"></script>