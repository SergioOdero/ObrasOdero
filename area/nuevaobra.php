<?php
  session_start();
  if (isset($_SESSION['tipo'])){
  


if ($_SESSION['tipo']!=='administrador') {
  
 header('location:https://obrasodero.000webhostapp.com/area/');
}
} else {
     header('location: https://obrasodero.000webhostapp.com/area/');
}
  
$conexion=mysqli_connect("localhost","id11683743_sergio","trebujena","id11683743_obras") or
      die("Problemas con la conexión");
  $nombre= $_POST['nombre'];
    $direccion= $_POST['direccion'];
    $jefe=$_POST['jefe'];
    $latitud=$_POST['latitud'];
      $longitud=$_POST['longitud'];
     $cliente=$_POST['cliente'];

  mysqli_query($conexion, "INSERT INTO `obras`( `Obra_nombre`, `Obra_direccion`, `Obra_jefe`, `Obra_latitud`, `Obra_longitud`, `Obra_cliente`) VALUES ('$nombre','$direccion','$jefe','$latitud','$longitud','$cliente')");

       header('location: https://obrasodero.000webhostapp.com/area/gestionarobras.php');
?>