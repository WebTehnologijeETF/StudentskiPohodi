function stranicaLOAD(url){

var ajax;
if (window.XMLHttpRequest)
 {
      try
      {
        ajax=new XMLHttpRequest();
      }
  

      catch(err) 
      {
      ajax = false;
      }
}


else { 
    try
    {
        ajax=new ActiveXObject("Microsoft.XMLHTTP");
    }

 catch(err) 
      {
      ajax = false;
      }
}

ajax.onreadystatechange = function() {               
 if (ajax.readyState == 4 && ajax.status == 200)
  document.getElementById("tijelo").innerHTML = ajax.responseText;                               
                        
if (ajax.readyState == 4 && ajax.status == 404)
 document.getElementById("tijelo").innerHTML = "Greska: nepoznat URL";
                                     }
ajax.open("GET", url, true);
ajax.send();
                          }
      


/*document.getElementById("pocetna").addEventListener( "click", function(ev){
    stranicaLOAD("vijesti.html");}, false);*/

document.getElementById("vodic").addEventListener( "click", function(ev){
              stranicaLOAD("Vodic.php");}, false);

document.getElementById("mapa").addEventListener( "click", function(ev){
                stranicaLOAD("mapa.php");}, false);

 document.getElementById("galerija").addEventListener( "click", function(ev){
               stranicaLOAD("galerija.php");}, false);

document.getElementById("kontakt").addEventListener( "click", function(ev){
               stranicaLOAD("kontakt.php"); }, false);

document.getElementById("prijava").addEventListener( "click", function(ev){
                stranicaLOAD("prijava.html");}, false);
             

    
function stranicaLOAD_PHP(url){

stranicaLOAD("vijesti.php");
var ajax;
if (window.XMLHttpRequest)
 {
      try
      {
        ajax=new XMLHttpRequest();
      }
      catch(err) 
      {
      ajax = false;
      }
}

else { 
    try
    {
        ajax=new ActiveXObject("Microsoft.XMLHTTP");
    }

 catch(err) 
      {
      ajax = false;
      }
}

ajax.onreadystatechange = function() {               
 if (ajax.readyState == 4 && ajax.status == 200)
  document.getElementById("tijelo").innerHTML = ajax.responseText;                               
                        
if (ajax.readyState == 4 && ajax.status == 404)
 document.getElementById("tijelo").innerHTML = "Greska: nepoznat URL";
                                     }
ajax.open("POST", url, true);
ajax.send();
                          }