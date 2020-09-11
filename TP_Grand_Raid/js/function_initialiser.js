function include(fileName){
        document.write(<script type='text/javascript' src='+fileName+'></script>)
}

function initialiser() {

        include(parcours.js);
        include(marqueurs.js);

        var latlng = new google.maps.LatLng(-21.135111,55.2464294);
        var options = {
            center: latlng,
            zoom: 10,
            mapTypeId: google.maps.MapTypeId.ROADMAP
         };

         var carte = new google.maps.Map(document.getElementById("carte"), options);
 
                
         var TraceParcoursGrandRaid =new google.maps.Polyline({
             path: parcoursGrandRaid,
             strokeColor: "#FF0000",
             strokeOpacity: 1.0,
             strokeWeight: 2                
         });

        TraceParcoursGrandRaid.setMap(carte);

        google.maps.event.addListener(marqueur, 'click', function() {
             alert("Le marqueur a été cliqué.");//message d'alerte
         });

}