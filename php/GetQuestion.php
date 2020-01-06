<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script language="JavaScript" type="text/javascript" src="../js/jquery.min.js"></script>
  <script language="JavaScript" type="text/javascript" src="../js/getQuestion.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  
  
  
  
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

    
    <form action="" method="get">
        Id de la pregunta:<input type="text" id="idQ">
        <input type="button" value="Enviar" onclick="getQuestion();">
	</form> 
    <div id="questionResult">

    </div>


    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>