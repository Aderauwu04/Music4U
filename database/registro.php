<?php
  include('database.php');

  $nombre = $_POST['nombre'];
  $user = $_POST['usuario'];
  $pass = $_POST['password'];
  $target_dir = "../uploads/img/";
  $target_file = $target_dir . basename($_FILES["imgUser"]["name"]);
  $img = "uploads/img/" . basename($_FILES["imgUser"]["name"]);

  if (move_uploaded_file($_FILES["imgUser"]["tmp_name"], $target_file)) {
    $sql = "INSERT INTO `Music4U`.`users` (`user`,`nombre`,`pass`,`img`,`fec_cre`) VALUES ('$user','$nombre','$pass','$img',NOW())";
    $r = mysqli_query($con, $sql);
    if ($r) {
      echo 'Se ha registrado exitosamente';
      header("Location:../index.html");
    } else {
      echo $con->error;
    }
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
?>