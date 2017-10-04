<?php

require 'libs/Config.php';
$config = Config::singleton();
$config->set('controllerFolder', 'controller/');
$config->set('modelFolder', 'model/');
$config->set('viewFolder', 'view/');

$config->set('dbhost', '163.178.107.130');
$config->set('dbname', 'db_fusionAcademiaMusical');
$config->set('dbuser', 'adm');
$config->set('dbpass', 'saucr.092');
$config->set('dbport', 53764);
