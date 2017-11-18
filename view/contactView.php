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

<!-- Page Title
                ============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Contactenos</h1>
    </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <!-- Contact Form
            ============================================= -->
            <div class="col_half">

                <div class="fancy-title title-dotted-border">
                    <h3>Envianos un correo</h3>
                </div>

                <form class="nobottommargin" id="template-contactform" name="template-contactform" onsubmit="return validate();">

                    <div class="form-process"></div>

                    <div class="col_one_third">
                        <label for="template-contactform-name">Nombre <small>*</small></label>
                        <input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control"  Required/>
                    </div>

                    <div class="col_one_third">
                        <label for="template-contactform-email">Correo <small>*</small></label>
                        <input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="email sm-form-control" Required/>
                    </div>

                    <div class="col_one_third col_last">
                        <label for="template-contactform-phone">Tel&eacute;fono</label>
                        <input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control" Required />
                    </div>

                    <div class="clear"></div>

                    <div class="col_two_third">
                        <label for="template-contactform-subject">Asunto <small>*</small></label>
                        <input type="text" id="template-contactform-subject" name="template-contactform-subject" value="" class="sm-form-control" Required />
                    </div>

                    <div class="col_one_third col_last">
                        <label for="template-contactform-service">Servicios</label>
                        <select id="template-contactform-service" name="template-contactform-service" class="sm-form-control">
                            <option value="Matricula">Matricula</option>
                            <option value="Servicios">Servicios</option>
                            <option value="Consulta">Consultas</option>
                            <option value="Sugerencia">Sugerencias</option>
                            <option value="Queja">Quejas</option>
                        </select>
                    </div>

                    <div class="clear"></div>

                    <div class="col_full">
                        <label for="template-contactform-message">Mensaje <small>*</small></label>
                        <textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="30" Required></textarea>
                    </div>

                    <div class="col_full hidden">
                        <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
                    </div>

                    <div class="col_full">
                        <button name="submit" id="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d nomargin">¡Enviar!</button>
                    </div>

                </form>
                <div class="contact-form-result alert-info" id="contact-form-result"></div>
                <br>
            </div><!-- Contact Form End -->

            <!-- Google Map
            ============================================= -->
            <div class="col_half col_last">

                <section id="google-map" class="gmap" style="height: 410px;"></section>

            </div><!-- Google Map End -->

            <div class="clear"></div>

            <!-- Contact Info
            ============================================= -->
            <div class="row clear-bottommargin">

                <div class="col-md-3 col-sm-6 bottommargin clearfix">
                    <div class="feature-box fbox-center fbox-bg fbox-plain">
                        <div class="fbox-icon">
                            <a href="https://www.google.co.cr/maps/place/Fusi%C3%B3n+Academia+de+M%C3%BAsica/@9.9121748,-83.6817206,17z/data=!3m1!4b1!4m5!3m4!1s0x8fa0d6a057c987f9:0xbb309b791e096442!8m2!3d9.9121748!4d-83.6795319?hl=es" target="__blank"><i class="icon-map-marker2"></i></a>
                        </div>
                        <h3>Localizaci&oacute;n<span class="subtitle">Barrio Tom&aacute;s Guardia, Turrialba, Costa Rica</span></h3>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 bottommargin clearfix">
                    <div class="feature-box fbox-center fbox-bg fbox-plain">
                        <div class="fbox-icon">
                            <a href="tel:+5068326 1731"><i class="icon-phone3"></i></a>
                        </div>
                        <h3>Puede llamar al<span class="subtitle">8326 1731</span></h3>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 bottommargin clearfix">
                    <div class="feature-box fbox-center fbox-bg fbox-plain">
                        <div class="fbox-icon">
                            <a href="https://www.facebook.com/fusionacademiacr/" target="__blank"><i class="icon-facebook2"></i></a>
                        </div>
                        <h3>Visitanos<span class="subtitle">fusionacademiacr</span></h3>
                    </div>
                </div>
            </div><!-- Contact Info End -->
        </div>
    </div>
</section><!-- #content end -->

<script>
    function validate() {
        var parameters = {
            'template-contactform-name': $("#template-contactform-name").val(),
            'template-contactform-email': $("#template-contactform-email").val().trim(),
            'template-contactform-phone': $("#template-contactform-phone").val().trim(),
            'template-contactform-service': $("#template-contactform-service").val().trim(),
            'template-contactform-subject': $("#template-contactform-subject").val().trim(),
            'template-contactform-message': $("#template-contactform-message").val().trim()
        };

        $.post("?controller=Index&action=contactSendEmail", parameters, function (data) {
            if (data === "1") {
                document.getElementById("contact-form-result").innerHTML = "Mensaje Enviado, será redireccionado en breve...";
                setTimeout("location.href = '?';", 1000);
            } else {
                document.getElementById("contact-form-result").innerHTML = "Mensaje no enviado, intentelo de nuevo o pongase en contacto por los otros medios disponibles";
                setTimeout("location.href = '#submit';", 0);
            }   
            ;
        }, "json");

        return false;
    }
</script>

<?php
include_once 'public/footer.php';
?>

<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCQkWM0oTBZWWCQZudbiZVOU0DEooJ4FSw'></script>
<script type="text/javascript" src="public/js/jquery.gmap.js"></script>

<script type="text/javascript">

    jQuery('#google-map').gMap({
        address: 'Fusión Academia de Música, Turrialba, Provincia de Cartago, Costa Rica',
        maptype: 'ROADMAP',
        zoom: 15,
        markers: [
            {
                address: "Fusión Academia de Música, Turrialba, Provincia de Cartago, Costa Rica",
                html: '<div style="width: 300px;"><h4 style="margin-bottom: 8px;">Hi, we\'re <span>Envato</span></h4><p class="nobottommargin">Our mission is to help people to <strong>earn</strong> and to <strong>learn</strong> online. We operate <strong>marketplaces</strong> where hundreds of thousands of people buy and sell digital goods every day, and a network of educational blogs where millions learn <strong>creative skills</strong>.</p></div>',
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

