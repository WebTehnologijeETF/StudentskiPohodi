<!DOCTYPE HTML>
<HTML>
  <HEAD>
<link rel="stylesheet" type="text/css" href="stil.css">



</HEAD>

<BODY onload="initialize();">
  <?php
    $username="";
session_start();
if (isset($_SESSION['username'])) 
{ $username= $_SESSION['username'];
  print "<p> Prijavljeni ste pod korisničkim imenom:  ".$username."</p>";
  print "<p><a href='logout.php'>Odjava</a></p>";
}

else print "<p><a id=logprijava href='index.html'>LOGIN</a></p>";
?>	

  <div id="formaPrijaviPohod">
    <p id="predloziPohod">Predloži Pohod <br>
    <a href="http://goo.gl/forms/Mzk6fpwnPE" target="_blank">Otvori link</a>
    </p>
</div>

<!--div id="googleMap2">
<p>Zanima te 
<a href="https://www.google.ba/maps/@43.8937233,18.3829915,12z?hl=en">Otvori mapu</a>
</div-->
<p id="prijaviPohod">Zanima te mapa putovanja?  </p>
<button onclick="initialize();">Klikni Ovdje</button> 

<br>
<br>
<div id="googleMap" style="width:1200px;height:580px;" >
</div>
  



  
	
   <!--div id="mapaSlika"> 

 <div id="tabela">
   	<br> <br>

   
	
<table id="MapaTabela">
  <tr>
    <td>Grad</td>
    <td>Broj pohodaša</td> 
    <td>Godina</td>
  </tr>
  <tr>
  	<td>Prag</td>
    <td>1200</td> 
    <td>2015.</td>
  </tr>
    <td>Pariz</td>
    <td>1000</td> 
    <td>2014.</td>
  </tr>
  <tr>
    <td>Istanbul</td>
    <td>1200</td> 
    <td>2014.</td>
  </tr>
  <tr>
    <td>Zagreb</td>
    <td>150</td> 
    <td>2012., 2014.</td>
  </tr>
  
  <tr>
    <td>Barselona</td>
    <td>600</td> 
    <td>2014.</td>
  </tr>
  <tr>
    <td>Beč</td>
    <td>850</td> 
    <td>2013.</td>
  </tr>
  <tr>
    <td>Budimpešta</td>
    <td>900</td> 
    <td>2013.</td>
  </tr>
  
<tr>
    <td>Bobovac</td>
    <td>202</td> 
    <td>2013</td>
  </tr>
  <tr>
    <td>Rim</td>
    <td>1150</td> 
    <td>2012</td>
  </tr>
 
  <tr>
    <td>Prenj</td>
    <td>300</td> 
    <td>2012</td>
  </tr>
  <tr>
    <td>Skakavac</td>
    <td>100</td> 
    <td>2012</td>
  </tr>
</table>


 </div>
</div-->

<script src="http://maps.googleapis.com/maps/api/js"></script>

<script src="mapaSkripta.js"></script>


	</BODY>
</HTML>