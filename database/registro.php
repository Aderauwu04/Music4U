<?php
  include('database.php');

  if (!empty($_POST['nombre'])
    && !empty($_POST['user'])
    && !empty($_POST['pass']))
  {
    $nombre = $_POST['nombre'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $sql = "INSERT INTO `Music4U`.`users` (`user`,`nombre`,`pass`,`fec_cre`) VALUES ('$user','$nombre','$pass',NOW())";
    $r = mysqli_query($con, $sql);
    if ($r) {
      echo 'Se ha registrado exitosamente';
    } else {
      echo $con->error;
    }
  } else {
    echo 'Inserte todos los datos';
  }
?>