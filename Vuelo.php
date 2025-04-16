<?php
class Vuelo{
    // Zona de atributos
    private $numeroInst; #Siendo Inst una abreviacion de instancia
    private $importeInst;
    private $fechaInst;
    private $destinoInst;
    private $horaArriboInst;
    private $horaPartidaInst;
    private $cantAsientosTotInst; # Siendo tot una abreviacion de totales
    private $cantAsientosDisInts; # Siendo dis una abreviacion de totales
    private $refPersonaInst; # referencia a la clase persona, array 
    // Zona de metodos
    # Metodo __construct
    public function __construct($numero,$importe,$fecha,$destino,$horaArribo,$horaPartida,$cantAsientosTot,$cantAsientosDis,$refPersona) {
        $this->numeroInst = $numero;
        $this->importeInst = $importe;
        $this->fechaInst = $fecha;
        $this->destinoInst = $destino;
        $this->horaArriboInst = $horaArribo;
        $this->horaPartidaInst = $horaPartida;
        $this->cantAsientosTotInst = $cantAsientosTot;
        $this->cantAsientosDisInts = $cantAsientosDis;
        $this->refPersonaInst = $refPersona;
    }
    # Metodos get's (Acceso)
    public function getNumeroInst(){
        return $this->numeroInst;
    }
    public function getImporteInst(){
        return $this->importeInst;
    }
    public function getFechaInst(){
        return $this->fechaInst;
    }
    public function getDestinoInst(){
        return $this->destinoInst;
    }
    public function getHoraArriboInst(){
        return $this->horaArriboInst;
    }
    public function getHoraPartidaInst(){
        return $this->horaPartidaInst;
    }
    public function getCantAsientosTotInst(){
        return $this->cantAsientosTotInst;
    }
    public function getCantAsientosDisInts(){
        return $this->cantAsientosDisInts;
    }
    public function getRefPersonaInst(){
        return $this->refPersonaInst;
    }
    # Metodos set's (Modificacion)
    public function setNumeroInst($nuevoNumero){
        $this->numeroInst = $nuevoNumero;
    }
    public function setImporteInst($nuevoImporte){
        $this->importeInst = $nuevoImporte;
    }
    public function setFechaInst($nuevaFecha){
        $this->fechaInst = $nuevaFecha;
    }
    public function setDestinoInst($nuevoDestino){
        $this->destinoInst = $nuevoDestino;
    }
    public function setHoraArriboInst($nuevaHoraArribo){
        $this->horaArriboInst = $nuevaHoraArribo;
    }
    public function setHoraPartidaInst($nuevaHoraPartida){
        $this->horaPartidaInst = $nuevaHoraPartida;
    }
    public function setCantAsientosTotInst($nuevaCantAsientosTot){
        $this->cantAsientosTotInst = $nuevaCantAsientosTot;
    }
    public function setCantAsientosDisInts($nuevaCantAsientosDis){
        $this->cantAsientosDisInts = $nuevaCantAsientosDis;
    }
    public function setRefPersonaInst($nuevaPersona){
        $this->refPersonaInst = $nuevaPersona;
    }
    # Metodo __toString
    public function __toString()
    {
        $cadena = (
            ""
        );
        return $cadena;
    }
    # Metodo asignarAsientosDisponibles 
    /*
    el método asignarAsientosDisponibles que recibe por parámetros la cantidad de asientos que desean asignarse
    y de ser necesario actualizando la información del vuelo.
    El método retorna verdadero en caso que la asignación puedo concretarse y falso en caso contrario.
    */
    public function asignarAsientosDisponibles($cantAsientosAsignados){
        $asientosDisponibles = $this->getCantAsientosDisInts(); # Obtengo la cantidad de asientos disponibles 
        if ($cantAsientosAsignados>$asientosDisponibles) { # Si la cantidad de asientos a asignar es mayor a los disponibles entonces
            $respuesta = false; # la variable retorno se para en false, por que no es posible 
        } else { # si no
            $respuesta = true; # la variable retorno se para en true, por que es posible
            $nuevaCantidadAsientos = ($cantAsientosAsignados - $asientosDisponibles); # Calcula la nueva cantidad de asientos
            $this->setCantAsientosDisInts($nuevaCantidadAsientos); # Actualiza la informacion de los asiendos disponibles
        }
        return $respuesta; 
    }
}
?>