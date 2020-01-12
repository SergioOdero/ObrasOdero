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
 mysqli_query($conexion,"delete from `obras` where Obra_id='$_REQUEST[nick]'");
 header('location: https://obrasodero.000webhostapp.com/area/gestionarobras.php');

   

?>