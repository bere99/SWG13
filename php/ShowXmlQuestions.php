<!DOCTYPE html>
<html>
<head>

</head>
<body>
  
  <section class="main" id="s1">
    <div>
      
        <?php
            echo "<table class='table' border='1'>";
            echo '<thead>';
            echo"<tr>";
            echo"<th> Autor </th>";
            echo"<th> Enunciado </th>";
            echo"<th> Respuesta Correcta </th>";
            echo"</tr>";
            echo '</thead>';

 
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
                }
                $i=$i+1;
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </div>
  </section>
</body>
</html>
