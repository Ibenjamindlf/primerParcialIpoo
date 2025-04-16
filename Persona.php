<?php
class Persona{
    // Zona de atributos
    private $nombreInst; # Siendo Inst una abreviacion de instancia
    private $apellidoInst;
    private $direccionInst;
    private $mailInst;
    private $telefonoInst;
    // Zona de metodos
    # Metodo __construct
    public function __construct($nombre,$apellido,$direccion,$mail,$telefono) {
        $this->nombreInst = $nombre;
        $this->apellidoInst = $apellido;
        $this->direccionInst = $direccion;
        $this->mailInst = $mail;
        $this->telefonoInst = $telefono;
    }
    # Metodos get's (Acceso)
    public function getNombreInst(){
        return $this->nombreInst;
    }
    public function getApellidoInst(){
        return $this->apellidoInst;
    }
    public function getDireccionInst(){
        return $this->direccionInst;
    }
    public function getMailInst(){
        return $this->mailInst;
    }
    public function getTelefonoInst(){
        return $this->telefonoInst;
    }
    # Metodos set's (Modificacion)
    public function setNombreInst($nuevoNombre){
        $this->nombreInst = $nuevoNombre;
    }
    public function setApellidoInst($nuevoApellido){
        $this->apellidoInst = $nuevoApellido;
    }
    public function setDireccionInst($nuevaDireccion){
        $this->direccionInst = $nuevaDireccion;
    }
    public function setMailInst($nuevoMail){
        $this->mailInst = $nuevoMail;
    }
    public function setTelefonoInst($nuevoTelefono){
        $this->telefonoInst = $nuevoTelefono;
    }
    # Metodo __toString . "\n" .
    public function __toString()
    {
        $cadena = (
            "Nombre: " . $this->getNombreInst() . "\n" .
            "Apellido: " . $this->getApellidoInst() . "\n" .
            "Direccion: " . $this->getDireccionInst() . "\n" .
            "Mail: " . $this->getMailInst() . "\n" .
            "Telefono: " . $this->getTelefonoInst() . "\n" 
        );
        return $cadena;
    }
}
?>