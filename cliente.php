<?php
class Cliente {
    public $nombre;
    public $documento;

    public function __construct($nombre, $documento) {
        $this->nombre = $nombre;
        $this->documento = $documento;
    }

    public function mostrarInfo() {
        return "Cliente: " . $this->nombre . ", Documento: " . $this->documento;
    }

    public function getNombre() {
        return $this->nombre;
    }
}
