

<HTML>
<BODY>


<HEAD>

<META http-equiv="Content-Type" content="text/html; charset=utf-8">
<TITLE>Studentski pohodi</TITLE>
<link rel="stylesheet" type="text/css" href="stil.css">

</HEAD>
<BODY>
  
  <h1>
     <div id="logo"></div>
     <div id="tekst">Studentski pohodi</div>
  </h1>


<div id="meni">
  <ul>
        <li><a href="#1" id="pocetna" onclick="stranicaLOAD_PHP('vijestiAdmin.php');">Početna</a></li>
        <li><a href="#2" id="vodic" onclick="stranicaLOAD('vodic.php');">Vodič za pohodaše</a></li>
        <li><a href="#3" id="mapa" onclick="stranicaLOAD('mapa.php');">Mapa</a></li>
        <li><a href="#4" id="galerija" onclick="stranicaLOAD('galerija.php');">Galerija</a></li>
        <li><a href="#5" id="kontakt" onclick="stranicaLOAD('kontakt.php');">Kontakt</a></li>
        <li><a href="#6" id="prijava" onclick="stranicaLOAD('prijava.html');">Prijava</a></li>
    
    

    </ul></div>
  <div id ="nebo"></div>
  <div id="twitter"></div>
  <div id="dno"></div>
  <div id="face"></div>


<div id="tijelo">
	<?php
$id="";
     $veza = new PDO("mysql:dbname=spohodi;host=localhost;charset=utf8", "root", "");
     $veza->exec("set names utf8");
     $rezultat = $veza->query("select id, naslov,slika, tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2 from novosti order by vrijeme asc");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }


/*unos komentara*/
$tkst = $aut =$nslv=$slk="";


if(isset($_POST["naslovcic"]))  
$nslv=$_POST['naslovcic'];


if(isset($_POST["slicica"]))  
$slk=$_POST['slicica'];

if(isset($_POST["tekstic"]))  
$tkst=$_POST['tekstic'];

if(isset($_POST["autorcic"]))  
$aut=$_POST['autorcic'];

$message="";
$valid=true; 
if(empty($tkst) || empty($aut)|| empty($nslv) || empty($slk))
{
	$message = "Autor,tekst i naslov su obavezni!";
//echo "<script type='text/javascript'>alert('$message');</script>";
$valid=false;
//header('Location:vijesti.php'); exit();
}




//if(!$valid) { echo "<script type='text/javascript'>alert('$message');</script>";/*header('Location:PrikaziKomentar.php?id='.$vID''); exit();*/}

if ($_SERVER["REQUEST_METHOD"]=="POST") {


if ($valid){

$sql = "INSERT INTO novosti (id,naslov,slika,tekst,autor,vrijeme)
    VALUES ( '','$nslv','$slk','$tkst','$aut',NOW())";
    // use exec() because no results are returned
    $veza->exec($sql);
print "<p class=ispis> Vaša novost je usješno spremljena. </p>";
  

    }

else if(!$valid){
	print "<p class=ispis> Vaša novost nije spremljena. Ispravite greške i pokušajte ponovo. </p>".
	"<p class=ispis> Greška: ".$message."</p>"/
"<p class=ispis>"."<a href=PrikaziKomentarAdmin.php?id=".$vID.">"."Vrati se na novost"."</a>";}


}



 ?>




 </div>
<script src="Ajax_Load_Skripta.js"></script>
<script src="skriptaValidacija.js"></script>
  <!--script src="skriptaValidacijaa.js"></script-->
   <script src="tabela_Ajax.js"></script>
   <script src="skriptaKomentari.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js"></script>

<script src="mapaSkripta.js"></script>
<script src="skriptaMeni.js"></script>

  </BODY>
</HTML>