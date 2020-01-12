<?php
session_start();

?>
    <head>
        <style>
body {
background: #c1bdba;    
}
h3 {
color:white;
text-align:center;
}
td {
  color:white;  
}
/*
input {
margin-left:20%;
  border: 0;
  outline: none;
  border-radius: 0;
  padding: 10px 0;
  font-size: 1rem;
  font-weight: 50;
  text-transform: uppercase;
  letter-spacing: .1em;
  background: #1ab188;
  color: #ffffff;
  transition: all 0.5s ease;
  -webkit-appearance: none;


 display: block;
  width: 60%;
}*/
.form {
  background: rgba(19, 35, 47, 0.9);
  padding: 40px;
  max-width: 600px;
  margin: 40px auto;
  border-radius: 4px;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
}

</style>
        </head>
<!DOCTYPE html>
<html>
<body>


<div class="form">
  <?php
  $alert="";
$nick=$_SESSION["nick"];


 $conexion=mysqli_connect("localhost","id10990589_root","trebujena","id10990589_bbddprueba") or
      die("Problemas con la conexión");
        $query=mysqli_query($conexion,"SELECT * FROM usuarios WHERE Usuario_nick= '$nick'");
       if(!empty($_POST)) {
       $nombre= $_POST['nombre'];
    $apellido1= $_POST['apellido1'];
    $apellido2=$_POST['apellido2'];
    $domicilio=$_POST['domicilio'];
      $nif=$_POST['nif'];
          
  $target_dir = "imagenes/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//$foto=basename($_FILES["foto"]["name"]);
$foto = $_FILES['foto']['name'];
move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

    $result= mysqli_num_rows($query);

    if($result>0) {
  
     mysqli_query($conexion, "update usuarios set  Usuario_apellido1='$apellido1',Usuario_apellido2='$apellido2',Usuario_domicilio='$domicilio',Usuario_nombre='$nombre',Usuario_nif='$nif',Usuario_fotografia='$target_file'");
     $alert="Se han actualizado los datos";
    } else {
             $alert="No se han podido actualizar";
    }
       }
       $query=mysqli_query($conexion,"SELECT * FROM usuarios WHERE Usuario_nick= '$nick'");
    while ($fila=mysqli_fetch_array($query)) {
 $nick=$fila["Usuario_nick"];
 $nombre=$fila["Usuario_nombre"];
$apellido1=$fila["Usuario_apellido1"];
$apellido2=$fila["Usuario_apellido2"];
 $poblacion=$fila["Usuario_poblacion"];
$domicilio=$fila["Usuario_domicilio"];
$nif=$fila["Usuario_nif"];
$telefono=$fila["Usuario_numero_telefono"];
$target_file=$fila["Usuario_fotografia"];
}
    echo "<form action=area2.php method=POST>";
echo "<table>";

echo "<tr><td> Nombre: </td> <td> <input type=text name=nombre value=".$nombre."></td></tr>";
echo "<tr><td> Primer apellido: </td> <td>  <input type=text name=apellido1 value=".$apellido1."></td></tr>";
echo "<tr><td> Segundo apellido: </td> <td>  <input type=text name=apellido2 value=".$apellido2."></td></tr>";
echo "<tr><td> Domicilio: </td> <td>  <input type=text name=domicilio value=".$domicilio."></td></tr>";
echo "<tr><td> Nif:  </td> <td>  <input type=text name=nif value=".$nif."></td></tr>";
echo "<tr><td> Imagen: <img src=".$target_file."> </td> <td>  <input type=file name=foto ></td></tr>";
echo "<tr> <td> <br> <p style='color:green'>$alert </p>  </td></tr>";
echo "<tr> <td>  <br> <input style='margin-left:100%' type=submit value='Cambiar datos'  ></td></tr>";
echo "</table>";
echo "</form>";

    
    ?>

</body>
</html>
     