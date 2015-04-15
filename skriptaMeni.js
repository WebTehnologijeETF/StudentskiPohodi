function prikazi(ref){

var meni =ref.children[0]
if (meni.style.display=="block")
{
meni.style.display="none";
ref.innerHTML="[+]"+ref.innerHTML.substring(3);
}
else{
        meni.style.display="block";
        ref.innerHTML="[-]"+ref.innerHTML.substring(3);
}

}