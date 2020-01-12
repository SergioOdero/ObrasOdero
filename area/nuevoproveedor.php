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
    $cif=$_POST['cif'];
    $contacto=$_POST['contacto'];
      $telefono=$_POST['telefono'];
     $email=$_POST['email'];

  mysqli_query($conexion, "INSERT INTO `proveedores`(`Proveedor_Nombre`, `Proveedor_Direccion`, `Proveedor_CIF`, `Proveedor_Persona_Contacto`, `Proveedor_Telefono`, `Proveedor_URL`, `Proveedor_Email`) VALUES ('$nombre','$direccion','$cif','$contacto','$telefono','','$email')");
header('location: https://obrasodero.000webhostapp.com/area/gestionarproveedores.php');
       
?>