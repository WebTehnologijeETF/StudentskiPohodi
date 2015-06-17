

<META http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
$EM=$_GET['EM'];

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






$veza = new PDO("mysql:dbname=spohodi;host=localhost;charset=utf8", "root", "");
$veza->exec("set names utf8");
$sql = "UPDATE obicnikorisnik SET password ='".$nova."'WHERE email ='".$EM."'";
 //$veza->exec($sql);
  //use exec() because no results are returned
 // Prepare statement
    $veza->exec($sql);

    // execute the query

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


$to=$EM;
    $subject = 'Promjena lozinke';
   
   
$body="Vaša nova sifra je:.$nova";

    mail($to, $subject, $body, $headers);

    echo"<p class=ispis>'Vaša nova šifra je spremljena. Provjerite mail da istu očitate, ukoliko mail ne stigne u inbox molimo provjerite i JUNK folder.'</p>";
  


?>


 