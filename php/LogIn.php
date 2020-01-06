<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <?php include 'DbConfig.php'?>
  
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

     <form action="LogIn.php" method="post">
		<h1>Login</h1>

			<div>
			Email: <input type="text" name="email" >
			</div>
			<br>

			<div>
			Contrasen&ntilde;a: <input type="password" name="pass">
			</div>
			<br>
			
			
			<input type="submit" value="Enviar" name="boton" >			
			<br>
			<a href="https://ws19g13druizibereciartua2.000webhostapp.com/php/ChangePassMenu.php">¿Has olvidado la contraseña?</a>
			<br>
	</form>
	
		<?php
			if (isset($_POST['email'])){	
				
				//RUIZ BD
				$server="localhost";
				$user="id11248270_bereruiz";
				$pass="ibiricu";
				$basededatos="id11248270_sw13";
				
				/*
				//Local
				$server="localhost";
				$user="root";
				$pass="";
				$basededatos="quiz";
				
				/*
				//Bere BD
				$server="localhost";
				$user="id11673215_id11248270_bereruiz";
				$pass="ibiricu";
				$basededatos="id11673215_id11248270_sw13";
				*/

				$mysqli=mysqli_connect($server,$user,$pass,$basededatos);
				
				if(!$mysqli){
					die("Fallo al establecer conexion" .mysqli_connect_error());
				}

					$email = $_POST['email'];
					$pass = $_POST['pass'];										
					$crypted=crypt($pass,"ibiricueselmejor");
                    $user = mysqli_query( $mysqli,"SELECT nombre FROM usuarios WHERE email ='$email' AND pass='$crypted' AND estado='activada' ");
					$cont=  mysqli_num_rows($user); 
					$columna= mysqli_fetch_array($user);
					$name=$columna['nombre'];
					mysqli_close( $mysqli);
									
					
					
					if($cont==1){
						/*$result= mysqli_query($conexion,"SELECT estado FROM usuarios WHERE email='$email'");
						$row=mysqli_fetch_array($result);
						$estado=$row['estado'];
						echo"<script >alert($estado);</script>";
						*/
						/*If ($estado == ""){*/
							
							$_SESSION['email']=$email;
							

							if($_SESSION['email']=="admin@ehu.es"){
								$_SESSION['tipo']="admin";
								
							}else{

								$_SESSION['tipo']="user";
	
							}
				
							echo("<script> alert ('BIENVENIDO AL SISTEMA')</script>");
							echo("<script> location.replace('Layout.php'); </script>");
						
							/*
						}else{
							echo("<script> alert ('USUARIO BLOQUEADO')</script>");
							session_destroy();		
						}*/
					} 
					else {
						
						echo("Par&aacute;metros de login incorrectos o el usuario ha sido bloqueado. ");
					} 
					
				
			}
		?>
    
    </div>

  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>