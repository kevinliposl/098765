<?php
include_once 'public/header.php';
?>

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <!-- Portfolio Filter
            ============================================= -->
            <ul id="portfolio-filter" class="portfolio-filter clearfix" data-container="#portfolio">

                <li class="activeFilter"><a href="#" data-filter="*">Mostrar todo</a></li>
                <li><a href="#" data-filter=".pf-profesores">Profesores</a></li>
                <li><a href="#" data-filter=".pf-instrumentos">Instrumentos</a></li>
                <li><a href="#" data-filter=".pf-instalaciones">Instalaciones</a></li>
                <li><a href="#" data-filter=".pf-conciertos">Conciertos</a></li>

            </ul><!-- #portfolio-filter end -->

            <div id="portfolio-shuffle" class="portfolio-shuffle" data-container="#portfolio">
                <i class="icon-random"></i>
            </div>

            <div class="clear"></div>

            <!-- Portfolio Items
            ============================================= -->
            <div id="portfolio" class="portfolio grid-container portfolio-2 portfolio-masonry clearfix">

                <article class="portfolio-item pf-media pf-profesores">
                    <div class="portfolio-image">
                        <a href="#">
                            <img src="public/images/portfolio/masonry/2/1.jpg" alt="Open Imagination">
                        </a>
                        <div class="portfolio-overlay">
                            <a href="public/images/portfolio/full/1.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                            <a href="#" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                        </div>
                    </div>
                    <div class="portfolio-desc">
                        <h3><a href="#">Yurlin Ruiz Piedra</a></h3>
                        <span><a href="#">Canto L&iacute;rico y Popular</a></span>
                    </div>
                </article>

                <article class="portfolio-item pf-instrumentos">
                    <div class="portfolio-image">
                        <a href="#">
                            <img src="public/images/portfolio/masonry/2/2.jpg" alt="Locked Steel Gate">
                        </a>
                        <div class="portfolio-overlay">
                            <a href="public/images/portfolio/full/2.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                            <a href="#" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                        </div>
                    </div>
                    <div class="portfolio-desc">
                        <h3><a href="#">Piano</a></h3>
                        <span><a href="#">Curso disponible</a></span>
                    </div>
                </article>

                <article class="portfolio-item pf-graphics pf-conciertos">
                    <div class="portfolio-image">
                        <a href="#">
                            <img src="public/images/portfolio/masonry/2/3.jpg" alt="Mac Sunglasses">
                        </a>
                        <div class="portfolio-overlay">
                            <a href="http://vimeo.com/89396394" class="left-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
                            <a href="#" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                        </div>
                    </div>
                    <div class="portfolio-desc">
                        <h3><a href="#"></a></h3>
                        <span><a href="#">Presentaci&oacute;n del Estudiante Yurlin Piedra Ruiz</a></span>
                    </div>
                </article>

                <article class="portfolio-item pf-icons pf-instalaciones">
                    <div class="portfolio-image">
                        <div class="fslider" data-arrows="false" data-speed="400" data-pause="4000">
                            <div class="flexslider">
                                <div class="slider-wrap">
                                    <div class="slide"><a href="#"><img src="public/images/portfolio/masonry/2/4.jpg" alt="Morning Dew"></a></div>
                                    <div class="slide"><a href="p#"><img src="public/images/portfolio/masonry/2/4-1.jpg" alt="Morning Dew"></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-overlay" data-lightbox="gallery">
                            <a href="public/images/portfolio/full/4.jpg" class="left-icon" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
                            <a href="public/images/portfolio/full/4-1.jpg" class="hidden" data-lightbox="gallery-item"></a>
                            <a href="#" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                        </div>
                    </div>
                    <div class="portfolio-desc">
                        <h3><a href="#">Aula 1</a></h3>
                        <span><a href="#"><a href="#"></a></span>
                    </div>
                </article>
            </div><!-- #portfolio end -->
        </div>
    </div>
</section><!-- #content end -->

<script src="public/js/Views/galeryView.js" type="text/javascript"></script>

<?php
include_once 'public/footer.php';
?>