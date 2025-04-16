<?php
class Aeropuerto{
    // Zona de atributos
    private $denominacionInst; # Siendo Inst una abreviacion de instancia
    private $direccionInst;
    private $refColAerolineas; # Referencia a aerolineas, array
    // Zona de metodos
    # Metodo
    public function __construct($denominacion,$direccion,$coleccionAerolineas) {
        $this->denominacionInst = $denominacion;
        $this->direccionInst = $direccion;
        $this->refColAerolineas = $coleccionAerolineas;
    }
    # Metodos get's (Acceso)
    public function getDenominacionInst(){
        return $this->denominacionInst;
    }
    public function getDireccionInst(){
        return $this->direccionInst;
    }
    public function getRefColAerolineas(){
        return $this->refColAerolineas;
    }
    # Metodos set's (Modificacion)
    public function setDenominacionInst($nuevaDenominacion){
        $this->denominacionInst = $nuevaDenominacion;
    }
    public function setDireccionInst($nuevaDireccion){
        $this->direccionInst = $nuevaDireccion;
    }
    public function setRefColAerolineas($nuevaRefColAerolinea){
        $this->refColAerolineas = $nuevaRefColAerolinea;
    }
    # Metodo __toString . "\n" .
    public function __toString()
    {
        $aerolineas = $this->getRefColAerolineas(); # Obtengo la coleccion de aerolineas
        $cadenaAerolineas = ""; # Inicio la cadena en vacio
        foreach ($aerolineas as $aerolinea) { # Recorro la coleccion obtenida y voy guardando en aerolinea
            $cadenaAerolineas .= $aerolinea . "\n"; 
        }
        $cadena = (
            "Denominacion: " . $this->getDenominacionInst() . "\n" .
            "Direccion: " . $this->getDireccionInst() . "\n" .
            "Aerolineas: " . $cadenaAerolineas . "\n" 
        );
        return $cadena;
    }
    # Metodo retornarVuelosAerolinea (AerolineaIng)
    /*
    el método retornarVuelosAerolinea que recibe por parámetro una aerolínea 
    y retorna todos los vuelos asignados a esa aerolínea.
    */
    public function retornarVuelosAerolinea ($nombreAerolineaIng){ # Se recibe el nombre de una aerolinea ej: "Flybondi", Siendo Ing una abreviacion de ingresada
        $vuelosAsignadosAerolinea = []; # Establezco la variable retorno como vacia
        $aerolineas = $this->getRefColAerolineas(); # Obtengo la referencia de aerolineas
        foreach ($aerolineas as $unaAerolinea){ # Recorro las aerolineas mientras las guardo en unaAerolinea
            $nombreUnaAerolinea = $unaAerolinea->getNombreInst(); # Obtengo el nombre de la aerolinea
            if ($nombreUnaAerolinea == $nombreAerolineaIng){ # Si el nombre obtenido es igual al nombre ingresado entonces
                $vuelosAerolineas = $unaAerolinea->getColVuelosInst(); # Obtengo la coleccion de vuelos de esa aerolinea 
                array_push($vuelosAsignadosAerolinea,$vuelosAerolineas); # pusheo el vuelo a una variable previamente creada
            }
        }
        return $vuelosAsignadosAerolinea; # retorna todos los vuelos asignados a la aerolinea
    }
    # Metodo ventaAutomatica 
    /*
    el método ventaAutomatica que recibe por parámetro la cantidad de asientos, una fecha y un destino 
    y el aeropuerto realiza automáticamente la asignación al vuelo. 
    Para la implementación de este método debe utilizarse uno de los métodos implementados en la clase Vuelo. 
    */
    public function ventaAutomatica ($cantAsientosIng,$fechaIng,$destinoIng){ # Siendo Ing una abreviacion de ingresada
        $colAerolinea = $this->getRefColAerolineas(); # Obtengo las aerolineas
        $colVuelos = $colAerolinea->getColVuelosInst(); # Obtengo los vuelos 
        $fechaVueloObt = $colVuelos->getFechaInst(); # Obtengo la fecha del vuelo
        $destinoVueloObt = $colVuelos->getDestinoInst(); # Obtengo el destino del vuelo
        $asientosDispo = $colVuelos->asignarAsientosDisponibles($cantAsientosIng); # Obtengo una variable del tipo bool si los asientos estan disponibles 
        if ($asientosDispo && $fechaVueloObt == $fechaIng && $destinoVueloObt == $destinoIng){
            new Vuelo();
        }
    }

    public function promedioRecaudadoXAerolinea($identAerolineaIng){

    }
}
?>