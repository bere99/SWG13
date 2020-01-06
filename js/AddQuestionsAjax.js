function AddQuestionsAjax(form){
    var formulario = $('form').get(0); 
   
    $.ajax(
    {
        url : '../php/AddQuestionWithImage.php',
        type: 'POST',
        cache : false,
        data: new FormData(formulario),
        processData: false,
        contentType: false,
        type:'POST',
        success: function(data){
           $("#errores").text(data);
            ShowQuestionsAjax();
        },
        error: function(data){
            $("#errores").text(data);
        }
    });
        
	}
