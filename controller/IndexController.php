<?php

/**
 * @authors <kevin.sandoval@ucr.ac.cr>,<diego.cendenofonseca@ucr.ac.cr>,<elena.calderonfernandez@ucr.ac.cr>,<brogudbarrientos@gmail.com>
 * @version 1.0
 * @copyright (c) 2017, Funcion Academia Musical
 * @access public
 * @category controller
 * Class Index  
 */
class IndexController {

    function __construct() {
        $this->view = new View();
    }

    /**
     * @return null
     * Funcion para mostrar index
     */
    function defaultAction() {
        $this->view->show("indexView.php");
    }

    /**
     * @return null
     * Funcion para mostrar 404
     */
    function notFound() {
        $this->view->show("404View.php");
    }

    /**
     * @return null
     * Funcion para mostrar galeria
     */
    function galery() {
        $this->view->show("galeryView.php");
    }

    /**
     * @return null
     * Funcion para mostrar contacto
     */
    function contact() {
        $this->view->show("contactView.php");
    }

    /**
     * @return null
     * Funcion para mostrar AcercaDe
     */
    function aboutus() {
        $this->view->show("aboutView.php");
    }

    /**
     * @return null
     * Funcion para mostrar instrumentos
     */
    function instruments() {
        $this->view->show("coursesView.php");
    }

    /**
     * @return null
     * Funcion para mostrar profesores
     */
    function profesors() {
        $this->view->show("coursesView.php");
    }

    /**
     * @return null
     * Funcion para mostrar perfil de profesor
     */
    function ejemploProfesor() {
        $this->view->show("profileProfesorView.php");
    }

}
