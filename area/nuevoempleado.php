<?php
  session_start();
  if (isset($_SESSION['tipo'])){
  


if ($_SESSION['tipo']!=='administrador') {
  
 header('location: https://obrasodero.000webhostapp.com/area');
} else {
    $conexion=mysqli_connect("localhost","id11683743_sergio","trebujena","id11683743_obras") or
      die("Problemas con la conexión");
 mysqli_query($conexion,"update `usuarios` set Usuario_perfil='empleado' where Usuario_nick='$_REQUEST[nick]'")  or
  die("Problemas en el select:".mysqli_error($conexion));
  header('location: gestionarusuarios.php');
}
} else {
     header('location: https://obrasodero.000webhostapp.com/area');
}
  

  
   

?>