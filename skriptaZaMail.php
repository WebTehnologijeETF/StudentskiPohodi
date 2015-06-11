
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
<div id ="tabelaPrikaz">

<form id="zaboravljenpassforma" onclick="forgotpass();" method="post">
  <table>
  <tr>
    <td>Unesite e-mail:</td>
  <td><input id="eposta" name="eposta"  type="email" placeholder="email@example.com" ></td>
</tr>

</table>
<p>Da li ste sigurni da želite poslati ove podatke? <br> </p>
<form action="" method="post">
    <input type="submit" value="Posalji" onclick="zaboravljenpass();" name="button_pressed" />
    <p id ="status"></p>
</form>



<?php

session_start();
 $veza = new PDO("mysql:dbname=spohodi;host=localhost;charset=utf8", "root", "");
$veza->exec("set names utf8");
$body="";
$korIme=$to=$EM="";
//if (isset($_POST["korIme"])) $korIme=$_POST['korIme'];
//if (isset($_POST["eposta"])) $to=$_POST['eposta'];

function generateRandomPassword() {
  //Initialize the random password
  $password = '';

  //Initialize a random desired length
  $desired_length = rand(8, 12);

  for($length = 0; $length < $desired_length; $length++) {
    //Append a random ASCII character (including symbols)
    $password .= chr(rand(32, 126));
  }

  return $password;
}

$nova=generateRandomPassword();

//$tekstMaile=$nova;

//$tekstMaile=$nova;

if (isset($_POST["korIme"])) 
  $korIme=$_POST['korIme'];

if (isset($_POST["eposta"])) 
  $EM=$_POST['eposta'];

if(isset($_POST['button_pressed']))
{
/*
//Update sifre u bazi
$veza = new PDO("mysql:dbname=spohodi;host=localhost;charset=utf8", "root", "");
$veza->exec("set names utf8");




$sql = "UPDATE obicnikorisnik SET password ='".$nova."'WHERE email ='".$EM."'";
 //$veza->exec($sql);
  //use exec() because no results are returned
 // Prepare statement
    $veza->exec($sql);
*/
    // execute the query

//slanje maila
$valid = true;


  ini_set("SMTP","webmail.etf.unsa.ba");
ini_set("smtp_port","25");
ini_set('sendmail_from','agranulo1@webmail.etf.unsa.ba');

$from= "spohodi@live.com";


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers = "From:".$from."\r\n";
$headers .= "Reply-To:".$from."\r\n";
$headers .= "Return-Path:".$from."\r\n";
$headers .= "CC: agranulo1@etf.unsa.ba\r\n";

   // ovdje bi trebao ici mail koji je unesen

  if (isset($_POST["eposta"])) $to=$_POST['eposta'];
   // $to      = 'agranulo1@etf.unsa.ba';
  //
if(empty($to)){ $valid=false; $message="Unesite email.";}
$EM=$to;

$provjera=false;
    $subject = 'Promjena lozinke';
 
   $kor = $veza->query("SELECT email FROM obicnikorisnik");
    
foreach ($kor as $korisnik) {

if($to==$korisnik['email']) $provjera=true;


}
$message2="";

if(!$provjera){ $message2="Mail nije pronadjen u nasoj bazi. Unesite tačan email.";}
   
$body=" Ovo je automatizirana poruka stranice. Ukoliko niste tražili novu lozinku ignorirajte ovu poruku.
Ukoliko jeste klikom na sljedeći link to potvrdite.<a href=http://localhost/sp5/skriptaZaMail2.php?EM=$EM.>";

if($valid && $provjera)
{
    mail($to, $subject, $body, $headers);

    echo"<p>'Zahvaljujemo se što ste nas kontaktirali'</p>";
}

else if(!$valid)
{
  print $message;
 
}
else if(!$provjera)
{
  print $message2;
 
}
}

$a="Posalji";

$tekstMaile=" <p>Ovo je automatizirana poruka stranice. Ukoliko niste tražili novu lozinku ignorirajte ovu poruku.</p>
<p>Ukoliko jeste klikom na sljedeći link to potvrdite.<a href=http://localhost/sp5/skriptaZaMail2.php?EM=$EM.>
Kliknite ovdje da potvrdite</a>.";
print 
            "<p>slanje maila funkcijom mailto:"."<a href='mailto:" . $EM . "?body=" . $tekstMaile . "'>".
             $a."</a>"."</p>";


?>


<input type="hidden" name="EM" value="<?php echo $EM ?>">

<input type="hidden" name="nova" id="nova" value="<?php echo $nova ?>">
<input type="hidden"  id="body" name="body"  value="<?php echo $body ?>">


 </div>
<script src="Ajax_Load_Skripta.js"></script>
<script src="skriptaValidacija.js"></script>
  <!--script src="skriptaValidacijaa.js"></script-->
   <script src="tabela_Ajax.js"></script>
   <script src="skriptaKomentari.js"></script>
  </BODY>
</HTML>