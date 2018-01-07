<?php

$session = SSession::getInstance();

if (isset($session->permissions)) {
    if ($session->permissions == 'S') {
        include_once 'public/headerStudent.php';
    } else if ($session->permissions == 'A') {
        include_once 'public/headerAdmin.php';
    } elseif ($session->permissions == 'T') {
        include_once 'public/headerProfessor.php';
    } else {
        include_once 'public/header.php';
    }
} else {
    include_once 'public/header.php';
}
?>
<section id="page-title" class="page-title-parallax page-title-dark" style="padding: 250px 0; background-image: url('public/images/presentation/1.jpg'); background-size: cover; background-position: center center;" data-stellar-background-ratio="0.4">
    <div class="container clearfix">
        <h1>Sobre Nosotros</h1>
        <span>¡Todos deben conocernos!</span>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="col_one_third">
                <div class="heading-block fancy-title nobottomborder title-bottom-border">
                    <h4>por qué <span>elegirnos</span>.</h4>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi quidem minus id omnis, nam expedita, ea fuga commodi voluptas iusto, hic autem deleniti dolores explicabo labore enim repellat earum perspiciatis.</p>
            </div>
            <div class="col_one_third">
                <div class="heading-block fancy-title nobottomborder title-bottom-border">
                    <h4>Nuestra <span>mision</span>.</h4>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi quidem minus id omnis, nam expedita, ea fuga commodi voluptas iusto, hic autem deleniti dolores explicabo labore enim repellat earum perspiciatis.</p>
            </div>
            <div class="col_one_third col_last">
                <div class="heading-block fancy-title nobottomborder title-bottom-border">
                    <h4>Que <span>hacemos</span>.</h4>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi quidem minus id omnis, nam expedita, ea fuga commodi voluptas iusto, hic autem deleniti dolores explicabo labore enim repellat earum perspiciatis.</p>
            </div>
        </div>
    </div>
    <div class="row common-height clearfix">
        <div class="col-sm-5 col-padding" style="background: url('images/presentation/2.jpg') center center no-repeat; background-size: cover;"></div>
        <div class="col-sm-7 col-padding">
            <div>
                <div class="heading-block">
                    <span class="before-heading color">Co-fundador</span>
                    <h3>Wagner Vargas Moya</h3>
                </div>

                <div class="row clearfix">

                    <div class="col-md-6">
                        <p>Employment respond committed meaningful fight against oppression social challenges rural legal aid governance. Meaningful work, implementation, process cooperation, campaign inspire.</p>
                        <p>Advancement, promising development John Lennon, our ambitions involvement underprivileged billionaire philanthropy save the world transform. Carbon rights maintain healthcare emergent, implementation inspire social change solve clean water livelihoods.</p>
                        <a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row common-height bottommargin-lg clearfix">
        <div class="col-sm-7 col-padding" style="background-color: #F5F5F5;">
            <div>
                <div class="heading-block">
                    <span class="before-heading color">Co-Fundador</span>
                    <h3>Estefanie S&aacute;nchez Coto</h3>
                </div>
                <div class="row clearfix">
                    <div class="col-md-6">
                        <p>Employment respond committed meaningful fight against oppression social challenges rural legal aid governance. Meaningful work, implementation, process cooperation, campaign inspire.</p>
                        <p>Advancement, promising development John Lennon, our ambitions involvement underprivileged billionaire philanthropy save the world transform. Carbon rights maintain healthcare emergent, implementation inspire social change solve clean water livelihoods.</p>
                        <a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-5 col-padding" style="background: url('images/team/8.jpg') center center no-repeat; background-size: cover;"></div>
    </div>
    <div class="container clearfix">
        <div class="clear"></div>
        <div class="heading-block center">
            <h4>Nuestros Socios</h4>
        </div>

        <ul class="clients-grid grid-6 nobottommargin clearfix">
            <li><a href="http://logofury.com/logo/enzo.html"><img src="images/clients/1.png" alt="Clients"></a></li>
            <li><a href="http://logofury.com"><img src="images/clients/2.png" alt="Clients"></a></li>
            <li><a href="http://logofaves.com/2014/03/grabbt/"><img src="images/clients/3.png" alt="Clients"></a></li>
            <li><a href="http://logofaves.com/2014/01/ladera-granola/"><img src="images/clients/4.png" alt="Clients"></a></li>
            <li><a href="http://logofaves.com/2014/02/hershel-farms/"><img src="images/clients/5.png" alt="Clients"></a></li>
            <li><a href="http://logofury.com/logo/food-fight-radio.html"><img src="images/clients/6.png" alt="Clients"></a></li>
            <li><a href="http://logofury.com"><img src="images/clients/7.png" alt="Clients"></a></li>
            <li><a href="http://logofury.com/logo/up-travel.html"><img src="images/clients/8.png" alt="Clients"></a></li>
            <li><a href="http://logofury.com/logo/caffi-bardi.html"><img src="images/clients/9.png" alt="Clients"></a></li>
            <li><a href="http://logofury.com/logo/bignix-design.html"><img src="images/clients/10.png" alt="Clients"></a></li>
            <li><a href="http://logofury.com/"><img src="images/clients/11.png" alt="Clients"></a></li>
            <li><a href="http://logofury.com/"><img src="images/clients/12.png" alt="Clients"></a></li>
        </ul>
    </div>
    <div class="section footer-stick">
        <h4 class="uppercase center">¿Qu&eacute; dicen nuestros <span>clientes</span>?</h4>
        <div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="false">
            <div class="flexslider">
                <div class="slider-wrap">
                    <div class="slide">
                        <div class="testi-image">
                            <a href="#"><img src="images/testimonials/3.jpg" alt="Customer Testimonails"></a>
                        </div>
                        <div class="testi-content">
                            <p>Simplemente Magn&iacute;fico</p>
                            <div class="testi-meta">
                                Yurlin Ruiz
                                <span>Estudiante.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include_once 'public/footer.php';
