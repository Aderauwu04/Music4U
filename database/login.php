<?php

  include('database.php');

  if (!empty($_POST['user']) && !empty($_POST['pass'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $sql = "SELECT id_user,user FROM `users` WHERE user='$user' AND pass='$pass'";
    $r = mysqli_query($con, $sql);
    $re = mysqli_fetch_array($r);
    if (mysqli_num_rows($r) === 1) {
      session_start();
      $_SESSION['usuario'] = $re[0];
      $_SESSION['nombre'] = $re[1];
      echo 'ha iniciado sesión exitosamente';
      header("Location:../index.php");
    } else {
      echo $con->error;
    }
  } else {
    echo 'error';
  }

?>