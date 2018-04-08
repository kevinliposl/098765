<?php
include_once 'public/head.php';
?>
<header id="header" class="transparent-header full-header" data-sticky-class="not-dark">
    <div id="header-wrap">
        <div class="container clearfix">
            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
           <div id="logo">
                <a href="?" class="standard-logo" data-dark-logo="public/images/fusion-dark.png"><img src="public/images/fusionLogoOriginal.png" alt="Canvas Logo"></a>
                <a href="?" class="retina-logo" data-dark-logo="public/images/fusion-dark@2x.png"><img src="public/images/fusion@2x.png" alt="Canvas Logo"></a>
            </div>
            <nav id="primary-menu">
                <ul>
                    <li><a href="?"><div>Home</div></a>
                    <li><a href="?controller=User&action=logIn"><div>Iniciar Sesi&oacute;n</div></a></li>
                    <li><a href="?controller=Index&action=contact"><div>Contacto</div></a></li>
                    <li><a href="?action=aboutus"><div>Sobre Nosotros</div></a></li>
                    <li><a href="?action=professors"><div>Nuestros Profesores</div></a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>