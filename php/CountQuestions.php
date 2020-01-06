<?php
    session_start();
    
    $questions=0;
    $questionsAuthor=0;
    $xml = simplexml_load_file('../xml/Questions.xml') or die("Error: No se ha podido cargar el fichero 'Questions.xml' ");
    foreach ($xml as $assesmentItem) {
        ++$questions;
        if($assesmentItem['author']==$_SESSION['email']){
            ++$questionsAuthor;
        }
    }
    echo($questions);
    echo("|");
    echo($questionsAuthor);
?>