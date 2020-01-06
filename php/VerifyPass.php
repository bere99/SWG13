<?php
    //incluimos la clase nusoap.php
    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');

    //creamos el objeto de tipo soap_server
    $ns="http://localhost/nusoap-0.9.5/samples";
    $server = new soap_server;
    $server->configureWSDL('VerifyPass',$ns);
    $server->wsdl->schemaTargetNamespace=$ns;
    
    //registramos la función que vamos a implementar
    $server->register('VerifyPass',
        array('pass'=>'xsd:String','ticket'=>'xsd:int'),
        array('resultado'=>'xsd:String'),
        $ns);

    //implementamos la función
    function VerifyPass($pass, $ticket){
        
        $resultado="";
        $match=false;   
            if($ticket==1010){
                if($pass==""){
                    $resultado="INVALIDA";
                    return $resultado;
                }
                $rows=file("../txt/toppasswords.txt");
                foreach($rows as $row){
                    if(strpos($row,$pass)!==false){
                        $macth=true;
                        $resultado="INVALIDA";
                        return $resultado;
                    }
                }
                $resultado="VALIDA";
                return $resultado;
            }else {
                $resultado="SIN SERVICIO";
                return $resultado;
            }
            
    }

    //llamamos al método service de la clase nusoap antes obtenemos los valores de los parámetros
    if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
    $server->service($HTTP_RAW_POST_DATA);
?> 