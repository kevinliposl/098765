<?php

/**
 * @authors <kevin.sandoval@ucr.ac.cr><diego.cendenofonseca@ucr.ac.cr><elena.calderonfernandez@ucr.ac.cr><brogudbarrientos@gmail.com>
 * @version 1.0
 * @copyright (c) 2017, Funcion Academia Musical
 * @access public
 * @category controller
 * Class Reporte    
 */
class ReportController {

    function __construct() {
        $this->view = new View();
        require 'model/ReportModel.php';
    }

    /**
     * @return null
     * Funcion para seleccionar los usuarios activos
     */
    function selectUserState() {
        if (SSession::getInstance()->permissions == 'A') {
            $model = new ReportModel();

            $result = $model->selectUserState();
            $this->view->show("reportUserState.php", $result);
        }
    }

    /**
     * @return null
     * Funcion para seleccionar las matriculas por mes
     */
    function selectEnrolledPerMonth() {
        if (SSession::getInstance()->permissions == 'A') {
            $model = new ReportModel();

            $result = $model->selectEnrolledPerMonth();
            $this->view->show("reportEnrolledPerMonthView.php", $result);
        }
    }

}
