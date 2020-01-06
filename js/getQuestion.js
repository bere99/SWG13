function getQuestion(){
            
    var id = document.getElementById("idQ").value;

    $.ajax({
        url: 'ClientGetQuestion.php?id='+id+'',
        success:function($datos){
            alert("DATOS->");
            alert($datos);
            $("#questionResult").html($datos);
        }
    });
}