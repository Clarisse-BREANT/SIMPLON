function initialiser() {

        document.write("<div id='carte' style='width:100%; height:100%'></div>");

        var latlng = new google.maps.LatLng(-21.135111,55.2464294);
        var options = {
            center: latlng,
            zoom: 10,
            mapTypeId: google.maps.MapTypeId.ROADMAP
         };

        var carte = new google.maps.Map(document.getElementById("carte"), options);

        
        drawMarqueurs(carte);

        var parcoursGrandRaid = [];
        getParcours(parcoursGrandRaid);

        
        var TraceParcoursGrandRaid =new google.maps.Polyline({
            path: parcoursGrandRaid,
            strokeColor: "#FF0000",
            strokeOpacity: 1.0,
            strokeWeight: 2                
        });

        TraceParcoursGrandRaid.setMap(carte);
        

}