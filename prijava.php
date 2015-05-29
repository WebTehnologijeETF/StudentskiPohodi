
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

 <?php
 include'validacija.php';
?>
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
        <li><a href="#1" id="pocetna" onclick="stranicaLOAD_PHP('vijesti.html');">Početna</a></li>
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

  <!--div id="forma1">
   <form class="formaPrijava">
  		<p id="prijaviSe">Prijavi se</p>
     <table id="tabelaPrijaviSe">
      <tr>
		   <td><input id="mail" type="email"  placeholder="Email@hotmail.com"></td>
       <td id ="greskaMail"></td>
       <td id="komentarMail"> </td>
     </tr>
     <tr>
      <td><input id="password"type="password" placeholder="Password"> </td>
      <td id ="greskaSifra"></td>
      <td id="komentarSifra"></td>
    </tr>
    <tr>
      <td> <input id="remember" type="checkbox"> Remember me</td>
    </tr>
</table>
		<button type="submit" class="signIn">Prijava</button>
       
</div>
</form-->



<div id="forma2">
 <p id="noviClan">Učlani se</p>

    <p><span class="error">* obavezno polje </span></p>
  <form class="forma_novi_clan" action="prijava.php" method="post"  >
	 <table id="tabelaNoviClan">
     <tr>
       <td> <label id="Ime1">Ime</label></td>
       <td> <input id="ime" name="name"type="text" value="<?php if (isset($_REQUEST['name'])) print htmlspecialchars($_REQUEST['name']); ?>"><br></td>
      
       <td id="greskaIme"><span class="error">* <?php echo $nameErr;?> </span> </td>
       <td id="komentarIme"> </td>
    <tr>
      <td><label id="Prezime1">Prezime</label></td>
      <td><input id="prezime" name="prezime" type="text" value="<?php if (isset($_REQUEST['prezime'])) print htmlspecialchars($_REQUEST['prezime']); ?>"><br></td>
       
       <td id="greskaPrezime"> <span class="error">* <?php echo $prezimeErr;?></span></td>
       <td id="komentarPrezime"> </td>
    <tr>
      <td><label id="email">E-mail</label></td>
		  <td><input id="mail1" name="email"type="mail" placeholder="Email@hotmail.com" value="<?php if (isset($_REQUEST['email'])) print htmlspecialchars($_REQUEST['email']); ?>"><br></td>
       
       <td id="greskaMail1"> <span class="error">* <?php echo $emailErr;?> </span></td>
       <td id="komentarMail1"> </td>
		<tr>
       <td><label id="pass">Šifra</label></td>
       <td>	<input id="pass1" name="sifra"type="password"value="<?php if (isset($_REQUEST['sifra'])) print htmlspecialchars($_REQUEST['sifra']); ?>"><br></td>
        
        <td id="greskapass1"> <span class="error">* <?php echo $sifraErr;?></span></td>
        <td id="komentarpass1"> </td>
     <tr>
       <td><label id="potvrdiSifru">Potvrdi šifru</label></td>
       <td> <input id="potSifru1" name="sifra2"type="password" value="<?php if (isset($_REQUEST['sifra2'])) print htmlspecialchars($_REQUEST['sifra2']); ?>"><br></td>
        
        <td id="greskaPotvrdiSifru"> <span class="error">* <?php echo $sifra2Err;?></span></td>
        <td id="komentarPotvrdiSifru"> </td>
    </tr>
    </tr>
    <tr>
     <td> <label id="opcinaLabel">Općina</label></td>
     <td> <input id="opcina" type="text" name="opcina" onchange="ajax();" value="<?php if (isset($_REQUEST['opcina'])) print htmlspecialchars($_REQUEST['opcina']); ?>"><br></td>
        <td id="greskaOpcina"></td>
        <td id="komentarOpcina"> </td>
    </tr>
   <tr>
     <td> <label id="mjestoLabel">Mjesto</label></td>
     <td> <input id="mjesto" type="text" name="mjesto" onchange="ajax();" value="<?php if (isset($_REQUEST['opcina'])) print htmlspecialchars($_REQUEST['opcina']); ?>"><br></td>
        <td id="greskaMjesto"></td>
        <td id="komentarMjesto"> </td>
    </tr>
  </table>
 <button type="submit" class="submit" name="submit" value="Save Data">Spremi</button>
</form>
</div>

	
</div>
<script src="Ajax_Load_Skripta.js"></script>
<script src="skriptaValidacija.js"></script>
 <!--script type="skriptaValidacijaa.js"></script-->
   <script src="tabela_Ajax.js"></script>
  </BODY>
</HTML>