<?php
include_once 'public/head.php';
?>
<!-- Header
============================================= -->
<header id="header" class="transparent-header full-header" data-sticky-class="not-dark">
    <div id="header-wrap">
        <div class="container clearfix">
            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
            <!-- Logo
            ============================================= -->
            <div id="logo">
                <a href="?" class="standard-logo" data-dark-logo="public/images/fusion-dark.png"><img src="public/images/fusion.png" alt="Canvas Logo"></a>
                <a href="?" class="retina-logo" data-dark-logo="public/images/fusion-dark@2x.png"><img src="public/images/fusion@2x.png" alt="Canvas Logo"></a>
            </div><!-- #logo end -->
            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu">
                <ul>
                    <li><a href="?"><div>Home</div></a></li>
                    <li><a href="?controller=Student&action=updatePersonalDataStudent"><div>Actualizar datos</div></a></li> 
                    <li><a href="?controller=Student&action=getStudentExp"><div>Expediente Académico</div></a></li> 
                    <li><a href="?controller=User&action=signOff"><div>Cerrar Sesi&oacute;n</div></a></li>
                </ul>
            </nav><!-- #primary-menu end -->
        </div>
    </div>
</header><!-- #header end -->
