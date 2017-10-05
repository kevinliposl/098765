<?php
//$session = SSession::getInstance();
//
//if (isset($session->email)) {
//    //include_once 'public/headerUser.php';
//} else {
//    include_once 'public/header.php';
//}
include_once 'public/header.php';
?>

<!-- Page Title
============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Registar Curso</h1>
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
                        <form class="nobottommargin">
                            <div class="col_full">
                                <label for="form-initials">Siglas:</label>
                                <input type="text" id="form-initials" class="form-control" maxlength="5" minlength="5"/>
                            </div>

                            <div class="col_full">
                                <label for="form-name">Nombre:</label>
                                <input type="email" id="form-name" class="form-control" required/>
                            </div>

                            <div class="col_full">
                                <label for="form-instrument">Instrumento:</label>
                                <input type="text" id="form-instrument" class="form-control" required/>
                            </div>

                            <div class="col_full">
                                <label for="form-description">Breve descripci&oacute;n:</label>
                                <input type="text" id="form-description"class="form-control" required/>
                            </div>
                            
                            <div class="col_full nobottommargin">
                                <input type="button" class="button button-3d button-black nomargin" id="form-submit" value="Registrar"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section><!-- #content end -->