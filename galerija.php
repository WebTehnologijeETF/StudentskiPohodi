<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<BODY>
	
	

   <table id="galerijaTabela">
   	
		<?php


    $username="";
session_start();
if (isset($_SESSION['username'])) 
{ $username= $_SESSION['username'];
  print "<p> Prijavljeni ste pod korisničkim imenom:  ".$username."</p>";
  print "<p><a href='logout.php'>Odjava</a></p>";
}

else print "<p><a id=logprijava href='index.html'>LOGIN</a></p>";
?>


	</BODY>
</HTML>