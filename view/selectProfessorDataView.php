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
        <h1>Datos Personales</h1>
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
                            <div class="acc_content clearfix"></div>
                            <div class="table-responsive">
                              
                                <?php foreach ($vars as $var) { ?>
                                
                                <table class="table table-bordered table-striped" style="clear: both">
                                    <tbody>
                                        <tr>
                                            <td width="30%">Identificaci&oacute;n</td>
                                            <td width="70%">
                                                <a><?php echo $var[0];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tipo de Identificaci&oacute;n</td>
                                            <td>
                                                <a><?php echo $var[6];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nombre</td>
                                            <td>
                                                <a><?php echo $var[1];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Primer Apellido</td>
                                            <td>
                                                <a><?php echo $var[2];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Segundo Apellido</td>
                                            <td>
                                                <a><?php echo $var[3];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>G&eacute;nero</td>
                                            <td>
                                                <a><?php echo $var[4];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nacionalidad</td>
                                            <td>
                                                <a><?php echo $var[5];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tel&eacute;fono 1</td>
                                            <td>
                                                <a><?php echo $var[7];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tel&eacute;fono 2</td>
                                            <td>
                                                <a><?php echo $var[8];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>
                                                <a><?php echo $var[12];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Fecha de Nacimiento</td>
                                            <td>
                                                <a><?php echo $var[11];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dirección:</td>
                                            <td>
                                                <a><?php echo $var[10];?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Informacion Adicional:</td>
                                            <td>
                                                <a><?php echo $var[9];?></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php } ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- #content end -->

<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';
