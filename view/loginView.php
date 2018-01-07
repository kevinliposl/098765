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
                                <input type="hidden" id="failed" data-notify-type="warning" data-notify-position="bottom-full-width"/>
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

<script src="public/js/validation/login.js" type="text/javascript"></script>

<?php
include_once 'public/footerEmpty.php';