<?php

  $con = new mysqli('localhost','root','');

  if ($con->connect_error) {
    die('Fallo de conexión'.$con->connect_error);
  }

  $sql = "CREATE DATABASE IF NOT EXISTS `Music4U`";
  if ($con->query($sql) === true) {
    $sql = "CREATE TABLE IF NOT EXISTS `Music4U`.`users` ( `id_user` INT NOT NULL AUTO_INCREMENT , `nombre` VARCHAR(20) NOT NULL , `user` VARCHAR(20) NOT NULL , `pass` INT NOT NULL , `img` TEXT NOT NULL, `num_canciones` INT NULL DEFAULT NULL , `fec_cre` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id_user`), UNIQUE (`user`)) ENGINE = InnoDB;";
    if ($con->query($sql) != true) {
      echo 'Ha ocurrido problemas creando la tabla USERS'.$con->error;
    }
    $sql = "CREATE TABLE IF NOT EXISTS `Music4U`.`canciones` ( `id_can` INT NOT NULL AUTO_INCREMENT , `nombre_can` VARCHAR(50) NOT NULL , `audio` TEXT NOT NULL, `genero` VARCHAR(20) NOT NULL , `id_user_can` INT NOT NULL , `fec_cre` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id_can`)) ENGINE = InnoDB";
    if ($con->query($sql) != true) {
      echo 'Ha ocurrido problemas creando la tabla CANCIONES'.$con->error;
    }
  } else {
    echo 'Ha ocurrido problemas creando la base de datos'.$con->error;
  }

  $con = mysqli_connect('localhost','root','','Music4U');

erroresON();
function erroresON() {
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  }
?>