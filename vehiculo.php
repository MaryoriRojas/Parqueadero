<?php

class Vehiculo {
    public $placa;
    public $marca;
    public $color;
    public $cliente;
    public $horaIngreso;
    public $horaSalida;

    public function __construct($placa, $marca, $color, $cliente, $horaIngreso) {
        $this->placa = $placa;
        $this->marca = $marca;
        $this->color = $color;
        $this->cliente = $cliente;
        $this->horaIngreso = $horaIngreso;
        $this->horaSalida = null;
    }

    public function getPlaca() {
        return $this->placa;
    }

    public function setHoraSalida($horaSalida) {
        $this->horaSalida = $horaSalida;
    }

    public function calcularValorPagar() {
        if ($this->horaSalida != null) {
            $duracion = (strtotime($this->horaSalida) - strtotime($this->horaIngreso)) / 3600;
            return round($duracion * 2, 2);
        }
        return 0;
    }

    public function __toString() {
        $detalleSalida = $this->horaSalida ? "Hora Salida: " . $this->horaSalida : "En Parqueadero";
        $valorPagar = $this->horaSalida ? "$" . $this->calcularValorPagar() : "";
        return "Placa: " . $this->placa . 
               ", Marca: " . $this->marca . 
               ", Color: " . $this->color . 
               ", Cliente: " . $this->cliente->getNombre() . 
               ", Documento: " . $this->cliente->documento . 
               ", Hora Ingreso: " . $this->horaIngreso . 
               ", " . $detalleSalida . 
               ($valorPagar ? ", Valor a Pagar: " . $valorPagar : "");
    }
}