<?php
include('database.php');
session_start();
$nombre = $_POST['cancion'];
$genero = $_POST['genero'];
$user = $_SESSION['usuario'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$audio = $target_file;

  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

    $sql = "INSERT INTO `Music4U`.`canciones` (`id_user_can`,`nombre_can`,`genero`,`audio`,`fec_cre`) VALUES ('$user','$nombre','$genero','$audio',NOW())";
    $r = mysqli_query($con, $sql);
    if ($r) {
      echo 'ha regitrado su cancion';
    } else {
      echo $con->error;
    }
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
?>