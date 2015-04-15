function checkForm2(form)
  { var re = /^[a-zA-Z]+$/;
    // validation fails if the input is blank
  
if(form.ime.value == "" || form.ime.value.length<3 || form.ime.value.length>100 ||(!re.test(form.ime.value)) ) {
        var x =document.getElementById('greskaIme');
      x.innerHTML="<img src='greska.png'>";
        
      form.ime.focus();
      var k = document.getElementById('komentarIme');
      k.innerHTML="Mora biti duze od 3 kraktera te se sastojati od slova abecede.";
      return false;
    }
    else if(form.ime.value!="" || form.ime.value.length<3 || form.ime.value.length>200 ||(re.test(form.ime.value))   )
    {

       var x =document.getElementById('greskaIme');
      x.innerHTML="<img src='correct.jpg'>";
      var k = document.getElementById('komentarIme');
      k.innerHTML="";
    }

if(form.prezime.value == ""|| form.prezime.value.length<3 || form.prezime.value.length>100 ||(!re.test(form.prezime.value))) {
        var x =document.getElementById('greskaPrezime');
      x.innerHTML="<img src='greska.png'>";
      form.prezime.focus();
      var k = document.getElementById('komentarPrezime');
      k.innerHTML="Mora biti duza od 3 kraktera te se sastojati od slova abecede.";
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

    // regular expression to match only alphanumeric characters and spaces
    

    // validation fails if the input doesn't match our regular expression
   /* if(!re.test(form.ime.value)
    {  
      var y =document.getElementById('greskaIme');
      y.innerHTML="<img src='greska.png'>";
      form.ime.focus();
      return false;
    }
    else  if(re.test(form.ime.value)
    {

       var y =document.getElementById('greskaIme');
      y.innerHTML="<img src='correct.jpg'>";
    }

 if(!re.test(form.prezime.value)) {
      alert("Grešla:U unosu prezime nedozvoljeni karakteri!");
      form.prezime.focus();
      return false;
    }
    // validation was successful*/
  alert("Uspjesna prijava");  
  return true;
  }