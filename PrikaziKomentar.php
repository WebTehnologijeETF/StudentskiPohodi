

<HTML>
<BODY>


<HEAD>

<META http-equiv="Content-Type" content="text/html; charset=utf-8">
<TITLE>Studentski pohodi</TITLE>
<link rel="stylesheet" type="text/css" href="stil.css">

</HEAD>
<BODY>
  
 



  

<div id="tijelo">
<?php
$id="";
     $veza = new PDO("mysql:dbname=spohodi;host=localhost;charset=utf8", "root", "");
     $veza->exec("set names utf8");
     $rezultat = $veza->query("select id, naslov,slika, tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2 from novosti order by vrijeme asc");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }

    $EM="";
   $tekstMaile="tekst ovo ono";
$id=$_GET['id'];

    foreach ($rezultat as $vijest) {

$query = $veza->query("SELECT COUNT(*) FROM komentar WHERE novost=".$vijest['id']);
    $number_Of_Comments = $query->fetchColumn();

if($id==$vijest['id'])
{ /*
  print "<div class= vijesti>"."<img src=".$vijest['slika'].">".
"<p class=Naslov>".$vijest['naslov']."</p>"."<br>"."<br>".
"<p class =autor>".$vijest['autor']." "."<small>".date("d.m.Y. (h:i)", $vijest['vrijeme2'])."</small>"."</p>"."<br>".
"<p class=opis>". $vijest['tekst']."</p>".
"<p class=det>".$number_Of_Comments." komentara"."</p>"."<br>"."<br>";
    
     
*/
      $komentar = $veza->query("SELECT novost,tekst, autor, email, UNIX_TIMESTAMP(vrijeme) vrijeme2 FROM komentar 
                                 WHERE novost=$id Order by vrijeme asc");
foreach ($komentar as $komIspis) {
        $EM=$komIspis['email'];  
        if(empty($EM))
        {

         print "<div class= komentari>".
            "<p class=komAutor>".
             $komIspis['autor']."</a>"." kaže: "."</p>".
           "<p class=datAutor>".date("d.m.Y. (h:i)".$komIspis['vrijeme2'])."</p>".
           "<p class=mailAutor>".$komIspis['email']."<br>".
           "<p class=tekstKomentara>".$komIspis['tekst']."</p>"."<br>"."<br>"."</div>";   
        }
      else if($EM!="")
         print "<div class= komentari>".
            "<p class=komAutor>"."<a href='mailto:" . $EM . "?body=" . $tekstMaile . "'>".
             $komIspis['autor']."</a>"." kaže: "."</p>".
           "<p class=datAutor>".date("d.m.Y. (h:i)".$komIspis['vrijeme2'])."</p>".
           "<p class=mailAutor>".$komIspis['email']."<br>".
           "<p class=tekstKomentara>".$komIspis['tekst']."</p>"."<br>"."<br>"."</div>";
        $EM=$komIspis['email'];
       }

print "<a id=zatvori href=# onclick=hideKomentar(".$vijest['id'].")>"."Zatvori"."</a>"."<br>";

print "<p><span id=txtHint></span></p>"."<br>";
        }     
}




session_start();

$_SESSION['emailcic'] = $EM;

   $nameErr = $emailErr = $komErr ="";


$name = $email = $kom = $EM="";


/*validacija*/


  $valid = true;
  
  function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["imence"])) {
     $nameErr = "Ime je obavezno";
     $valid = false;

     } 
   else {
     $name = test_input($_POST["name"]);
    
     }
   
   
if (empty($_POST["komentarcic"])) {
     $komErr = "Komentar je obavezan";
   $valid = false;
   } else {
     $kom = test_input($_POST["komentarcic"]);
     
     }
   


   if (empty($_POST["email"])) {
     $emailErr = "Unesite ispravan e-mail.";
     $valid = false;
   } else {
     $email = test_input($_POST["emailcic"]);
      
     }
 }

    ?>


    <p> Ostavite komentar </p>


<form action="PosaljiKomentar.php" method="post" id="my_form">
  <table>
  <!--tr>
  <td>Ime:</td>
  <td> <input type="text" name="imence"> </td>
  <td id="greskaIme"><span class="error">* <?php echo $nameErr;?> </span> </td>
  <td id="komentarIme"> </td>
  </tr-->

<tr>
  <td>E-mail:</td>
  <td> <input type="text" name="emailcic"></td>
 <td id="greskaMail"><span class="error"> <?php echo $emailErr;?> </span> </td>
  <td id="komentarMail"> </td>
  </tr>

<tr>
  <td>Komentar:</td> 
  <td><textarea name="komentarcic" ?></textarea> </td>
  <td id="greskaKom"><span class="error">* <?php echo $komErr;?> </span> </td>
  <td id="komentarKom"> </td>
  </tr>



<input type="hidden" name="ID" value="<?php echo $id ?>">
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