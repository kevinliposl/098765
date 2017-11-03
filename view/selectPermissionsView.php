<!DOCTYPE html>
<html dir="ltr" lang="es-ES">
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />

        <!-- Stylesheets
        ============================================= -->
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
        <link type="image/x-icon" href="public/images/favicon.ico" rel="icon"/>
        <link type="image/x-icon" href="public/images/favicon.ico" rel="shortcut icon"/>

        <link rel="stylesheet" href="public/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="public/css/style.css" type="text/css" />
        <link rel="stylesheet" href="public/css/swiper.css" type="text/css" />
        <link rel="stylesheet" href="public/css/dark.css" type="text/css" />
        <link rel="stylesheet" href="public/css/font-icons.css" type="text/css" />
        <link rel="stylesheet" href="public/css/animate.css" type="text/css" />
        <link rel="stylesheet" href="public/css/magnific-popup.css" type="text/css" />
        <link rel="stylesheet" href="public/css/components/bs-select.css" type="text/css" />
        <link rel="stylesheet" href="public/css/select2.css" type="text/css" />
        <link rel="stylesheet" href="public/css/components/bs-editable.css" type="text/css" />
        <link rel="stylesheet" href="public/css/typeahead.js-bootstrap.css" type="text/css"/>
        <link rel="stylesheet" href="public/css/responsive.css" type="text/css" />

        <script src="public/js/jquery-1.10.2.js"></script>

        <!-- Document Title
        ============================================= -->
        <title>Fusi&oacute;n Academia Musical</title>

    </head>
    <body class="stretched">
        <!-- Document Wrapper
        ============================================= -->
        <div id="wrapper" class="clearfix">

            <section id="slider" class="slider-parallax dark full-screen" style="background: url(public/images/mainPage.jpg) center;">
                <div class="slider-parallax-inner">
                    <div class="container clearfix">
                        <div class="vertical-middle">
                            <div class="heading-block center nobottomborder">
                                <h1 data-animate="fadeInUp">Elige el Perfil!</h1>
                                <span data-animate="fadeInUp" data-delay="300"> Para iniciar sesi&oacute;n.</span>
                            </div>
                            <form role="form" class="landing-wide-form clearfix" onsubmit="return validate();">
                                <?php $session = SSession::getInstance(); ?>
                                <?php foreach ($session->user as $var) {
                                    $temp;
                                    $var['permissions']=='S'? $temp='Estudiante': $var['permissions']=='T'?
                                            $temp='Profesor': $temp ='Administrador';   
                                    ?>
                                    <div class="col_full landing-wide-form">
                                        <input type="submit" class="btn btn-lg btn-danger btn-block nomargin" value="<?php echo $temp;?>" />
                                    </div>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <script>




            </script>
            <?php
            include_once 'public/footerEmpty.php';
            