<?php
include_once 'public/head.php';
?>

<section id="content">
    <div class="content-wrap nopadding">
        <div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: url('public/images/000.jpg') center center no-repeat; background-size: cover;"></div>
        <div class="section nobg full-screen nopadding nomargin">
            <div class="container vertical-middle divcenter clearfix">
                <div class="row center">
                    <a href="?"><img src="public/images/fusion-login.png"></a>    
                </div>
                </br>
                <div class="panel panel-default divcenter noradius noborder" style="max-width: 400px; background-color: rgba(255,255,255,0.93);">
                    <div class="panel-body" style="padding: 40px;">
                        <form id="login-form" class="nobottommargin" onsubmit="return false;">
                            <h3>Ingrese a su cuenta</h3>
                            <div class="col_full">
                                <label for="form-email">Email:</label>
                                <input type="email" id="form-email" class="form-control not-dark" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required/>
                                <input type="hidden" id="failed-email" data-notify-type= "error" data-notify-position="bottom-full-width"/>
                            </div>
                            <div class="col_full">
                                <label for="form-password">Contrase&ncaron;a:</label>
                                <input type="password" id="form-password" class="form-control not-dark" required/>
                                <input type="hidden" id="failed-password" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class='icon-remove-sign'></i> Correo Incorrecto. Complete correctamente e intente de nuevo!"/>
                            </div>
                            <div class="col_full" id="div-permissions" style="display: none;">
                                <label for="form-permissions">Rol:</label>
                                <select id="form-permissions" class="form-control" data-live-search="true">
                                    <option value="-1" data-tokens="" disabled selected>Seleccione un Rol</option>
                                </select>
                                <input type="hidden" id="permissions" value="0"/>
                                <input type="hidden" id="failed-permissions" data-notify-type= "error" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> Seleccione un Rol. Complete correctamente e intente de nuevo!"/>
                            </div>
                            <div class="line line-sm"></div>
                            <div class="col_full nobottommargin">
                                <input type="submit" class="button button-3d button-black nomargin" id="submit" value="Ingresar">
                                <input type="hidden" id="failed" data-notify-type="warning" data-notify-position="bottom-full-width" data-notify-msg="<i class=icon-remove-sign></i> Contrase&ncaron;a o Correo Incorrecto. Complete correctamente e intente de nuevo!"/>
                                <input type="hidden" id="success" data-notify-type="success" data-notify-msg="<i class='icon-ok-sign'></i> Operaci&oacute;n exitosa, revise en breve...!" data-notify-position="bottom-full-width"/>
                                <input type="hidden" id="wait" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>      
                                <a href="?controller=User&action=rememberPassword" class="fright" >¿Olvidó su contraseña?</a>
                            </div>
                        </form>
                        <div class="line line-sm"></div>
                    </div>
                </div>
                <div class="row center dark"><small>Copyrights &copy; All Rights Reserved.</small></div>
            </div>
        </div>
    </div>
</section>

<script>
    $('#form-email').change(function () {
        $('#permissions').val(0);
        $('#form-permissions option').remove();
    });

    function encrypt(data) {
        var publickey = "<?= $vars['result']; ?>";
        var rsakey = new RSAKey();
        rsakey.setPublic(publickey, "10001");
        return rsakey.encrypt(data);
    }

    $("#submit").click(function () {

        var email = $('#form-email').val().trim();
        var password = $('#form-password').val().trim();

        if (!/\w+@\w+\.+[a-z]/.test(email) || email.split(' ', 2).length > 1) {
            SEMICOLON.widget.notifications($('#failed-email'));
            return false;
        }
        if (password.length < 1 || email.split(' ', 2).length > 1) {
            SEMICOLON.widget.notifications($('#failed-password'));
            return false;
        }

        if ($('#permissions').val() <= 0) {
            $('#permissions').val(1);

            var parameters = {
                "pass": encrypt($("#form-password").val()),
                "email": encrypt($("#form-email").val())
            };

            $.post('?controller=User&action=logIn', parameters, function (data) {
                if (data.result === '0') {
                    $('#permissions').val(0);
                    SEMICOLON.widget.notifications($('#failed'));
                } else if (data.result === '1') {
                    location.href = '?';
                } else if (data[0].permissions) {
                    for (var i = 0; i < data.length; i++) {
                        var per;
                        data[i].permissions === 'A' ? per = 'Administrador' : data[i].permissions === 'S' ? per = 'Estudiante' : per = 'Profesor';
                        $('#form-permissions').append($("<option></option>").attr("value", data[i].permissions).text(per));
                    }
                    $('#div-permissions').css('display', 'block');
                    $('#permissions').val(2);
                }
            }, 'json');
        }
        if ($('#permissions').val() >= 2) {
            if ($('#form-permissions').val()) {
                var param = {
                    'permissions': $('#form-permissions').val()
                };
                $.post('?controller=User&action=setPermissions', param, function (data) {
                    location.href = '?';
                }, 'json');
            } else {
                SEMICOLON.widget.notifications($('#failed-permissions'));
            }
        }
    });
</script>

<script src="public/js/RSA/jsbn.js"></script>
<script src="public/js/RSA/jsbn2.js"></script>
<script src="public/js/RSA/prng4.js"></script>
<script src="public/js/RSA/rng.js"></script>
<script src="public/js/RSA/rsa.js"></script>
<script src="public/js/RSA/rsa2.js"></script>

<?php
include_once 'public/footerEmpty.php';
?>