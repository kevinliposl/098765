<?php

class ReportController {

    function __construct() {
        $this->view = new View();
        require 'model/ReportModel.php';
    }

    function selectUserState() {
        if (SSession::getInstance()->permissions == 'A') {
            $model = new ReportModel();

            $result = $model->selectUserState();
            echo json_encode($result);
        }
    }
}
