<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<BODY>
	
 

<div id="forma2">
 <p id="noviClan">Učlani se</p>
  <form class="forma_novi_clan" method="POST" action="prijava.php"><!-- onsubmit="return checkForm2(this);"-->
	 <table id="tabelaNoviClan">
     <tr>
       <td> <label id="Ime1">Ime</label></td>
       <td> <input id="ime" type="textbox"></td>
       <td id="greskaIme"></td>
       <td id="komentarIme"> </td>
    <tr>
      <td><label id="Prezime1">Prezime</label></td>
      <td><input id="prezime"type="textbox"></td>
       <td id="greskaPrezime"></td>
       <td id="komentarPrezime"> </td>
    <tr>
      <td><label id="email">E-mail</label></td>
		  <td><input id="mail1" type="mail" placeholder="Email@hotmail.com"></td>
       <td id="greskaMail1"></td>
       <td id="komentarMail1"> </td>
		<tr>
       <td><label id="pass">Šifra</label></td>
       <td>	<input id="pass1"type="password"></td>
        <td id="greskapass1"></td>
        <td id="komentarpass1"> </td>
     <tr>
       <td><label id="potvrdiSifru">Potvrdi šifru</label></td>
       <td> <input id="potSifru1"type="password"></td>
        <td id="greskaPotvrdiSifru"></td>
        <td id="komentarPotvrdiSifru"> </td>
    </tr>
    </tr>
    <tr>
     <td> <label id="opcinaLabel">Općina</label></td>
     <td> <input id="opcina" type="textbox" onchange="ajax();"></td>
        <td id="greskaOpcina"></td>
        <td id="komentarOpcina"> </td>
    </tr>
   <tr>
     <td> <label id="mjestoLabel">Mjesto</label></td>
     <td> <input id="mjesto" type="textbox" onchange="ajax();"></td>
        <td id="greskaMjesto"></td>
        <td id="komentarMjesto"> </td>
    </tr>
  </table>
 <button type="submit"  id="button">Spremi</button>
</form>
</div>

	

  
  
	</BODY>
</HTML>