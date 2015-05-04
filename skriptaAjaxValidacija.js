
function provjera(){
var opcina = document.getElementById("opcina").value;
var mjesto=document.getElementById("mjesto").value;
var ajax = new XMLHttpRequest();
ajax.onreadystatechange = function() 
{
   if (ajax.readyState == 4 && ajax.status == 200 )
    { if(ajax.responseText=="")
        { 
        document.getElementById("opcina").focus();
        document.getElementById("komentarOpcina").innerHTML = "Greska";
      
        }
      else if(ajax.responseText=="ok")
        {
        document.getElementById("komentarOpcina").innerHTML = "OK";
       
        }
    }
    if (ajax.readyState == 4 && ajax.status == 404)
        { 
         document.getElementById("komentarMjesto").innerHTML = "Greska: nepoznat URL";
        }                        
}
ajax.open("GET", "http:zamger.etf.unsa.ba/wt/mjesto_opcina.php?opcina="+encodeURIComponent(opcina), true);
ajax.send();
                                
                    }

/*
 //AJAX

 

var osoba = JSON.parse(responseText);
var opcina = document.getElementById("opcina").value;
var mjesto=document.getElementById("mjesto").value;
 var ajax;
if (window.XMLHttpRequest)
  {
  ajax=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  ajax=new ActiveXObject("Microsoft.XMLHTTP");
  }


var osoba=JSON.parse(ajax.responseText);

if(osoba.greska=="Nepostojeća općina")
        {
             document.getElementById("komentarOpcina").innerHTML=osoba.greska;
             
              document.getElementById("komentarMjesto").innerHTML="";
             return false;
        }
        if(osoba.greska=="Nepostojeće mjesto")
        {
            document.getElementById("komentarMjesto").innerHTML=osoba.greska;
           
            return false;
            
              document.getElementById("komentarOpcina").innerHTML="";
        }
        if(osoba.greska=="Mjesto nije iz date općine")
        {
            document.getElementById("komentarMjesto").innerHTML=osoba.greska;
            
            document.getElementById("komentarOpcina").innerHTML="";
            
            return false;
        }
        if(osoba.ok=="Mjesto je iz date općine")
        {
           document.getElementById("komentarMjesto").innerHTML="";
            document.getElementById("komentarOpcina").innerHTML="";
           

        }
ajax.open("GET","http://zamger.etf.unsa.ba/wt/mjesto_opcina.php?mjesto="+ encodeURIComponent(mjesto); +"&opcina=" + encodeURIComponent(opcina);,true);
ajax.send();
                                
                */    















                /* </tr>
     <tr>
     <td> <label id="opcinaLabel">Općina</label></td>
     <td> <input id="opcina"type="textbox"></td>
        <td id="greskaOpcina"></td>
        <td id="komentarOpcina"> </td>
    </tr>
   <tr>
     <td> <label id="mjestoLabel">Mjesto</label></td>
     <td> <input id="Mjesto"type="textbox"></td>
        <td id="greskaMjesto"></td>
        <td id="komentarMjesto"> </td>
    </tr>*/