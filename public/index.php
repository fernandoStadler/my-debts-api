<?php

use \Slim\Http\Request as Request;
use \Slim\Http\Response as Response;

require 'vendor/autoload.php';
require 'controller/Connect.php';


setlocale(LC_TIME, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

$config = ["settings" => ["displayErrorDetails" => true]];

$app = new \Slim\App($config);


//Create routes for cars

require "routes/Ong.php";



$app->run();