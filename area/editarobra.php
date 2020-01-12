<?php
session_start();
$nick=$_REQUEST["nick"];
  $alert="";

 $conexion=mysqli_connect("localhost","id11683743_sergio","trebujena","id11683743_obras") or
      die("Problemas con la conexión");
        $query=mysqli_query($conexion,"SELECT * FROM obras WHERE Obra_id= '$nick'");
       if(!empty($_POST)) {
      $nombre= $_POST['nombre'];
    $direccion= $_POST['direccion'];
    $jefe=$_POST['jefe'];
    $latitud=$_POST['latitud'];
      $longitud=$_POST['longitud'];
     $cliente=$_POST['cliente'];




    $result= mysqli_num_rows($query);

    if($result>0) {


      

     mysqli_query($conexion, "update obras set  Obra_nombre='$nombre',Obra_direccion='$direccion',Obra_jefe='$jefe',Obra_latitud='$latitud',Obra_longitud='$longitud',Obra_cliente='$cliente' WHERE Obra_id= '$nick'");

     $alert="Se han actualizado los datos";
    } else {
             $alert="No se han podido actualizar";
    }
    header('location: gestionarobras.php');
       }
 
  ?>