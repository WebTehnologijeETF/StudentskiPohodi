
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
        <li><a href="#1" id="pocetna" onclick="stranicaLOAD_PHP('vijestiAdmin.php');">Početna</a></li>
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
$ime=$sifra=$message="";
$valid=true;

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
        print "<p><a href='logout.php'>Odjava</a></p>";
        
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
     print "<p><a href='logout.php'>Odjava</a></p>";
 // 
       }



         
   }

print "<p>".$message."</p>";

 

        }
  if(!$valid) {
          $poruke="Neuspješna prijava. Pokušajte ponovo.";
           echo "<script type='text/javascript'>alert('$poruke');</script>";
           print"<p><a href='index.html'>Povratak</a></p>";
       //   header('Location:index.html'); exit();
        }

//session_destroy();
         ?>   


<p> Dodaj korisnika </p>


<form action="dodajKorisnika.php" method="post" id="dodajKorisnikaForma">
  <table>
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
  <td>Sifra:</td> 
  <td><textarea name="sifrica" ?></textarea> </td>
  <!--td id="greskaKom"><span class="error">* <?php echo $komErr;?> </span> </td-->
  <td id="komentarSifra"> </td>
  </tr>


</table>
 <button type="submit" name="submit">Spremi</button>

</form>
<p> Obrisi korisnika </p>


<form action="obrisiKorisnika.php" method="post" id="obrisiKorisnikaForma">
  <table>
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
</div>
<script src="Ajax_Load_Skripta.js"></script>
<script src="skriptaValidacija.js"></script>
  <!--script src="skriptaValidacijaa.js"></script-->
   <script src="tabela_Ajax.js"></script>

   <script src="skriptaKomentari.js"></script>
  </BODY>
</HTML>