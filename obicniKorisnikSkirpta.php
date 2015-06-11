
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
$ime=$sifra=$message="";
$valid=true;
session_start();
 $veza = new PDO("mysql:dbname=spohodi;host=localhost;charset=utf8", "root", "");
$veza->exec("set names utf8");
/* $rezultat = $veza->query("select id, naslov,slika, tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2 from novosti order by vrijeme asc");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }*/

    if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
        print "<p> Već ste prijavljeni pod korisničkim imenom:  ".$username."</p>";
         print "<p><a href='logout.php'>Odjava</a></p>";
        
        }
    else if (isset($_REQUEST['username'])) {
        $valid=true;
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    $query = $veza->prepare("SELECT username, password FROM obicnikorisnik WHERE username=? and password=?");
    $query->execute(array($username,$password));
 
$postojiLI=$query->rowCount();

if(empty($postojiLI)){

 $message="Neuspješna prijava. Pokušajte ponovo.";
 $valid=false;

}

   foreach($query as $value) {
  $ime=$value['username'];
  $sifra=$value['password'];


       if($ime==$username && $sifra==$password){
         $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
     $message= "Dobro došao, ".$ime;
     print "<p><a href='logout.php'>Odjava</a></p>";
 // 
       }



         
   }

print "<p>".$message."</p>";

 

        }
  if(!$valid) {
          $poruke="Neuspješna prijava. Pokušajte ponovo.";
           echo "<script type='text/javascript'>alert('$poruke');</script>";
           print"<p><a href='index.html'>Povratak</a></p>";
       //   header('Location:index.html'); exit();
        }

//session_destroy();
         ?>    



  </body>
</html>







</div>
<script src="Ajax_Load_Skripta.js"></script>
<script src="skriptaValidacija.js"></script>
  <!--script src="skriptaValidacijaa.js"></script-->
   <script src="tabela_Ajax.js"></script>

   <script src="skriptaKomentari.js"></script>
  </BODY>
</HTML>