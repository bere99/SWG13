<?php
session_start();
?>
  <?php include '../html/Head.html'?>
  <script src="../js/jquery-3.4.1.min.js"></script>

  <style>
  #errores{
  color: red;
  }
  </style>
</head>
<body>

    <?php include '../php/Menus.php' ?>

  
    <section class="main" id="s1">
        <?php 
        if(!isset($_SESSION['tipo']) || strcmp($_SESSION['tipo'],"admin")!==0){
          echo("No tienes permisos para acceder a esta pagina.");
        }else{
        ?>
        <div>
        
	<div align="center">Estos son los usuarios almacenados en la base de datos </div>

	<br>
        <table border=1 align="center">
	    <tr>
    		<td><strong>Correo</strong></td>	
		    <td><strong>Nombre y Apellido&nbsp</strong></td>	
			
		    <td><strong>Contraseña&nbsp</strong></td>
			
		    <td><strong>Estado&nbsp</strong></td>			
        <td><strong>Cambiar Estado</strong></td>		
        <td><strong>Eliminar Uusario</strong></td>			
	    </tr>
        
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
        $conexion=mysqli_connect($server,$user,$pass,$basededatos);
        $sql= "SELECT * FROM usuarios";
        $resultado= mysqli_query($conexion,$sql);

        while($usuario=mysqli_fetch_array($resultado)){
        ?>
        <form action="#" method='POST'>
        <tr>
        
	        <td align="center"><br>&nbsp;&nbsp;<p ><?php echo $usuario['email'] ?></p>&nbsp;&nbsp;<br></td>
          <input type="hidden" name="email" value="<?php echo $usuario['email'] ?>" />
	        <td align="center" ><br>&nbsp;&nbsp;<?php echo $usuario['nombre']?>&nbsp;&nbsp;<br></td>
        	<td align="center"><br>&nbsp;&nbsp;<?php echo $usuario['pass']?>&nbsp;&nbsp;<br></td>
	        <td align="center"><br>&nbsp;&nbsp;<?php echo $usuario['estado']?>&nbsp;&nbsp;<br></td>   
          <td align="center"><input type="submit"  value="Cambiar Estado" onclick=this.form.action="ChangeState.php"></td>
          <td align="center"><input type="submit"  value="Eliminar" onclick=this.form.action="RemoveUser.php" ></td>
        
        </tr>
        </form>
		<?php
			};
		?>
		</table>
		<p>Si no se visualizan cambios autom&aacute;ticamente por favor recargue la pagina</p>
        </div>


      <?php
        }
      ?>  

    </section>
  
  <?php include '../html/Footer.html' ?>
</body>
</html>