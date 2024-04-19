<?php
class Persona{
    private $tipoDoc;
    private $nroDoc;
    private $nombre;
    private $apellido;
    private $telefono;

	public function __construct($tipoDoc, $nroDoc, $nombre, $apellido, $telefono) {
		$this->tipoDoc = $tipoDoc;
		$this->nroDoc = $nroDoc;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->telefono = $telefono;
	}

	public function getTipoDoc() {
		return $this->tipoDoc;
	}

	public function setTipoDoc($docTipo) {
		$this->tipoDoc = $docTipo;
	}

	public function getNroDoc() {
		return $this->nroDoc;
	}

	public function setNroDoc($numDoc) {
		$this->nroDoc = $numDoc;
	}

	public function getNombre() {
		return $this->nombre;
	}

	public function setNombre($name) {
		$this->nombre = $name;
	}

	public function getApellido() {
		return $this->apellido;
	}

	public function setApellido($apell) {
		$this->apellido = $apell;
	}

	public function getTelefono() {
		return $this->telefono;
	}

	public function setTelefono($celu) {
		$this->telefono = $celu;
	}

    public function __toString() {
        return "Tipo de documento: " . $this->getTipoDoc() .
               "\nNúmero de documento: " . $this->getNroDoc() .
               "\nNombre: " . $this->getNombre() .
               "\nApellido: " . $this->getApellido() .
               "\nTeléfono: " . $this->getTelefono();
    }

}