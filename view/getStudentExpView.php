<?php
$session = SSession::getInstance();

if (isset($session->permissions)) {
    if ($session->permissions == 'S') {
        include_once 'public/headerStudent.php';
    } else {
        header('Location:?action=notFound');
    }
} else {
    header('Location:?action=notFound');
}
?>

<section id="page-title">
    <div class="container clearfix">
        <h1>Expediente Academico</h1>
    </div>
</section>

<section id="content">
    <div class="container">
        <br>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                    <tr>
                        <th width="10%">Siglas</th>
                        <th width="25%">Nombre</th>
                        <th width="25%">Profesor</th>
                        <th width="10%">Ciclo</th>
                        <th width="10%">Estado</th>
                        <th width="10%">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vars as $var) { ?>
                        <tr>
                            <td><?php echo $var["initials"]; ?></td>
                            <td><?php echo $var["name"]; ?></td>
                            <td><?php echo $var["Professor"]; ?></td>
                            <td><?php echo $var["Cicle"]; ?></td>
                            <td><?php echo ($var["state"] === "1") ? "Matriculado" : "Terminado/retirado"; ?></td>
                            <td><?php echo $var["date"]; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script src="public/js/Views/getStudentExpView.js" type="text/javascript"></script>

<?php
include_once 'public/footer.php';
