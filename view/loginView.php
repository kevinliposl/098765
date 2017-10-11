<!DOCTYPE html>
<html dir="ltr" lang="es-ES">
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="SemiColonWeb" />


        <!-- Stylesheets
        ============================================= -->
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
        <link type="image/x-icon" href="public/images/favicon.ico" rel="icon"/>
        <link type="image/x-icon" href="public/images/favicon.ico" rel="shortcut icon"/>

        <link rel="stylesheet" href="public/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="public/style.css" type="text/css" />
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

            <!-- Content
            ============================================= -->
            <section id="slider" class="slider-parallax swiper_wrapper full-screen">
                <div class="slider-parallax-inner">

                    <div class="swiper-container swiper-parent">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide dark" style="background: url(public/images/000.jpg) center;">
                                <div class="container vertical-middle center clearfix">
                                    <div class="row center">
                                        <img id="menu"src="public/images/fusion-dark.png" alt="Canvas Logo">
                                    </div>
                                    <div class="panel panel-default divcenter noradius noborder" style="max-width: 400px;">
                                        <div class="panel-body" style="padding: 40px;">
                                            <form id="login-form" name="login-form" class="nobottommargin" action="#" method="post">
                                                <h3 style="color: white;">Ingrese a su cuenta</h3>

                                                <div class="col_full">
                                                    <label for="login-form-username"style="color: white;">Usuario:</label>
                                                    <input type="text" id="login-form-username" name="login-form-username" class="form-control not-dark" />
                                                </div>

                                                <div class="col_full">
                                                    <label for="login-form-password" style="color: white;">Contrase&ncaron;a:</label>
                                                    <input type="password" id="login-form-password" name="login-form-password" class="form-control not-dark" />
                                                </div>

                                                <div class="line line-sm"></div>

                                                <div class="col_full nobottommargin">
                                                    <input type="button" class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="Ingresar ">
                                                    <a href="#" class="fright" style="color: white;">Olvidó su contraseña?</a>
                                                </div>
                                            </form>

                                            <div class="line line-sm"></div>

                                        </div>
                                    </div>
                                    <div class="row center dark"><small>Copyrights &copy; All Rights Reserved.</small></div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>

            <script>

                $("#menu").click(function () {

                    location.href = "?";
                });

            </script>

            <?php
            include_once 'public/footer.php';



            