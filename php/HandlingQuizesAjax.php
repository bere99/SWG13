<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/PreviewPhoto.js"></script>
  <script src="../js/ShowQuestionsAjax.js"></script>
  <script src="../js/AddQuestionsAjax.js"></script>
  <script src="../js/CountQuestions.js"></script>
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
        if(!isset($_SESSION['tipo']) || strcmp($_SESSION['tipo'],"user")!==0){
          echo("No tienes permisos para acceder a esta pagina.");
        }else{
        ?>
    <div>
        <div id="NumQuestions"></div>
        <div id="MyQuestions"></div>

      
    <br>
	<br>
	<?php
		$email=$_SESSION['email'];
		echo"<form id='form' method='POST' enctype='multipart/form-data'>";
	?>	
    
		
        <h3> Formulario Insertar Preguntas </h3>
		<br>
        Enunciado:
		<input type="text" id="enunciado" name="enunciado" class="field" placeholder="Enunciado de la pregunta" required> <br/>
		<br>
        Respuesta Correcta: 
		<input type="text" id="correcta" name="correcta" class="field" placeholder="Campo obligatorio" required> <br/>
		<br>
        Respuesta Incorrecta 1: 
		<input type="text" id="incorrecta1" name="incorrecta1" class="field" placeholder="Campo obligatorio"required> <br/>
        <br>
        Respuesta Incorrecta 2: 
		<input type="text" id="incorrecta2" name="incorrecta2" class="field" placeholder="Campo obligatorio" required> <br/>
        <br>
        Respuesta Incorrecta 3: 
		<input type="text" id="incorrecta3" name="incorrecta3" class="field" placeholder="Campo obligatorio" required> <br/>
		<br>
      	Tema: 
		<input type="text" id="tema" name="tema" class="field" size="15" placeholder="Campo obligatorio" required>  &nbsp &nbsp
        Dificultad:
       	<select name="dificultad">
        	<option value="1"> Baja </option>
            <option value="2"> Media </option>
            <option value="3"> Alta </option>
        </select>
		<br>
		<br>
       	<br>	
		<p id="errores"> Introduce <strong>TODOS</strong> los datos. </p>	
		<br>
		<br>
        <p> Tu correo: </p>
		<?php 
            $email=$_SESSION['email'];
            echo"<input type='text' id='correo' name='correo' class='field' size='49' value='$email' placeholder='Direcci&oacute;n de correo del autor de la pregunta' readonly>" ;
        ?> 
        <br>


        <input type="button" value="Insertar" id="botonEnviar" onclick="AddQuestionsAjax(this);setTimeout(function(){CountQuestions();},2000);">
        <input type="reset" value="Restablecer" id="botonReset" >
        <br>
        <br>
    
        <input id="photo" name="photo" type="file" accept="image/*"/>
        <div id="imagen">
        </div>
        
        <script>
            $("#photo").change(function () {
                readImage(this);
            });
        </script>
        
    </form>
    <input type="button" value="Visualizar Preguntas" id="botonVisualize" onclick="ShowQuestionsAjax();">
    </div>

    <div id="questionsContainer" name="questionsContainer">

    </div>
    <?php
        }
    ?>
  </section>
  <script>
    $(document).ready(function(){
        CountQuestions();
    });
  </script>

  <?php include '../html/Footer.html' ?>
</body>
</html>
