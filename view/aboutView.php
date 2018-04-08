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
                    <h4>¿Por qué <span>elegirnos</span>?</h4>
                </div>
                <p style="text-align: justify; text-justify: inter-word;">
                Porque somos j&oacute;venes emprendedores, profesionales en educaci&oacute;n musical, con un enfoque moderno y diferente, fusionamos diferentes estilos, experiencias y capacidades, para potenciar el desarrollo de las habilidades musicales de nuestros estudiantes. Nuestro enfoque se sustenta en tres pilares fundamentales: el estudio te&oacute;rico pr&aacute;ctico del instrumento, el ensamble musical y la presentación en vivo ante un p&uacute;blico.
                </p>
            </div>
            <div class="col_one_third">
                <div class="heading-block fancy-title nobottomborder title-bottom-border">
                    <h4>Nuestra <span>mision</span>.</h4>
                </div>
                <p style="text-align: justify; text-justify: inter-word;">
                Brindar servicios musicales de la m&aacute;s alta calidad, facilitando espacios a nuestra comunidad para el desarrollo de las habilidades musicales de niños, j&oacute;venes y adultos, a trav&eacute;s de nuestro excelente equipo de m&uacute;sicos y docentes, con un enfoque moderno y diferente.
                </p>
            </div>
            <div class="col_one_third col_last">
                <div class="heading-block fancy-title nobottomborder title-bottom-border">
                    <h4>¿Qu&eacute; <span>hacemos</span>?</h4>
                </div>
                <p style="text-align: justify; text-justify: inter-word;">
                Lecciones musicales privadas para diferentes instrumentos, talleres, clases maestras, servicios musicales para presentaciones privadas, reparaci&oacute;n y mantenimiento de instrumentos, grabaci&oacute;n de demos musicales, producci&oacute;n de jingles, entre otros servicios.
                </p>
            </div>
        </div>
    </div>
    <div class="heading-block center">
		<h2>¿Quienes est&aacute;n detr&aacute;s de Fusi&oacute;n?</h2>
	</div>
    <div class="row col-md-offset-2 clearfix">
	<div class="col-md-10 bottommargin">
		<div class="team team-list clearfix">
			<div class="team-image">
				<img src="public/images/about/perfilWoman.jpg" alt="ESTEFANIE SANCHEZ COTO">
			</div>
			<div class="team-desc">
				<div class="team-title"><h4>ESTEFANIE SANCHEZ COTO</h4><span>Co-Fundadora</span></div>
				<div class="team-content">
					<p style="text-align: justify; text-justify: inter-word;">
                    Directora de Fusión Academia de Música. Emprendedora, música y docente. Licenciada en Enseñanza de la Música por la Universidad de Costa Rica, Bachiller en Interpretación y Enseñanza  de la Dirección Coral por la Universidad Nacional de Costa Rica, bajo la tutela del maestro David Ramírez. Directora coral, docente universitaria, docente para el Ministerio de Educación Pública. Integrante del grupo vocal internacional Ocho en Voz, multi instrumentista, gestora del movimiento coral en Turrialba, más de 5 años de experiencia como docente y directora coral. Directora de Coro Zafra, Coro Universitario y Coro de Niños, agrupaciones corales de la Universidad de Costa Rica, Sede del Atlántico, Turrialba. Ha recibidos clases maestras con los directores Hanz-Peter Shurz (Alemania), T.J Harper (Estados Unidos) y Cesar Alejandro Carrillo (Venezuela).
                    </p>
				</div>
				<a href="https://www.facebook.com/tef.sanchezcoto" target="__blank" class="social-icon si-rounded si-small si-light si-facebook">
					<i class="icon-facebook"></i>
					<i class="icon-facebook"></i>
				</a>
			</div>
		</div>
	</div>

	<div class="col-md-10 bottommargin">
		<div class="team team-list clearfix">
			<div class="team-image">
				<img src="public/images/about/perfilMan.jpg" alt="Josh Clark">
			</div>
			<div class="team-desc">
				<div class="team-title"><h4>WAGNER VARGAS MOYA</h4><span>Co-Fundador</span></div>
				<div class="team-content">
					<p style="text-align: justify; text-justify: inter-word;">
                    Administrador de Fusión Academia de Música. Profesional de la administración de negocios, emprendedor y músico. Licenciado en Contaduría Pública por la Universidad de Costa Rica, más de 10 años de experiencia en el área de la administración, más de 12 años de experiencia como músico, multi instrumentista, profesor del instrumento bajo eléctrico. Cursó estudios musicales en la Etapa Básica de Música de la Universidad de Costa Rica, Sede del Atlántico en el año 2002 y 2003, en la cátedra de guitarra popular, también formo parte del Coro Universitario, en ese entonces dirigido por el maestro Marvin Camacho.
                    </p>
				</div>
				<a href="#" class="social-icon si-rounded si-small si-light si-facebook">
					<i class="icon-facebook"></i>
					<i class="icon-facebook"></i>
				</a>
				<a href="#" class="social-icon si-rounded si-small si-light si-twitter">
					<i class="icon-twitter"></i>
					<i class="icon-twitter"></i>
				</a>
				<a href="#" class="social-icon si-rounded si-small si-light si-gplus">
					<i class="icon-gplus"></i>
					<i class="icon-gplus"></i>
				</a>
			</div>
		</div>
	</div>
</div>
    <div class="section footer-stick">
        <h4 class="uppercase center">¿Qu&eacute; dicen nuestros <span>clientes</span>?</h4>
        <div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="false">
            <div class="flexslider">
                <div class="slider-wrap">
                    <div id="fb-root"></div>
                    <script>(function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id))
                                return;
                            js = d.createElement(s);
                            js.id = id;
                            js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.11';
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>

                    <div class="fb-comments" data-href="http://fusionacademiacr.com/" data-numposts="5"></div>
                    <div class="clearfix "><br><br><br><br><br></div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="public/js/Views/general.js" type="text/javascript"></script>

<?php

include_once 'public/footer.php';
