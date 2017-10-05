<!DOCTYPE html>
<html dir="ltr" lang="es-ES">
    <head>

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="SemiColonWeb" />

        <!-- Stylesheets
        ============================================= -->
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
        <link type="image/x-icon" href="public/images/favicon.ico" rel="icon"/>
        <link type="image/x-icon" href="public/images/favicon.ico" rel="shortcut icon"/>

        <link rel="stylesheet" href="public/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="public/style.css" type="text/css" />
        <link rel="stylesheet" href="public/css/dark.css" type="text/css" />
        <link rel="stylesheet" href="public/css/font-icons.css" type="text/css" />
        <link rel="stylesheet" href="public/css/animate.css" type="text/css" />
        <link rel="stylesheet" href="public/css/magnific-popup.css" type="text/css" />

        <link rel="stylesheet" href="public/css/responsive.css" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

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

                    <div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: #444;"></div>

                    <div class="section nobg full-screen nopadding nomargin">
                        <div class="container vertical-middle divcenter clearfix">

                            <div class="row center">
                                <a href="?"><img src="public/images/logo-dark.png" alt="Canvas Logo"></a>
                            </div>

                            <div class="panel panel-default divcenter noradius noborder" style="max-width: 400px;">
                                <div class="panel-body" style="padding: 40px;">
                                    <form id="login-form" name="login-form" class="nobottommargin" action="#" method="post">
                                        <h3>Ingrese a su cuenta</h3>

                                        <div class="col_full">
                                            <label for="login-form-username">Usuario:</label>
                                            <input type="text" id="login-form-username" name="login-form-username" class="form-control not-dark" />
                                        </div>

                                        <div class="col_full">
                                            <label for="login-form-password">Contrase&ncaron;a:</label>
                                            <input type="password" id="login-form-password" name="login-form-password" class="form-control not-dark" />
                                        </div>

                                        <div class="col_full nobottommargin">
                                            <input type="button" class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="Ingresar ">
                                            <a href="#" class="fright">Olvidó su contraseña?</a>
                                        </div>
                                    </form>

                                    <div class="line line-sm"></div>

                                    <!--                                    <div class="center">
                                                                            <h4 style="margin-bottom: 15px;">or Login with:</h4>
                                                                            <a href="#" class="button button-rounded si-facebook si-colored">Facebook</a>
                                                                            <span class="hidden-xs">or</span>
                                                                            <a href="#" class="button button-rounded si-twitter si-colored">Twitter</a>
                                                                        </div>-->
                                </div>
                            </div>

                            <div class="row center dark"><small>Copyrights &copy; All Rights Reserved.</small></div>

                        </div>
                    </div>

                </div>

            </section><!-- #content end -->

        </div><!-- #wrapper end -->

        <!-- Go To Top
        ============================================= -->
        <div id="gotoTop" class="icon-angle-up"></div>

        <!-- External JavaScripts
        ============================================= -->
        <script type="text/javascript" src="public/js/jquery.js"></script>
        <script type="text/javascript" src="public/js/plugins.js"></script>

        <!-- Footer Scripts
        ============================================= -->
        <script type="text/javascript" src="public/js/functions.js"></script>

    </body>
</html>

<!-- Ajax logIn
============================================= -->
<script type="text/javascript">

    $("#login-submit").click(function () {

        if (validateForm(document.getElementById("login-form"))) {

            var parameters = {
                "email": $("#login-email").val(),
                "password": $("#login-password").val()
            };

            $("#login-message").html("Processing, please wait...");

            $.post("?controller=User&action=logIn", parameters, function (data) {
                if (data.result === "true") {
                    $("#login-message").html("Success");
                    location.href = "?";
                } else {
                    $("#login-message").html("Failed");
                }
                ;
            }, "json");
        } else {
            $("#login-message").html("Complete the form please...");
        }
        ;
    });
</script>
