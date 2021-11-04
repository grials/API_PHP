<?php
require('./vendor/autoload.php');
$dot_env = Dotenv\Dotenv::createImmutable('./');
$dot_env->load();
include_once("./database/connections/Connection.php");



use Database\Connections\Connection;

$conexion = new Connection();

$conexion->connect();