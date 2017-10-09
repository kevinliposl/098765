<?php

class ReportController {

    function __construct() {
        $this->view = new View();
    }

    function selectUserState() {
        require 'model/ReportModel.php';
        $model = new ReportModel();

        $result = $model->selectUserState();
        echo json_encode($result);
    }

}
