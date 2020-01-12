<html>
<style>
body {
 background-color:#c1bdba;
}
h1 {
    text-align:center;
}
h2 {
     text-align:center;
}
.block {
  display: block;
  width: 315px;
margin-left:43%;
  border: none;
  background-color:#25333C;
 
  color: white;
  padding: 20px 50px;
  font-size: 27px;
  cursor: pointer;
  text-align: center;
}
</style>
<?php

$token = bin2hex(openssl_random_pseudo_bytes(30));








$conexion=mysqli_connect("localhost","id11683743_sergio","trebujena","id11683743_obras") or
    die("Problemas con la conexión");
    $contraseña=$_POST['p1'];
    $email=$_POST['email'];
    $contraseña=md5($contraseña);
    mysqli_query($conexion,"insert into usuarios(Usuario_nick,Usuario_email,Usuario_clave,Usuario_token_aleatorio) values 

					('$_POST[nick]','$email','$contraseña','$token')") 
                    or die("Problemas en el select ".mysqli_error($conexion));
                                
                    mysqli_close($conexion);
                    
                    $para = $email;
                    $asunto = 'Confirmación de registro';
                    $remitente = "sergio@gmail.com"; 
                    $mensaje = "<a href=https://obrasodero.000webhostapp.com/area/recibido.php?email=$email&toke=$token>Pulse el siguiente enlace para confirmar el registro</a>";
                   
                    $headers = "From: ".$remitente." \r\n";
                    $headers .= "Reply-To: ".$remitente."\r\n"; 
                    $headers .= "MIME-Version: 1.0"."\r\n";
                    $headers .= "Content-Type: text/html; charset=UTF-8". "\r\n"; 
                     
                   
                    mail($para, $asunto, $mensaje, $headers);
                    

 /*
$conexion=mysqli_connect("localhost","id10990589_root","trebujena","id10990589_bbddprueba") or
    die("Problemas con la conexión");
    $contraseña=$_POST['p1'];
    $email=$_POST['email'];
    $contraseña=md5($contraseña);
    
    mysqli_query($conexion,"insert into usuarios(Usuario_nick,Usuario_email,Usuario_clave,Usuario_token_aleatorio) values 

					('$_POST[nick]','$email','$contraseña','$token')") 
                    or die("Problemas en el select ".mysqli_error($conexion));
                                
                    mysqli_close($conexion);
                     echo "Se le ha enviado un correo para que confirme su cuenta, si no lo encuentra revise su carpeta de spam";
                    
                    $para = $email;
                    $asunto = 'Confirmación de registro';
                    $remitente = "pepe@gmail.com"; //Aquí va la dirección de quien envía el email.
                    //$mensaje = ' Bienvenido, para completar el registro en sergio-odero.com <a href="https://blog.reaccionestudio.com/" target="_blank">pulsa aqui</a>';
                     //$mensaje = ' Bienvenido, para completar el registro en sergio-odero <a href="sergio-odero.000webhostapp.com/recibido.php?contra=$contraseña&toke=$token" target="_blank">pulsa aqui</a>';
                    $mensaje = "<a href=sergio-odero.000webhostapp.com/recibido.php?email=$email&toke=$token>Pulse aqui para confirmar el registro</a>";
                    //Cabecera de la funcion mail()
                    $headers = "From: ".$remitente." \r\n";
                    $headers .= "Reply-To: ".$remitente."\r\n"; //La dirección por defecto si se responde el email enviado.
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=UTF-8\r\n"; //La codificación del email.
                     
                    //Mandamos el email.
                    mail($para, $asunto, $mensaje, $headers);
?>
*/


/*
$para=$email;

// título
$título = 'Confirmacion de registro';

// mensaje
$mensaje = '
"<html>
<head>
  <title>Confirmacion</title>
</head>
<body>
 <a href=https://sergio-odero.000webhostapp.com/recibido.php?email=$email&toke=$token">Pulse el siguiente enlace para confirmar el registro</a>
 <a href=sergio-odero.000webhostapp.com/recibido.php?email=$email&toke=$token>Pulse el siguiente enlace para confirmar el registro</a>
</body>
</html>"
<php 
"<a href=sergio-odero.000webhostapp.com/recibido.php?email=$email&toke=$token>Pulse aqui para confirmar el registro</a>"
?>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=UTF-8\r\n' . "\r\n";



// Enviarlo
mail($para, $título, $mensaje, $cabeceras);
*/
?>
<h1>¡Gracias por haberse registrado!</h1>
<br> <br>
<h2> Se le ha enviado un correo para que confirme su cuenta, si no lo encuentra revise su <strong> carpeta de spam</strong> </h2>
<br> <br> <br> <br> <br>
<button type="button" class="block" onclick="window.location.href='https://obrasodero.000webhostapp.com/area/';">Iniciar sesión</button>
       
</html>