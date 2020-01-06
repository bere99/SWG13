function esVip(){
    var email = document.getElementById("email").value;

        $.ajax({
        url: 'ClientVerifyEnrollment.php?email='+email+'',
        timeout: 2000,
        beforeSend: function(){
            $('#vipEmail').html('');
            $("#loaderemail").show();
           },
        success:function(datos){
            if(datos==0){

                $('#vipEmail').text('El email es vip');
                if( $('#passCheck').text()=="La contraseña es válida" ){
                    $("#boton").attr("disabled", false);
                }
                vip=true;
            }
            else {
                $('#vipEmail').html('<p style="color:red;">El email NO es vip</p> ');
                $("#boton").attr("disabled", true);
            }
        },
        complete:function(data){

            $("#loaderemail").hide();
        }
    });
}