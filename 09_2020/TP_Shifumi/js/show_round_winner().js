// SELON QUI GAGNE OU PERD, AFFICHE UN ENCADRÉ COLORÉ PUIS RESET LA BORDURE
var iaVictory =0;
var playerVictory =0;
var successiveWin =0;
var mostSuccessiveWin =0;

function show_round_winner(iaChoice, playerChoice) {
    //PLAYER WIN

    if ((iaChoice==0 && playerChoice==1) || (iaChoice==1 && playerChoice==2) || (iaChoice==2 && playerChoice==0)) {
        document.getElementById("player_choice").style.borderColor="rgb(9, 255, 0)";
        document.getElementById("ia_choice").style.borderColor="red";

        //////////// +1 PLAYER ROUND WON
        if (playerVictory==0) {
            document.getElementById("round_won_player_1").style.backgroundColor="rgb(72, 209, 204)";
        }
        else if (playerVictory==1) {
            document.getElementById("round_won_player_2").style.backgroundColor="rgb(72, 209, 204)";
        }

        else if (playerVictory==2) {
            document.getElementById("round_won_player_3").style.backgroundColor="rgb(72, 209, 204)";
        }

        playerVictory=playerVictory+1;
        successiveWin++;
        
        //Most successive Win
        if (mostSuccessiveWin<successiveWin) {
            mostSuccessiveWin=successiveWin;
        }

        //reset round
        setTimeout(function(){
            document.getElementById("player_choice").style.borderColor="rgb(72, 209, 204)";
            document.getElementById("ia_choice").style.borderColor="rgb(72, 209, 204)";},2000);
        


        
    }


    //PLAYER LOSE
    else if ((iaChoice==0 && playerChoice==2) || (iaChoice==1 && playerChoice==0) || (iaChoice==2 && playerChoice==1)) {
        document.getElementById("player_choice").style.borderColor="red";
        document.getElementById("ia_choice").style.borderColor="rgb(9, 255, 0)";

        /////////// +1 IA ROUND WON
        if (iaVictory==0) {
            document.getElementById("round_won_ia_1").style.backgroundColor="rgb(72, 209, 204)";
        }
        else if (iaVictory==1) {
            document.getElementById("round_won_ia_2").style.backgroundColor="rgb(72, 209, 204)";
        }

        else if (iaVictory==2) {
            document.getElementById("round_won_ia_3").style.backgroundColor="rgb(72, 209, 204)";
        }

        iaVictory=iaVictory+1;
        successiveWin=0;

        //reset round
        setTimeout(function(){
            document.getElementById("player_choice").style.borderColor="rgb(72, 209, 204)";
            document.getElementById("ia_choice").style.borderColor="rgb(72, 209, 204)";},2000);

    }


    //EGALITE

    else {
        document.getElementById("ia_choice").style.borderColor="rgb(255, 154, 38)";
        document.getElementById("player_choice").style.borderColor="rgb(255, 154, 38)";

        successiveWin=0;

        //reset round
        setTimeout(function(){
            document.getElementById("player_choice").style.borderColor="rgb(72, 209, 204)";
            document.getElementById("ia_choice").style.borderColor="rgb(72, 209, 204)";},2000);


    }

    document.getElementById('victoires_affilé').innerText=successiveWin;
    document.getElementById('plus_de_victoire').innerText=mostSuccessiveWin;
    return[iaVictory, playerVictory]

}
