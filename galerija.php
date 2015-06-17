<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<BODY onload="javascript:preloadThumbnails()">
	
	

   <table id="galerijaTabela">
   	
		<?php


    $username="";
session_start();
if (isset($_SESSION['username'])) 
{ $username= $_SESSION['username'];
  print "<p> Prijavljeni ste pod korisničkim imenom:  ".$username."</p>";
  print "<p><a href='logout.php'>Odjava</a></p>";
}

else print "<p><a id=logprijava href='index.html'>LOGIN</a>";
?>



<table border="0" cellpadding="5" cellspacing="0" width="900px" margin-left="10cm" align="center">

<tr>

<td align="center" colspan="6" style="font-weight: bold; font-size: 18pt; color: #787878 ;"

 id="imageTitleCell">

Uskoro</td>

</tr>

<tr>

<td align="center" colspan="6" >

<img height="400" src="galerija/slika13.jpg" style="border-right: 1px solid; border-top: 1px solid; border-left: 1px solid;

border-bottom: 1px solid" width="700" id="imageLarge" alt="default" /></td>

</tr>

<tr>

<td align="left" colspan="6" style="padding-right: 100px; padding-left: 100px; color:#787878; font-weight: bold"; id="imageDescriptionCell" >

Pohod u Istanbul. Jeste li spreeemniii?</td>

</tr>

<tr>

<td id="scrollPreviousCell" style="color: black" onmouseover="scrollPrevious();" onmouseout="scrollStop();" font-family: 'Hind' style="font-weight: bold">

&lt;&lt;Nazad</td>

<td>

<img id="scrollThumb1" height="100" src="galerija/slika13.jpg" style="border-right: 1px solid; border-top: 1px solid; border-left: 1px solid;

border-bottom: 1px solid" width="200" onmouseover="handleThumbOnMouseOver(0);" /></td>

<td>

<img id="scrollThumb2" height="100" src="galerija/slika1.jpg" style="border-right: 1px solid; border-top: 1px solid; border-left: 1px solid;

border-bottom: 1px solid" width="200" onmouseover="handleThumbOnMouseOver(1);" /></td>

<td>

<img id="scrollThumb3" height="100" src="galerija/slika31.jpg" style="border-right: 1px solid; border-top: 1px solid; border-left: 1px solid;

border-bottom: 1px solid" width="200" onmouseover="handleThumbOnMouseOver(2);" /></td>

<td>

<img id="scrollThumb4" height="100" src="galerija/slika2.jpg" style="border-right: 1px solid; border-top: 1px solid; border-left: 1px solid;

border-bottom: 1px solid" width="200" onmouseover="handleThumbOnMouseOver(3);" /></td>

<td id="scrollNextCell" style="color: black" onmouseover="scrollNext();" onmouseout="scrollStop();" font-family: 'Hind'style="font-weight: bold">

Naprijed&gt;&gt;</td>

</tr>

</table>

<script src="galerijaSkripta.js"></script>

	</BODY>
</HTML>