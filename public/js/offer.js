function initMap() {  
  var lat_lng = {lat: 22.08672, lng: 79.42444};  
  var directionsService = new google.maps.DirectionsService;    
  var directionsDisplay = new google.maps.DirectionsRenderer;    
  var map = new google.maps.Map(document.getElementById('map_offer'), {    
    zoom: 6,    
    center: lat_lng    
  });    
  directionsDisplay.setMap(map);
  var marker = new google.maps.Marker({
          map: map,
          position: lat_lng,
          draggable: false,
          anchorPoint: new google.maps.Point(0, -29)
       });

  var onChangeHandler = function() {       
    calculateAndDisplayRoute(directionsService, directionsDisplay, marker);    
  };
  var source = document.getElementById('offer_source');
  var sourcecomplete = new google.maps.places.Autocomplete(source);
  sourcecomplete.bindTo('bounds', map);
  sourcecomplete.addListener('place_changed', onChangeHandler);
  
  var destination = document.getElementById('offer_destination');
  var destination_autocmp = new google.maps.places.Autocomplete(destination);
  destination_autocmp.addListener('place_changed', onChangeHandler);      
}

function calculateAndDisplayRoute(directionsService, directionsDisplay, marker) {
  var sourceData = document.getElementById('offer_source').value;
  var destinationData = document.getElementById('offer_destination').value;  
  if (destinationData!='' && sourceData!=''){
      marker.setMap(null);
      directionsService.route({    
        origin: sourceData,    
        destination: destinationData,    
        travelMode: google.maps.TravelMode.DRIVING    
      }, function(response, status) {       
        if (status === google.maps.DirectionsStatus.OK) {    
          directionsDisplay.setDirections(response);    
        } else {    
          console.log(status);    
        }    
      });
  }
}

// $(function(){
//   $('a[title]').tooltip();
// });

if($('#scheduleTime').length > 0){
 $('#scheduleTime').timepicker();
}
