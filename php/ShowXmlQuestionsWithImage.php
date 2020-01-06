<!DOCTYPE html>
<html>
<head>

</head>
<body>
  
  <section class="main" id="s1">
    <div>
      
        
            <table class='table' border='1'>
            <thead>
            <tr>
            
            <th> Autor </th>
            <th> Enunciado </th>
            <th> Respuesta Correcta </th>
            <th> Imagen </th>
            </tr>
            </thead>

            <?php  
            $i=0;
            $xml = simplexml_load_file("../xml/Questions.xml");   
            foreach ($xml->children() as $assessmentItems) {
                echo "<tr>";
                echo "<td>"."<a href=mailto:". $xml->assessmentItem[$i]['author'] .">".$xml->assessmentItem[$i]['author']. "</td>";                
                foreach($assessmentItems->children() as $child){                                     

                    if ($child->getName()=='itemBody'){
                        echo "<td>" . $child->p ."</td>";
                    }

                    if ($child->getName()=='correctResponse'){
                        echo "<td>" . $child->value ."</td>";
                    }
                    
                    if($child->getName()=='rutaImg'){
                        echo "<td><img src='" . $child . "' width='100' heigth='100'/></td>";
                    }
                }
                $i=$i+1;
                echo "</tr>";
            }
            ?>
            </table>
        
    </div>
  </section>
</body>
</html>
