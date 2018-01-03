<?php
$session = SSession::getInstance();

if (isset($session->permissions)) {
    if ($session->permissions == 'S') {
        include_once 'public/headerStudent.php';
    } else if ($session->permissions == 'A') {
        include_once 'public/headerAdmin.php';
    } elseif ($session->permissions == 'T') {
        include_once 'public/headerProfessor.php';
    }
} else {
    include_once 'public/header.php';
}
?>

<!--<section id="page-title">
    <div class="container clearfix">
        <h1>Contactenos</h1>
    </div>
</section>-->


<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="col_half">
                <div class="fancy-title title-dotted-border">
                    <h3>Envianos un correo</h3>
                </div>
                <form class="nobottommargin" onsubmit="return val();">
                    <div class="col_one_third">
                        <label for="form-name">Nombre <small>*</small></label>
                        <input type="text" id="form-name" class="form-control" required/>
                    </div>
                    <div class="col_one_third">
                        <label for="form-email">Correo <small>*</small></label>
                        <input type="email" id="form-email" class="form-control" required/>
                    </div>
                    <div class="col_one_third col_last">
                        <label for="form-phone">Tel&eacute;fono</label>
                        <input type="text" id="form-phone" class="form-control"/>
                    </div>

                    <div class="clear"></div>

                    <div class="col_two_third">
                        <label for="form-subject">Asunto <small>*</small></label>
                        <input type="text" id="form-subject" class="form-control" required/>
                    </div>
                    <div class="col_one_third col_last">
                        <label for="form-service">Servicios</label>
                        <select id="form-service" class="form-control">
                            <option value="Matricula">Matricula</option>
                            <option value="Servicios">Servicios</option>
                            <option value="Consulta">Consultas</option>
                            <option value="Sugerencia">Sugerencias</option>
                            <option value="Queja">Quejas</option>
                        </select>
                    </div>

                    <div class="clear"></div>

                    <div class="col_full">
                        <label for="form-message">Mensaje <small>*</small></label>
                        <textarea class="form-control" id="form-message" rows="6" cols="30" required style="resize: none;"></textarea>
                    </div>
                    <div class="col_full">
                        <input type="submit" id="form-submit" value="¡Enviar!" class="button button-3d button-black nomargin"/>
                        <input type="hidden" id="warning" data-notify-type="warning" data-notify-msg="<i class='icon-warning-sign'></i> Mensaje no enviado, intentelo de nuevo o pongase en contacto por los otros medios disponibles!" data-notify-position="bottom-full-width"/>
                        <input type="hidden" id="success" data-notify-type="success" data-notify-msg ="<i class='icon-ok-sign'></i> Mensaje Enviado, será redireccionado en breve...!" data-notify-position="bottom-full-width"/>
                        <input type="hidden" id="wait" data-notify-type="info" data-notify-msg="<i class=icon-info-sign></i> Espere un momento...!" data-notify-position="bottom-full-width"/>
                    </div>
                </form>
            </div>

            <div class="col_half col_last">
                <section id="google-map" class="gmap" style="height: 410px;"></section>
            </div>

            <div class="clear"></div>

            <div class="row clear-bottommargin">
                <div class="col-md-4 bottommargin clearfix">
                    <div class="feature-box fbox-center fbox-bg fbox-plain">
                        <div class="fbox-icon">
                            <a href="https://www.google.co.cr/maps/place/Fusi%C3%B3n+Academia+de+M%C3%BAsica/@9.9121748,-83.6817206,17z/data=!3m1!4b1!4m5!3m4!1s0x8fa0d6a057c987f9:0xbb309b791e096442!8m2!3d9.9121748!4d-83.6795319?hl=es" target="__blank"><i class="icon-map-marker2"></i></a>
                        </div>
                        <h3>Localizaci&oacute;n<span class="subtitle">Barrio Tom&aacute;s Guardia, Turrialba, Costa Rica</span></h3>
                    </div>
                </div>

                <div class="col-md-4 bottommargin clearfix">
                    <div class="feature-box fbox-center fbox-bg fbox-plain">
                        <div class="fbox-icon">
                            <a href="tel:+5068326 1731"><i class="icon-phone3"></i></a>
                        </div>
                        <h3>Puede llamar al<span class="subtitle">8326 1731</span></h3>
                    </div>
                </div>

                <div class="col-md-4 bottommargin clearfix">
                    <div class="feature-box fbox-center fbox-bg fbox-plain">
                        <div class="fbox-icon">
                            <a href="https://www.facebook.com/fusionacademiacr/" target="__blank"><i class="icon-facebook2"></i></a>
                        </div>
                        <h3>Visitanos<span class="subtitle">fusionacademiacr</span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    function val() {
        var parameters = {
            'form-name': $("#form-name").val(),
            'form-email': $("#form-email").val().trim(),
            'form-phone': $("#form-phone").val().trim(),
            'form-service': $("#form-service").val().trim(),
            'form-subject': $("#form-subject").val().trim(),
            'form-message': $("#form-message").val().trim()
        };

        SEMICOLON.widget.notifications($("#wait"));

        $.post("?controller=Index&action=contactSendEmail", parameters, function (data) {
            if (data.result === "1") {
                SEMICOLON.widget.notifications($("#success"));
                setTimeout("location.href = '?';", 1500);
            } else {
                SEMICOLON.widget.notifications($("#warning"));
            }
        }, "json");
        return false;
    }
</script>>

<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCQkWM0oTBZWWCQZudbiZVOU0DEooJ4FSw'></script>
<script type="text/javascript" src="public/js/jquery.gmap.js"></script>

<script>
    $('#google-map').gMap({
        address: 'Fusión Academia de Música, Turrialba, Provincia de Cartago, Costa Rica',
        maptype: 'ROADMAP',
        zoom: 15,
        markers: [
            {
                address: "Fusión Academia de Música, Turrialba, Provincia de Cartago, Costa Rica",
                html: '<div style="width: 300px;"><h4 style="margin-bottom: 8px;">Hi, we\'re <span>Envato</span></h4><p class="nobottommargin">CAMBIAR DESCRIPCI&oacuteN to <strong>earn</strong> and to <strong>learn</strong> online. We operate <strong>marketplaces</strong> where hundreds of thousands of people buy and sell digital goods every day, and a network of educational blogs where millions learn <strong>creative skills</strong>.</p></div>',
                icon: {
                    image: "public/images/icons/map-icon-red.png",
                    iconsize: [32, 39],
                    iconanchor: [32, 39]
                }
            }
        ],
        doubleclickzoom: true,
        controls: {
            panControl: true,
            zoomControl: true,
            mapTypeControl: true,
            scaleControl: false,
            streetViewControl: false,
            overviewMapControl: false
        }
    });
</script>

<?php
include_once 'public/footer.php';
