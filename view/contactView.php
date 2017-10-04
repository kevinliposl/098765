<?php
$session = SSession::getInstance();

if (isset($session->email)) {
    //include_once 'public/headerUser.php';
} else {
    include_once 'public/header.php';
}
?>
<!-- Content
============================================= -->

<div class="container clearfix">

    <br>
    <br>
    <div id="section-contact" class="heading-block title-center page-section">
        <h2>Get in Touch with us</h2>
        <span>Still have Questions? Contact Us using the Form below</span>
    </div>

    <!-- Contact Form
    ============================================= -->
    <div class="col_half">

        <div class="fancy-title title-dotted-border">
            <h3>Send us an Email</h3>
        </div>

        <div class="contact-widget">

            <div class="contact-form-result"></div>

            <form class="nobottommargin" id="template-contactform" name="template-contactform" action="include/sendemail.php" method="post">

                <div class="form-process"></div>

                <div class="col_one_third">
                    <label for="template-contactform-name">Name <small>*</small></label>
                    <input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control required" />
                </div>

                <div class="col_one_third">
                    <label for="template-contactform-email">Email <small>*</small></label>
                    <input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control" />
                </div>

                <div class="col_one_third col_last">
                    <label for="template-contactform-phone">Phone</label>
                    <input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control" />
                </div>

                <div class="clear"></div>

                <div class="col_full">
                    <label for="template-contactform-subject">Subject <small>*</small></label>
                    <input type="text" id="template-contactform-subject" name="template-contactform-subject" value="" class="required sm-form-control" />
                </div>

                <div class="clear"></div>

                <div class="col_full">
                    <label for="template-contactform-message">Message <small>*</small></label>
                    <textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="30"></textarea>
                </div>

                <div class="col_full hidden">
                    <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
                </div>

                <div class="col_full">
                    <button class="button button-3d nomargin" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">Send Message</button>
                </div>

            </form>

        </div>


    </div><!-- Contact Form End -->

    <!-- Google Map
    ============================================= -->
    <div class="col_half col_last">

        <section id="google-map" class="gmap" style="height: 410px;"></section>


    </div><!-- Google Map End -->

    <!-- Contact Info
    ============================================= -->
    <div class="col_full nobottommargin clearfix">

        <div class="col_one_fourth">
            <div class="feature-box fbox-center fbox-bg fbox-plain">
                <div class="fbox-icon">
                    <a href="#"><i class="icon-map-marker2"></i></a>
                </div>
                <h3>Our Headquarters<span class="subtitle">Melbourne, Australia</span></h3>
            </div>
        </div>

        <div class="col_one_fourth">
            <div class="feature-box fbox-center fbox-bg fbox-plain">
                <div class="fbox-icon">
                    <a href="#"><i class="icon-phone3"></i></a>
                </div>
                <h3>Speak to Us<span class="subtitle">(123) 456 7890</span></h3>
            </div>
        </div>

        <div class="col_one_fourth">
            <div class="feature-box fbox-center fbox-bg fbox-plain">
                <div class="fbox-icon">
                    <a href="#"><i class="icon-skype2"></i></a>
                </div>
                <h3>Make a Video Call<span class="subtitle">CanvasOnSkype</span></h3>
            </div>
        </div>

        <div class="col_one_fourth col_last">
            <div class="feature-box fbox-center fbox-bg fbox-plain">
                <div class="fbox-icon">
                    <a href="#"><i class="icon-twitter2"></i></a>
                </div>
                <h3>Follow on Twitter<span class="subtitle">2.3M Followers</span></h3>
            </div>
        </div>

    </div><!-- Contact Info End -->

</div>
<!-- End Content
============================================= -->    
<?php
include_once 'public/footer.php';




