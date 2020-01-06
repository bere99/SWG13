<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
    <script src="../js/esVip.js"></script>
  <script src="../js/checkPass.js"></script>
  <script src="jquery.min.js"></script>
  
  
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>



<form action="SignUp.php" method="post" enctype="multipart/form-data">
        <h1>Register</h1>
            Tipo: <select name="tipo" >
                <option default value="Alumno">Alumno</option>
                <option value="Profesor">Profesor</option>
                </select>
            <br>
            Email: <input type="text" name="email" id="email" required>
            <div id="vipEmail">
            </div>
            <div id='loaderemail' style='display: none;'>
             <img src='../images/loading.gif' width='50px' height='50px'>
            </div>

            <br>
            Nombre y Apellido: <input type="text" name="name" pattern="^.+ .+$" required>
            <br>
            Contrase&ntilde;a: <input type="password" id="pass" name="pass" pattern=".+"/ required>
            <div id="passCheck">
            </div>
            <div id='loaderpass' style='display: none;'>
             <img src='../images/loading.gif' width='50px' height='50px'>
            </div>


            <br>
            Repetir Contrase&ntilde;a: <input type="password" name="pass2" pattern=".+"/ required> 
                 <br>
            <input id="file-input" name="file-input" type="file"/>
                   <br>
            <input type="submit" id="boton" value="Enviar" name="boton" disabled >
    </form>
	
	
	
		<?php
		
		$emailProfe="/^[a-z]+(\.[a-z]+)?@ehu\.(eus|es)$/";
		$emailAlumno="/^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$/";


		$logeado="false";

			if (isset($_POST['email'])){

				$pass= $_POST['pass'];
				$rpass= $_POST['pass2'];
 				$tipo=$_POST['tipo'];
               	$email=$_POST['email'];
                $name=$_POST['name'];

				if(($tipo=="Alumno")&&(preg_match($emailAlumno,$_POST['email'])==0)){
					echo "El correo no es valido ";
				}
			
				else if(($tipo=="Profesor")&&(preg_match($emailProfe,$_POST['email'])==0)){
					echo "El correo no es valido ";
				}

				
				else if(strlen($pass)<6){
					echo"La contrase&ntilde;a debe contener al menos 6 caracteres";
					
				}else if($pass!=$_POST['pass2']){
					echo"Las contrase&ntilde;as no coinciden";
					echo "<br>";
					
					
				}else{
          
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

					
					$nombreFoto=$_FILES['file-input']['name'];
					$rutaImg="../images/".$nombreFoto;
					move_uploaded_file($_FILES['file-input']['tmp_name'],$rutaImg);

					$mysqli=mysqli_connect($server,$user,$pass,$basededatos);
				
					if(!$mysqli){	
						die("Fallo al establecer conexion" .mysqli_connect_error());
					}

				 	$crypted=crypt($rpass,"ibiricueselmejor");
                     mysqli_query( $mysqli,"insert into usuarios (nombre, pass, email, tipo,rutaImg,estado) values ('$name', '$crypted','$email','$tipo','$rutaImg','activada')");
                            mysqli_close( $mysqli);
					
					echo '<script language="javascript">
							alert("Usuario registrado correctamente");
							window.location.href="Layout.php";
						  </script>';
				}
			}

		?>
    
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
       $("#email").on("blur", function(){
           esVip();
        });
    });
    $(document).ready(function() {
       $("#pass").on("blur", function(){
           checkPass();
        });
    });
    </script>
    
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>