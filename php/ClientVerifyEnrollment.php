<?php
    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');

    $email=$_GET['email'];

    if (isset($email)){
        $soapclient = new nusoap_client( 'http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl', true);       
        $result = $soapclient->call('comprobar',array('x'=>$email));
        
        if($result=='SI'){
            echo"0";
        }else{
            echo"-1";
        }
    }
?>