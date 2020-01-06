<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="../js/checkPassCode.js"></script>

</head>
<body>
  <?php include '../php/Menus.php' ?>
  <br>
<table border=1>
    <tr>
    <td>
    <form action='ChangePassWithCode.php' method="POST">
        <h1>Recuperar contraseña</h1>    
        <br>
        <div>      
        
            Email <input type="email" name="email" placeholder='email' size=35>
            <br>
            Código <input type="text" name="codigo" placeholder='tu código de 4 dígitos' required>
            <br>
            Nueva contraseña <input type="password" id="pass" name="newpass" placeholder=' nueva contraseña' required>
            <div id="passCheck" name="passCheck">
            </div>
            <div id='loaderpass' style='display: none;'>
                <img src='../images/loading.gif' width='50px' height='50px'>
            </div>
        
        </div> 
        <br>
        <br>
        <input type="submit" id="boton" value="Enviar" disabled>
        <input type="reset" value="Resetear">
    </form>
    </td>
    </tr>
</table>

<?php
if(isset($_POST['codigo'])){
    $codigo=$_POST['codigo'];
    $correo=$_POST['email'];
    $pass=$_POST['newpass'];

	$server="localhost";
	$user="id11248270_bereruiz";
	$passw="ibiricu";
	$basededatos="id11248270_sw13";
        
    $mysqli=mysqli_connect($server,$user,$passw,$basededatos);
    $sql='SELECT * FROM USERCODIGO WHERE codigo="'.$codigo.'" AND Correo="'.$correo.'"';
    $result= mysqli_query($mysqli,$sql);
    $cont=  mysqli_num_rows($result); 
    $string=mysqli_fetch_array ($result);
    $tipo= $string[0];
    if($cont==1){
        $pass=crypt($pass,"ibiricueselmejor");
        
        $sql='UPDATE usuarios SET pass="'.$pass.'" WHERE email="'.$correo.'"';
        mysqli_query($mysqli,$sql);

        $sql='DELETE FROM USERCODIGO WHERE Correo="'.$correo.'"';
        mysqli_query($mysqli,$sql);
        echo "Contraseña cambiada correctamente";
    }else{
        echo "Codigo y correo no coinciden";
    }
    mysqli_close( $mysqli); 
}
?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>

    $(document).ready(function() {
       $("#pass").on("blur", function(){
           checkPass();
        });
    });
    </script>

</body>
</html>