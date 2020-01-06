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
    $result= mysqli_query($mysqli,"SELECT estado FROM usuarios WHERE email='$email'");
    $row=mysqli_fetch_array($result);
    $estado=$row['estado'];
    echo"<script >alert($estado);</script>";

    if($row['estado']== "activada"){

        $resultado= mysqli_query($mysqli,"UPDATE usuarios SET estado='bloqueada' WHERE email='$email'");  
        echo "<script>Usuario bloqueado correctamente</script>";

    }else if ($row['estado']== "bloqueada"){
        
        $resultado= mysqli_query($mysqli,"UPDATE usuarios SET estado='activada' WHERE email='$email'");
        echo "<script>Usuario bloqueado correctamente</script>";
        
    }
    mysqli_close( $mysqli);
    echo "<script language=Javascript> location.href=\"HandlingAccounts.php\"; </script>";
 ?>