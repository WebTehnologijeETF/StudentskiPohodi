<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<link rel="stylesheet" type="text/css" href="stil.css">
<BODY>
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

  <div id="formaMapa">
    <p id="prijaviPohod">Prijavi Pohod</p>
   <form id="formaPohodi" method="POST"  onsubmit="return dodajProizvod(this)">
     <table id="tabelaPohod">
      <tr>
      <td> <label id="nazivLabel">Naziv-Mjesto</label></td>
       <td><input id="naziv" type="textbox" ></td>
       <td id ="greskaNaziv"></td>
       <td id="komentarNaziv"> </td>
     </tr>
     <tr>
      <td> <label id="opisLabel">Opis</label></td>
      <td><input id="opis" type="textarea" > </td>
      <td id ="greskaOpis"></td>
      <td id="komentarOpis"></td>
    </tr>

<tr>
      <td> <label id="cijenaLabel">Cijena</label></td>
      <td><input id="cijena" type="textbox" > </td>
      <td id ="greskaCijena"></td>
      <td id="komentarCijena"></td>
    </tr>    
    <tr></tr>
</table>
    
<button type="submit" class="MapaPrijava">Prijavi</button>


    
       
	
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




	</BODY>
</HTML>