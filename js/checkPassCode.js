function checkPass(){
	
    var password = document.getElementById("pass").value;
    //$('#passCheckloop').attr("src","../images/loading.gif");
   
    $.ajax({

        url: 'ClientVerifyPass.php?password='+password+'',
        beforeSend: function(){
            $('#passCheck').html('');
            $("#loaderpass").show();
           },
        success:function(datos){

            if(datos==0){
                $('#passCheck').text('La contraseña es válida');
                $("#boton").attr("disabled", false);

            }else if(datos==1){

                $('#passCheck').html(' <p style="color:red;">La contraseña es inválida</p> ');
                $("#boton").attr("disabled", true);
            }else {

                $('#passCheck').html(' <p style="color:orange;">SIN SERVICIO</p> ');
            }
        },
        complete:function(data){
            $("#loaderpass").hide();
        }
    });
}