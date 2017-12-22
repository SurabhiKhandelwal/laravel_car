
google.maps.event.addDomListener(window, 'load', initialize);
function initialize() {
   var source = document.getElementById('source');
   var source_autocmp = new google.maps.places.Autocomplete(source);
   var destination = document.getElementById('destination');
   var destination_autocmp = new google.maps.places.Autocomplete(destination);   
}