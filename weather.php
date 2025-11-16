<?php
$ciudad = "Funes";
$pais = "Argentina";
$url = "http://api.openweathermap.org/data/2.5/weather?q=".$ciudad.",".$pais."&appid=YOUR_API_KEY";
$datos_clima = json_decode(file_get_contents($url), true);
$temperatura = $datos_clima['main']['temp'];
$icono = $datos_clima['weather'][0]['icon'];
$descripcion = $datos_clima['weather'][0]['description'];
$imagen = "http://openweathermap.org/img/w/".$icono.".png";
echo "<p>La temperatura actual en ".$ciudad." es de ".$temperatura." grados Celsius.</p>";
echo "<p>".$descripcion."</p>";
echo "<img src='".$imagen."'>";
?>
