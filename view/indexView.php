<?php

$session = SSession::getInstance();

if (isset($session->email)) {
    //include_once 'public/headerUser.php';
} else {
    include_once 'public/header.php';
}
?>

<section id="slider" class="slider-parallax swiper_wrapper full-screen clearfix">
    <div class="slider-parallax-inner">

        <div class="swiper-container swiper-parent">
            <div class="swiper-wrapper">
                <div class="swiper-slide dark" style="background-image: url('public/images/slider/swiper/6.jpg');">
                    <div class="container clearfix">
                        <div class="slider-caption slider-caption-center">
                            <h2 data-caption-animate="fadeInUp">Bienvenido a Fusi&oacute;n</h2>
                            <p data-caption-animate="fadeInUp" data-caption-delay="200">
                                Academia privada de m&uacute;sica.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
            <div id="slider-arrow-right"><i class="icon-angle-right"></i></div>
        </div>

        <a href="#" data-scrollto="#content" data-offset="100" class="dark one-page-arrow"><i class="icon-angle-down infinite animated fadeInDown"></i></a>

    </div>
</section>

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">
            <div class="row clearfix">

                <div class="col-lg-5">
                    <div class="heading-block topmargin">
                        <h1>L&iacute;der en educaci&oacute;n musical en Turrialba</h1>
                    </div>
                    <p class="lead">
                        Fusi&oacute;n es la academia l&iacute;der en educaci&oacute;n musical
                        en el cant&oacute;n de Turrialba, formando futuros grandes m&uacute;sicos. 
                    </p>
                </div>

                <div class="col-lg-7">

                    <div style="position: relative; margin-bottom: -60px;" class="ohidden" data-height-lg="426" data-height-md="567" data-height-sm="470" data-height-xs="287" data-height-xxs="183">
                        <img src="public/images/services/main-fbrowser.png" style="position: absolute; top: 0; left: 0;" data-animate="fadeInUp" data-delay="100" alt="Chrome">
                        <img src="public/images/services/main-fmobile.png" style="position: absolute; top: 0; left: 0;" data-animate="fadeInUp" data-delay="400" alt="iPad">
                    </div>

                </div>

            </div>
        </div>

        <div class="section nobottommargin">
            <div class="container clear-bottommargin clearfix">
                <div class="row topmargin-sm clearfix">
                    <div class="col-md-4 bottommargin">
                        <div class="heading-block nobottomborder" style="margin-bottom: 15px;">
                            <span class="before-heading"></span>
                            <h4>¿Quienes somos?</h4>
                        </div>
                        <p align="justify">
                            Brindamos clases privadas en nuestras instalaciones,
                            también talleres, clínicas y capacitaciones para 
                            público en general y toda agrupación musical que 
                            desee mejorar en sus aptitudes musicales. 
                            <br><br><a href="?controlador=Index&accion=nosotros">¡Conozca m&aacute;s sobre nosotros!</a>
                        </p>
                    </div>

                    <div class="col-md-4 bottommargin">
                        <div class="heading-block nobottomborder" style="margin-bottom: 15px;">
                            <span class="before-heading"></span>
                            <h4>Nuestras ofertas academicas</h4>
                        </div>
                        <p align="justify">
                            En Fusi&oacute;n academia de m&uacute;sica, nuestros 
                            estudiantes se forman en diferentes &aacute;reas de la 
                            música como Violin, Canto, Piano, Bater&iacute;a, Guitarra
                            entre muchas otras m&aacute;s.
                            <br><br><a href="?controlador=Index&accion=instrumentos">¡Conozca m&aacute;s sobre los cursos!</a>
                        </p>
                    </div>

                    <div class="col-md-4 bottommargin">
                        <div class="heading-block nobottomborder" style="margin-bottom: 15px;">
                            <span class="before-heading"></span>
                            <h4>Docencia en Fusi&oacute;n   </h4>
                        </div>
                        <p align="justify">
                            Fusi&oacute;n academia de m&uacute;sica se caracteriza
                            por el alto nivel de exigencia en sus profesores.
                            Todo miembro que integra nuestro equipo 
                            docente ha pasado por múltiples etapas de calificación 
                            y habilidades.
                            <br><br><a href="#">¡Conozca m&aacute;s sobre nuestros docentes!</a>
                        </p>
                    </div>

                </div>

            </div>
        </div>

        <div class="container clearfix">

            <div class="clear"></div>

            <div class="section parallax dark nobottommargin" style="background-image: url('public/images/landing/landing1.jpg'); padding: 100px 0;" data-stellar-background-ratio="0.4">

                <div class="heading-block center">
                    <h3>¿Qu&eacute; dice nuestros clientes?</h3>
                </div>

                <div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="false">
                    <div class="flexslider">
                        <div class="slider-wrap">
                            <div class="slide">
                                <div class="testi-image">
                                    <a href="#"><img src="public/images/icons/avatar.jpg" alt="Customer Testimonails"></a>
                                </div>
                                <div class="testi-content">
                                    <p>
                                        Fusi&oacute;n es una excelente opci&oacute;n para aprender m&uacute;sica
                                    </p>
                                    <div class="testi-meta">
                                        Pablo Barrientos
                                        <span>Estudiante - Universidad de Costa Rica</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <br><h2 class="center">¡Nuestros socios!</h2>

            <div class="container clearfix">

                <div id="oc-clients" class="owl-carousel image-carousel carousel-widget" data-margin="60" data-loop="true" data-nav="false" data-autoplay="5000" data-pagi="false" data-items-xxs="2" data-items-xs="3" data-items-sm="4" data-items-md="5" data-items-lg="6">

                    <div class="oc-item"><a href="#"><img src="public/images/icons/avatar.jpg" alt="Clients"></a></div>
                    <div class="oc-item"><a href="#"><img src="public/images/icons/avatar.jpg" alt="Clients"></a></div>
                    <div class="oc-item"><a href="#"><img src="public/images/icons/avatar.jpg" alt="Clients"></a></div>
                    <div class="oc-item"><a href="#"><img src="public/images/icons/avatar.jpg" alt="Clients"></a></div>
                    <div class="oc-item"><a href="#"><img src="public/images/icons/avatar.jpg" alt="Clients"></a></div>
                    <div class="oc-item"><a href="#"><img src="public/images/icons/avatar.jpg" alt="Clients"></a></div>
                    <div class="oc-item"><a href="#"><img src="public/images/icons/avatar.jpg" alt="Clients"></a></div>
                    <div class="oc-item"><a href="#"><img src="public/images/icons/avatar.jpg" alt="Clients"></a></div>
                    <div class="oc-item"><a href="#"><img src="public/images/icons/avatar.jpg" alt="Clients"></a></div>
                    <div class="oc-item"><a href="#"><img src="public/images/icons/avatar.jpg" alt="Clients"></a></div>

                </div>


            </div>

        </div>

</section><!-- #content end -->



<?php

include_once 'public/footer.php';
?>