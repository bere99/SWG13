<?php 
  
  $server="localhost";
	$user="id11248270_bereruiz";
	$pass="ibiricu";
	$basededatos="id11248270_sw13";
  
 /*
  $server="localhost";
  $user="root";
  $pass="";
  $basededatos="quiz";
*/
  $email= $_POST['email'];
  $mysqli=mysqli_connect($server,$user,$pass,$basededatos);
  
  $resultado= mysqli_query($mysqli,"DELETE FROM usuarios WHERE email='$email'");
  mysqli_close( $mysqli);
  echo "<script>alert('Usuario eliminado correctamente.'); </script>";
  
  echo "<script language=Javascript> location.href=\"HandlingAccounts.php\"; </script>";
	

 ?>