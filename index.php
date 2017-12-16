<?php
    require 'libs/SSession.php';
    require 'libs/FrontController.php';
    require 'libs/SMail.php';
    SSession::getInstance();
    SMail::getInstance();
    FrontController::main();