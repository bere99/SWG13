<?php
		
		$emailProfe="/^[a-z]+(\.[a-z]+)?@ehu\.(eus|es)$/";
		$emailAlumno="/^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$/";
		$expNotEmpty="/^.+/"; 
		$expEnun="/^.{10,}/";
		
		$email=$_POST['correo'];
		$enunciado=$_POST['enunciado'];
		$tema=$_POST['tema'];
		$correcta=$_POST['correcta'];
		$incorrecta1=$_POST['incorrecta1'];
		$incorrecta2=$_POST['incorrecta2'];
		$incorrecta3=$_POST['incorrecta3'];
		$dificultad=$_POST['dificultad'];
		
		if((preg_match($emailAlumno,$email)==0) && (preg_match($emailProfe,$email)==0)){
			echo "El servidor dice que el correo no es valido ";
		}else if(!preg_match($expEnun,$enunciado)){
			echo "El enunciado debe contener al menos 10 caracteres ";
		}else if(!preg_match($expNotEmpty, $tema)){
			echo "El servidor dice que hay campos vacíos ";
		}else if(!preg_match($expNotEmpty,$correcta)){
			echo "El servidor dice que hay campos vacíos ";
		
		}else if(!preg_match($expNotEmpty,$incorrecta1)){
			echo "El servidor dice que hay campos vacíos ";
		}else if(!preg_match($expNotEmpty,$incorrecta2)){
			echo "El servidor dice que hay campos vacíos ";
		}else if(!preg_match($expNotEmpty,$incorrecta3)){
			echo "El servidor dice que hay campos vacíos ";
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
			
			
			$mysqli=mysqli_connect($server,$user,$pass,$basededatos);
			
			if(!$mysqli){
				die("Fallo al establecer conexion " .mysqli_connect_error());
			}
			
			$rutaImg="../images/ibi.png";
			//echo($_FILES['photo']['name']);
			//if(isset($_FILES['photo']) && !empty($_FILES['photo']['name'])) { 
				$nombreFoto=$_FILES['photo']['name'];
				$rutaImg="../images/".$nombreFoto;
				move_uploaded_file($_FILES['photo']['tmp_name'],$rutaImg);
			//}
			$sql="INSERT INTO preguntas (email, enunciado, correcta, incorrecta1, incorrecta2, incorrecta3, tema, dificultad, rutaImg ) 
			VALUES ('$email','$enunciado','$correcta','$incorrecta1',
			'$incorrecta2','$incorrecta3', '$tema', '$dificultad', '$rutaImg')";


			$xml = simplexml_load_file('../xml/Questions.xml') or die("Error: No se ha podido cargar el fichero 'Questions.xml' ");
			$pregunta = $xml->addChild('assessmentItem');

			$pregunta->addAttribute('subject',$tema);
			$pregunta->addAttribute('author',$email);

			$enun=$pregunta->addChild('itemBody');
			$enun->addChild('p',$enunciado);

			$correct=$pregunta->addChild('correctResponse');
			$correct->addChild('value',$correcta);
			
			$incorrectas=$pregunta->addChild('incorrectResponses');
			$incorrectas->addChild('value',$incorrecta1);
			$incorrectas->addChild('value',$incorrecta2);
			$incorrectas->addChild('value',$incorrecta3);

			$ruta=$pregunta->addChild('rutaImg',$rutaImg);


			if(!$xml->asXML('../xml/Questions.xml')){
				echo "Ha ocurrido un problema al guardar la pregunta en el archivo '.xml'";
			}


			if(!mysqli_query($mysqli,$sql)){
				echo "CUIDADO!";
				die('Error: ' .mysqli_error($sql));
					
			}	
			echo " Tu pregunta ha sido añadida correctamente.";
			
			mysqli_close($mysqli);
		}	
	?>