<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php

$nameErr = $emailErr = $prezimeErr = $sifraErr = $sifra2Err="";
$name = $email = $prezime = $sifra = $sifra2 ="";
$opcina=$mjesto="";




  $valid = true;
  
  function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
     $nameErr = "Name is required";
     $valid = false;
     } 
   else {
     $name = test_input($_POST["name"]);
     $valid = true;
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Samo slova i razmak su dozvoljeni"; 
     $valid = false;
     }
   }
   
if (empty($_POST["prezime"])) {
     $prezimeErr = "Prezime is required";
   $valid = false;
   } else {
     $prezime = test_input($_POST["prezime"]);
     $valid = true;
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$prezime)) {
       $prezimeErr = "Samo slova i razmak su dozvoljeni"; 
     $valid = false;

     }
   }


   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
     $valid = false;
   } else {
     $email = test_input($_POST["email"]);
     $valid=true;
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Nevalidan email format";
       $valid = false; 
     }
   }
     
   
if (empty($_POST["sifra"])) {
     $sifraErr = "Sifra je obavezna"; 
     $valid = false;
   } 
   else {
     $sifra = test_input($_POST["sifra"]);
    $valid=true;
       }
   
  
if (empty($_POST["sifra2"])) {
     $sifra2Err = "Potvdra šifre je obavezna";
     $valid = false;
   } 
   else {
     $sifra2 = test_input($_POST["sifra2"]);
    $valid=true;
     if ($sifra2!=$sifra) {
       $sifra2Err = "Neispravna šifra"; 
     $valid = false;
     }
   }
 }
 

 ?>

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
    session_start();
     $name  = $_SESSION['ime'];
$prezime =$_SESSION['prez'];
 $email= $_SESSION['mejl'] ;
  $sifra= $_SESSION['sif'];
 $sifra2 = $_SESSION['sif2'];
  $opcina = $_SESSION['opc'];
 $mjesto = $_SESSION['mjes'];
    
    ?>
  <p>Provjerite da li ste ispravno popunili kontakt formu</p>

  
<div id ="tabelaPrikaz">
  <table>
  <tr><td><?php print "Ime: "; ?></td> <td><?php print$name?></td></tr>
  <tr><td><?php print "Prezime: "; ?></td> <td><?php print$prezime?></td></tr>
  <tr><td><?php print "Email: "; ?></td> <td><?php print$email?></td></tr>
  <tr><td><?php print "opcina: "; ?></td> <td><?php print$opcina?></td></tr>
  <tr><td><?php print "Mjesto: "; ?></td> <td><?php print$mjesto?></td></tr>
  <tr><td><?php print "Sifra se ne prikazuje iz sigurnosnih razloga. "; ?></td> 
</table>
 



<p>Da li ste sigurni da želite poslati ove podatke?</p>
<form action="" method="post">
    <input type="submit" value="Siguran sam" name="button_pressed" />
  
</form>



<br> <br><br>
<p>Ukoliko želite napraviti promjene, uradite to u formi ispod:</p>
 <p><span class="error">* obavezno polje </span></p>
  <form class="forma_novi_clan" method="post" action="validacija.php" >
   <table id="tabelaNoviClan">
     <tr>
       <td> <label id="Ime1">Ime</label></td>
       <td> <input id="ime" name="name"type="text" value="<?php echo $name;?>"></td>
      
       <td id="greskaIme"><span class="error">* <?php echo $nameErr;?> </span> </td>
       <td id="komentarIme"> </td>
    <tr>
      <td><label id="Prezime1">Prezime</label></td>
 <td><input id="prezime" name="prezime" type="text" value="<?php echo $prezime;?>"></td>
       
       <td id="greskaPrezime"> <span class="error">* <?php echo $prezimeErr;?></span></td>
       <td id="komentarPrezime"> </td>
    <tr>
      <td><label id="email">E-mail</label></td>
      <td><input id="mail1" name="email"type="mail" placeholder="Email@hotmail.com" value="<?php echo $email;?>"></td>
       
       <td id="greskaMail1"> <span class="error">* <?php echo $emailErr;?> </span></td>
       <td id="komentarMail1"> </td>
    <tr>
       <td><label id="pass">Šifra</label></td>
       <td> <input id="pass1" name="sifra"type="password" value="<?php echo $sifra;?>"></td>
        
        <td id="greskapass1"> <span class="error">* <?php echo $sifraErr;?></span></td>
        <td id="komentarpass1"> </td>
     <tr>
       <td><label id="potvrdiSifru">Potvrdi šifru</label></td>
       <td> <input id="potSifru1" name="sifra2"type="password" value="<?php echo $sifra2;?>"></td>
        
        <td id="greskaPotvrdiSifru"> <span class="error">* <?php echo $sifra2Err;?></span></td>
        <td id="komentarPotvrdiSifru"> </td>
    </tr>
    </tr>
    <tr>
     <td> <label id="opcinaLabel">Općina</label></td>
     <td> <input id="opcina" type="text" name="opcina" onchange="ajax();" value="<?php echo $opcina;?>" ></td>
        <td id="greskaOpcina"></td>
        <td id="komentarOpcina"> </td>
    </tr>
   <tr>
     <td> <label id="mjestoLabel">Mjesto</label></td>
     <td> <input id="mjesto" type="textbox" name="mjesto" onchange="ajax();"  value="<?php echo $mjesto;?>"></td>
        <td id="greskaMjesto"></td>
        <td id="komentarMjesto"> </td>
    </tr>
  </table>
 <button type="submit"  name="submit" value="Save Data">Slanje</button>
 <button type="reset"  name="reset" >Reset</button>
</form>




</div>







<?php

if(isset($_POST['button_pressed']))
{
  ini_set("SMTP","webmail.etf.unsa.ba");
ini_set("smtp_port","25");
ini_set('sendmail_from','agranulo1@webmail.etf.unsa.ba');

$from= $email;

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers = "From:".$from."\r\n";
$headers .= "Reply-To:".$from."\r\n";
$headers .= "Return-Path:".$from."\r\n";
$headers .= "CC: agranulo1@etf.unsa.ba\r\n";

   
    $to      = 'agranulo1@etf.unsa.ba';
    $subject = 'Poruka sa clan-forme';
   
$body="Novi zahtjev za članstvo od:\nIme: $name\nPrezime: $prezime\nEmail: $email\nsifra: $sifra";

    mail($to, $subject, $body, $headers);

    echo"<p>'Zahvaljujemo se što ste nas kontaktirali'</p>";
}

?>


<script src="Ajax_Load_Skripta.js"></script>
<script src="skriptaValidacija.js"></script>
  <!--script src="skriptaValidacijaa.js"></script-->
   <script src="tabela_Ajax.js"></script>
   <script src="skriptaKomentari.js"></script>
  </BODY>
</HTML>