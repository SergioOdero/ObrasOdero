<?php
  session_start();
if (isset($_SESSION['nick'])){
  
 header('location: http://obrasodero.000webhostapp.com/area/prueba.php');
}
?>
<?php
$alert='';
    if(!empty($_POST)) {

    
    if(!empty($_POST['email']) || !empty($_POST['clave'])) {
      $conexion=mysqli_connect("localhost","id11683743_sergio","trebujena","id11683743_obras") or
      die("Problemas con la conexión");
    $user= $_POST['email'];
    $pass=$_POST['clave'];
    $pass=md5($pass);
   $query=mysqli_query($conexion,"SELECT * FROM usuarios WHERE Usuario_email= '$user' AND  Usuario_clave='$pass' AND Usuario_bloqueado='0' AND Usuario_numero_intentos<'4'");
    $result= mysqli_num_rows($query);

    if($result>0) {
         // while ($fila=mysqli_fetch_array($query)) {
 //$_SESSION['nick']=$fila["Usuario_nick"];

//}
   // $data=mysqli_fetch_array($query);
     mysqli_query($conexion, "update usuarios set Usuario_numero_intentos='0' WHERE Usuario_email='$user'");
     $nick="";
   
//$alert=$nick;

@session_start();
 // $_SESSION['active']=true;
 
  header('location: http://obrasodero.000webhostapp.com/area/prueba.php');
    while ($fila=mysqli_fetch_array($query)) {
 $_SESSION['nick']=$fila["Usuario_nick"];
 $_SESSION['tipo']=$fila["Usuario_perfil"];
 $_SESSION['nombre']=$fila["Usuario_nombre"];
 $_SESSION['apellido1']=$fila["Usuario_apellido1"];
 $_SESSION['apellido2']=$fila["Usuario_apellido2"];
  $_SESSION['poblacion']=$fila["Usuario_poblacion"];
    $_SESSION['domicilio']=$fila["Usuario_domicilio"];
   $_SESSION['nif']=$fila["Usuario_nif"];
    $_SESSION['telefono']=$fila["Usuario_numero_telefono"];
}
    } else {
    $query=mysqli_query($conexion,"SELECT * FROM usuarios WHERE Usuario_email='$user' AND  Usuario_clave='$pass' AND Usuario_numero_intentos<'4'");
            $result= mysqli_num_rows($query);
    if($result>0) {
         $query=mysqli_query($conexion,"SELECT * FROM usuarios WHERE Usuario_email='$user'  AND Usuario_bloqueado='1'");
            $result= mysqli_num_rows($query);
            if($result>0) { 
         $alert="Confirma el correo electronico para desbloquear su cuenta";
            } 
    
    } else {
          $query=mysqli_query($conexion,"SELECT * FROM usuarios WHERE Usuario_email='$user'  AND Usuario_bloqueado='1'");
            $result= mysqli_num_rows($query);
            if($result>0) { 
         $alert="Confirma el correo electronico para desbloquear su cuenta";
         
            } else {
                
          
           $query=mysqli_query($conexion,"SELECT * FROM usuarios WHERE Usuario_email='$user' AND Usuario_numero_intentos<'4'");
             $result= mysqli_num_rows($query);
             if($result>0) {
           mysqli_query($conexion, "update usuarios set Usuario_numero_intentos=Usuario_numero_intentos+1 WHERE Usuario_email='$user'");
                 $alert="La contraseña es incorrecta"; 
             } else {
             $query=mysqli_query($conexion,"SELECT * FROM usuarios WHERE Usuario_email='$user' AND Usuario_numero_intentos>'3'");
            $result= mysqli_num_rows($query);
    if($result>0) {
         
$token = bin2hex(openssl_random_pseudo_bytes(30));
mysqli_query($conexion, "update usuarios set Usuario_token_aleatorio='$token'");
                   $para = $user;
                    $asunto = 'Confirmación de desbloqueo';
                    $remitente = "sergio@gmail.com"; 
                    $mensaje = "Se ha bloqueado su cuenta ya que se ha intentado iniciar sesion mas de 3 veces, <a href=obrasodero.000webhostapp.com/area/desbloquear.php?email=$user&token=$token>pulse aqui para desbloquear su cuenta</a>, si no ha sido usted contacte con nosotros: sergio-odero@gmail.com";
                    $headers = "From: ".$remitente." \r\n";
                    $headers .= "Reply-To: ".$remitente."\r\n"; 
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=UTF-8\r\n"; 
                     
                   
                    mail($para, $asunto, $mensaje, $headers);
                   $alert="Ha llegado al numero maximo de intentos, se te ha enviado un email para desbloquear la cuenta (Revisa el spam)";
    } else {
      $alert="El email o la contraseña son incorrectas";        
    }
             
             }
       
    }
     
      
    }
  
    }
    
    }
  }

    ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta  name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
  
  <title>Login/Registro</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="style.css">
</head>
<body>
<!-- partial:index.partial.html -->
<script type="text/javascript" >
                        function comprobar() {
                          
                                var p1 = document.formulario.p1.value;
                                var p2 = document.formulario.p2.value;
                                
                                if (p1 != p2) {
                                       alert("Las contraseñas no coinciden");
                                       return false;
                                } else {
                                        
                                        return true;
                                }
                        }

                      
                </script>



<div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#login">Iniciar sesion</a></li>
        <li class="tab"><a href="#signup">Registro</a></li>
      </ul>
      
      <div class="tab-content">
       
        <div id="login">   

        

          <h1>¡Bienvenido de nuevo!</h1>
          
          <form action="#login" method="post">
            
          
            <div class="field-wrap">
            <label>
              Correo<span class="req">*</span>
            </label>
            <input type="email" name="email" autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Contraseña<span class="req">*</span>
            </label>
            <input type="password" name="clave"  autocomplete="off"/>
          </div>
          
          <p style="color:red; text-align:right;"> <?php print($alert) ?></p>
 
          <button class="button button-block"/>Iniciar</button>
          
          </form>

        </div>
         <div id="signup">   
          <h1>Registro</h1>
          
          <form  method="post" name="formulario" onSubmit="return comprobar()" action="alta.php">
          
          
            <div class="field-wrap">
              <label>
                Nick<span class="req">*</span>
              </label>
              <input type="text" name="nick" required autocomplete="off" />
            </div>
        
           
        

          <div class="field-wrap">
            <label>
              Email<span class="req">*</span>
            </label>
            <input type="email" name="email" required autocomplete="off"/>

          </div>
          
          <div class="field-wrap">
            <label>
              Contraseña<span class="req">*</span>
            </label>
            <input type="password"name="p1" /> <div id="mensaje"></div>
          </div>
       
          <div class="field-wrap">
            <label>
             Vuelve a introducirla<span class="req">*</span>
            </label>

            <input type="password" name="p2" />
          </div>
            <button type="submit"  class="button button-block"/>Registrarse</button>
        
        
          
          </form>
          
        </div>
        
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="script.js"></script>

</body>
</html>