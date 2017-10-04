<?php
$session = SSession::getInstance();

if (isset($session->email)) {
    //include_once 'public/headerUser.php';
} else {
  //  include_once 'public/header.php';
}
?>
<!-- Content
============================================= -->

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<!-- Document Title
	============================================= -->
	<title>Landing Page | Canvas</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="index.html" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="images/logo.png" alt="Canvas Logo"></a>
						<a href="index.html" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img src="images/logo@2x.png" alt="Canvas Logo"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						<ul class="one-page-menu">
							<li class="current"><a href="#" data-href="#section-home"><div>Home</div></a></li>
							<li><a href="#" data-href="#section-features"><div>Features</div></a></li>
							<li><a href="#" data-href="#section-pricing"><div>Pricing</div></a></li>
							<li><a href="#" data-href="#section-faqs"><div>FAQs</div></a></li>
							<li><a href="#" data-href="#section-contact"><div>Contact</div></a></li>
							<li><a href="#" data-href="#section-buy"><div>Buy Now</div></a></li>
						</ul>

					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div id="section-home" class="heading-block title-center nobottomborder page-section">
						<h1>Starter's Guide to create Landing Pages</h1>
						<span>Building a Landing Page was never so <span class="color">Easy</span> &amp; Interactive</span>
					</div>

					<div class="center bottommargin">
						<a href="#" class="button button-3d button-teal button-xlarge nobottommargin"><i class="icon-star3"></i>Start your FREE Trial</a> - OR - <a href="#" data-scrollto="#section-pricing" class="button button-3d button-red button-xlarge nobottommargin"><i class="icon-user2"></i>Sign Up for a Subscription</a>
					</div>

					<div class="clear"></div>

					<div class="col_two_third topmargin nobottommargin">

						<div style="position: relative;" data-height-lg="535" data-height-md="442" data-height-sm="338" data-height-xs="316" data-height-xxs="201">
							<img data-animate="fadeInLeft" src="images/landing/device1.png" alt="Mac" style="position: absolute; top: 0; left: 0;">
							<img data-animate="fadeInRight" data-delay="300" src="images/landing/device2.png" alt="iPad" style="position: absolute; top: 0; left: 0;">
							<img data-animate="fadeInUp" data-delay="600" src="images/landing/device3.png" alt="iPhone" style="position: absolute; top: 0; left: 0;">
						</div>

					</div>

					<div class="col_one_third topmargin nobottommargin col_last">

						<h3>Short Overview.</h3>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, quos, facilis esse rem dicta dignissimos eligendi earum sapiente ipsam iure vel deserunt? Soluta doloremque aspernatur quis asperiores numquam placeat dolore.</p>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum, ab incidunt temporibus rerum odio accusantium.</p>

						<div class="divider divider-short"><i class="icon-circle"></i></div>

						<ul class="iconlist iconlist-large iconlist-color">
							<li><i class="icon-ok-sign"></i> Interactive Live Builder</li>
							<li><i class="icon-ok-sign"></i> Valid HTML5 &amp; CSS3 Semantics</li>
							<li><i class="icon-ok-sign"></i> 100% Open Source &amp; Customizable</li>
							<li><i class="icon-ok-sign"></i> More than 70+ Widgets</li>
							<li><i class="icon-ok-sign"></i> Responsive &amp; Retina Devices Support</li>
							<li><i class="icon-ok-sign"></i> Easy Embeddable Media &amp; Graphics</li>
							<li><i class="icon-ok-sign"></i> Lifetime <strong>FREE</strong> Updates</li>
						</ul>

					</div>

					<div class="clear"></div>

					<div class="divider divider-short divider-center"><i class="icon-circle"></i></div>

					<div id="section-features" class="heading-block title-center page-section">
						<h2>Features Overview</h2>
						<span>Some of the Features that are gonna blow your mind off</span>
					</div>

					<div class="col_one_third">
						<div class="feature-box fbox-plain">
							<div class="fbox-icon" data-animate="bounceIn">
								<a href="#"><img src="images/icons/features/responsive.png" alt="Responsive Layout"></a>
							</div>
							<h3>Responsive Layout</h3>
							<p>Powerful Layout with Responsive functionality that can be adapted to any screen size. Resize browser to view.</p>
						</div>
					</div>

					<div class="col_one_third">
						<div class="feature-box fbox-plain">
							<div class="fbox-icon" data-animate="bounceIn" data-delay="200">
								<a href="#"><img src="images/icons/features/retina.png" alt="Retina Graphics"></a>
							</div>
							<h3>Retina Graphics</h3>
							<p>Looks beautiful &amp; ultra-sharp on Retina Screen Displays. Retina Icons, Fonts &amp; all others graphics are optimized.</p>
						</div>
					</div>

					<div class="col_one_third col_last">
						<div class="feature-box fbox-plain">
							<div class="fbox-icon" data-animate="bounceIn" data-delay="400">
								<a href="#"><img src="images/icons/features/performance.png" alt="Powerful Performance"></a>
							</div>
							<h3>Powerful Performance</h3>
							<p>Canvas includes tons of optimized code that are completely customizable and deliver unmatched fast performance.</p>
						</div>
					</div>

					<div class="clear"></div>

					<div class="col_one_third">
						<div class="feature-box fbox-plain">
							<div class="fbox-icon" data-animate="bounceIn" data-delay="600">
								<a href="#"><img src="images/icons/features/flag.png" alt="Responsive Layout"></a>
							</div>
							<h3>Endless Possibilities</h3>
							<p>You have complete easy control on each &amp; every element that provides endless customization possibilities.</p>
						</div>
					</div>

					<div class="col_one_third">
						<div class="feature-box fbox-plain">
							<div class="fbox-icon" data-animate="bounceIn" data-delay="800">
								<a href="#"><img src="images/icons/features/tick.png" alt="Retina Graphics"></a>
							</div>
							<h3>Light &amp; Dark Scheme</h3>
							<p>Change your Website's Primary Scheme instantly by simply adding the dark class to the body.</p>
						</div>
					</div>

					<div class="col_one_third col_last">
						<div class="feature-box fbox-plain">
							<div class="fbox-icon" data-animate="bounceIn" data-delay="1000">
								<a href="#"><img src="images/icons/features/tools.png" alt="Powerful Performance"></a>
							</div>
							<h3>Customizable Fonts</h3>
							<p>Use any Font you like from Google Web Fonts, Typekit or other Web Fonts. They will blend in perfectly.</p>
						</div>
					</div>

					<div class="clear"></div>

					<div class="col_one_third">
						<div class="feature-box fbox-plain">
							<div class="fbox-icon" data-animate="bounceIn" data-delay="1200">
								<a href="#"><img src="images/icons/features/map.png" alt="Responsive Layout"></a>
							</div>
							<h3>Responsive Layout</h3>
							<p>Powerful Layout with Responsive functionality that can be adapted to any screen size. Resize browser to view.</p>
						</div>
					</div>

					<div class="col_one_third">
						<div class="feature-box fbox-plain">
							<div class="fbox-icon" data-animate="bounceIn" data-delay="1400">
								<a href="#"><img src="images/icons/features/seo.png" alt="Retina Graphics"></a>
							</div>
							<h3>Retina Graphics</h3>
							<p>Looks beautiful &amp; ultra-sharp on Retina Screen Displays. Retina Icons, Fonts &amp; all others graphics are optimized.</p>
						</div>
					</div>

					<div class="col_one_third col_last">
						<div class="feature-box fbox-plain">
							<div class="fbox-icon" data-animate="bounceIn" data-delay="1600">
								<a href="#"><img src="images/icons/features/support.png" alt="Powerful Performance"></a>
							</div>
							<h3>Powerful Performance</h3>
							<p>Canvas includes tons of optimized code that are completely customizable and deliver unmatched fast performance.</p>
						</div>
					</div>

					<div class="clear"></div>

					<div class="divider divider-short divider-center"><i class="icon-circle"></i></div>

					<div id="section-pricing" class="heading-block title-center page-section">
						<h2>Smart Pricing</h2>
						<span>Flexible &amp; Easy Pricing for wide Audience Groups</span>
					</div>

					<div class="pricing bottommargin clearfix">

						<div class="col-md-3" data-animate="fadeInLeft">

							<div class="pricing-box">
								<div class="pricing-title">
									<h3>Starter</h3>
								</div>
								<div class="pricing-price">
									<span class="price-unit">&euro;</span>7<span class="price-tenure">/mo</span>
								</div>
								<div class="pricing-features">
									<ul>
										<li><strong>Full</strong> Access</li>
										<li><i class="icon-code"></i> Source Files</li>
										<li><strong>100</strong> User Accounts</li>
										<li><strong>1 Year</strong> License</li>
										<li>Phone &amp; Email Support</li>
									</ul>
								</div>
								<div class="pricing-action">
									<a href="#" class="btn btn-danger btn-block btn-lg">Sign Up</a>
								</div>
							</div>

						</div>

						<div class="col-md-3" data-animate="fadeInDown"  data-delay="250">

							<div class="pricing-box best-price">
								<div class="pricing-title">
									<h3>Professional</h3>
									<span>Most Popular</span>
								</div>
								<div class="pricing-price">
									<span class="price-unit">&euro;</span>12<span class="price-tenure">/mo</span>
								</div>
								<div class="pricing-features">
									<ul>
										<li><strong>Full</strong> Access</li>
										<li><i class="icon-code"></i> Source Files</li>
										<li><strong>1000</strong> User Accounts</li>
										<li><strong>2 Years</strong> License</li>
										<li><i class="icon-star3"></i>
										<i class="icon-star3"></i>
										<i class="icon-star3"></i>
										<i class="icon-star3"></i>
										<i class="icon-star3"></i></li>
									</ul>
								</div>
								<div class="pricing-action">
									<a href="#" class="btn btn-danger btn-block btn-lg bgcolor border-color">Sign Up</a>
								</div>
							</div>

						</div>

						<div class="col-md-3" data-animate="fadeInUp" data-delay="500">

							<div class="pricing-box">
								<div class="pricing-title">
									<h3>Business</h3>
								</div>
								<div class="pricing-price">
									<span class="price-unit">&euro;</span>19<span class="price-tenure">/mo</span>
								</div>
								<div class="pricing-features">
									<ul>
										<li><strong>Full</strong> Access</li>
										<li><i class="icon-code"></i> Source Files</li>
										<li><strong>500</strong> User Accounts</li>
										<li><strong>3 Years</strong> License</li>
										<li>Phone &amp; Email Support</li>
									</ul>
								</div>
								<div class="pricing-action">
									<a href="#" class="btn btn-danger btn-block btn-lg">Sign Up</a>
								</div>
							</div>

						</div>

						<div class="col-md-3" data-animate="fadeInRight" data-delay="250">

							<div class="pricing-box">
								<div class="pricing-title">
									<h3>Enterprise</h3>
								</div>
								<div class="pricing-price">
									<span class="price-unit">&euro;</span>29<span class="price-tenure">/mo</span>
								</div>
								<div class="pricing-features">
									<ul>
										<li><strong>Full</strong> Access</li>
										<li><i class="icon-code"></i> Source Files</li>
										<li><strong>1000</strong> User Accounts</li>
										<li><strong>5 Years</strong> License</li>
										<li>Phone &amp; Email Support</li>
									</ul>
								</div>
								<div class="pricing-action">
									<a href="#" class="btn btn-danger btn-block btn-lg">Sign Up</a>
								</div>
							</div>

						</div>

					</div>

					<div class="divider divider-short divider-center"><i class="icon-circle"></i></div>

					<div id="section-faqs" class="heading-block title-center page-section">
						<h2>Frequently Asked Questions</h2>
						<span>We have answered a wide range of Questions for your Convenience</span>
					</div>

					<div class="col_half nobottommargin">

						<h4 id="faq-1"><strong>Q.</strong> How do I become an author?</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</p>

						<div class="line"></div>

						<h4 id="faq-2"><strong>Q.</strong> Helpful Resources for Authors</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, placeat, architecto rem dolorem dignissimos repellat veritatis in et eos doloribus magnam aliquam ipsa alias assumenda officiis quasi sapiente suscipit veniam odio voluptatum. Enim at asperiores quod velit minima officia accusamus cumque eligendi consequuntur fuga? Maiores, quasi, voluptates, exercitationem fuga voluptatibus a repudiandae expedita omnis molestiae alias repellat perferendis dolores dolor.</p>

						<div class="line"></div>

						<h4 id="faq-3"><strong>Q.</strong> How much money can I make?</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, fugiat iste nisi tempore nesciunt nemo fuga? Nesciunt, delectus laboriosam nisi repudiandae nam fuga saepe animi recusandae. Asperiores, provident, esse, doloremque, adipisci eaque alias dolore molestias assumenda quasi saepe nisi ab illo ex nesciunt nobis laboriosam iusto quia nulla ad voluptatibus iste beatae voluptas corrupti facilis accusamus recusandae sequi debitis reprehenderit quibusdam. Facilis eligendi a exercitationem nisi et placeat excepturi velit!</p>

						<div class="line"></div>

						<h4 id="faq-5"><strong>Q.</strong> An Introduction to the Marketplaces for Authors</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, quisquam atque vero delectus corrupti! Quo, maiores, dolorem, hic commodi nulla ratione accusamus doloribus fuga magnam id temporibus dignissimos deleniti quidem ipsam corporis sapiente nam expedita saepe quas ab? Vero, assumenda.</p>

					</div>

					<div class="col_half nobottommargin col_last">

						<h4 id="faq-7"><strong>Q.</strong> What Images, Videos, Code or Music Can I Use in my Items?</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad odio ab quis architecto recusandae doloremque incidunt! Eius, quidem, pariatur necessitatibus commodi aliquid deleniti repudiandae accusantium tempora soluta vel nesciunt est quibusdam iure adipisci aspernatur maiores saepe ea eaque quo harum reprehenderit similique nemo voluptate ullam natus illum magnam alias nobis doloremque delectus ipsa dicta repellat maxime dignissimos eveniet quae debitis ratione assumenda tempore officiis fugiat dolor. Saepe iusto praesentium ullam aliquam impedit.</p>

						<div class="line"></div>

						<h4 id="faq-8"><strong>Q.</strong> Can I use trademarked names in my items?</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, nisi, laborum autem reprehenderit excepturi harum ipsum quod sit. Inventore et sunt nemo natus labore voluptate omnis reprehenderit culpa. Minus vitae molestiae totam ut a accusamus at fugiat nemo debitis delectus? Consectetur, deleniti, cupiditate ad doloribus numquam minus illum fugit laborum a voluptatum nulla at autem ab beatae odio dolorem assumenda magni laudantium saepe recusandae doloremque illo nesciunt aut quos debitis neque reiciendis veritatis iusto eos aliquid voluptatem pariatur eveniet velit?</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, esse, dolore, animi sed aliquam est consequatur atque magnam sunt voluptas nostrum sint minus neque iste ut velit iure eius! Hic, laudantium, consequatur veniam magnam ullam eveniet sed minus rem deleniti!</p>

						<div class="line"></div>

						<h4 id="faq-9"><strong>Q.</strong> Tips for Increasing Your Referral Income</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, nisi, laborum autem reprehenderit excepturi harum ipsum quod sit. Inventore et sunt nemo natus labore voluptate omnis reprehenderit culpa. Minus vitae molestiae totam ut a accusamus at fugiat nemo debitis delectus? Consectetur, deleniti, cupiditate ad doloribus numquam minus illum fugit laborum a voluptatum nulla at autem ab beatae odio dolorem assumenda magni laudantium saepe recusandae doloremque illo nesciunt aut quos debitis neque reiciendis veritatis iusto eos aliquid voluptatem pariatur eveniet velit?</p>

					</div>

					<div class="clear"></div>

					<div class="divider divider-short divider-center"><i class="icon-circle"></i></div>

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

								<div class="col_two_third">
									<label for="template-contactform-subject">Subject <small>*</small></label>
									<input type="text" id="template-contactform-subject" name="template-contactform-subject" value="" class="required sm-form-control" />
								</div>

								<div class="col_one_third col_last">
									<label for="template-contactform-service">Services</label>
									<select id="template-contactform-service" name="template-contactform-service" class="sm-form-control">
										<option value="">-- Select One --</option>
										<option value="Wordpress">Wordpress</option>
										<option value="PHP / MySQL">PHP / MySQL</option>
										<option value="HTML5 / CSS3">HTML5 / CSS3</option>
										<option value="Graphic Design">Graphic Design</option>
									</select>
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

				<div id="section-buy" class="section page-section footer-stick">

					<div class="container clearfix">

						<div class="heading-block title-center nobottomborder">
							<h2>Enough? Start Building!</h2>
							<span>Now that you have read all the Tid-Bits, so start with a plan</span>
						</div>

						<div class="center">

							<a href="#" data-animate="tada" class="button button-3d button-teal button-xlarge nobottommargin"><i class="icon-star3"></i>Start your FREE Trial</a> - OR - <a href="#" data-scrollto="#section-pricing" class="button button-3d button-red button-xlarge nobottommargin"><i class="icon-user2"></i>Sign Up for a Subscription</a>

						</div>

					</div>

				</div>

			</div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">

			<div class="container">

				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap clearfix">

					<div class="col_two_third">

						<div class="col_one_third">

							<div class="widget clearfix">

								<img src="images/footer-widget-logo.png" alt="" class="footer-logo">

								<p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp; <strong>Flexible</strong> Design Standards.</p>

								<div style="background: url('images/world-map.png') no-repeat center center; background-size: 100%;">
									<address>
										<strong>Headquarters:</strong><br>
										795 Folsom Ave, Suite 600<br>
										San Francisco, CA 94107<br>
									</address>
									<abbr title="Phone Number"><strong>Phone:</strong></abbr> (91) 8547 632521<br>
									<abbr title="Fax"><strong>Fax:</strong></abbr> (91) 11 4752 1433<br>
									<abbr title="Email Address"><strong>Email:</strong></abbr> info@canvas.com
								</div>

							</div>

						</div>

						<div class="col_one_third">

							<div class="widget widget_links clearfix">

								<h4>Blogroll</h4>

								<ul>
									<li><a href="http://codex.wordpress.org/">Documentation</a></li>
									<li><a href="http://wordpress.org/support/forum/requests-and-feedback">Feedback</a></li>
									<li><a href="http://wordpress.org/extend/plugins/">Plugins</a></li>
									<li><a href="http://wordpress.org/support/">Support Forums</a></li>
									<li><a href="http://wordpress.org/extend/themes/">Themes</a></li>
									<li><a href="http://wordpress.org/news/">WordPress Blog</a></li>
									<li><a href="http://planet.wordpress.org/">WordPress Planet</a></li>
								</ul>

							</div>

						</div>

						<div class="col_one_third col_last">

							<div class="widget clearfix">
								<h4>Recent Posts</h4>

								<div id="post-list-footer">
									<div class="spost clearfix">
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
											</div>
											<ul class="entry-meta">
												<li>10th July 2014</li>
											</ul>
										</div>
									</div>

									<div class="spost clearfix">
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
											</div>
											<ul class="entry-meta">
												<li>10th July 2014</li>
											</ul>
										</div>
									</div>

									<div class="spost clearfix">
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
											</div>
											<ul class="entry-meta">
												<li>10th July 2014</li>
											</ul>
										</div>
									</div>
								</div>
							</div>

						</div>

					</div>

					<div class="col_one_third col_last">

						<div class="widget clearfix" style="margin-bottom: -20px;">

							<div class="row">

								<div class="col-md-6 bottommargin-sm">
									<div class="counter counter-small"><span data-from="50" data-to="15065421" data-refresh-interval="80" data-speed="3000" data-comma="true"></span></div>
									<h5 class="nobottommargin">Total Downloads</h5>
								</div>

								<div class="col-md-6 bottommargin-sm">
									<div class="counter counter-small"><span data-from="100" data-to="18465" data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
									<h5 class="nobottommargin">Clients</h5>
								</div>

							</div>

						</div>

						<div class="widget subscribe-widget clearfix">
							<h5><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
							<div class="widget-subscribe-form-result"></div>
							<form id="widget-subscribe-form" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
								<div class="input-group divcenter">
									<span class="input-group-addon"><i class="icon-email2"></i></span>
									<input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
									<span class="input-group-btn">
										<button class="btn btn-success" type="submit">Subscribe</button>
									</span>
								</div>
							</form>
						</div>

						<div class="widget clearfix" style="margin-bottom: -20px;">

							<div class="row">

								<div class="col-md-6 clearfix bottommargin-sm">
									<a href="#" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
										<i class="icon-facebook"></i>
										<i class="icon-facebook"></i>
									</a>
									<a href="#"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
								</div>
								<div class="col-md-6 clearfix">
									<a href="#" class="social-icon si-dark si-colored si-rss nobottommargin" style="margin-right: 10px;">
										<i class="icon-rss"></i>
										<i class="icon-rss"></i>
									</a>
									<a href="#"><small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>to RSS Feeds</small></a>
								</div>

							</div>

						</div>

					</div>

				</div><!-- .footer-widgets-wrap end -->

			</div>

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_half">
						Copyrights &copy; 2014 All Rights Reserved by Canvas Inc.<br>
						<div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
					</div>

					<div class="col_half col_last tright">
						<div class="fright clearfix">
							<a href="#" class="social-icon si-small si-borderless si-facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-gplus">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-pinterest">
								<i class="icon-pinterest"></i>
								<i class="icon-pinterest"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-vimeo">
								<i class="icon-vimeo"></i>
								<i class="icon-vimeo"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-github">
								<i class="icon-github"></i>
								<i class="icon-github"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-yahoo">
								<i class="icon-yahoo"></i>
								<i class="icon-yahoo"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-linkedin">
								<i class="icon-linkedin"></i>
								<i class="icon-linkedin"></i>
							</a>
						</div>

						<div class="clear"></div>

						<i class="icon-envelope2"></i> info@canvas.com <span class="middot">&middot;</span> <i class="icon-headphones"></i> +91-11-6541-6369 <span class="middot">&middot;</span> <i class="icon-skype2"></i> CanvasOnSkype
					</div>

				</div>

			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="js/functions.js"></script>

	<script type="text/javascript" src="https://maps.google.com/maps/api/js"></script>
	<script type="text/javascript" src="js/jquery.gmap.js"></script>

	<script type="text/javascript">

		jQuery('#google-map').gMap({

			address: 'Melbourne, Australia',
			maptype: 'ROADMAP',
			zoom: 14,
			markers: [
				{
					address: "Melbourne, Australia",
					html: '<div style="width: 300px;"><h4 style="margin-bottom: 8px;">Hi, we\'re <span>Envato</span></h4><p class="nobottommargin">Our mission is to help people to <strong>earn</strong> and to <strong>learn</strong> online. We operate <strong>marketplaces</strong> where hundreds of thousands of people buy and sell digital goods every day, and a network of educational blogs where millions learn <strong>creative skills</strong>.</p></div>',
					icon: {
						image: "images/icons/map-icon-red.png",
						iconsize: [32, 39],
						iconanchor: [32,39]
					}
				}
			],
			doubleclickzoom: false,
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

</body>
</html>



<!-- End Content
============================================= -->    
<?php
//include_once 'public/footer.php';
