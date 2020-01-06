<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<?php include '../html/Head.html'?>
    
</head>
<body>
<?php include '../php/Menus.php' ?> 

<br>
<table border=1>
    <tr>

    <td>
    <form action="ChangePassMenu.php" method="post">
        <h1>Recuperar contraseña</h1>    
        <br>
        <div>           
            Por favor, introduce tu email.
            <input type="email" name="email" placeholder='Email' required>
            <br>
        </div> 
        <br>
        <input type="submit" value="Enviar">
        <input type="reset" value="Resetear">		
        <p id='enviado'></p>       
        
    </form>
    </td>
    </tr>
</table>
<?php

	$server="localhost";
	$user="id11248270_bereruiz";
	$passw="ibiricu";
	$basededatos="id11248270_sw13";

    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $mysqli=mysqli_connect($server,$user,$passw,$basededatos);

        if(!$mysqli){
            die("Fallo al establecer conexion" .mysqli_connect_error());
        }
        
        $sql='SELECT nombre FROM usuarios WHERE email ="'.$email.'"'; 
        
        $result= mysqli_query($mysqli,$sql);
        $cont=  mysqli_num_rows($result); 

        if($cont==1){
            $para = $email;
            $asunto = "Recuperación contraseña";
            $codigorecuperacion = rand(1000,9999);
            $sql='INSERT INTO USERCODIGO VALUES("'.$email.'","'.$codigorecuperacion.'")'; 
            mysqli_query($mysqli,$sql); 
            $mensaje=
            "
            <html>
            <head>
            <title> Recuperar Contraseña </title>
            </head>
            <body>
            <h1> Codigo para recuperar la contraseña: </h1>
            <h2>".$codigorecuperacion."</h2>
            <h1> Para recuperar la contraseña pinche <a href='https://ws19g13druizibereciartua2.000webhostapp.com/php/ChangePassWithCode.php'>aqui</a> </h1>
            <h6>Algunos servicios de correo electrónico pueden, la primera vez, por seguridad, desactivar el link de redireccionamiento</h6>
            <h6>Si este es su caso por favor acceda a la URL: https://ws19g13druizibereciartua2.000webhostapp.com/php/ChangePassWithCode.php </h6>
            </body>
            </html>
            ";

            $header = "From: happynewyearJOSEAN@ehu.eus\r\n"; 
            $header.= "MIME-Version: 1.0\r\n"; 
            $header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
            $header.= "X-Priority: 1\r\n"; 
            mail($para,$asunto,$mensaje,$header);
            echo "El email se ha enviado correctamente, puede que aparezca como Spam.";
        }else{
            echo "El email no existe.";
        }
        mysqli_close( $mysqli); 
    }
?>


</body>
</html>