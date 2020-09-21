
function reset_default() {

    document.getElementById("round_won_player_1").style.backgroundColor="transparent";
    document.getElementById("round_won_player_2").style.backgroundColor="transparent";
    document.getElementById("round_won_player_3").style.backgroundColor="transparent";
    document.getElementById("round_won_ia_1").style.backgroundColor="transparent";
    document.getElementById("round_won_ia_2").style.backgroundColor="transparent";
    document.getElementById("round_won_ia_3").style.backgroundColor="transparent";
    round=1;
    playerVictory=0;
    iaVictory=0;

    return[round, playerVictory, iaVictory];
}
