// FONCTION PRINCIPAL POUR EXECUTER LE PROGRAMME ET LES SOUS FONCTIONS

function test_victory(playerVictory, iaVictory, round) {

    var game_winner="";

    if (round>=3){

        if ((iaVictory == 3) || (playerVictory == 3)) {

            ////////// PLAYER WIN
            if (iaVictory<playerVictory) {
                game_winner= "You Win !"
                alert("You Win !")
                //show_game_winner();
                reset_default();

                //successive Win
                successiveWin++;
                //Most successive Win
            
                if (mostSuccessiveWin<successiveWin) {
                    mostSuccessiveWin=successiveWin;
                    ///////////// TOP PLAYERS
                    player_score();
                }



            }

            /////////// IA WIN
            else if (playerVictory<iaVictory) {
                game_winner= "You lose !"
                alert("You lose !")
                //show_game_winner();
                reset_default();
                successiveWin=0;

            }
        }
    }

    document.getElementById('victoires_affilé').innerText=successiveWin;
    document.getElementById('plus_de_victoire').innerText=mostSuccessiveWin;



}