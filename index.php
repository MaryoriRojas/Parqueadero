<?php
require_once 'cliente.php';
require_once 'vehiculo.php';
require_once 'parqueadero.php';

$parqueadero = new Parqueadero();

$cliente1 = new Cliente("Andres Bermeo", "123456");
$vehiculo1 = new Vehiculo("MKK740", "Toyota", "Rojo", $cliente1, "08:00");

$cliente2 = new Cliente("Martha Gomez", "654321");
$vehiculo2 = new Vehiculo("NXO767", "Honda", "Azul", $cliente2, "09:30");

$cliente3 = new Cliente("Isabel Vargas", "789012");
$vehiculo3 = new Vehiculo("WMB167", "Ford", "Negro", $cliente3, "10:15");

echo $parqueadero->registrarVehiculo($vehiculo1) . "\n";
echo $parqueadero->registrarVehiculo($vehiculo2) . "\n";
echo $parqueadero->registrarVehiculo($vehiculo3) . "\n";

echo "\nVehiculos Registrados\n";
foreach ($parqueadero->espacios as $vehiculo) {
    echo $vehiculo . "\n";
}

$placaABuscar = "NXO767";
echo "\nBuscando vehiculo con placa: $placaABuscar\n";
echo $parqueadero->buscarVehiculo($placaABuscar) . "\n";

$placaASalir = "MKK740";
$horaSalida = "12:00";
echo "\nRegistrando salida para el vehiculo con placa: $placaASalir\n";
echo $parqueadero->registrarSalida($placaASalir, $horaSalida) . "\n";

echo "\nVehiculos en parqueadero\n";
foreach ($parqueadero->espacios as $vehiculo) {
    echo $vehiculo . "\n";
}