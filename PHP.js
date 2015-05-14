function stranicaLOAD_PHP(url){

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
      
stranicaLOAD("vijesti.html");

document.getElementById("pocetna").addEventListener( "click", function(ev){
    stranicaLOAD("vijesti.html");}, false);

document.getElementById("vodic").addEventListener( "click", function(ev){
              stranicaLOAD("Vodic.html");}, false);

document.getElementById("mapa").addEventListener( "click", function(ev){
                stranicaLOAD("mapa.html");}, false);

 document.getElementById("galerija").addEventListener( "click", function(ev){
               stranicaLOAD("galerija.html");}, false);

document.getElementById("kontakt").addEventListener( "click", function(ev){
               stranicaLOAD("kontakt.html"); }, false);

document.getElementById("prijava").addEventListener( "click", function(ev){
                stranicaLOAD("prijava.html");}, false);
             

    
