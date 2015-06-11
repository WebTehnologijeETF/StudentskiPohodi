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
"<p class=det1>"."<a <a href=# onclick=showKomentarAdmin(".$vijest['id'].")>".$number_Of_Comments." komentara"."</a>"."</p>"."<br>"."<br>";



}
print "<p><span id=txtHint></span></p>"; 

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

   <script src="skriptaKomentari.js"></script>
   </BODY>
</HTML>