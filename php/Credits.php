<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
  <?php 
  
        if(isset($_SESSION['tipo'])){
          if(strcmp($_SESSION['tipo'],"admin")===0){
            echo"<script> alert ('No tienes permisos para acceder a esta pagina.')";
            echo "<script language=Javascript> location.href=\"Layout.php\"; </script>";
          } 
        }
		
        ?>
  <script> alert("Para una mejor experiencia por favor active el volumen");</script>
	<audio src="../audios/Cantina.mp3" autoplay="true" loop></audio>
    <div>
	
      <h1>Autores</h1>   
	
      <h3><a href="mailto:druiz046@ikasle.ehu.eus" title="druiz046@ikasle.ehu.eus">David Ruiz Alunda</a> - Software</h3>
      <img src="https://pbs.twimg.com/profile_images/1043773987795427328/dF94CCEu.jpg" width=100>
      
      <h3><a href="mailto:ibereciartua003@ikasle.ehu.eus" title="ibereciartua003@ikasle.ehu.eus">I&ntilde;igo Bereciartua Rocha</a> - Software</h3>
      <img src="https://egela.ehu.eus/pluginfile.php/304035/user/icon/ehu/f1?rev=8116055" width=100 >      
      <br>
      <button onclick="localizar();">Mostrar ubicación</button>
      <br>
      
      
      <div id="map"> </div>
      <div id="map_img" style="width:20%; height:20%"></div>


      <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false">
	    </script>
      <script>
        function localizar(){
          var output = document.getElementById('map');
 
          if (navigator.geolocation) {
            output.innerHTML = "<p>Tu navegador soporta Geolocalizacion</p>";
          }else{
            output.innerHTML = "<p>Error, Tu navegador no soporta Geolocalizacion</p>";
          }

          function localizacion(posicion){
            var latitud = posicion.coords.latitude;
            var longitud = posicion.coords.longitude;       
            output.innerHTML ="<p>Tu Ubicación: <br> Latitud:"+latitud+"<br>Longitud:"+longitud+"</p>";
            var map = "https://maps.googleapis.com/maps/api/staticmap?center="+latitud+","+longitud+"&size=600x300&markers=color:red%7C"+latitud+","+longitud+"&key=";
            output.html("<img src='"+map+"'>")

          }
          function error(){
				  output.innerHTML = "<p>Erro al obtener su ubicación</p>";
			    }

          navigator.geolocation.getCurrentPosition(localizacion,error);
				
			}

      </script>
    </div>
   
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>