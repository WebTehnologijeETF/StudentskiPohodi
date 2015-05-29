

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
        <li><a href="#1" id="pocetna" onclick="stranicaLOAD_PHP('vijesti.php');">Početna</a></li>
        <li><a href="#2" id="vodic" onclick="stranicaLOAD_PHP('vodic.html');">Vodič za pohodaše</a></li>
        <li><a href="#3" id="mapa" onclick="stranicaLOAD_PHP('mapa.html');">Mapa</a></li>
        <li><a href="#4" id="galerija" onclick="stranicaLOAD_PHP('galerija.html');">Galerija</a></li>
        <li><a href="#5" id="kontakt" onclick="stranicaLOAD_PHP('kontakt.html');">Kontakt</a></li>
        <li><a href="#6" id="prijava" onclick="stranicaLOAD_PHP('prijava.html');">Prijava</a></li>
    
    

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
$nID ="";


if(isset($_POST["IDKomentara"]))  
$nID=$_POST['IDKomentara'];
if(isset($_POST["ID"]))  
$vID=$_POST['ID'];

$message="";
$valid=true;

if(empty($nID))
{
  $message = "ID komentara je obavezan!";
//echo "<script type='text/javascript'>alert('$message');</script>";
$valid=false;
//header('Location:vijesti.php'); exit();
}

//if(!$valid) { echo "<script type='text/javascript'>alert('$message');</script>";/*header('Location:PrikaziKomentar.php?id='.$vID''); exit();*/}

if ($_SERVER["REQUEST_METHOD"]=="POST") {


if ($valid){

$sql = "DELETE FROM komentar
WHERE id = $nID";
    // use exec() because no results are returned
    $veza->exec($sql);
print "<p> Komentar je usješno obrisan. </p>";
  

    }

else if(!$valid){
	print "<p class=ispis> Vaš komentar nije obrisan. Ispravite greške i pokušajte ponovo. </p>".
	"<p class=greska> Greška: ".$message."</p>".
"<p class=preusmjerenje>"."<a href=PrikaziKomentarAdmin.php?id=".$vID.">"."Vrati se na novost"."</a>";}


}



 ?>




 </div>
<script src="Ajax_Load_Skripta.js"></script>
<script src="skriptaValidacija.js"></script>
  <!--script src="skriptaValidacijaa.js"></script-->
   <script src="tabela_Ajax.js"></script>
  </BODY>
</HTML>