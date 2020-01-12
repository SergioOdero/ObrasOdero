<?php
  session_start();
  if (isset($_SESSION['tipo'])){
  


if ($_SESSION['tipo']!=='administrador') {
  
 header('location: https://obrasodero.000webhostapp.com/area/');
} else {
    if (isset($_GET["pagina"])) {

	//Si el GET de HTTP SÍ es una string / cadena, procede
	if (is_string($_GET["pagina"])) {

		//Si la string es numérica, define la variable 'pagina'
		 if (is_numeric($_GET["pagina"])) {

			 //Si la petición desde la paginación es la página uno
			 //en lugar de ir a 'index.php?pagina=1' se iría directamente a 'index.php'
			 if ($_GET["pagina"] == 1) {
				 header("Location: gestionarusuarios.php");
				 die();
			 } else { //Si la petición desde la paginación no es para ir a la pagina 1, va a la que sea
				 $pagina = $_GET["pagina"];
			};

		 } else { //Si la string no es numérica, redirige al index (por ejemplo: index.php?pagina=AAA)
			 header("Location: gestionarusuarios.php");
			die();
		 };
	};

} else { //Si el GET de HTTP no está seteado, lleva a la primera página (puede ser cambiado al index.php o lo que sea)
	$pagina = 1;
};

}
} else {
     header('location: https://obrasodero.000webhostapp.com/area/');
}


?>
  
   

<?php
      $conexion=mysqli_connect("localhost","id11683743_sergio","trebujena","id11683743_obras") or
      die("Problemas con la conexión");
   

      $query=mysqli_query($conexion,"SELECT * FROM usuarios ");
    $result= mysqli_num_rows($query);

    if($result>0) {
    while ($fila=mysqli_fetch_array($query)) {
   // $data=mysqli_fetch_array($query);
 /*  echo "<table>";
   echo "<tr>";
   echo "<th> Nick </th>";
     echo "<th>Nombre </th>";
       echo "<th>Apellido1 </th>";
         echo "<th>Apellido2 </th>";
         echo "</tr>";
    while ($fila=mysqli_fetch_array($query)) {
        echo "<tr>";
        echo "<td>";
echo $fila["Usuario_nick"] ;
echo "</td>";
echo $fila["Usuario_nombre"];
 echo "<td>";
echo $fila["Usuario_apellido1"];
echo "</td>";
echo $fila["Usuario_apellido2"];
 echo "<td>";
echo $fila["Usuario_poblacion"];
echo "</td>";
 echo $fila["Usuario_domicilio"];
        echo "<td>";
echo $fila["Usuario_nif"];
echo "</td>";
    echo "<td>";
    echo $fila["Usuario_numero_telefono"];
    echo "</td>";
   echo "</tr>";
   */
   
}
}
//echo "</table>";
   ?>
  <html>
         <head>
  <!DOCTYPE html>

<html lang="en">
   
         <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">

<title>Area privada</title>

 
<style type="text/css">
body {
    background-color:#c1bdba;
}
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 1px;
  text-align: left;
}
.div2 {
  background-color: #0099ff;
  
  text-align: center; 
  margin-right: 500px;

  z-index: 1;
  font-size: 25px;
   border-radius: 20px;
}
.imagenesadministracion {
    width:38px;
}
.block {
  display: block;
  width: 315px;
  margin-left:1%;
  border: none;
  background-color:#25333C;
 
  color: white;
  padding: 20px 50px;
  font-size: 27px;
  cursor: pointer;
  text-align: center;
}
.paginacion {

}
</style>
</head>
<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-color  w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Cerrar</a>
  <div class="w3-container">
    <h3 class="w3-padding-10">admin</h3>
  </div>
  
    <div class="w3-bar-block">
 
      <a href="https://obrasodero.000webhostapp.com/area/futbol/" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Futbol</a> 
     <a href="areaprueba.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Area privada</a> 
    
    <a href=gestionarusuarios.php onclick=w3_close() class='w3-bar-item w3-button w3-hover-white'>Gestionar usuarios</a> 
   <a href=gestionarobras.php onclick=w3_close() class='w3-bar-item w3-button w3-hover-white'>Gestionar obras</a> 
     <a href=gestionarobreros.php onclick=w3_close() class='w3-bar-item w3-button w3-hover-white'>Gestionar obreros</a>
      <a href=gestionarproveedores.php onclick=w3_close() class='w3-bar-item w3-button w3-hover-white'>Gestionar proveedores</a>
 
       <a href="cerrarsesion.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Cerrar sesión</a> 
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-color w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-color w3-margin-right" onclick="w3_open()">☰</a>
  <span>Sergio Odero</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:370px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="añadiralumno">
    <h1 class="w3-xxxlarge w3-texto"><b>Gestionar usuarios</b></h1>
    <hr style="width:50px;border:5px solid #25333C" class="w3-round">
   <?php
      $conexion=mysqli_connect("localhost","id11683743_sergio","trebujena","id11683743_obras") or
      die("Problemas con la conexión");
  
  
$cantidad_resultados_por_pagina = 4;
$empezar_desde = ($pagina-1) * $cantidad_resultados_por_pagina;
      $query=mysqli_query($conexion,"SELECT * FROM usuarios");
    $result= mysqli_num_rows($query);
$total_paginas = ceil($result / $cantidad_resultados_por_pagina); 
   $query=mysqli_query($conexion,"SELECT * FROM usuarios LIMIT $empezar_desde, $cantidad_resultados_por_pagina ");
    if($result>0) {
    

    
  echo "<table>";
   echo "<tr>";
   echo "<th> Nick </th>";
     echo "<th>Nombre </th>";
       echo "<th>Apellido1 </th>";
         echo "<th>Apellido2 </th>";
          echo "<th>Poblacion </th>";
          echo "<th>Domicilio </th>";
            echo "<th>Nif </th>";
              echo "<th>Telefono </th>";
                    echo "<th>Tipo </th>";
              echo "<th>Eliminar </th>";
                 echo "<th>Editar  </th>";
                    echo "<th>Admin</th>";
                      echo "<th>Empleado</th>";
                 echo "</tr>";
       
  echo $fila;
    while ($fila=mysqli_fetch_array($query)) {
        
        $nick=$fila["Usuario_nick"];
        echo "<tr>";
        echo "<td>";
        echo $nick ;
echo "</td>";
 echo "<td>";
echo $fila["Usuario_nombre"];
echo "</td>";
 echo "<td>";
echo $fila["Usuario_apellido1"];
echo "</td>";
 echo "<td>";
echo $fila["Usuario_apellido2"];
echo "</td>";
 echo "<td>";
echo $fila["Usuario_poblacion"];
 echo "</td>";
  echo "<td>";
 echo $fila["Usuario_domicilio"];
      echo "</td>";
       echo "<td>";
echo $fila["Usuario_nif"];
echo "</td>";
    echo "<td>";
 echo $fila["Usuario_numero_telefono"];
    echo "</td>";
      echo "<td>";
       $tipo= $fila["Usuario_perfil"];
       echo $tipo;
        echo "</td>";
      echo "<td>";
/* echo "<input type=button value='Eliminar'  onclick=window.location.href='https://sergio-odero.000webhostapp.com/eliminarusuario.php?nick="; echo $nick; echo "';>";*/
 echo "<img class='imagenesadministracion' src=imagenes/eliminarusuario.png title='Eliminar usuario' onclick=window.location.href='https://obrasodero.000webhostapp.com/area/eliminarusuario.php?nick="; echo $nick; echo "';> ";
 echo "</td>";
  echo "<td>";
  echo "<img class='imagenesadministracion' src=imagenes/editarusuario.png title='Editar usuario' onclick=window.location.href='https://obrasodero.000webhostapp.com/area/editarusuario.php?nick="; echo $nick; echo "';> ";
   echo "</td>";
     echo "<td>";
   if($tipo=="administrador") {
        echo "<img class='imagenesadministracion' src=imagenes/borraradmin.png onclick=window.location.href='https://obrasodero.000webhostapp.com/area/quitaradmin.php?nick="; echo $nick; echo "'; title='Quitarle los permisos de  admin'> ";
   } else {
        echo "<img class='imagenesadministracion'src=imagenes/agregaradmin.png title='Convertirlo en admin' onclick=window.location.href='https://obrasodero.000webhostapp.com/area/nuevoadmin.php?nick="; echo $nick; echo "';>  ";
      
   }
   echo "</td>";
   echo "<td>";
    if($tipo=="empleado") {
        echo "<img class='imagenesadministracion' src=imagenes/obreroquitar.png onclick=window.location.href='https://obrasodero.000webhostapp.com/area/quitarempleado.php?nick="; echo $nick; echo "'; title='Convertirlo en cliente'> ";
   } else {
        echo "<img class='imagenesadministracion'src=imagenes/obreroagregar.png title='Convertirlo en empleado' onclick=window.location.href='https://obrasodero.000webhostapp.com/area/ponerempleado.php?nick="; echo $nick; echo "';>  ";
      
   }
   
    echo "</td>";
   echo "</tr>";
  
   
}
}

 ?>
</table>
<br>

<?php 
for ($i=1; $i<=$total_paginas; $i++) {
	//En el bucle, muestra la paginación
	
	echo  "<a class=paginacion href='?pagina=".$i."'>".$i."</a> | ";
}; ?>
 
</div>

  
  

  <!-- Modal for full size images on click-->
  <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
    <span class="w3-button w3-black w3-xxlarge w3-display-topright">×</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
      <img id="img01" class="w3-image">
      <p id="caption"></p>
    </div>
  </div>

 
 

<!-- End page content -->
</div>



<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
</script>

</body>
</html>