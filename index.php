<?php
require 'libs/SSession.php';
require 'libs/FrontController.php';
require 'libs/SMail.php';
require 'libs/RSA.php';
SSession::getInstance();
SMail::getInstance();
RSA::getInstance();
FrontController::main();
