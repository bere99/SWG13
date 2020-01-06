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
      
	  <?php
	  	//$server="localhost";
		//$user="id11248270_bereruiz";
		//$pass="ibiricu";
		//$basededatos="id11248270_sw13";
	  	$mysqli=mysqli_connect($server,$user,$pass,$basededatos);
	  	if(!$mysqli){
				die("Fallo al establecer conexiÃ³n" .mysqli_connect_error());
		}
		
		$consulta= "SELECT email,enunciado,correcta FROM preguntas";
		$resultado=mysqli_query($mysqli, $consulta);
	  
	  
		echo "<table class='table' border='1'>";
		echo '<thead>';
		echo"<tr>";
		echo"<th> Autor </th>";
		echo"<th> Enunciado </th>";
		echo"<th> Respuesta </th>";
		echo"</tr>";
		while($columna=mysqli_fetch_array($resultado)){
		echo "<tr>";
		
		echo "<td>". "<a href=mailto:". $columna['email'].">". $columna['email']. "</a>"."</td><td>".$columna['enunciado']."</td><td>".$columna['correcta']."</td>";	
		
		echo "</tr>";
		
		
		
		}
		?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
