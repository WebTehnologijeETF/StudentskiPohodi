
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
<div id ="tabelaPrikaz">

<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
  <table>
  <tr>
    <td>Unesite e-mail:</td>
  <td><input id="mail" name="eposta"  type="email" placeholder="email@example.com" ></td>
</tr>
<tr> 
  <td>Unesite username:</td>
  <td> <input  name="korIme"  type="text" ></td>
</tr>  
</table>
<p>Da li ste sigurni da želite poslati ove podatke? <br> </p>
<form action="" method="post">
    <input type="submit" value="Posalji" name="button_pressed" />
    
</form>



<?php

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
$tekstMaile=$nova;

$tekstMaile=$nova;
if (isset($_POST["korIme"])) 
  $korIme=$_POST['korIme'];



if(isset($_POST['button_pressed']))
{

//Update sifre u bazi
$veza = new PDO("mysql:dbname=spohodi;host=localhost;charset=utf8", "root", "");
$veza->exec("set names utf8");

 


$sql = "UPDATE korisnik SET password = $nova WHERE username = $korIme" ;
 //$veza->exec($sql);
  //use exec() because no results are returned
 // Prepare statement
    $stmt = $veza->prepare($sql);

    // execute the query
  $stmt->execute();


//slanje maila


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
$EM=$to;
    $subject = 'Promjena lozinke';
   
   
$body="Vaša nova sifra je:.$nova";

    mail($to, $subject, $body, $headers);

    echo"<p>'Zahvaljujemo se što ste nas kontaktirali'</p>";


}
$a="Posalji";
print 
            "<p>slanje maila funkcijom mailto:"."<a href='mailto:" . $EM . "?body=" . $tekstMaile . "'>".
             $a."</a>"."</p>";



?>


 </div>
<script src="Ajax_Load_Skripta.js"></script>
<script src="skriptaValidacija.js"></script>
  <!--script src="skriptaValidacijaa.js"></script-->
   <script src="tabela_Ajax.js"></script>
  </BODY>
</HTML>