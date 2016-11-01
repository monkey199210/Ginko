var map;
var infowindow;

function initialize(position) {
	//var pyrmont = new google.maps.LatLng(48.195201,16.369547);
	var pyrmont = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
	map = new google.maps.Map(document.getElementById('chatting_map_wrapper'), {
	  mapTypeId: google.maps.MapTypeId.ROADMAP,
	  center: pyrmont,
	  zoom: 15
	});
	var a = new google.maps.Marker({position: pyrmont,map: map,icon:'http://www.blind-summit.co.uk/wp-content/plugins/google-map/images/marker_blue.png'});
	var request = {
	  location: pyrmont,
	  radius: 500,
	  types: ['cafe']
	};
	infowindow = new google.maps.InfoWindow();
	var service = new google.maps.places.PlacesService(map);
	service.search(request, callback);
}

function callback(results, status) {
	if (status == google.maps.places.PlacesServiceStatus.OK) {
	  for (var i = 0; i < results.length; i++) {
	    createMarker(results[i]);
	  }
	}
	if (status == google.maps.places.PlacesServiceStatus.ZERO_RESULTS){
		alert('zero results near this location');
	}
}

function createMarker(place) {
	var placeLoc = place.geometry.location;
	var marker = new google.maps.Marker({
	  map: map,
	  position: place.geometry.location
	});

	google.maps.event.addListener(marker, 'click', function() {
	  infowindow.setContent(place.name);
	  infowindow.open(map, this);
	});
}

google.maps.event.addDomListener(window, 'load', function(){
  navigator.geolocation.getCurrentPosition(initialize);
});