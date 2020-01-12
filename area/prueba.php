<?php
  session_start();
if (!isset($_SESSION['nick'])){
  
 header('location: http://obrasodero.000webhostapp.com/area');
} 
?>
<head>
   
  <meta  name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
<style>
body {
background: #c1bdba;    
}
h3 {
color:white;
text-align:center;
}
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
}
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

echo "<h3> Bienvenido " . $_SESSION["nick"] . "</h3><br>";

?>
<input type="button" value="Futbol" onclick="window.location.href='futbol'">
<br> <br>
<input type="button" value="Area privada" onclick="window.location.href='areaprueba.php'">
    </div>

</body>
</html>