<?php
    //incluimos la clase nusoap.php
    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');

    //creamos el objeto de tipo soap_server
    $ns="http://localhost/nusoap-0.9.5/samples";
    $server = new soap_server;
    $server->configureWSDL('ObtenerPregunta',$ns);
    $server->wsdl->schemaTargetNamespace=$ns;
    
    
    

        //registramos el dato complejo para la respuesta
        $server->wsdl->addComplexType(  'datos_pregunta', 
        'complexType', 
        'struct', 
        'all', 
        '',
        array('autor'   => array('name' => 'autor','type' => 'xsd:string'),
              'enunciado'    => array('name' => 'enunciado','type' => 'xsd:string'),
              'correcta'  => array('name' => 'correcta','type' => 'xsd:string'))
        );
        
        //registramos la función que vamos a implementar
        $server->register('ObtenerPregunta',
            array('id'=>'xsd:int'),
            array('resultado'=>'xsd:string'),
            $ns);







    //implementamos la función
    function ObtenerPregunta($id){
        $server="localhost";
		$user="id11248270_bereruiz";
		$pass="ibiricu";
		$basededatos="id11248270_sw13";

        

        $mysqli=mysqli_connect($server,$user,$pass,$basededatos);
	  	if(!$mysqli){
			die("Fallo al establecer conexiÃ³n" .mysqli_connect_error());
		}
		
		$consulta= "SELECT autor,enunciado,correcta FROM preguntas WHERE ID='$id'";
		$query=mysqli_query($mysqli, $consulta);
        $cont=  mysqli_num_rows($query);
        if($cont==0){
            $resultado=array('autor'=>"", 'enunciado'=>"", 'correcta'=>"");
            return $resultado;
        }
        
        
        $queryResul=mysql_fetch_array($query);
        $resultado=array('autor'=>$queryResul['email'], 'enunciado'=>$queryResul['enunciado'], 'correcta'=>$queryResul['correcta'] );
        return $resultado;
    
    }
        

    //llamamos al método service de la clase nusoap antes obtenemos los valores de los parámetros
    if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
    $server->service($HTTP_RAW_POST_DATA);
?> 