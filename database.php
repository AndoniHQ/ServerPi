<?php
  $server = 'localhost';
  $username = 'admin';
  $password = 'serverpi';
  $database = 'phplogin_database';

  try {
    $conn = new PDO("mysql:host=$server;dbname=$database;",$username, $password);
  } catch (PDOException $e) {
    die('Error de conexion: '.$e->getMessage());
  }
 ?>
