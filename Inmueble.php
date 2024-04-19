<?php
class Inmueble{
    private $codigo;
    private $pisoEnc;
    private $tipoInmueble;
    private $costoMensual;
    private $objInquilino;

	public function __construct($codigo, $pisoEnc, $tipoInmueble, $costoMensual, $refInquilino){
		$this->codigo = $codigo;
		$this->pisoEnc = $pisoEnc;
		$this->tipoInmueble = $tipoInmueble;
		$this->costoMensual = $costoMensual;
		$this->objInquilino = $refInquilino;
	}

	public function getCodigo() {
		return $this->codigo;
	}

	public function setCodigo($code) {
		$this->codigo = $code;
	}

	public function getPisoEnc() {
		return $this->pisoEnc;
	}

	public function setPisoEnc($piso) {
		$this->pisoEnc = $piso;
	}

	public function getTipoInmueble() {
		return $this->tipoInmueble;
	}

	public function setTipoInmueble($tipoInmu) {
		$this->tipoInmueble = $tipoInmu;
	}

	public function getCostoMensual() {
		return $this->costoMensual;
	}

	public function setCostoMensual($costo) {
		$this->costoMensual = $costo;
	}

	public function getObjInquilino() {
		return $this->objInquilino;
	}

	public function setObjInquilino($inquilino) {
		$this->objInquilino = $inquilino;
	}

    public function alquilar($obj){
        if($this->getObjInquilino() == null){
            $this->setObjInquilino($obj);
            return true;
        }
        return false;
    }
    
    public function estaDisponible($tipoUso,$costoMaximo){
        $retorno = true;
        if($this->getObjInquilino() !== null){
            $retorno = false;
        }

        if($this->getTipoInmueble() !== $tipoUso && $this->getCostoMensual() > $costoMaximo){
            $retorno = false;
        }
        if($this->getPisoEnc() !== null){
            $retorno = false;
        }
        return $retorno;
    }

}