
function pasarVariable() {
   import {myLatlng} from 'script.js'
  var miVariable = "Hola, mundo!"; // La variable que quieres pasar

  // Obtener la referencia al elemento de entrada
  var inputElement = document.getElementById("myInput");

  // Asignar el valor de la variable al elemento de entrada
  inputElement.value = miVariable;
}