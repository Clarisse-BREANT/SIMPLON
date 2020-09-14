function getParcours(parcours) {

    for (let i = 0; i < mapPoints.length; i++) {
		parcours[i] = new google.maps.LatLng(mapPoints[i][0],mapPoints[i][1]);
	}

 
   

};