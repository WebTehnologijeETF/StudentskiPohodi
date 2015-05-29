
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
$ime=$sifra=$message="";

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
        
        }
    else if (isset($_REQUEST['username'])) {
        $valid=true;
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    $query = $veza->prepare("SELECT username, password FROM korisnik WHERE username=? and password=?");
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
       }



         
   }

print "<p>".$message."</p>";



        }
  if(!$valid) {
          $poruke="Neuspješna prijava. Pokušajte ponovo.";
           echo "<script type='text/javascript'>alert('$poruke');</script>";
          header('Location:index.html'); exit();
        }

session_destroy();
         ?>    
  </body>
</html>


<p><a href=index.html>Povratak</a></p>;


<?php

 $veza = new PDO("mysql:dbname=spohodi;host=localhost;charset=utf8", "root", "");
     $veza->exec("set names utf8");
     $rezultat = $veza->query("select id, naslov,slika, tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2 from novosti order by vrijeme asc");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }

    

 


     foreach ($rezultat as $vijest) {
    $id=$vijest['id'];
    $query = $veza->query("SELECT COUNT(*) FROM komentar WHERE novost=".$vijest['id']);
    $number_Of_Comments = $query->fetchColumn();
    //print "<p>".$number_Of_Comments."</p>";


print "<div class= vijesti>"."<img src=".$vijest['slika'].">".
"<p class=Naslov>".$vijest['naslov']." br:".$vijest['id']."</p>"."<br>"."<br>".
"<p class =autor>".$vijest['autor']." "."<small>".date("d.m.Y. (h:i)", $vijest['vrijeme2'])."</small>"."</p>"."<br>".
"<p class=opis>". $vijest['tekst']."</p>".
"<p class=det1>"."<a href=PrikaziKomentarAdmin.php?id=".$vijest['id'].">".$number_Of_Comments." komentara"."</a>"."</p>"."<br>"."<br>";


}
?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<form action="dodajNovost.php" method="post" id="my_form">
 <p>Dodaj novost</p>
  <table>
  <tr>
  <td>Naslov:</td>
  <td> <input type="text" name="naslovcic"> </td>
  </tr>

<td>Slika:</td>
  <td> <input type="text" name="slicica"> </td>
  
  </tr>

<tr>
  <td>Tekst:</td> 
  <td><textarea name="tekstic" ?></textarea> </td>
  </tr>

<tr>
  <td>Autor:</td> 
  <td><textarea name="autorcic" ?></textarea> </td>
  </tr>

</table>
 <button type="submit" name="submit">Spremi</button>

</form>

<br>
<br>
<br>

<form action="" method="post" id="my_form">
 <p>Edituj novost</p>
  <table>
  <tr>
  <td>Naslov:</td>
  <td> <input type="text" name="naslovcic"> </td>
  </tr>

<td>Slika:</td>
  <td> <input type="text" name="slicica"> </td>
  
  </tr>

<tr>
  <td>Tekst:</td> 
  <td><textarea name="tekstic" ?></textarea> </td>
  </tr>

<tr>
  <td>Autor:</td> 
  <td><textarea name="autorcic" ?></textarea> </td>
  </tr>

</table>
 <button type="submit" name="submit">Spremi</button>

</form>



<br>
<br>
<br>

<form action="obrisiNovost.php" method="post" id="my_form">
 <p>Obrisi novost</p>
  <table>
  <tr>
  <td>broj novosti:</td>
  <td> <input type="text" name="IDNovosti"> </td>
  </tr>
</table>
 <button type="submit" name="submit">Spremi</button>

</form>


</div>
<script src="Ajax_Load_Skripta.js"></script>
<script src="skriptaValidacija.js"></script>
  <!--script src="skriptaValidacijaa.js"></script-->
   <script src="tabela_Ajax.js"></script>
  </BODY>
</HTML>