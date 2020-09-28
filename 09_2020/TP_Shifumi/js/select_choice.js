// AFFICHE LE CHOIX DU JOUEUR ET CELUI DE L'IA
// TIME BEFORE RESET = 2000 : temps indiqué pour l'apparition de bordure dans show_round_winner()

var playerImg=document.createElement('img');
var iaImg=document.createElement('img');
var counterDiv=document.getElementById('round_counter');



// 0 = PIERRE ; 1 = FEUILLE ; 2 = CISEAUX

function select_choice(playerChoice) {


        ////////////////PLAYER CHOICE

        var currentDiv = document.getElementById('player_choice');
        if (playerChoice==0) {
                playerImg.src= "images/pierre.jpg";
                currentDiv.appendChild(playerImg);

                //reset image
                setTimeout(function(){
                        playerImg.src= "";
                currentDiv.appendChild(playerImg)}, 2000);

                //increment round
                round=round+1;
        }
        else if (playerChoice==1) {
                playerImg.src="images/feuille.jpg";
                currentDiv.appendChild(playerImg);

                //reset image
                setTimeout(function(){
                        playerImg.src= "";
                currentDiv.appendChild(playerImg)}, 2000);

                //increment round
                round=round+1;
        }
        else if (playerChoice==2) {
                playerImg.src="images/ciseaux.jpg";
                currentDiv.appendChild(playerImg);

                //reset image
                setTimeout(function(){
                        playerImg.src= "";
                currentDiv.appendChild(playerImg)}, 2000);

                //increment round
                round=round+1;
        }




        ////////////////IA CHOICE

        var currentDiv2 = document.getElementById('ia_choice');
        iaChoice= Math.floor(Math.random() * 3);

        if (iaChoice==0) {
                iaImg.src= "images/pierre.jpg";
                currentDiv2.appendChild(iaImg);

                //reset image
                setTimeout(function(){
                        iaImg.src= "";
                currentDiv.appendChild(iaImg)}, 2000);
        }
        else if (iaChoice==1) {
                iaImg.src="images/feuille.jpg";
                currentDiv2.appendChild(iaImg);

                //reset image
                setTimeout(function(){
                        iaImg.src= "";
                currentDiv.appendChild(iaImg)}, 2000);

        }
        else if (iaChoice==2) {
                iaImg.src="images/ciseaux.jpg";
                currentDiv2.appendChild(iaImg);

                //reset image
                setTimeout(function(){
                        iaImg.src= "";
                currentDiv.appendChild(iaImg)}, 2000);

        }


        ///////////// SHOW ROUND WINNER

        show_round_winner(iaChoice, playerChoice);
        setTimeout(function(){
                document.getElementById('round_counter').innerText=round}, 2000);



        ////////////// TEST VICTORY
        test_victory(playerVictory, iaVictory, round);
        

}

