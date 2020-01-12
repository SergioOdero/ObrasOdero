<?php
$email =$_REQUEST['email']."<br>";
$token =$_REQUEST['toke']."<br>";

/*
$conexion=mysqli_connect("localhost","id10990589_root","trebujena","id10990589_bbddprueba") or
    die("Problemas con la conexión");
$result = mysqli_query( "SELECT * FROM usuarios WHERE Usuario_token_aleatorio = '$token");
echo $result;
*/




$conn=new mysqli("localhost","id11683743_sergio","trebujena","id11683743_obras") or
    die("Problemas con la conexión");

		  
		  $sql="SELECT * FROM usuarios where Usuario_email='".$_GET['email']."' and Usuario_token_aleatorio='".$_GET['toke']."'";
		 
		  $result = $conn->query($sql);

		  if ($result->num_rows> 0) {
			 $sql="UPDATE usuarios SET Usuario_bloqueado=0";
			 $result=$conn->query($sql);
			 
			  header('location: https://obrasodero.000webhostapp.com/area');
		  } else {
			echo "No se ha podido confirmar el registro, intente entrar de nuevo al enlace desde el correo";
		  }
//WHERE Usuario_email='$_GET['email']'
	  

	


?>
<HTML>
<HEAD>
<TITLE>destino.php</TITLE>
</HEAD>
<BODY>
</BODY>
</HTML>