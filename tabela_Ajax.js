function dodajProizvod(form)
{

var naziv = form.naziv.value;
var opis = form.opis.value;
var cijena =form.cijena.value;
var indeks="16351";

var re = /^[a-zA-Z]+$/;

if(form.naziv.value=="" ||(!re.test(form.naziv.value)))
{

	  var x =document.getElementById('greskaNaziv');
      x.innerHTML="<img src='greska.png'>";
        
      form.naziv.focus();
      var k = document.getElementById('komentarNaziv');
      k.innerHTML="Parazn unos ili neslova abecede.";
      return false;
}

if(form.naziv.value!="" ||(re.test(form.naziv.value)))
{

	   var x =document.getElementById('greskaNaziv');
      x.innerHTML="<img src='correct.jpg'>";
      var k = document.getElementById('komentarNaziv');
      k.innerHTML="";
}


if(form.opis.value=="")
{

	  var x =document.getElementById('greskaOpis');
      x.innerHTML="<img src='greska.png'>";
        
      form.opis.focus();
      var k = document.getElementById('komentarOpis');
      k.innerHTML="Parazn unos ili neslova abecede.";
      return false;
}

if(form.opis.value!="")
{

	   var x =document.getElementById('greskaOpis');
      x.innerHTML="<img src='correct.jpg'>";
      var k = document.getElementById('komentarOpis');
      k.innerHTML="";
}
var izraz = /[1-9]/;

if(form.cijena.value=="" || (!izraz.test(form.cijena.value)))
{

	  var x =document.getElementById('greskaCijena');
      x.innerHTML="<img src='greska.png'>";
        
      form.cijena.focus();
      var k = document.getElementById('komentarCijena');
      k.innerHTML="Prazan unos ili unos nebrojeva";
      return false;
}

if(form.cijena.value!=""|| (izraz.test(form.cijena.value)))
{

	   var x =document.getElementById('greskaCijena');
      x.innerHTML="<img src='correct.jpg'>";
      var k = document.getElementById('komentarCijena');
      k.innerHTML="";
}

var proizvod={naziv: naziv, opis: opis, cijena: cijena};
var pJ = JSON.stringify(proizvod);



var ajax = new XMLHttpRequest();

 
if (window.XMLHttpRequest)
  {
  ajax = new XMLHttpRequest();
  }
else
  {
  ajax = new ActiveXObject("Microsoft.XMLHTTP");
  }



  ajax.onreadystatechange = function() {// Anonimna funkcija
                                     
if (ajax.readyState == 4 && ajax.status == 200 )  
  {  alert("Proizvod je uspjesno spremljen.");
  }
if (ajax.readyState == 4 && ajax.status == 404)
{
 alert("Nepoznat URL");
 }                                    
  ajax.open("POST", "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=", true);
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  ajax.send("akcija="+"dodavanje" + "&brindexa="+"16351"+"&proizvod=" + pJ);  
}

}

  

