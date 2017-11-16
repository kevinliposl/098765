<?php

class ReportController {

    /**
     *      
     */
    function __construct() {
        $this->view = new View();
        require 'model/ReportModel.php';
    }

    /**
     * @return array Data
     *      
     */
    function selectUserState() {
        if (SSession::getInstance()->permissions == 'A') {
            $model = new ReportModel();

            $result = $model->selectUserState();
            echo json_encode($result);
        }
    }

    /**
     * @return array Data
     *      
     */
    function selectEnrolledPerMonth() {
        if (SSession::getInstance()->permissions == 'A') {
            $model = new ReportModel();

            $result = $model->selectEnrolledPerMonth();
            echo json_encode($result);
        }
    }

}
