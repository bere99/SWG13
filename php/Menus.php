<div id='page-wrap'>
<header class='main' id='h1'>
	
	<?php

		if (isset($_SESSION['email'])){
			echo"<span class='right'><a href='Logout.php'>Logout</a></span>";
			echo "&nbsp";
			echo "&nbsp";
			echo $_SESSION['email'];
		}else{
			echo"<span class='right'><a href='SignUp.php'>Registro</a></span>";
			echo "&nbsp";
			echo "&nbsp";
			echo"<span class='right'><a href='LogIn.php'>Login</a></span>";		
		}
	?>

</header>
<nav class='main' id='n1' role='navigation'>
	


  	<?php
	if (isset($_SESSION['email'])){
		if(strcmp($_SESSION['tipo'],"admin")===0){
			
			echo"<span><a href='HandlingAccounts.php'>Gestionar usuarios</a></span>";
			
			
		}else{
			echo"<span><a href='Layout.php'>Inicio</a></span>";
			echo"<span><a href='Credits.php'>Cr&eacute;ditos</a></span>";
			echo"<span><a href='HandlingQuizesAjax.php'>Gestionar Preguntas</a></span>";
			
		}	
	}else{
		echo"<span><a href='Layout.php'>Inicio</a></span>";  		
		echo"<span><a href='Credits.php'>Cr&eacute;ditos</a></span>";
	}
	?>
	
</nav>