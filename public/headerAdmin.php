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
                    <li><a href="?"><div>Home</div></a></li> 
                    <li><a href="#"><div>Usuarios</div></a>
                        <ul>
                            <li><a href="#"><div>Estudiante</div></a>
                                <ul>
                                    <li><a href="?controller=Student&action=getStudentData"><div>Ver</div></a></li> 
                                    <li><a href="?controller=Student&action=insertStudent"><div>Registrar</div></a></li>  
                                    <li><a href="?controller=Student&action=updateStudent"><div>Actualizar</div></a></li>
                                    <li><a href="?controller=Student&action=deleteStudent"><div>Desactivar</div></a></li>
                                </ul>
                            </li>
                            <li><a href="#"><div>Profesor</div></a>
                                <ul>
                                    <li><a href="?controller=Professor&action=select"><div>Ver</div></a></li>
                                    <li><a href="?controller=Professor&action=insert"><div>Registrar</div></a></li>
                                    <li><a href="?controller=Professor&action=update"><div>Actualizar</div></a></li>  
                                    <li><a href="?controller=Professor&action=delete"><div>Desactivar</div></a></li>
                                </ul>
                            </li>
                            <li><a href="?controller=Student&action=reactivateStudent"><div>Reactivar Usuario</div></a></li> 
                        </ul>
                    </li>
                    <li><a href="#"><div>General</div></a>
                        <ul>
                            <li><a href="#"><div>Curso</div></a>
                                <ul>
                                    <li><a href="?controller=Course&action=select"><div>Ver</div></a></li>
                                    <li><a href="?controller=Course&action=insert"><div>Registrar</div></a></li> 
                                    <li><a href="?controller=Course&action=update"><div>Actualizar</div></a></li>
                                    <li><a href="?controller=Course&action=delete"><div>Eliminar</div></a></li>  
                                    <li><a href="?controller=Course&action=reactivate"><div>Reactivar</div></a></li>  
                                </ul>
                            </li>
                            <li><a href="#"><div>Semestre</div></a>
                                <ul>
                                    <li><a href="?controller=Semester&action=select"><div>Ver</div></a></li>
                                    <li><a href="?controller=Semester&action=insert"><div>Registrar</div></a></li>
                                    <li><a href="?controller=Semester&action=delete"><div>Eliminar</div></a></li> 
                                </ul>
                            </li>  
                            <li><a href="#"><div>Matricula</div></a>
                                <ul>
                                    <li><a href="?controller=Enrollment&action=insert"><div>Matricular</div></a></li> 
                                    <li><a href="?controller=Enrollment&action=delete"><div>Desmatricular</div></a></li> 
                                    <li><a href="?controller=Enrollment&action=select"><div>Ver Matriculas</div></a></li>
                                </ul>
                            </li>                                      
                            <li><a href="#"><div>Asignaciones</div></a>
                                <ul>
                                    <li><a href="?controller=CourseSemester&action=select"><div>Ver Asignaciones</div></a></li>
                                    <li><a href="?controller=CourseSemester&action=insert"><div>Registrar Asignacion</div></a></li> 
                                    <li><a href="?controller=CourseSemester&action=deleteCourse"><div>Eliminar Asignacion De Curso</div></a></li> 
                                    <li><a href="?controller=CourseSemester&action=deleteProfessor"><div>Eliminar Asignacion De Profesor</div></a></li>
                                    <li><a href="?controller=CourseSemester&action=reactivare"><div>Reactivar Asignacion</div></a></li> 
                                </ul>
                            </li>
                            <li><a href="#"><div>Horarios</div></a>
                                <ul>
                                    <li><a href="?controller=Schedule&action=select"><div>Ver</div></a></li>
                                    <li><a href="?controller=Schedule&action=insert"><div>Asignar</div></a></li> 
                                    <li><a href="?controller=Schedule&action=delete"><div>Eliminar</div></a></li>  
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
                    <li><a href="#"><div>Perfil</div></a>
                        <ul>
                            <li><a href="?controller=Admin&action=updatePersonalData"><div>Datos Personales</div></a></li> 
                            <li><a href="?controller=User&action=changePassword"><div>Cambiar Contraseña</div></a></li> 
                        </ul>
                    </li>
                    <li><a href="?controller=User&action=signOff"><div>Cerrar Sesi&oacute;n</div></a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>