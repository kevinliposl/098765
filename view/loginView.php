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

        <!-- JS
        ============================================= -->
        <script src="public/js/jquery.min.js" type="text/javascript"></script>

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
            <section id="content">

                <div class="content-wrap nopadding">

                    <div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: url('public/images/000.jpg') center center no-repeat; background-size: cover;"></div>

                    <div class="section nobg full-screen nopadding nomargin">
                        <div class="container vertical-middle divcenter clearfix">

                            <div class="row center">
                                <a href="?"><img src="public/images/fusion-dark.png"></a>
                            </div>

                            <div class="panel panel-default divcenter noradius noborder" style="max-width: 400px; background-color: rgba(255,255,255,0.93);">
                                <div class="panel-body" style="padding: 40px;">
                                    <form id="login-form" class="nobottommargin" onsubmit="return false;">

                                        <h3>Ingrese a su cuenta</h3>

                                        <div class="col_full">
                                            <label for="form-email">Email:</label>
                                            <input type="email" id="form-email" class="form-control not-dark" required/>
                                            <input type="hidden" id="failed-email" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </div>

                                        <div class="col_full">
                                            <label for="form-password">Contrase&ncaron;a:</label>
                                            <input type="password" id="form-password" class="form-control not-dark" required/>
                                            <input type="hidden" id="failed-password" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </div>

                                        <div class="col_full" id="div-permissions" style="display: none;">
                                            <label for="form-permissions">Rol:</label>
                                            <select id="form-permissions" class="form-control" data-live-search="true">
                                                <option value="-1" data-tokens="" disabled selected>Seleccione un Rol</option>
                                            </select>
                                            <input type="hidden" id="permissions" value="0"/>
                                            <input type="hidden" id="failed-permissions" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                                        </div>

                                        <div class="line line-sm"></div>

                                        <div class="col_full nobottommargin">
                                            <input type="submit" class="button button-3d button-black nomargin" id="submit" value="Ingresar">
                                            <input type="hidden" id="failed" data-notify-type= "error" data-notify-position="bottom-full-width"/>

                                            <a href="#" class="fright" >Olvidó su contraseña?</a>
                                        </div>
                                    </form>
                                    <div class="line line-sm"></div>
                                </div>
                            </div>
                            <div class="row center dark"><small>Copyrights &copy; All Rights Reserved.</small></div>
                        </div>
                    </div>
                </div>
            </section><!-- #content end -->

            <script src="public/js/validation/loginVal.js" type="text/javascript"></script>

            <?php
            include_once 'public/footerEmpty.php';
            