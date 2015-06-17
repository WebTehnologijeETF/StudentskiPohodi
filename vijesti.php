
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="stil.css">

    <title>Studentski pohodi</title>
  </head>
  <body>
    
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
"<p class=Naslov>".$vijest['naslov']."</p>"."<br>"."<br>".
"<p class =autor>".$vijest['autor']." "."<small>".date("d.m.Y. (h:i)", $vijest['vrijeme2'])."</small>"."</p>"."<br>".
"<p class=opis>". $vijest['tekst']."</p>".
"<p class=det1>"."<a href=PrikaziKomentar.php?id=".$vijest['id'].">".$number_Of_Comments." komentara"."</a>"."</p>"."<br>"."<br>";
 



}

print "<p><span id=txtHint></span></p>"; 


    ?>

    <script src="skriptaKomentari.js"></script>
  <script src="http://maps.googleapis.com/maps/api/js"></script>

<script src="mapaSkripta.js"></script>
<script src="skriptaMeni.js"></script>
  </body>
</html>

	
