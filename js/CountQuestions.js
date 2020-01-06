function CountQuestions(){

    $.ajax({
        url: '../php/CountQuestions.php',
        success:function(datos){
            questions=datos.split("|");
            $("#NumQuestions").append("span").text("Total preguntas: "+questions[0]);
            $("#MyQuestions").append("span").text("Mis preguntas: "+questions[1]);
        }
    });
}