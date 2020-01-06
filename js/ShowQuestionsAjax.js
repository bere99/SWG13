function ShowQuestionsAjax() {
    
    if(XMLHttpRequest){
        xhr = new XMLHttpRequest();
    }else{
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.open('GET','../php/ShowXmlQuestionsWithImage.php',true);
    xhr.send('');
    
    xhr.onreadystatechange = function(){
        
        if(xhr.readyState == 4 && xhr.status == 200){
            document.getElementById('questionsContainer').innerHTML =xhr.responseText;
        }
        
    }
}
