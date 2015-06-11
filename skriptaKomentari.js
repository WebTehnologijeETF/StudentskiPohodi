function showKomentar(str) {
   
   if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","PrikaziKomentar.php?id="+str,true);
        xmlhttp.send();
    }
}


function showKomentarAdmin(str) {
   
   if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","PrikaziKomentarAdmin.php?id="+str,true);
        xmlhttp.send();
    }
}



function hideKomentar(str) {
   
   if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = "";
            }
        }
        xmlhttp.open("GET","PrikaziKomentar.php?id="+str,true);
        xmlhttp.send();
    }
}


function sendKomentar() {
   /*
   if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }else {*/ 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
             document.getElementById("txtHint").innerHTML = ajax.responseText;
   //     window.location.href="PosaljiKomentar.php";
            }
            if (ajax.readyState == 4 && ajax.status == 404)
                                document.getElementById("txtHint").innerHTML = "Greska: nepoznat URL";
                }
        
        xmlhttp.open("POST","PosaljiKomentar.php",true);
        xmlhttp.send();
    }

function deleteKomentar(str) {
   
   if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        
             //window.location.href="brisanjeKom_10.php?id="+str;
               document.getElementById("txtHint").innerHTML = "";
            }
        }
        xmlhttp.open("POST","brisanjeKom_10.php?komid="+str,true);
        xmlhttp.send();
    }
}



function zaboravljenpass(){
    
    var email = document.getElementById("eposta").value;
      if(email == ""){
        document.getElementById("status").innerHTML = "Unesite vašu email adresu!";
    } else {
      if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            ajax = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }
       // ajax = ajaxObj("POST", "skriptaZaMail2.php");
        ajax.onreadystatechange = function() {
          if (ajax.readyState == 4 && ajax.status == 200) {
              // document.getElementById("forgotpassform").action="<?=$_SERVER['PHP_SELF']?>";
        
 //document.getElementById("forgotpassform").submit();
var to=document.getElementById("eposta").value;
var subject="Promjena Lozinke";
var message=document.getElementById("body").value;
 ini_set("SMTP","webmail.etf.unsa.ba");
ini_set("smtp_port","25");
ini_set('sendmail_from','agranulo1@webmail.etf.unsa.ba');
   mail(to,subject,message,'','');
        }
          }
          ajax.open("POST", "skriptaZaMail2.php");
        ajax.send();
    
     }
}
    