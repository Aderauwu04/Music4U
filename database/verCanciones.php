<?php
  include('database.php');
  $can = array();
  $canTop = array();
  $canRe = array();
  $artistas = array();
  $sql = "SELECT canciones.*, img, user FROM `Music4U`.`canciones` JOIN `users` ON id_user=id_user_can";
  $r = mysqli_query($con, $sql);
  if ($r) {
    while ($filas=mysqli_fetch_array($r)) {
      $can[] = array(
        'id_can' => $filas['id_can'],
        'user' => $filas['user'],
        'img' => $filas['img'],
        'nombre_can' => $filas['nombre_can'],
        'genero' => $filas['genero'],
        'audio' => $filas['audio'],
      );
    }
  }
  $sql = "SELECT canciones.*, img, user FROM `Music4U`.`canciones` JOIN `users` ON id_user=id_user_can LIMIT 20";
  $r = mysqli_query($con, $sql);
  if ($r) {
    while ($filas=mysqli_fetch_array($r)) {
      $canTop[] = array(
        'id_can' => $filas['id_can'],
        'user' => $filas['user'],
        'img' => $filas['img'],
        'nombre_can' => $filas['nombre_can'],
        'genero' => $filas['genero'],
        'audio' => $filas['audio'],
      );
    }
  }
  $sql = "SELECT canciones.*, img, user FROM `Music4U`.`canciones` JOIN `users` ON id_user=id_user_can ORDER BY `canciones`.`fec_cre` DESC LIMIT 4";
  $r = mysqli_query($con, $sql);
  if ($r) {
    while ($filas=mysqli_fetch_array($r)) {
      $canRe[] = array(
        'id_can' => $filas['id_can'],
        'user' => $filas['user'],
        'img' => $filas['img'],
        'nombre_can' => $filas['nombre_can'],
        'genero' => $filas['genero'],
        'audio' => $filas['audio'],
      );
    }
  }
  $sql = "SELECT * FROM `Music4U`.`users` LIMIT 4";
  $r = mysqli_query($con, $sql);
  if ($r) {
    while ($filas=mysqli_fetch_array($r)) {
      $artistas[] = array(
        'id_user' => $filas['id_user'],
        'user' => $filas['user'],
        'img' => $filas['img'],
      );
    }
  }
  $canciones = array("canciones"=>$can, "top"=>$canTop, "recientes"=>$canRe,"artistas"=>$artistas);
  echo json_encode($canciones);

?>