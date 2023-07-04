<?php

define('SERVIDOR', 'localhost');
define('NOMBRE_BD', 'pasy');
define('USUARIO', 'pasy');
define('CLAVE', 'Cuelita123.');
$opciones = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];

try {
  $pdo = new PDO('mysql:host=' . SERVIDOR . ';dbname=' . NOMBRE_BD, USUARIO, CLAVE, $opciones);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $pdo;
} catch (PDOException $e) {
  $respuesta = ['Error' => 'error: ' . $e->getMessage()];
  print json_encode($respuesta);
  die();
}
