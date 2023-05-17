<?php

	$conexion = mysqli_connect('localhost','root','','progrtama')
	or die(mysql_error($mysqli));

	insertar($conexion);



  if ($_SERVER['REQUEST_METHOD'] === 'POST') {    
    header('Location: conect.php');
    exit;
}

	function insertar($conexion){
	
		$latitud = $_POST['latitud']??'';
		$longitud = $_POST['longitud']??'';
		$nombre = $_POST['nombre']??'';
    $direccion = $_POST['direccion']??'';
    $demanda = $_POST['demanda']??'';
		


    if ($latitud == "") {
      
    }
    else{
		$consulta = "INSERT INTO tabla(latitud, longitud, nombre,direccion, demanda)
		VALUES ('$latitud', '$longitud', '$nombre','$direccion','$demanda ')";
		mysqli_query($conexion, $consulta);
		}
	}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/daterangepicker.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">

  <title>Tour Free Bootstrap Template for Travel Agency by Untree.co</title>
</head>

<body>


  <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>

  <nav class="site-nav">
    <div class="container">
      <div class="site-navigation">
        <a href="" class="logo m-0">RUTIAPS <span class="text-primary">.</span></a>

        <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right">
          <li class="active"><a href="index.html">Inicio</a></li>
          <li><a href="services.html">Nuestros servicios</a></li>
          <li><a href="about.html">Sobre nosotros</a></li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="hero hero-inner">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mx-auto text-center">
          <div class="intro-wrap">
            <h1 class="mb-0">RUTAS PERSONALIZADAS</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="js/script.js"></script>
  <center><div id="floating-panel">
    
      <select id="start" hidden>
                <option></option>
        <option value="31.318382065906818, -109.51940088397046">Origen</option>
      <?php 
      $sql = "SELECT * from tabla";
      $result=mysqli_query($conexion,$sql);
      $a = 0;
      while ($mostrar=mysqli_fetch_array($result)) {
        $a++
     ?>
    <option value="<?php echo $mostrar['Latitud']?>,<?php echo$mostrar['Longitud']?>"><?php echo$mostrar['Nombre']?></option>

  <<?php 
}
   ?>
      </select>

        <select id="end" hidden>
        <option></option>
         <?php 
      $sql = "SELECT * from tabla";
      $result=mysqli_query($conexion,$sql);
      $a = 0;
      while ($mostrar=mysqli_fetch_array($result)) {
        $a++
     ?>
    <option value="<?php echo $mostrar['Latitud']?>,<?php echo$mostrar['Longitud']?>"><?php echo$mostrar['Nombre']?></option>

  <<?php 
}
   ?>
   <option value="31.318382065906818, -109.51940088397046">Origen</option>
      </select>

      <script>
  // Obtener el elemento select
  var select = document.getElementById("end");

  // Inicializar el índice de la opción seleccionada
  var selectedIndex = 0;
  var selectElement = document.getElementById("start");
var currentIndex = 0;

  // Definir la función para cambiar la opción seleccionada automáticamente
  function cambiarOpcion() {
    selectedIndex++;

    if (selectedIndex >= select.options.length) {
      alert("El recorrido ha terminado");
    }
    select.selectedIndex = selectedIndex;

     currentIndex = (currentIndex + 1) % selectElement.options.length;
  selectElement.selectedIndex = currentIndex;
  jaja();


  }
</script>

    </div>
 <button onclick="test()">Seleccionar Ubicacion</button>
 <button onclick="cambiarOpcion()">Iniciar Recorrido</button>

    <select id="option">
          <option value="">Selecciona la ruta</option>
           <option value="1">ruta 1</option>
            <option value="2">ruta 2</option>
             <option value="3">ruta 3</option>
    </select>

 <form action="conect.php" method="post">
      <input id="lat" type="text" name="latitud" placeholder="Latitud" step="0.000000000000001" readonly required>
      <input id="lng" type="text" name="longitud" placeholder="Longitud"step="0.000000000000001" readonly required>
      <input id="dir" type="text" name="direccion" placeholder="Direccion" required readonly>
      <input type="text" name="demanda" placeholder="Demandas" required>
      <input type="text" name="nombre" placeholder="Nombre" required>
      <br>
      <button type="sumbit" name="enviar">Enviar</button>
    </form>
    <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLGtOb18geJRzAMyNs1Xr-4i4GJg5OJjE&callback=initMap"></script>

<br>
 



 <script type="text/javascript">
function funcion() {
  var selectElement = document.getElementById('option');
  var selectOption = selectElement.value;

  switch (selectOption) {
    case '1':
      var parteCodigo = document.getElementById('parteCodigo');
      parteCodigo.style.display = 'block';
      console.log('Seleccionaste la opción 1');
      break;

    case '2':
       var parteCodigo = document.getElementById('parteCodigo');
      parteCodigo.style.display = 'none';
     console.log('Seleccionaste la opción 2');
      break;

    case '3':
    console.log('Seleccionaste la opción 4');
      break;

    default:
      // Código a ejecutar cuando no se selecciona ninguna de las opciones anteriores
      break;
  }
}

document.getElementById('option').addEventListener('change', funcion);
 </script>
 
 <div id="parteCodigo" style="display: none;">

     <table>
        <tr>
          <td> Numero </td>  
          <td> Nombre </td>
          <td> Direccion </td>
        </tr>

    <?php 
      $sql = "SELECT * from tabla";
      $result=mysqli_query($conexion,$sql);
      $a = 0;
      while ($mostrar=mysqli_fetch_array($result)) {
        $a++
     ?>
    <tr>
      <td><?php echo $a?></td>
      <td><?php echo $mostrar['Nombre']?></td>
      <td><?php echo $mostrar['Direccion']?></td>
    </tr>

  <?php 
}
   ?>
     </table>
 </center>}

</div>

  <div class="site-footer">
    <div class="inner first">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="widget">
            </div>
            <div class="widget">
              <ul class="list-unstyled social">
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-instagram"></span></a></li>
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-linkedin"></span></a></li>
                <li><a href="#"><span class="icon-dribbble"></span></a></li>
                <li><a href="#"><span class="icon-pinterest"></span></a></li>
                <li><a href="#"><span class="icon-apple"></span></a></li>
                <li><a href="#"><span class="icon-google"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-2 pl-lg-5">
            <div class="widget">
              <h3 class="heading">Pages</h3>
              <ul class="links list-unstyled">
                <li><a href="#">Blog</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-2">
            <div class="widget">
              <h3 class="heading">Resources</h3>
              <ul class="links list-unstyled">
                <li><a href="#">Blog</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="widget">
              <h3 class="heading">Contact</h3>
              <ul class="list-unstyled quick-info links">
                <li class="email"><a href="#">mail@example.com</a></li>
                <li class="phone"><a href="#">+1 222 212 3819</a></li>
                <li class="address"><a href="#">43 Raymouth Rd. Baltemoer, London 3910</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>




  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/moment.min.js"></script>
  <script src="js/daterangepicker.js"></script>

  <script src="js/typed.js"></script>
  
  <script src="js/custom.js"></script>

</body>

</html>
