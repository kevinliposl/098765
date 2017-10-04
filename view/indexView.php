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
                            <p data-caption-animate="fadeInUp" data-caption-delay="200">"La m&uacute;sica da alma al universo, alas a la mente, vuelos a la imaginaci&oacute;n, consuelo a la tristeza y vida y alegr&iacute;a a todas las cosas" -Plat&oacute;n-</p>
                        </div>
                    </div>
                </div>
            </div>
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

                <div class="container clearfix">

                    <div class="col_one_third">
                        <div class="feature-box fbox-small fbox-plain" data-animate="fadeIn">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-line-monitor"></i></a>
                            </div>
                            <h3>(DEJAR PARA PONER COMENTARIOS SOBRE EL NEGOCIO)</h3>
                            <p>(DEJAR PARA PONER COMENTARIOS SOBRE EL NEGOCIO).</p>
                        </div>
                    </div>

                    <div class="col_one_third">
                        <div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="200">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-line-eye"></i></a>
                            </div>
                            <h3>(DEJAR PARA PONER COMENTARIOS SOBRE EL NEGOCIO)</h3>
                            <p>(DEJAR PARA PONER COMENTARIOS SOBRE EL NEGOCIO).</p>
                        </div>
                    </div>

                    <div class="col_one_third col_last">
                        <div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="400">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-line-star"></i></a>
                            </div>
                            <h3>(DEJAR PARA PONER COMENTARIOS SOBRE EL NEGOCIO)</h3>
                            <p>(DEJAR PARA PONER COMENTARIOS SOBRE EL NEGOCIO).</p>
                        </div>
                    </div>

                    <div class="clear"></div>

                    <div class="col_one_third">
                        <div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="600">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-line-play"></i></a>
                            </div>
                            <h3>(DEJAR PARA PONER COMENTARIOS SOBRE EL NEGOCIO)</h3>
                            <p>(DEJAR PARA PONER COMENTARIOS SOBRE EL NEGOCIO).</p>
                        </div>
                    </div>

                    <div class="col_one_third">
                        <div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="800">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-params"></i></a>
                            </div>
                            <h3>(DEJAR PARA PONER COMENTARIOS SOBRE EL NEGOCIO)</h3>
                            <p>(DEJAR PARA PONER COMENTARIOS SOBRE EL NEGOCIO).</p>
                        </div>
                    </div>

                    <div class="col_one_third col_last">
                        <div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="1000">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-line-circle-check"></i></a>
                            </div>
                            <h3>(DEJAR PARA PONER COMENTARIOS SOBRE EL NEGOCIO)</h3>
                            <p>(DEJAR PARA PONER COMENTARIOS SOBRE EL NEGOCIO).</p>
                        </div>
                    </div>

                    <div class="clear"></div>

                    <div class="col_one_third bottommargin-sm">
                        <div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="600">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-bulb"></i></a>
                            </div>
                            <h3>(DEJAR PARA PONER COMENTARIOS SOBRE EL NEGOCIO)</h3>
                            <p>(DEJAR PARA PONER COMENTARIOS SOBRE EL NEGOCIO).</p>
                        </div>
                    </div>

                    <div class="col_one_third bottommargin-sm">
                        <div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="800">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-heart2"></i></a>
                            </div>
                            <h3>(DEJAR PARA PONER COMENTARIOS SOBRE EL NEGOCIO)</h3>
                            <p>(DEJAR PARA PONER COMENTARIOS SOBRE EL NEGOCIO).</p>
                        </div>
                    </div>

                    <div class="col_one_third bottommargin-sm col_last">
                        <div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="1000">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-note"></i></a>
                            </div>
                            <h3>(DEJAR PARA PONER COMENTARIOS SOBRE EL NEGOCIO)</h3>
                            <p>(DEJAR PARA PONER COMENTARIOS SOBRE EL NEGOCIO).</p>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</section><!-- #content end -->


<!-- End Content
============================================= -->    
<?php

include_once 'public/footer.php';
