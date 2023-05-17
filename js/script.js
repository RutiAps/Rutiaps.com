  

 const myLatlng = { lat: 31.316364991676554, lng:-109.54318764498059};
 var latitud;
 var longitud;

function initMap() {
  
  const directionsService = new google.maps.DirectionsService();
  const directionsRenderer = new google.maps.DirectionsRenderer();
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 13,
    center: { lat: 31.316364991676554, lng:-109.54318764498059},
  });



  directionsRenderer.setMap(map);

  const onChangeHandler = function () {
    calculateAndDisplayRoute(directionsService, directionsRenderer);
  };

  document.getElementById("start").addEventListener("change", onChangeHandler);
  document.getElementById("end").addEventListener("change", onChangeHandler);


  let infoWindow = new google.maps.InfoWindow({
  
  });

  map.addListener('click', function(e) {
    if(a==1){
       latitud = e.latLng.lat();
       longitud = e.latLng.lng();
    placeMarker(e.latLng, map);}
    a=0;
     pasarVariable();
     obtenerDireccion(latitud,longitud);
});

function placeMarker(position, map) {
    var marker = new google.maps.Marker({
        position: position,
        map: map
    });
    map.panTo(position);
}

}

var a = 0;
  function test() {
    a = a+1
    document.getElementById("start").dispatchEvent(new Event("change"));
document.getElementById("end").dispatchEvent(new Event("change"));
   
      
}


function obtenerDireccion(latitud, longitud) {
  var geocoder = new google.maps.Geocoder();

  var latlng = new google.maps.LatLng(latitud, longitud);

  geocoder.geocode({ 'latLng': latlng }, function (results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      if (results[0]) {
        var direccion = results[0].formatted_address;
        var inputElement3 = document.getElementById("dir");
        inputElement3.value = direccion
      } else {
        console.log('No se encontró ninguna dirección.');
      }
    } else {
      console.log('Geocodificación inversa fallida. Error: ' + status);
    }
  });
}


function pasarVariable() {
  console.log("iuhsaD");

  // Obtener la referencia al elemento de entrada
  var inputElement = document.getElementById("lat");
  var inputElement2 = document.getElementById("lng");

  // Asignar el valor de la variable al elemento de entrada
  inputElement.value = latitud;
  inputElement2.value = longitud;
}



function calculateAndDisplayRoute(directionsService, directionsRenderer) {
  directionsService
    .route({
      origin: {
        query: document.getElementById("start").value,
      },
      destination: {
        query: document.getElementById("end").value,
      },
      travelMode: google.maps.TravelMode.DRIVING,
    })
    .then((response) => {
      directionsRenderer.setDirections(response);
    })
   
}


function jaja(){
  const startElement = document.getElementById("start");
const endElement = document.getElementById("end");

// Crear y disparar el evento 'change' para el elemento 'start'
const startChangeEvent = new Event("change");
startElement.dispatchEvent(startChangeEvent);

// Crear y disparar el evento 'change' para el elemento 'end'
const endChangeEvent = new Event("change");
endElement.dispatchEvent(endChangeEvent);
}




window.initMap = initMap;

