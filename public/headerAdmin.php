<?php
include_once 'public/head.php';
?>            
<!-- Header
============================================= -->
<header id="header" class="transparent-header dark full-header" data-sticky-class="not-dark">
    <div id="header-wrap">
        <div class="container clearfix">
            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
            <!-- Logo
            ============================================= -->
            <div id="logo">
                <a href="?" class="standard-logo" data-dark-logo="public/images/fusion-dark.png"><img src="public/images/fusionLogoOriginal.png" alt="Canvas Logo"></a>
                <a href="?" class="retina-logo" data-dark-logo="public/images/fusion-dark@2x.png"><img src="public/images/fusion@2x.png" alt="Canvas Logo"></a>
            </div>
            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu">
                <ul>
                    <li><a href="?"><div>Home</div></a></li> 
                    <li><a href="#"><div>Mantenimiento de Usuarios</div></a>
                        <ul>
                            <li><a href="#"><div>Estudiante</div></a>
                                <ul>
                                    <li><a href="?controller=Student&action=getStudentData"><div>Ver Estudiante</div></a></li> 
                                    <li><a href="?controller=Student&action=insertStudent"><div>Ingresar Estudiante</div></a></li> 
                                    <li><a href="?controller=Student&action=deleteStudent"><div>Desactivar Estudiante</div></a></li> 
                                    <li><a href="?controller=Student&action=updateStudent"><div>Actualizar Estudiante</div></a></li> 
                                </ul>
                            </li>
                            <li><a href="#"><div>Profesor</div></a>
                                <ul>
                                    <li><a href="?controller=Professor&action=update"><div>Actualizar Profesor</div></a></li> 
                                    <li><a href="?controller=Professor&action=insert"><div>Insertar Profesor</div></a></li> 
                                    <li><a href="?controller=Professor&action=delete"><div>Eliminar Profesor</div></a></li>
                                    <li><a href="?controller=Professor&action=select"><div>Obtener Datos de Profesores</div></a></li>
                                </ul>
                            </li>
                            <li><a href="?controller=Student&action=reactivateStudent"><div>Reactivar Usuario</div></a></li> 
                        </ul>
                    </li>

                    <li><a href="#"><div>Mantenimiento general</div></a>
                        <ul>
                            <li><a href="#"><div>Curso</div></a>
                                <ul>
                                    <li><a href="?controller=Course&action=insert"><div>Insertar Curso</div></a></li> 
                                    <li><a href="?controller=Course&action=delete"><div>Eliminar Curso</div></a></li> 
                                    <li><a href="?controller=Course&action=update"><div>Actualizar Curso</div></a></li> 
                                    <li><a href="?controller=Course&action=select"><div>Ver Curso</div></a></li> 
                                </ul>
                            </li>
                            <li><a href="#"><div>Semestre</div></a>
                                <ul>
                                    <li><a href="?controller=Semester&action=insert"><div>Insertar Semestre</div></a></li>
                                    <li><a href="?controller=Semester&action=delete"><div>Eliminar Semestre</div></a></li>
                                    <li><a href="?controller=Semester&action=select"><div>Obtener Semestre</div></a></li> 
                                </ul>
                            </li>  
                            <li><a href="#"><div>Matriculas</div></a>
                                <ul>
                                    <li><a href="?controller=Enrollment&action=insert"><div>Matricular</div></a></li> 
                                    <li><a href="?controller=Enrollment&action=delete"><div>Desmatricular</div></a></li> 
                                    <li><a href="?controller=Enrollment&action=select"><div>Obtener Matriculas</div></a></li>
                                </ul>
                            </li>                                      
                            <li><a href="#"><div>Asignaciones</div></a>
                                <ul>
                                    <li><a href="?controller=CourseSemester&action=insert"><div>Insertar Asignacion</div></a></li> 
                                    <li><a href="?controller=CourseSemester&action=deleteCourse"><div>Eliminar Asignacion curso</div></a></li> 
                                    <li><a href="?controller=CourseSemester&action=deleteProfessor"><div>Eliminar Asignacion Profesor</div></a></li> 
                                    <li><a href="?controller=CourseSemester&action=select"><div>Ver Asignaciones</div></a></li> 
                                </ul>
                            </li>
                            <li><a href="#"><div>Horarios</div></a>
                                <ul>
                                    <li><a href="?controller=Schedule&action=insert"><div>Asignar Horario</div></a></li> 
                                    <!--<li><a href="?controller=Schedule&action=delete"><div>Eliminar Horario</div></a></li>--> 
                                    <!--<li><a href="?controller=Schedule&action=update"><div>Actualizar Horario</div></a></li>--> 
                                    <li><a href="?controller=Schedule&action=select"><div>Ver Horarios</div></a></li> 
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><div>Reportes</div></a>
                        <ul>
                            <li><a href="?controller=Report&action=selectUserState"><div>Usuarios Activos</div></a></li> 
                            <li><a href="?controller=Report&action=selectEnrolledPerMonth"><div>Matriculados Por Mes</div></a></li> 
                        </ul>
                    </li>
                    <li><a href="?controller=User&action=signOff"><div>Cerrar Sesi&oacute;n</div></a></li>
                </ul>
            </nav><!-- #primary-menu end -->
        </div>
    </div>
</header><!-- #header end -->


