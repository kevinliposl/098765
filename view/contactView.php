<?php
include_once 'public/header.php';
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

                <div class="contact-widget" data-alert-type="inline">

                    <div class="contact-form-result"></div>

                    <form class="nobottommargin" id="template-contactform" name="template-contactform" action="include/sendemail.php" method="post">

                        <div class="form-process"></div>

                        <div class="col_one_third">
                            <label for="template-contactform-name">Nombre <small>*</small></label>
                            <input type="text" id="template-contactform-name" name="nombre" value="" class="sm-form-control required" />
                        </div>

                        <div class="col_one_third">
                            <label for="template-contactform-email">Correo <small>*</small></label>
                            <input type="email" id="template-contactform-email" name="correo" value="" class="required email sm-form-control" />
                        </div>

                        <div class="col_one_third col_last">
                            <label for="template-contactform-phone">Tel&eacute;fono</label>
                            <input type="text" id="template-contactform-phone" name="telefono" value="" class="sm-form-control" />
                        </div>

                        <div class="clear"></div>

                        <div class="col_two_third">
                            <label for="template-contactform-subject">Asunto <small>*</small></label>
                            <input type="text" id="template-contactform-subject" name="asunto" value="" class="required sm-form-control" />
                        </div>

                        <div class="col_one_third col_last">
                            <label for="template-contactform-service">Servicios</label>
                            <select id="template-contactform-service" name="servicio" class="sm-form-control">
                                <option value="">Seleccione uno</option>
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
                            <textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="30"></textarea>
                        </div>

                        <div class="col_full hidden">
                            <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
                        </div>

                        <div class="col_full">
                            <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d nomargin">¡Enviar!</button>
                        </div>

                    </form>
                </div>

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
                            <a href="#"><i class="icon-map-marker2"></i></a>
                        </div>
                        <h3>Localizaci&oacute;n<span class="subtitle">Barrio Tom&aacute;s Guardia, Turrialba, Costa Rica</span></h3>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 bottommargin clearfix">
                    <div class="feature-box fbox-center fbox-bg fbox-plain">
                        <div class="fbox-icon">
                            <a href="#"><i class="icon-phone3"></i></a>
                        </div>
                        <h3>Puede llamar al<span class="subtitle">8326 1731</span></h3>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 bottommargin clearfix">
                    <div class="feature-box fbox-center fbox-bg fbox-plain">
                        <div class="fbox-icon">
                            <a href="#"><i class="icon-facebook2"></i></a>
                        </div>
                        <h3>Visitanos<span class="subtitle">fusionacademiacr</span></h3>
                    </div>
                </div>
            </div><!-- Contact Info End -->
        </div>
    </div>
</section><!-- #content end -->

<?php
include_once 'public/footer.php';
?>

<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCQkWM0oTBZWWCQZudbiZVOU0DEooJ4FSw'></script>
<script type="text/javascript" src="js/jquery.gmap.js"></script>

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
                    image: "images/icons/map-icon-red.png",
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