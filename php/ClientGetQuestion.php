<?php
    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');

    
    if (isset($_GET['id'])){
        $id=$_GET['id'];
        $soapclient = new nusoap_client( 'https://lab0swibereciartua.000webhostapp.com/php/GetQuestionWS.php?wsdl',true);
        $resultado=array();
        $resultado = $soapclient->call('ObtenerPregunta',array('pass'=>$id) );
        $autor=$resultado['autor'];
        $enunciado=$resultado['enunciado'];
        $correcta=$resultado['correcta'];
        echo $resultado;
        
       
    }


?>

        <table>
            <tr>
                <th>Clave</th>
                <th>Autor</th>	
                <th>Enunciado</th>	
                <th>Respuesta Correcta</th>	
            </tr>
            <tr>
                <td> <?php echo $id?> </td>
                <td> <?php echo $autor?>  </td>
                <td> <?php echo $enunciado?> </td>
                <td> <?php echo $correcta?>  </td>
            </tr>
        </table>
    

