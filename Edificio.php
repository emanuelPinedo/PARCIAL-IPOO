<?php
class Edificio{
    private $direccion;
    private $objAdministrador;
    private $colInmuebles;

	public function __construct($direccion, $objAdministrador) {
		$this->direccion = $direccion;
		$this->objAdministrador = $objAdministrador;
		$this->colInmuebles = [];
	}

	public function getDireccion() {
		return $this->direccion;
	}

	public function setDireccion($direc) {
		$this->direccion = $direc;
	}

	public function getObjAdministrador() {
		return $this->objAdministrador;
	}

	public function setObjAdministrador($persona) {
		$this->objAdministrador = $persona;
	}

	public function getColInmuebles() {
		return $this->colInmuebles;
	}

	public function setColInmuebles($inmuebles) {
		$this->colInmuebles = $inmuebles;
	}

	public function darInmueblesDisponibles($tipoUso,$costoMaximo){
        $colDisponible = [];
        $coleccionInmebles = $this->getColInmuebles();

        foreach ($coleccionInmebles as $objInmueble) {
            if ($objInmueble->estaDisponible($tipoUso,$costoMaximo)){//estaDisponible hace todo lo del if del metodo anterior.
                $colDisponible = $objInmueble;
            }
        }
        return $colDisponible;
    }

	public function buscarInmueble($objInmueble){
		$cont = 0;
		$encontrarInmueble = false;
		$rta = -1;
		$coleccionInmuebles = $this->getColInmuebles();
		while($cont < count($this->getColInmuebles()) && !$encontrarInmueble){
			if($coleccionInmuebles[$cont] === $objInmueble){
				$rta = $cont;
				$encontrarInmueble = true;
			}
			$cont++;
		}
		return $rta;
    }

	public function registrarAlquilerInmueble($tipoUso,$montoMaximo,$objPersona){
        $alquilerDisponible = false;
		$i = 0;

		while($i < count($this->getColInmuebles()) && !$alquilerDisponible){
			$colecInmueble = $this->getColInmuebles()[$i];

			if($colecInmueble->estaDisponible($tipoUso, $montoMaximo) && $this->verificarPiso($colecInmueble,$i)){
				$colecInmueble->alquilar($objPersona);
				$alquilerDisponible = true;
			}
			$i++;
		}
		return $alquilerDisponible;
	}

	private function verificarPiso($inmueb, $indice){//Privada ya q nomas la usa registrarAlquilerInmueble.
		$tipoInmueble = $inmueb->getTipoInmueble();
		$piso = $inmueb->getPisoEnc();
	
		$alquilados = true;
	
		$i = 0;
		while ($i < $indice && $alquilados) {
			$otroInmueble = $this->getColInmuebles()[$i];
	
			if ($otroInmueble->getTipoInmueble() == $tipoInmueble && 
				$otroInmueble->getPisoEnc() == $piso && 
				$otroInmueble->getObjInquilino() === null) {
				$alquilados = false;
			}
	
			$i++;
		}
	
		return $alquilados;
	}

	public function calculaCostoEdificio(){
		$costo = 0;
		foreach($this->getColInmuebles() as $unInm){
			if($unInm->getObjInquilino() !== null){//en el punto 18 le falta un = al null.
				$costo += $unInm->getCostoMensual();
			}
		}
		return $costo;
	}

	public function agregarInmueble($inmueble){
        $coleInmuebles = $this->getColInmuebles();
        array_push($coleInmuebles,$inmueble);
        $this->setColInmuebles($coleInmuebles);
    }

	public function retornaInmueb($coleInmuebles){
        $rta = "";
        foreach ($coleInmuebles as $inmueble) {
			$rta .= "Código: " . $inmueble->getCodigo() . 
					", Piso: " . $inmueble->getPisoEnc() . 
					", Tipo: " . $inmueble->getTipoInmueble() . 
					", Costo Mensual: " . $inmueble->getCostoMensual() . "\n";
		}
		return $rta;
	}

	public function __toString(){
		$res = "no hay inmuebles";
		$col = $this->getColInmuebles();
        if ($this->getColInmuebles() !== []) {
            $res = $this->retornaInmueb($col);
        }
		return "Dirección: " . $this->getDireccion() . 
		"\nAdministrador/Persona Encargada: " . $this->getObjAdministrador() . 
		"\nInmuebles: " . $res;
	}

}