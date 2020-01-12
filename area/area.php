<?php
session_start();
$nick=$_SESSION["nick"];
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
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 16px 18px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}

img {
width:56px;
position:absolute;
margin-left:10%;
height:80px;
}



</style>
</head>
<!DOCTYPE html>
<html>
<body>

<ul class="sidenav">
  <li><a  href="#home">Aplicación de futbol</a></li>
    <li><a  href="#home">Area privada</a></li>
  <li><img src="pelota.jpg"></li>
  <li style=margin-left:700px><a  href="#home"><?php echo $nick ?></a></li>
</ul>
<div class="content">
<div class="form">
  <?php



 $conexion=mysqli_connect("localhost","id10990589_root","trebujena","id10990589_bbddprueba") or
      die("Problemas con la conexión");
   
   
   $query=mysqli_query($conexion,"SELECT * FROM usuarios WHERE Usuario_nick= '$nick'");
    $result= mysqli_num_rows($query);

    if($result>0) {
  
    
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
}
    echo "<form action=area2.php enctype=multipart/form-data method=POST>";
echo "<table>";

echo "<tr><td> Nombre: </td> <td> <input type=text name=nombre value=".$nombre."></td></tr>";
echo "<tr><td> Primer apellido: </td> <td>  <input type=text name=apellido1 value=".$apellido1."></td></tr>";
echo "<tr><td> Segundo apellido: </td> <td>  <input type=text name=apellido2 value=".$apellido2."></td></tr>";
echo "<tr><td> Domicilio: </td> <td>  <input type=text name=domicilio value=".$domicilio."></td></tr>";
echo "<tr><td> Nif: </td> <td>  <input type=text name=nif value=".$nif."></td></tr>";
echo "<tr><td> Imagen: <img style='margin-left:1% ;' src='$target_file'> </td> <td>  <input type=file name=foto ></td></tr>";
echo "<tr> <td> <br>  <p style='color:transparent'>Se han actualizado los datos </p>  </td></tr>";
echo "<tr> <td>  <br> <input style='margin-left:100%' type=submit value='Cambiar datos'  ></td></tr>";
echo "</table>";
echo "</form>";
?>
</div>
</body>
</html>