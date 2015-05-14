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