function drawMarqueurs(carte) {

    for (let i=0; i < mapPoints.length; i++) {

        google.maps.event.addListener(
			new google.maps.Marker(
				{
					position: new google.maps.LatLng(mapPoints[i][0],mapPoints[i][1]),
					map: carte
				}
			),
			'click',
			function() {
				alert(mapPoints[i][2]);//message d'alerte
			}
		);
    }
}