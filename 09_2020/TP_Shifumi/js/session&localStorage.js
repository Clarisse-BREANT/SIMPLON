    
/////////// PLAYER SESSION STORAGE
function player_score() {
    var objplayer={'name':playerName,'score': mostSuccessiveWin}
    var player = JSON.parse(sessionStorage.getItem("player"))||[];
    player.push(objplayer);
    player.sort(function(a, b){return b.score-a.score});
    sessionStorage.setItem("player", JSON.stringify(player));

}



//////////// REQUEST TOPPLAYERS DATA AND FILL THE TABLE
function request_topplayers() {
    var player = JSON.parse(sessionStorage.getItem("player"))||[];
    var topplayers = JSON.parse(localStorage.getItem("topplayers"))||[];
    top_players(topplayers, player);
    populateTable(topplayers);
    localStorage.setItem("topplayers", JSON.stringify(topplayers));


}


//////////////// MODIFY LOCALSTORAGE WITH DATA FROM SESSIONSTORAGE
function top_players(topplayers, player) {

        if (player[0]['score']>=topplayers[length(topplayers)-1]['score']) {

            if (length.topplayers<11) {
                topplayers.push(player[0]);
                topplayers.sort(function(a, b){return b.score-a.score});
            }
            else {
                topplayers.push(player[0]);
                topplayers.sort(function(a, b){return b.score-a.score});
                topplayers = topplayers.split(9,10);
            }

         }
}



/////////////////// FILL THE TABLE WITH MODIFYED LOCALSTORAGE
function populateTable(topplayers) {

    var name1 = document.getElementById('player1name');
    name1.innerText = topplayers[0]['name'];
    var score1 = document.getElementById('player1score');
    score1.innerText = topplayers[0]['score'];

    var name2 = document.getElementById('player2name');
    name2.innerText = topplayers[1]['name'];
    var score2 = document.getElementById('player2score');
    score2.innerText = topplayers[1]['score'];
    

    var name3 = document.getElementById('player3name');
    name3.innerText = topplayers[2]['name'];
    var score3 = document.getElementById('player3score');
    score3.innerText = topplayers[2]['score'];

    var name4 = document.getElementById('player4name');
    name4.innerText = topplayers[3]['name'];
    var score4 = document.getElementById('player4score');
    score4.innerText = topplayers[3]['score'];

    var name5 = document.getElementById('player5name');
    name5.innerText = topplayers[4]['name'];
    var score5 = document.getElementById('player5score');
    score5.innerText = topplayers[4]['score'];

    var name6 = document.getElementById('player6name');
    name6.innerText = topplayers[5]['name'];
    var score6 = document.getElementById('player6score');
    score6.innerText = topplayers[5]['score'];

    var name7 = document.getElementById('player7name');
    name7.innerText = topplayers[6]['name'];
    var score7 = document.getElementById('player7score');
    score7.innerText = topplayers[6]['score'];

    var name8 = document.getElementById('player8name');
    name8.innerText = topplayers[7]['name'];
    var score8 = document.getElementById('player8score');
    score8.innerText = topplayers[7]['score'];

    var name9 = document.getElementById('player9name');
    name9.innerText = topplayers[8]['name'];
    var score9 = document.getElementById('player9score');
    score9.innerText = topplayers[8]['score'];

    var name10 = document.getElementById('player10name');
    name10.innerText = topplayers[9]['name'];
    var score10 = document.getElementById('player10score');
    score10.innerText = topplayers[9]['score'];
}

