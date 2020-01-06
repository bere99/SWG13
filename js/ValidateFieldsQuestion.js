$(document).ready(function(){
$("#forma").on('submit', function(evt){
	
	
    var enunciado=$("#enunciado").val();
    var expEnun=/^.{10,}/;
    if(!expEnun.test(enunciado)){

		$("#errores").html("El enunciado debe contener al menos <strong> 10 </strong> caracteres.");
		evt.preventDefault(); 
        return false;
		
    }

    var correcta=$("#correcta").val();
    var incorrecta1=$("#incorrecta1").val();
    var incorrecta2=$("#incorrecta2").val();
    var incorrecta3=$("#incorrecta3").val();
    var tema=$("#tema").val();

    var expNotEmpty=/^.+/; 


    if(!expNotEmpty.test(correcta)){
        $("#errores").text("Falta el campo \"Respuesta correcto\"");
		
        return false;
    }else if(!expNotEmpty.test(incorrecta1)){
        $("#errores").text("Falta el campo \"Respuesta Incorrecta1\"");
		
        return false;
    }else if(!expNotEmpty.test(incorrecta2)){
        $("#errores").text("Falta el campo \"Respuesta Incorrecta2\"");
       
        return false;
    }else if(!expNotEmpty.test(incorrecta3)){
        $("#errores").text("Falta el campo \"Respuesta Incorrecta3\"");
       
        return false;
    }else if(!expNotEmpty.test(tema)){
        $("#errores").text("Falta el campo \"Tema\"");
        
        return false;
    }



    var correo=$("#correo").val();

    var profe=/^[a-z]+(\.[a-z]+)?@ehu\.(eus|es)$/;
    var alumnos=/^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$/;
    if(!alumnos.test(correo) && !profe.test(correo)){
		$("#errores").html("El email introducido <strong> no </strong> es v�lido");
        
        return false;
    }
    $("#errores").html("Todo correcto!");





});
});