<?php

session_start();

$nick=$_REQUEST["nick"];

?>
<!DOCTYPE html>

<html lang="en">
<title>Area privada</title>

 
<style type="text/css">
body {
    background-color:#c1bdba;
}
.div2 {
  background-color: #0099ff;
  
  text-align: center; 
  margin-right: 500px;

  z-index: 1;
  font-size: 25px;
   border-radius: 20px;
}
.block {
  display: block;
  width: 315px;
  margin-left:1%;
  border: none;
  background-color: #25333C;
  color: white;
  padding: 20px 50px;
  font-size: 27px;
  cursor: pointer;
  text-align: center;
}
</style>
 <?php



 $conexion=mysqli_connect("localhost","id11683743_sergio","trebujena","id11683743_obras") or
      die("Problemas con la conexión");
   
   
   $query=mysqli_query($conexion,"SELECT * FROM trabajadores_obras WHERE usuario_id= '$nick'");
    $result= mysqli_num_rows($query);

    if($result>0) {
  
    
    while ($fila3=mysqli_fetch_array($query)) {
 $fechainicio=$fila3["fecha_inicio"];
 $fechafin=$fila3["fecha_fin"];


}

}
  ?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
</style>
<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-color  w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Cerrar</a>
  <div class="w3-container">
    <h3 class="w3-padding-10"><?php echo $nick; ?></h3>
  </div>
  
    <div class="w3-bar-block">
    <img src="<?php echo $target_file; ?>" style="width:40%;display:block;margin:30px;">
    <a href="futbol/" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Futbol</a> 
    <?php
   if( $_SESSION['tipo']=="administrador") {
      echo "  <a href=https://obrasodero.000webhostapp.com/area/gestionarusuarios.php onclick=w3_close() class='w3-bar-item w3-button w3-hover-white'>Gestionar usuarios</a> ";
    echo "<a href=gestionarobras.php onclick=w3_close() class='w3-bar-item w3-button w3-hover-white'>Gestionar obras</a>"; 
  echo " <a href=gestionarobreros.php onclick=w3_close() class='w3-bar-item w3-button w3-hover-white'>Gestionar obreros</a>";
 
      
   }
   
   ?>
  <a href="https://obrasodero.000webhostapp.com/area/cerrarsesion.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Cerrar sesión</a> 
       
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
    <h1 class="w3-xxxlarge w3-texto"><b>Area privada</b></h1>
    <hr style="width:50px;border:5px solid #25333C" class="w3-round">
    
 
    <form action="editarobra.php?nick=<?php echo $nick;?>"" method="post" enctype="multipart/form-data"><strong>
       <div class="w3-section">
   <div class="w3-container">

  <div class="w3-section">
Nombre:
<input class="w3-input w3-border" required type=text name=nombre value="<?php echo $nombre; ?>"  >
</div>
  <div class="w3-section">
Dirección:
<input class="w3-input w3-border" required type=text name=direccion  value="<?php echo $direccion; ?>">
</div>
  <div class="w3-section">
Obra:
<select name="obra" class="w3-input w3-border">
<?php



 $conexion=mysqli_connect("localhost","id11683743_sergio","trebujena","id11683743_obras") or
      die("Problemas con la conexión");
   
   
   $query=mysqli_query($conexion,"SELECT * FROM obras ");
    $result= mysqli_num_rows($query);

    if($result>0) {
  

    while ($fila=mysqli_fetch_array($query)) {
$idobra=$fila["Obra_id"];
 $nombreobra=$fila["Obra_nombre"];
echo "<option value=$idobra>$nombreobra</option>";
}

}
?>
</select>
</div>
 <div class="w3-section">
Fecha inicio:
<input class="w3-input w3-border" required type=text name=latitud value="<?php echo $fechainicio; ?>"   >
</div>
  <div class="w3-section">
    Fecha final:
<input class="w3-input w3-border" required type=text name=longitud value="<?php echo $fechafinal; ?>">
</div>


</div>


       <br> <br>
      <button type="submit" class="block">Enviar</button>
</form>
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
