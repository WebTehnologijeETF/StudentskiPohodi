<HTML>
<BODY>


<HEAD>

<META http-equiv="Content-Type" content="text/html; charset=utf-8">
<TITLE>Studentski pohodi</TITLE>
<link rel="stylesheet" type="text/css" href="stil.css">

</HEAD>
<BODY>
  



<div id="tijelo">
<!--p><a href='logout.php'>Odjava</a></p-->

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
print "<p><span id=txtHint></span></p>"; 

?>

<br>
<br>
<br>


<p class="ostaviKom">Dodaj novost</p>
<form action="dodajNovost.php" method="post" id="my_formDodajNovost">
 
  <table>
  <br>
  <br>
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
<p class="ostaviKom">Obriši novost</p>
<form action="obrisiNovost.php" method="post" id="my_formObrisiNovost">
 
  <table>
  <br>
  <br>
  <tr>
  <td>broj novosti:</td>
  <td> <input type="text" name="IDNovosti"> </td>
  </tr>
</table>
 <button type="submit" name="submit">Spremi</button>

</form>


</div>





<p class="ostaviKom"> Dodaj korisnika </p>


<form action="dodajKorisnika.php" method="post" id="dodajKorisnikaForma">
  <table>
  
  <br>
  <br>
  <tr>
  <td>Username:</td>
  <td> <input type="text" name="user"> </td>
  <!--td id="greskaIme"><span class="error">* <?php echo $nameErr;?> </span> </td-->
  <td id="komentarIme"> </td>
  </tr>

<tr>
  <td>E-mail:</td>
  <td> <input type="text" name="mejl"></td>
 <!--td id="greskaMail"><span class="error"> <?php echo $emailErr;?> </span> </td-->
  <td id="komentarMail"> </td>
  </tr>

<tr>
  <td>Šifra:</td> 
  <td><textarea name="sifrica" ?></textarea> </td>
  <!--td id="greskaKom"><span class="error">* <?php echo $komErr;?> </span> </td-->
  <td id="komentarSifra"> </td>
  </tr>


</table>
 <button type="submit" name="submit">Spremi</button>

</form>



<p class="ostaviKom"> Obriši korisnika </p>


<form action="obrisiKorisnika.php" method="post" id="obrisiKorisnikaForma">
  <table>
  <br>
  <br>
  <tr>
  <td>Username:</td>
  <td> <input type="text" name="user"> </td>
  <!--td id="greskaIme"><span class="error">* <?php echo $nameErr;?> </span> </td-->
  <td id="komentarIme"> </td>
  </tr>

<tr>
  <td>E-mail:</td>
  <td> <input type="text" name="mejl"></td>
 <!--td id="greskaMail"><span class="error"> <?php echo $emailErr;?> </span> </td-->
  <td id="komentarMail"> </td>
  </tr>


  <td id="komentarSifra"> </td>
  </tr>


<!--input type="hidden" name="user" value="<?php echo $korisnik ?>">
<input type="hidden" name="sifrica" value="<?php echo $sifra ?>">
<input type="hidden" name="mejl" value="<?php echo $mejl ?>"-->
</table>
 <button type="submit" name="submit">Spremi</button>

</form>



<script src="Ajax_Load_Skripta.js"></script>
<script src="skriptaValidacija.js"></script>
  <!--script src="skriptaValidacijaa.js"></script-->
   <script src="tabela_Ajax.js"></script>
<script src="skriptaMeni.js"></script>
   <script src="skriptaKomentari.js"></script>
   <script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="skriptaMeni.js"></script>
<script src="mapaSkripta.js"></script>
   </BODY>
</HTML>