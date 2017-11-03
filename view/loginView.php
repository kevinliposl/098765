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
                                    <form id="login-form" class="nobottommargin" onsubmit="return validate();">
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

                                        <div class="line line-sm"></div>

                                        <div class="col_full nobottommargin">
                                            <input type="submit" class="button button-3d button-black nomargin" id="form-submit" value="Ingresar">
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

            <script>
                function validate() {
                    var email, password;

                    email = $('#form-email').val().trim();
                    password = $('#form-password').val().trim();

                    if (!/\w+@\w+\.+[a-z]/.test(email) || email.split(' ', 2).length > 1) {
                        $('#failed-email').attr('data-notify-msg', '<i class=icon-remove-sign></i> Correo Incorrecto. Complete correctamente e intente de nuevo!');
                        SEMICOLON.widget.notifications($('#failed-email'));
                        return false;
                    }
                    if (password.length < 1 || email.split(' ', 2).length > 1) {
                        $('#failed-password').attr('data-notify-msg', '<i class=icon-remove-sign></i> Contrase&ncaron;a Incorrecta. Complete correctamente e intente de nuevo!');
                        SEMICOLON.widget.notifications($('#failed-password'));
                        return false;
                    }

                    var parameters = {
                        'email': email,
                        'password': password
                    };

                    $.post('?controller=User&action=logIn', parameters, function (data) {
                        alert(data);
                        if (data.result === '0') {
                            $('#failed').attr({
                                'data-notify-msg': '<i class=icon-warning-sign></i> Correo o Contrase&ncaron;a Incorrectos. Complete correctamente e intente de nuevo!'
                            });
                            SEMICOLON.widget.notifications($('#failed'));
                        } else if (data.result === '1') {
                            location.href = '?';
                            alert('asdasd');
                        } else if (data.result === "2") {
                            location.href = '?action=permiso';
                            alert('asdasd');
                        }
                        location.href = '?action=permiso';
                    }, 'json');

                    return false;
                }
            </script>

            <?php
            include_once 'public/footer.php';
            