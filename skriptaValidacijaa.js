
function checkForm2(form)
  {


// regularni izraz    
var re = /^[a-zA-Z]+$/;


try
{
if(form.ime.value == "" || form.ime.value.length<3 || form.ime.value.length>100 ||(!re.test(form.ime.value)) ) {
       
        var x =document.getElementById('greskaIme');
      x.innerHTML="<img src='greska.png'>";
        
      form.ime.focus();
      var k = document.getElementById('komentarIme');
      k.innerHTML="Ne duze od 3 kraktera i samo slova abecede.";
      return false;
    }
    else if(form.ime.value!="" || form.ime.value.length<3 || form.ime.value.length>200 ||(re.test(form.ime.value))   )
    {

       var x =document.getElementById('greskaIme');
      x.innerHTML="<img src='correct.jpg'>";
      var k = document.getElementById('komentarIme');
      k.innerHTML="";
    }
}
catch(err)
{
  alert("greska pri provjeri imena");
}
if(form.prezime.value == ""|| form.prezime.value.length<3 || form.prezime.value.length>100 ||(!re.test(form.prezime.value))) {
        
        var x =document.getElementById('greskaPrezime');
      x.innerHTML="<img src='greska.png'>";
      form.prezime.focus();
      var k = document.getElementById('komentarPrezime');
      k.innerHTML="Ne duze od 3 kraktera i samo slova abecede.";
      return false;
    }
    else if(form.prezime.value!="" || form.prezime.value.length<3 || form.prezime.value.length>200 ||(re.test(form.prezime.value)) )
    {

       var x =document.getElementById('greskaPrezime');
      x.innerHTML="<img src='correct.jpg'>";
      var k = document.getElementById('komentarPrezime');
      k.innerHTML="";
    }

if(form.mail1.value == ""|| form.mail1.value.length<3 || form.mail1.value.length>100) {

        var x =document.getElementById('greskaMail1');
      x.innerHTML="<img src='greska.png'>";
      form.mail1.focus();
      var k = document.getElementById('komentarMail1');
      k.innerHTML="Unesite ispravan e-mail.";
      return false;
    }
    else if(form.mail1.value!="" || form.mail1.value.length<3 || form.mail1.value.length>200 )
    {

       var x =document.getElementById('greskaMail1');
      x.innerHTML="<img src='correct.jpg'>";
       var k = document.getElementById('komentarMail1');
      k.innerHTML="";
    }
    
    
if(form.pass1.value == ""|| form.pass1.value.length<3 || form.pass1.value.length>100) {
     
        var x =document.getElementById('greskapass1');
      x.innerHTML="<img src='greska.png'>";
      form.pass1.focus();
      var k = document.getElementById('komentarpass1');
      k.innerHTML="Sifra mora biti duza od 3 karaktera.";
      return false;
    }
    else if(form.pass1.value!="" || form.pass1.value.length<3 || form.pass1.value.length>200 )
    {

       var x =document.getElementById('greskapass1');
      x.innerHTML="<img src='correct.jpg'>";
       var k = document.getElementById('komentarpass1');
      k.innerHTML="";
    }
if(form.potSifru1.value != form.pass1.value) {
        var x =document.getElementById('greskaPotvrdiSifru');
      x.innerHTML="<img src='greska.png'>";
      form.pass1.focus();
      var k = document.getElementById('komentarPotvrdiSifru');
      k.innerHTML="Neispravna sifra.";
      return false;
    }
    else if(form.potSifru1.value==form.pass1.value)
    {

       var x =document.getElementById('greskaPotvrdiSifru');
      x.innerHTML="<img src='correct.jpg'>";
       var k = document.getElementById('komentarPotvrdiSifru');
      k.innerHTML="";
    }

if(form.mjesto.value == "") {
        var x =document.getElementById('greskaMjesto');
      x.innerHTML="<img src='greska.png'>";
      form.mjesto.focus();
      var k = document.getElementById('komentarMjesto');
      k.innerHTML="Unos je prazan.";
      return false;

    }

    else if(form.mjesto.value != "")
    {

       var x =document.getElementById('greskaMjesto');
      
       var k = document.getElementById('komentarMjesto');
      k.innerHTML="";
    }
   if(form.opcina.value == "") {

        var x =document.getElementById('greskaOpcina');
      x.innerHTML="<img src='greska.png'>";
      form.opcina.focus();
      var k = document.getElementById('komentarOpcina');
      k.innerHTML="Unos je prazan.";
      
      return false;
    }
    else if(form.opcina.value != "")
    {

       var x =document.getElementById('greskaOpcina');
     
       var k = document.getElementById('komentarOpcina');
      k.innerHTML="";
    }



if(ajax()==true) alert("Uspjesno ste se prijavili");  
return true;

}

function ajax()
{ var prolaz = true;
// Za AJAX
var opcina = document.getElementById("opcina").value;
var mjesto=document.getElementById("mjesto").value;
// mjesto=encodeURIComponent(mjesto);
  //opcina=encodeURIComponent(opcina);
// Kraj AJAX-a

  var ajax;
 
if (window.XMLHttpRequest)
  {
  ajax = new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  ajax = new ActiveXObject("Microsoft.XMLHTTP");
  }
  

 ajax.onreadystatechange = function() {// Anonimna funkcija
                                     
if (ajax.readyState == 4 && ajax.status == 200 )
  {  
    var response=JSON.parse(ajax.responseText);
  
  if(response.greska=="Nepostojeće mjesto") 
  {
  document.getElementById("greskaMjesto").innerHTML="Nepostojeće mjesto";
  document.getElementById("greskaOpcina").innerHTML="";
  alert("Nepostojeće mjesto");
  prolaz=false;

  //return false;
  }
  
 if(response.greska=="Nepostojeća općina") 
 {
  document.getElementById("greskaOpcina").innerHTML="Nepostojeća općina";           
  document.getElementById("greskaMjesto").innerHTML="";
  alert("Nepostojeća općina");
 prolaz=false;
 // return false;
  //alert(prolaz.value);
 }
 if(response.greska=="Mjesto nije iz date općine")
        {
            document.getElementById("greskaMjesto").innerHTML="Mjesto nije iz date općine";
            document.getElementById("greskaOpcina").innerHTML="";
            alert("Mjesto nije iz date općine");
  prolaz=false;
  //         return false;
        }
if(response.ok=="Mjesto je iz date općine")
   {
 document.getElementById("greskaMjesto").innerHTML="";
 document.getElementById("greskaOpcina").innerHTML="";
alert("Tacno");
  
  }
    }
  
  }
  


ajax.open("GET","http://zamger.etf.unsa.ba/wt/mjesto_opcina.php?mjesto="+ encodeURIComponent(mjesto) +"&opcina=" +encodeURIComponent(opcina),true);
ajax.send();
return prolaz;
}