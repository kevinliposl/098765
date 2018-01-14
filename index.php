<?php
require 'libs/SSession.php';
require 'libs/FrontController.php';
require 'libs/SMail.php';
require 'libs/RSA.php';
RSA::getInstance();
SSession::getInstance();
SMail::getInstance();
FrontController::main();
