var round=1;
var playerName=''

function select_name(){
       var saisie = prompt("Quel est ton nom ?", "");
       console.log(saisie);

       var nameDiv=document.getElementById('player_name');
       nameDiv.innerText=saisie;
       playerName=saisie;

}