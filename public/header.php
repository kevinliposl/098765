<!DOCTYPE html>
<html dir="ltr" lang="es">
    <head>
        <meta http-equiv="content-type" content="text/html" charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Foots
        ============================================= -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" type="text/css" />

        <!-- ICO
        ============================================= -->
        <link rel="icon" href="public/images/favicon.ico" type="image/x-icon"/>
        <link rel="shortcut icon"  href="public/images/favicon.ico" type="image/x-icon"/>

        <!-- Stylesheets
        ============================================= -->
        <link rel="stylesheet" href="public/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="public/css/style.css" type="text/css" />
        <link rel="stylesheet" href="public/css/swiper.css" type="text/css" />
        <link rel="stylesheet" href="public/css/dark.css" type="text/css" />
        <link rel="stylesheet" href="public/css/font-icons.css" type="text/css" />
        <link rel="stylesheet" href="public/css/animate.css" type="text/css" />
        <link rel="stylesheet" href="public/css/magnific-popup.css" type="text/css" />
        <link rel="stylesheet" href="public/css/components/bs-select.css" type="text/css" />
        <link rel="stylesheet" href="public/css/select2.css" type="text/css" />
        <link rel="stylesheet" href="public/css/components/bs-editable.css" type="text/css" />
        <link rel="stylesheet" href="public/css/typeahead.js-bootstrap.css" type="text/css"/>
        <link rel="stylesheet" href="public/css/components/bs-select.css" type="text/css" />
        <link rel="stylesheet" href="public/css/responsive.css" type="text/css" />

        <!-- JS
        ============================================= -->
        <script src="public/js/jquery.min.js" type="text/javascript"></script>

        <!-- Document Title
        ============================================= -->
        <title>Fusi&oacute;n Academia de M&uacute;sica</title>

    </head>
    <body class="stretched">

        <!-- Document Wrapper
        ============================================= -->
        <div id="wrapper" class="clearfix">

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
                                <li><a href="?"><div>Home</div></a>
                                <li><a href="?action=val"><div>Prueba Validacion</div></a>
                                <li><a href="?action=report"><div>Reporte</div></a>
                                <li><a href="?action=permiso"><div>Permisos</div></a>
                                <li><a href="?action=schedule"><div>Horario</div></a>
                                <li><a href="#"><div>CRUDS</div></a>
                                    <ul>
                                        <li><a href="#"><div>CRUD CURSO</div></a>
                                            <ul>
                                                <li><a href="?controller=Course&action=insert"><div>Insertar Curso</div></a></li> 
                                                <li><a href="?controller=Course&action=delete"><div>Eliminar Curso</div></a></li> 
                                                <li><a href="?controller=Course&action=update"><div>Actualizar Curso</div></a></li> 
                                                <li><a href="?controller=Course&action=select"><div>Ver Curso</div></a></li> 
                                            </ul>
                                        </li>
                                        <li><a href="#"><div>CRUD Asignacion</div></a>
                                            <ul>
                                                <li><a href="?controller=CourseSemester&action=insert"><div>Insertar Asignacion</div></a></li> 
                                                <li><a href="?controller=CourseSemester&action=deleteCourse"><div>Eliminar Asignacion curso</div></a></li> 
                                                <li><a href="?controller=CourseSemester&action=deleteProfessor"><div>Eliminar Asignacion Profesor</div></a></li> 
                                                <li><a href="?controller=CourseSemester&action=select"><div>Ver Asignaciones</div></a></li> 
                                            </ul>
                                        </li>
                                        <li><a href="#"><div>CRUD Asignacion</div></a>
                                            <ul>
                                                <li><a href="?controller=ClassActivity&action=insert"><div>Insertar Actividad de Clase</div></a></li> 
                                                <li><a href="?controller=ClassActivity&action=update"><div>Actualizar Actividad de Clase</div></a></li> 
                                                <li><a href="?controller=ClassActivity&action=select"><div>Ver Actividad de Clase</div></a></li> 
                                            </ul>
                                        </li>
                                        <li><a href="#"><div>CRUD Profesor</div></a>
                                            <ul>
                                                <li><a href="?controller=Professor&action=update"><div>Actualizar Profesor</div></a></li> 
                                                <li><a href="?controller=Professor&action=insert"><div>Insertar Profesor</div></a></li> 
                                                <li><a href="?controller=Professor&action=delete"><div>Eliminar Profesor</div></a></li>
                                                <li><a href="?controller=Professor&action=select"><div>Obtener Datos Personales Profesores</div></a></li>
                                                <li><a href="?controller=Professor&action=personalSelection"><div>Obtener Datos Personales</div></a></li>
                                                <li><a href="?controller=Professor&action=updatePersonal"><div>Actualizar Datos Personales</div></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><div>CRUD Matricula</div></a>
                                            <ul>
                                                <li><a href="?controller=Enrollment&action=insert"><div>Matricular</div></a></li> 
                                                <li><a href="?controller=Enrollment&action=delete"><div>Desmatricular</div></a></li> 
                                                <li><a href="?controller=Enrollment&action=select"><div>Obtener Matriculas</div></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><div>CRUD Estudiante</div></a>
                                            <ul>
                                                <li><a href="?controller=Student&action=insertStudent"><div>Insertar Estudiante</div></a></li> 
                                                <li><a href="?controller=Student&action=deleteStudent"><div>Borrar Estudiante</div></a></li> 
                                                <li><a href="?controller=Student&action=reactivateStudent"><div>Reactivar Estudiante</div></a></li> 
                                                <li><a href="?controller=Student&action=updateStudent"><div>Actualizar Estudiante</div></a></li> 
                                                <li><a href="?controller=Student&action=getStudentData"><div>Obtener Estudiante</div></a></li> 
                                                <li><a href="?controller=Student&action=updatePersonalDataStudent"><div>Actualizar Datos PersonalesEstudiante</div></a></li> 
                                            </ul>
                                        </li>
                                        <li><a href="#"><div>CRUD Administrador</div></a>
                                            <ul>
                                                <li><a href="?controller=Admin&action=insert"><div>Insertar Administrador</div></a></li>
                                                <li><a href="?controller=Admin&action=delete"><div>Eliminar Administrador</div></a></li> 
                                                <li><a href="?controller=Admin&action=select"><div>Obtener Administrador</div></a></li> 
                                            </ul>
                                        </li>
                                        <li><a href="#"><div>CRUD Semestre</div></a>
                                            <ul>
                                                <li><a href="?controller=Semester&action=insert"><div>Insertar Semestre</div></a></li>
                                                <li><a href="?controller=Semester&action=delete"><div>Eliminar Semestre</div></a></li>
                                                <li><a href="?controller=Semester&action=select"><div>Obtener Semestre</div></a></li> 
                                            </ul>
                                        </li>
                                        <li><a href="#"><div>CRUD Horario</div></a>
                                            <ul>
                                                <li><a href="?controller=Schedule&action=insert"><div>Insertar Horario</div></a></li>
                                                <li><a href="?controller=Schedule&action=delete"><div>Eliminar Horario</div></a></li>
                                                <li><a href="?controller=Schedule&action=select"><div>Obtener Horario</div></a></li> 
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#"><div>De Pablo</div></a>
                                    <ul>
                                        <li><a href="?action=ejemploProfesor"><div>EJEMPLO PERFIL PROFESOR</div></a>
                                        <li><a href="?action=instruments"><div>Cursos</div></a>
                                        <li><a href="?action=galery"><div>Galer&iacute;a</div></a>
                                        <li><a href="?action=aboutus"><div>Sobre Nosotros</div></a>
                                        <li><a href="?action=contact"><div>Contacto</div></a>
                                    </ul>
                                </li>
                                <li><a href="?controller=User&action=logIn"><div>Iniciar Sesi&oacute;n</div></a></li>
                            </ul>

                        </nav><!-- #primary-menu end -->

                    </div>

                </div>

            </header><!-- #header end -->
