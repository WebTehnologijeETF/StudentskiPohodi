

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
        <li><a href="#1" id="pocetna" onclick="stranicaLOAD('vijestiAdmin.php');">Početna</a></li>
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



$username="";
session_start();
if (isset($_SESSION['username'])) 
{ $username= $_SESSION['username'];
  print "<p> Prijavljeni ste pod korisničkim imenom:  ".$username."</p>";
  print "<p><a href='logout.php'>Odjava</a></p>";
}

else print "<p><a id=logprijava href='index.html'>LOGIN</a></p>";


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


if(isset($_POST["IDNovosti"]))  
$nID=$_POST['IDNovosti'];



$message="";
$valid=true;

if(empty($nID))
{
  $message = "ID novosti je obavezan!";
//echo "<script type='text/javascript'>alert('$message');</script>";
$valid=false;
//header('Location:vijesti.php'); exit();
}

//if(!$valid) { echo "<script type='text/javascript'>alert('$message');</script>";/*header('Location:PrikaziKomentar.php?id='.$vID''); exit();*/}

if ($_SERVER["REQUEST_METHOD"]=="POST") {


if ($valid){

$sql = "DELETE FROM novosti
WHERE id = $nID";
    // use exec() because no results are returned
    $veza->exec($sql);
print "<p class=ispis> Vaša novost je usješno obrisana. </p>";
  

    }

else if(!$valid){
	print "<p class=ispis> Vaša novost nije obrisana. Ispravite greške i pokušajte ponovo. </p>".
	"<p class=ispis> Greška: ".$message."</p>".
"<p class=ispis>"."<a href=adminSkripta.php".">"."Vrati se na novost"."</a>";}


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