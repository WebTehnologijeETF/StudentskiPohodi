function checkForm(form)
  {
    // validation fails if the input is blank
    if(form.mail.value == "" || form.mail.value.length<3 || form.mail.value.length>200 ) {
      var x =document.getElementById('greskaMail');
      x.innerHTML="<img src='greska.png'>";
     // alert("Greška: Unos je prazan!");
     var k = document.getElementById('komentarMail');
     k.innerHTML="Unesite ispravan e-mail."
      form.mail.focus();
      return false;
    }
    else if(form.mail.value!="" || form.mail.value.length>3 || form.mail.value.length<200 )
    {
      var x =document.getElementById('greskaMail');
      x.innerHTML="<img src='correct.jpg'>";
       var k = document.getElementById('komentarMail');
     k.innerHTML="";
     // alert("Greška: Unos je prazan!");
     
    }
    
 if(form.password.value == "" || form.password.value.length<3 || form.password.value.length>200 ) {
     
var x =document.getElementById('greskaSifra');
      x.innerHTML="<img src='greska.png'>";

     // alert("Greška: Unos je prazan!");
     var k = document.getElementById('komentarSifra');
      k.innerHTML="Sifra mora biti duza od 3 kraktera.";
      form.password.focus();
      return false;
    }
 else if(form.password.value!="" || form.password.value.length>3 || form.password.value.length<200 )
    {
      var x =document.getElementById('greskaSifra');
      x.innerHTML="<img src='correct.jpg'>";
       var k = document.getElementById('komentarSifra');
     k.innerHTML="";
     // alert("Greška: Unos je prazan!");
     
    }

alert("Uspjesna prijava");
    // validation was successful
    return true;
  }