
var map;

function initialize() {
	var mapOptions = {
		center: new google.maps.LatLng(45.515737,-122.675326),
		zoom: 12,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

	var result = "";
	$.get("test2.php", function (data) {
		data.records.forEach(setMarkers);
	});

}

google.maps.event.addDomListener(window, 'load', initialize);


function searchAddress() {

	var addressInput = document.getElementById('address-input').value;

	var geocoder = new google.maps.Geocoder();

	geocoder.geocode({address: addressInput}, function(results, status) {

		if (status == google.maps.GeocoderStatus.OK) {

	      var myResult = results[0].geometry.location;

	      //createMarker(myResult);

	      map.setCenter(myResult);

	      map.setZoom(12);
		}
	});

}

function setMarkers(business, index, ar) {

	var geocoder = new google.maps.Geocoder();

	geocoder.geocode({address: business.Address}, function(results, status) {

		if (status == google.maps.GeocoderStatus.OK) {

	      var myResult = results[0].geometry.location;

	      createMarker(myResult, business.Name);
		}
		else
		{
			console.log("Addess lookup went south . . . ")
		}
	});

}

function createMarker(latlng, name) {

  var marker = new google.maps.Marker({
    map: map,
    position: latlng,
    title: name
  });
}

