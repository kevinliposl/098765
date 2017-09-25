<?php

require 'libs/Config.php';
$config = Config::singleton();
$config->set('controllerFolder', 'controller/');
$config->set('modelFolder', 'model/');
$config->set('viewFolder', 'view/');

$config->set('dbhost', 'ds053764.mlab.com');
$config->set('dbname', 'db_local');
$config->set('dbuser', 'aplicada');
$config->set('dbpass', 'aplicada2017');
$config->set('dbport', 53764);
