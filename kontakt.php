<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<BODY>
	
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

  <div id="kont">
  		<p> <div id="zaBold"> Kontakt</div><br>
  			033 275 987<br>
  			studentski.pohodi@live.com<br>
  			Trg oslobođenja - Alija Izetbegović 1<br>
71000 Sarajevo<br>
Bosna i Hercegovina<br>
<br><br><br>
  		</p>
  	</div>
  	</div>
</p>
 
 <div id="stablo">

     <UL id="lista1" style.display="none" >
<LI  onclick="prikazi(this)">[+]Vodiči
<ul id="listaVodica">
<LI>Ammar Nurkovic 061/860-232</LI>
<LI>Ibrahim Halilović 061/513-609</LI>
<LI>Emir Ašćerić 062/455-488</LI>
<LI>Adnan Uzunović 061/530-620</LI>
<LI>Mirza Kupusović 061/819-680</LI>
<LI>Zikret Smajlović 061/963-154</LI>
<LI>Igor Porobija 061/064-817</LI>
<LI>Adnan Hasanefendić 061/311-087</LI>
<LI>Alem Hasanović 061/413-414</LI>
<LI>Bakir Kalajdžić 061/968-835</LI>
<LI>Alija Nurković 062/878-667</LI>
<LI>Ahmed Nurković 061/794-537</LI>
<LI>Bekir Rovčanin 061/935-155</LI>
<LI>Mirza Mušanović 061/532-256</LI>
</ul>

</LI>
</UL>
  
</div>
<p id="partneri">Naši partneri:</p>
<ul class="moja_lista">
	<li> <a href="http://www.centrotrans.com/">http://www.centrotrans.com/</a></li>
	<li><a href="http://www.centrotours.ba/">http://www.centrotours.ba/</a></li>
	<li><a href="http://spus.ba/">http://spus.ba/</a></li>
	<li><a href="http://tvsa.ba"/>http://tvsa.ba/</a></li>
	<li><a href="http://www.afotografija.net/">http://www.afotografija.net/</a></li>
	</ul>
<br><br><br><br>



 <script src="skriptaMeni.js"> </script>
 <script src="skriptaKomentari.js"></script>
	</BODY>
</HTML>