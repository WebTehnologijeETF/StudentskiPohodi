

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

$veza = new PDO("mysql:dbname=spohodi;host=localhost;charset=utf8", "root", "");
     $veza->exec("set names utf8");
   /*  $rezultat = $veza->query("select id, naslov,slika, tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2 from novosti order by vrijeme asc");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }*/


/*unos korisnika*/
$korisnik = $mejl =$sifra=$vID="";


if(isset($_POST["user"]))  
$korisnik=$_POST['user'];


if(isset($_POST["mejl"]))  
$mejl=$_POST['mejl'];

if(isset($_POST["sifrica"]))  
$sifra=$_POST['sifrica'];

/*if(isset($_POST["imence"]))  
$aut=$_POST['imence'];*/
/*if (isset($_SESSION['username']))
       $aut= $_SESSION['username'];
      else $aut='Anonimac';

if(isset($_POST["ID"]))  
$vID=$_POST['ID'];
*/
$message="";
$valid=true; 
if(empty($korisnik) || empty($mejl))
{
  $message = "Sva polja su obavezna!";
//echo "<script type='text/javascript'>alert('$message');</script>";
$valid=false;
//header('Location:vijesti.php'); exit();
}


if ( (!empty($mejl) &&!filter_var($mejl, FILTER_VALIDATE_EMAIL))) {
       $message = "Neispravan email format!";
//echo "<script type='text/javascript'>alert('$message');</script>";
$valid=false;
     }

//if(!$valid) { echo "<script type='text/javascript'>alert('$message');</script>";/*header('Location:PrikaziKomentar.php?id='.$vID''); exit();*/}

if ($_SERVER["REQUEST_METHOD"]=="POST") {


if ($valid){

$sql = "DELETE FROM obicnikorisnik WHERE email ='".$mejl."'";
    // use exec() because no results are returned
    $veza->exec($sql);
print "<p class=ispis> Korisnik uspješno obrisan. </p>";
   print "<p><a href='adminSkripta.php'>Povratak</a></p>";
  

    }

else if(!$valid){
  print "<p class=ispis> Korisnik nije obrisan. Ispravite greške i pokušajte ponovo. </p>".
  "<p class=ispis> Greška: ".$message."</p>".

print "<p class=ispis><a href='adminSkripta.php'>Povratak</a></p>";
}
}


 ?>

 
 </div>
<script src="Ajax_Load_Skripta.js"></script>
<script src="skriptaValidacija.js"></script>
  <!--script src="skriptaValidacijaa.js"></script-->
   <script src="tabela_Ajax.js"></script>
   <script src="skriptaKomentari.js"></script>
  <script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="skriptaMeni.js"></script>
<script src="mapaSkripta.js"></script>
  </BODY>
</HTML>