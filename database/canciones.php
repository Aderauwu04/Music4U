<?php
include('database.php');
session_start();
$nombre = $_POST['idTitulo'];
$genero = $_POST['idGenero'];
$user = $_SESSION['usuario'];
$target_dir = "../uploads/audios/";
$target_file = $target_dir . basename($_FILES["idCancion"]["name"]);
$audio = "uploads/audios/" . basename($_FILES["idCancion"]["name"]);

  if (move_uploaded_file($_FILES["idCancion"]["tmp_name"], $target_file)) {

    $sql = "INSERT INTO `Music4U`.`canciones` (`id_user_can`,`nombre_can`,`genero`,`audio`,`fec_cre`) VALUES ('$user','$nombre','$genero','$audio',NOW())";
    $r = mysqli_query($con, $sql);
    if ($r) {
      echo 'ha regitrado su cancion';
      $sql = "UPDATE `users` SET `num_canciones` = num_canciones+1 WHERE `users`.`id_user` = $user;";
      $r = mysqli_query($con, $sql);
      header("Location:../index.php");
    } else {
      echo $con->error;
    }
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
?>