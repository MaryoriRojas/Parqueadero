<?php

class Parqueadero {
    public $espacios;
    public $capacidad;

    public function __construct($pisos = 4, $espaciosPorPiso = 10) {
        $this->capacidad = $pisos * $espaciosPorPiso;
        $this->espacios = array();
    }

    public function registrarVehiculo($vehiculo) {
        if (count($this->espacios) < $this->capacidad) {
            $this->espacios[] = $vehiculo;
            return "Vehiculo registrado exitosamente.";
        } else {
            return "No hay espacio disponible en el parqueadero.";
        }
    }

    public function buscarVehiculo($placa) {
        foreach ($this->espacios as $index => $vehiculo) {
            if ($vehiculo->getPlaca() === $placa) {
                $piso = floor($index / 10) + 1;
                $espacio = $index % 10 + 1;
                return $vehiculo . ", Piso: " . $piso . ", Espacio: " . $espacio;
            }
        }
        return "Vehiculo no encontrado.";
    }

    public function registrarSalida($placa, $horaSalida) {
        foreach ($this->espacios as $index => $vehiculo) {
            if ($vehiculo->getPlaca() === $placa) {
                $vehiculo->setHoraSalida($horaSalida);
                $valor = $vehiculo->calcularValorPagar();
                $horaIngreso = $vehiculo->horaIngreso;
                unset($this->espacios[$index]);
                return "El vehiculo estuvo desde " . $horaIngreso . " hasta " . $horaSalida . 
                       ". El valor a pagar es: $" . $valor;
            }
        }
        return "Vehiculo no encontrado.";
    }
}