<?php
include_once 'public/head.php';
?>            
<!-- Header
============================================= -->
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
                    <li><a href="?"><div>Home</div></a></li>
                    <li><a href="#"><div>Perfil</div></a>
                        <ul>
                            <li><a href="?controller=Professor&action=updatePersonal"><div>Datos Personales</div></a></li>
                            <li><a href="?controller=User&action=changePassword"><div>Cambiar Contraseña</div></a></li>
                        </ul>
                    </li>
                    <li><a href="#"><div>Actividad de Clase</div></a>
                        <ul>
                            <li><a href="?controller=ClassActivity&action=insert"><div>Registrar Actividad</div></a></li> 
                            <li><a href="?controller=ClassActivity&action=update"><div>Actualizar Actividad</div></a></li> 
                            <li><a href="?controller=ClassActivity&action=select"><div>Ver Actividades de Clase</div></a></li> 
                            <li><a href="?controller=ClassActivity&action=record"><div>Ver Expedientes Estudiantiles</div></a></li> 
                        </ul>
                    </li>
                    <li><a href="?controller=User&action=signOff"><div>Cerrar Sesi&oacute;n</div></a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>