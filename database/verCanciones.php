<?php
include('database.php');
$can = array();
$sql = "SELECT * FROM `Music4U`.`canciones`";
$r = mysqli_query($con, $sql);
while ($filas=mysqli_fetch_array($r)) {
  $can[] = array(
    'id_can' => $filas['id_can'],
    'id_user_can' => $filas['id_user_can'],
    'nombre_can' => $filas['nombre_can'],
    'genero' => $filas['genero'],
    'audio' => $filas['audio'],
  );
}
$canciones = array("canciones"=>$can);
echo json_encode($canciones);

?>