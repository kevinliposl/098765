<?php

$session = SSession::getInstance();

if (isset($session->permissions)) {
    if ($session->permissions == 'A') {
        include_once 'public/headerAdmin.php'; //Admin
    } elseif ($session->permissions == 'S') {
        include_once 'public/headerStudent.php'; //Student
    } elseif ($session->permissions == 'R') {
        include_once 'public/headerRoot.php'; //Root
    } elseif ($session->permissions == 'T') {
        include_once 'public/headerProfessor.php'; //Professor
    }
} else {
    include_once 'public/header.php';
}
?>

<section id="slider" class="slider-parallax" style="background: url('public/images/presentation/1.jpg') no-repeat; background-size: cover" data-height-lg="600" data-height-md="500" data-height-sm="400" data-height-xs="300" data-height-xxs="250">
    <div class="slider-parallax-inner">

        <div class="container clearfix">
            <div class="vertical-middle dark center">

                <div class="heading-block nobottommargin center">
                    <h1>
                        <span class="text-rotater nocolor" data-separator="|" data-rotate="flipInX" data-speed="3500">
                            Bienvenido a Fusi&oacute;n<br><span class="t-rotate">Lideres|en la Educaci&oacute;n musical|Turrialbe&ntilde;a</span>
                        </span>
                    </h1>
                </div>
                <a href="#ini" class="button button-border button-light button-rounded button-reveal tright button-large topmargin hidden-xs"><i class="icon-angle-right"></i><span>Start Tour</span></a>
            </div>
        </div>
    </div>
</section>

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap" id="ini">

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
                        <!--<img src="public/images/landing/sol.png" style="position: absolute; top: 0; left: 0;" data-animate="fadeInUp" data-delay="100" alt="Sol">-->
                        <img src="public/images/fusionOriginal.png" style="position: absolute; top: 0; left: 0;" data-animate="fadeInUp" data-delay="400" alt="Fa">
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
                            <br><br><a href="?controlador=Index&action=aboutus">¡Conozca m&aacute;s sobre nosotros!</a>
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
                            <br><br><a href="?controlador=Index&action=instruments">¡Conozca m&aacute;s sobre los cursos!</a>
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

            <div class="section parallax dark nobottommargin" style="background-image: url('public/images/landing/EscritorioFusion.jpg'); padding: 100px 0;" data-stellar-background-ratio="0.4">

                <div class="heading-block center">
                    <h3>¿Qu&eacute; dice nuestros clientes?</h3>
                </div>

                <div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="false">
                    <div class="flexslider">
                        <div class="slider-wrap">
                            <div class="slide">
                                <!--                                <div class="testi-image">
                                                                    <a href="#"><img src="public/images/icons/avatar.jpg" alt="Customer Testimonails"></a>
                                                                </div>-->
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


            <!--            <br><h2 class="center">¡Nuestros socios!</h2>
            
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
            
            
                        </div>-->

        </div>

</section><!-- #content end -->

<?php

include_once 'public/footer.php';
