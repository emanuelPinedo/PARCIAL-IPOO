<?php
include 'Edificio.php';
include 'Inmueble.php';
include 'Persona.php';
//Punto 19
$objPersona = new Persona("DNI", 27432561, "Carlos", "Martinez", 154321233);
$objEdificio = new Edificio("Juab B. Justo 3456", $objPersona, []);

//Punto 20
$objPersonaInm1 = new Persona("DNI", 12333456, "Pepe", "Suarez", "4456722");
$objPersonaInm3 = new Persona("DNI", 12333422, "Pedro", "Suarez", "446678");

$objInmueble1 = new Inmueble(11, 1, "local comercial", 50000, $objPersonaInm1);
$objInmueble2 = new Inmueble(12, 1, "local comercial", 50000, null);
$objInmueble3 = new Inmueble(13, 2, "departamento", 35000, $objPersonaInm3);
$objInmueble4 = new Inmueble(14, 2, "departamento", 35000, null);
$objInmueble5 = new Inmueble(15, 3, "departamento", 35000, null);

//Punto 21
$objEdificio->agregarInmueble($objInmueble1);
$objEdificio->agregarInmueble($objInmueble2);
$objEdificio->agregarInmueble($objInmueble3);
$objEdificio->agregarInmueble($objInmueble4);
$objEdificio->agregarInmueble($objInmueble5);

//Punto 25
echo $objEdificio;

//Punto 22
$inmueblesDisp = $objEdificio->darInmueblesDisponibles("departamento", 550000);
echo "Inmuebles disponibles:\n";
foreach ($inmueblesDisp as $inmueble) {
    echo $inmueble . "\n";
}

//Punto 23
$objPersonaReg = new Persona("DNI", 28765436, "Mariela","Suarez",25543562);
$registra = $objEdificio->registrarAlquilerInmueble("departamento",550000,$objPersonaReg);
if($registra){
    echo "Alquiler registrado.";
} else {
    echo "No se pudo registrar.";
}