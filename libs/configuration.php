<?php

require 'libs/Config.php';
$config = Config::singleton();
$config->set('controllerFolder', 'controller/');
$config->set('modelFolder', 'model/');
$config->set('viewFolder', 'view/');

$config->set('dbhost', 'fusionacademiacr.com');
$config->set('dbname', 'fusionac_db_fusionAcademiaMusical');
$config->set('dbuser', 'fusionac_adm');
$config->set('dbpass', 'W3b#$2017');
