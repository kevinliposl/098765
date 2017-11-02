<?php

$session = SSession::getInstance();

if (isset($session->email)) {
    include_once 'public/header.php';
} else {
    include_once 'public/header.php';
}
?>

<section id="slider" class="slider-parallax dark full-screen" style="background: url(images/landing/landing1.jpg) center;">

    <div class="slider-parallax-inner">

        <div class="container clearfix">

            <div class="vertical-middle">

                <div class="heading-block center nobottomborder">
                    <h1 data-animate="fadeInUp">It's your time to <strong>create</strong> Landing Pages for <strong>FREE</strong></h1>
                    <span data-animate="fadeInUp" data-delay="300">Building a Landing Page was never so Easy &amp; Interactive.</span>
                </div>

                <form action="#" method="post" role="form" class="landing-wide-form clearfix">
                    <div class="col_four_fifth nobottommargin">
                        <div class="col_one_third nobottommargin">
                            <input type="text" class="form-control input-lg not-dark" value="" placeholder="Your Name*">
                        </div>
                        <div class="col_one_third nobottommargin">
                            <input type="email" class="form-control input-lg not-dark" value="" placeholder="Your Email*">
                        </div>
                        <div class="col_one_third col_last nobottommargin">
                            <input type="password" class="form-control input-lg not-dark" value="" placeholder="Choose Password*">
                        </div>
                    </div>
                    <div class="col_one_fifth col_last nobottommargin">
                        <button class="btn btn-lg btn-danger btn-block nomargin" value="submit" type="submit" style="">START FREE TRIAL</button>
                    </div>
                </form>

            </div>

            <a href="#" data-scrollto="#section-features" class="one-page-arrow"><i class="icon-angle-down infinite animated fadeInDown"></i></a>

        </div>

    </div>

</section>

<?php
include_once 'public/footer.php';
