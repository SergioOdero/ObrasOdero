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
  $obra= $_POST['obra'];
    $empleado= $_POST['empleado'];
 $query=mysqli_query($conexion,"SELECT * FROM trabajadores_obra WHERE usuario_id='$empleado'");



    $result= mysqli_num_rows($query);

    if($result>0) {
         mysqli_query($conexion, "update trabajadores_obra SET obra_id=$obra where usuario_id=$empleado");
       
} else {
    

  mysqli_query($conexion, "INSERT INTO `trabajadores_obra` (`obra_id`, `usuario_id`, `fecha_inicio`, `fecha_fin`) VALUES ('$obra', '$empleado', now(), NULL)");
  
    
    }
    header('location: https://obrasodero.000webhostapp.com/area/gestionarobras.php');
?>