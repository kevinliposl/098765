<?php
include_once 'public/head.php';
?>            <!-- Header
============================================= -->
<header id="header" class="transparent-header full-header" data-sticky-class="not-dark">
    <div id="header-wrap">
        <div class="container clearfix">
            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
            <!-- Logo
            ============================================= -->
            <div id="logo">
                <a href="?" class="standard-logo" data-dark-logo="public/images/fusion-dark.png"><img src="public/images/fusionLogoOriginal.png" alt="Canvas Logo"></a>
                <a href="?" class="retina-logo" data-dark-logo="public/images/fusion-dark@2x.png"><img src="public/images/fusion@2x.png" alt="Canvas Logo"></a>
            </div><!-- #logo end -->
            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu">
                <ul>
                    <li><a href="?"><div>Home</div></a></li>
                    <li><a href="#"><div>Perfil</div></a>
                        <ul>
                            <li><a href="?controller=Professor&action=personalSelection"><div>Ver Datos Personales</div></a></li>
                            <li><a href="?controller=Professor&action=updatePersonal"><div>Actualizar Datos Personales</div></a></li>
                            <li><a href="?controller=User&action=changePassword"><div>Cambiar Contraseña</div></a></li>
                        </ul>
                    </li>
                    <li><a href="#"><div>Mantenimiento de Actividades</div></a>
                        <ul>
                            <li><a href="?controller=ClassActivity&action=insert"><div>Ingresar Actividad de Clase</div></a></li> 
                            <li><a href="?controller=ClassActivity&action=update"><div>Actualizar Actividad de Clase</div></a></li> 
                            <li><a href="?controller=ClassActivity&action=select"><div>Ver Actividad de Clase</div></a></li> 
                            <li><a href="?controller=ClassActivity&action=record"><div>Ver Expediente Estudiantil</div></a></li> 
                        </ul>
                    </li>
                    <li><a href="?controller=User&action=signOff"><div>Cerrar Sesi&oacute;n</div></a></li>
                </ul>
            </nav><!-- #primary-menu end -->
        </div>
    </div>
</header><!-- #header end -->
