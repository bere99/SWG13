<?php
    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');

    $password=$_GET['password'];
    $ticket=1010;
    if (isset($password)){
        $soapclient = new nusoap_client( 'https://lab0swibereciartua.000webhostapp.com/php/VerifyPass.php?wsdl',true);
        
        $resultado = $soapclient->call('VerifyPass',array('pass'=>$password,'ticket'=>$ticket) );
        
        if($resultado=="VALIDA"){
            echo "0";
        }else if($resultado=="INVALIDA"){
            echo "1";
        }else{
            echo "-1";
        }
    }
?>