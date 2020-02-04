<?php
  $username = '';
  $password = '';

  try {
    $conn = new PDO('mysql:host=localhost;dbname=altern37_dop;charset=utf8', $username, $password);
      array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
      echo 'Erro de conexão: ' . $e->getMessage();
  }
