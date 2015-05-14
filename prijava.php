
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

 <?php
 session_start();
// define variables and set to empty values
$nameErr = $emailErr = $prezimeErr = $sifraErr = $sifra2Err="";


$name = $email = $prezime = $sifra = $sifra2 ="";
$opcina = $mjesto="";
  $valid = true;
  
  function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
     $nameErr = "duze od 3 kraktera, samo slova abecede i razmak.";
     $valid = false;

     } 
   else {
     $name = test_input($_POST["name"]);
     $valid = true;
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "duze od 3 kraktera i samo slova abecede i razmak."; 
     $valid = false;
     }
   }
   
if (empty($_POST["prezime"])) {
     $prezimeErr = "duze od 3 kraktera, samo slova abecede i razmak.";
   $valid = false;
   } else {
     $prezime = test_input($_POST["prezime"]);
     $valid = true;
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$prezime)) {
       $prezimeErr = "Sduze od 3 kraktera, samo slova abecede i razmak."; 
     $valid = false;

     }
   }


   if (empty($_POST["email"])) {
     $emailErr = "Unesite ispravan e-mail.";
     $valid = false;
   } else {
     $email = test_input($_POST["email"]);
     $valid=true;
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Unesite ispravan e-mail.";
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
if(isset($_POST["mjesto"]))
    $mjesto = test_input($_POST["mjesto"]);
  if(isset($_POST["opcina"]))
    $opcina = test_input($_POST["opcina"]);

$_SESSION['ime'] = $name;
$_SESSION['prez'] = $prezime;
$_SESSION['mejl'] = $email;
$_SESSION['sif'] = $sifra;
$_SESSION['sif2'] = $sifra2;
$_SESSION['opc'] = $opcina;
$_SESSION['mjes'] = $mjesto;

 }
   
if($valid) {header('Location:tacnaValidacija.php'); exit();}
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
        <li><a href="#1" id="pocetna" onclick="stranicaLOAD_PHP('vijesti.html');">Početna</a></li>
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

  <div id="forma1">
   <form class="formaPrijava">
  		<p id="prijaviSe">Prijavi se</p>
     <table id="tabelaPrijaviSe">
      <tr>
		   <td><input id="mail" type="email"  placeholder="Email@hotmail.com"></td>
       <td id ="greskaMail"></td>
       <td id="komentarMail"> </td>
     </tr>
     <tr>
      <td><input id="password"type="password" placeholder="Password"> </td>
      <td id ="greskaSifra"></td>
      <td id="komentarSifra"></td>
    </tr>
    <tr>
      <td> <input id="remember" type="checkbox"> Remember me</td>
    </tr>
</table>
		<button type="submit" class="signIn">Prijava</button>
       
</div>
</form>



<div id="forma2">
 <p id="noviClan">Učlani se</p>

    <p><span class="error">* obavezno polje </span></p>
  <form class="forma_novi_clan" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
	 <table id="tabelaNoviClan">
     <tr>
       <td> <label id="Ime1">Ime</label></td>
       <td> <input id="ime" name="name"type="text" value="<?php if (isset($_REQUEST['name'])) print htmlspecialchars($_REQUEST['name']); ?>"><br></td>
      
       <td id="greskaIme"><span class="error">* <?php echo $nameErr;?> </span> </td>
       <td id="komentarIme"> </td>
    <tr>
      <td><label id="Prezime1">Prezime</label></td>
      <td><input id="prezime" name="prezime" type="text" value="<?php if (isset($_REQUEST['prezime'])) print htmlspecialchars($_REQUEST['prezime']); ?>"><br></td>
       
       <td id="greskaPrezime"> <span class="error">* <?php echo $prezimeErr;?></span></td>
       <td id="komentarPrezime"> </td>
    <tr>
      <td><label id="email">E-mail</label></td>
		  <td><input id="mail1" name="email"type="mail" placeholder="Email@hotmail.com" value="<?php if (isset($_REQUEST['email'])) print htmlspecialchars($_REQUEST['email']); ?>"><br></td>
       
       <td id="greskaMail1"> <span class="error">* <?php echo $emailErr;?> </span></td>
       <td id="komentarMail1"> </td>
		<tr>
       <td><label id="pass">Šifra</label></td>
       <td>	<input id="pass1" name="sifra"type="password"value="<?php if (isset($_REQUEST['sifra'])) print htmlspecialchars($_REQUEST['sifra']); ?>"><br></td>
        
        <td id="greskapass1"> <span class="error">* <?php echo $sifraErr;?></span></td>
        <td id="komentarpass1"> </td>
     <tr>
       <td><label id="potvrdiSifru">Potvrdi šifru</label></td>
       <td> <input id="potSifru1" name="sifra2"type="password" value="<?php if (isset($_REQUEST['sifra2'])) print htmlspecialchars($_REQUEST['sifra2']); ?>"><br></td>
        
        <td id="greskaPotvrdiSifru"> <span class="error">* <?php echo $sifra2Err;?></span></td>
        <td id="komentarPotvrdiSifru"> </td>
    </tr>
    </tr>
    <tr>
     <td> <label id="opcinaLabel">Općina</label></td>
     <td> <input id="opcina" type="text" name="opcina" onchange="ajax();" value="<?php if (isset($_REQUEST['opcina'])) print htmlspecialchars($_REQUEST['opcina']); ?>"><br></td>
        <td id="greskaOpcina"></td>
        <td id="komentarOpcina"> </td>
    </tr>
   <tr>
     <td> <label id="mjestoLabel">Mjesto</label></td>
     <td> <input id="mjesto" type="text" name="mjesto" onchange="ajax();" value="<?php if (isset($_REQUEST['opcina'])) print htmlspecialchars($_REQUEST['opcina']); ?>"><br></td>
        <td id="greskaMjesto"></td>
        <td id="komentarMjesto"> </td>
    </tr>
  </table>
 <button type="submit" class="submit" name="submit" value="Save Data">Spremi</button>
</form>
</div>

	
</div>
<script src="Ajax_Load_Skripta.js"></script>
<script src="skriptaValidacija.js"></script>
 <!--script type="skriptaValidacijaa.js"></script-->
   <script src="tabela_Ajax.js"></script>
  </BODY>
</HTML>