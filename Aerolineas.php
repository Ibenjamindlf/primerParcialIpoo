<?php
class Aerolineas{
    // Zona de atributos
    private $identificacionInst; # Siendo Inst una abreviacion de instancia
    private $nombreInst; 
    private $colVuelosInst; # array
    // Zona de metodos
    # Metodo __construct
    public function __construct($identificacion,$nombre,$colVuelos) {
        $this -> identificacionInst = $identificacion;
        $this->nombreInst = $nombre;
        $this->colVuelosInst = $colVuelos;
    }
    # Metodos get's (Acceso)
    public function getIdentificacionInst(){
        return $this->identificacionInst;
    }
    public function getNombreInst(){
        return $this->nombreInst;
    }
    public function getColVuelosInst(){
        return $this->colVuelosInst;
    }
    # Metodos set's (Modificacion)
    public function setIdentificacionInst($nuevaIdentificacion){
        $this->identificacionInst = $nuevaIdentificacion;
    }
    public function setNombreInst($nuevoNombre){
        $this->nombreInst = $nuevoNombre;
    }
    public function setColVuelosInst($nuevaColVuelos){
        $this->colVuelosInst = $nuevaColVuelos;
    }
    # Metodo __toString . "\n" .
    public function __toString()
    {
        $vuelos = $this->getColVuelosInst(); # Obtengo la coleccion de vuelos
        $cadenaVuelos = ""; # Inicio la cadena en vacio
        foreach ($vuelos as $vuelo) { # Recorro la coleccion obtenida y voy guardando en vuelo
            $cadenaVuelos .= $vuelo . "\n"; # 
        }

        $cadena = (
            "Identificacion: " . $this->getIdentificacionInst() . "\n" .
            "Nombre: " . $this->getNombreInst() . "\n" .
            "Vuelos: " . $cadenaVuelos . "\n" 
        );
        return $cadena;
    }

    # Metodo darVueloADestino
    /*
    el método  darVueloADestino que recibe por parámetro un destino junto a una cantidad de asientos libres 
    y se debe retornar una colección con los vuelos disponibles a ese destino.
    */
    public function darVueloADestino($destinoIng,$cantAsientosIng){ # Siendo Ing una abreviacion de ingresados
        $colVuelosRet = []; # Inicio el array retorno como vacio
        $colVuelosAerolinea = $this->getColVuelosInst(); # Obtengo la coleccion de vuelos
        foreach ($colVuelosAerolinea as $unVuelo){ # Recorro la coleccion y voy guardando los vuelos en un vuelo
            $elDestino = $unVuelo->getDestinoInst(); # Obtengo el destino haciendo referencia al obj vuelo
            $cantAsientosDis = $unVuelo->getCantAsientosDisInts(); # Obtengo los asientos disponibles haciendo referencia al obj vuelo
            if ($elDestino == $destinoIng && $cantAsientosDis >= $cantAsientosIng){ # Si el destino es el mismo y la cantidad de asientos disponibles es mayor o igual a la ingresada entonces
                array_push($colVuelosRet,$unVuelo); # Guardo ese obj vuelo (unVuelo) en la variable array de retorno  colVuelosret
            }
        }
        return $colVuelosRet;
    }
    # Metodo incorporarVuelo($objUnVuelo)
    /*
    el método incorporarVuelo que recibe como parámetro un vuelo, 
    verifica que no se encuentre registrado ningún otro vuelo al mismo destino, en la misma fecha y con el mismo horario de partida.
    El método debe retornar verdadero si la incorporación del vuelo se realizó correctamente y falso en caso contrario.
    */
    public function incorporarVuelo($objUnVuelo){
        $completoAccion = true; # Variable de retorno para saber si la accion se cumple o no
        $destino = $objUnVuelo->getDestinoInst(); # Obtengo el destino haciendo referencia en el obj vuelo
        $fecha = $objUnVuelo->getFechaInst(); # Obtengo la fecha haciendo referencia en el obj vuelo
        $horarioPartida = $objUnVuelo->getHoraPartidaInst(); # Obtengo el horario de partida haciendo referencia en el obj vuelo
        $coleccionVuelos = $this->getColVuelosInst(); # Obtengo la coleccion de vuelos
        $cantVuelos = count($coleccionVuelos); # Cuento cuantos vuelos hay guardados
        $i = 0; # Establezco una condicion de corte 
        while ($completoAccion && $i<$cantVuelos){ # Mientras, completo accion sea verdadero y el contador sea menor a la cantidad de vuelos entonces
            $vueloGuardado = $coleccionVuelos[$i]; # Obtengo el vuelo en la posicion indicada 
            $destinoVueloGuardado = $vueloGuardado->getDestinoInst(); # Obtengo el destino haciendo referencia en el vuelo guardado
            $fechaVueloGuardado = $vueloGuardado->getFechaInst(); # Obtengo la fecha haciendo referencia en el vuelo guardado
            $horarioPartidaVueloGuardado = $vueloGuardado->getHoraPartidaInst(); # Obtengo el horario partida haciendo referencia en el vuelo guardado
            if($destinoVueloGuardado == $destino && $fechaVueloGuardado == $fecha && $horarioPartidaVueloGuardado == $horarioPartida){ # Veo si hay una similitud
                $completoAccion = false; # Cambio a falso la variable retorno
            }
            $i++;
        }
        return $completoAccion; # Retorno la variable bool dependiendo si se realizo una accion o no
    }
    # Metodo venderVueloADestino ($cantAsientosIng,$destinoIng,$fechaIng)
    /*
    el método venderVueloADestino, que recibe por parámetro: la cantidad de asientos, el destino y una fecha. 
    El método realiza la venta con el primer vuelo encontrado a ese destino, con los asientos disponibles y en la fecha deseada. 
    En la implementación debe invocar al método asignarAsientosDisponibles y retornar la instancia del vuelo asignado o null en caso contrario.
    */
    public function venderVueloADestino ($cantAsientosIng,$destinoIng,$fechaIng){ # Siendo Ing una abreviacion de ingresado
        $vueloAsignado = null; # Inicio mi variable retorno en null por que soy re pesimista
        $coleccionVuelos = $this->getColVuelosInst(); # Obtengo la coleccion de vuelos
        // while ($vueloAsignado != null)
        $cantColVuelos = count($coleccionVuelos); # Cuento la cantidad de vuelos
        $i = 0; # Establezco mi condicion de corte
        while($vueloAsignado == null && $i<$cantColVuelos){ # Mientras vuelo asignado sea nulo y la cantidad de vuelos sea mayor al contador entonces
            $vueloGuardado = $coleccionVuelos[$i]; # Obtengo el vuelo en la posicion indicada 
            $destinoUnVuelo = $vueloGuardado->getDestinoInst(); # Obtengo el destino del vuelo haciendo referencia al vuelo guardado
            $fechaUnVuelo = $vueloGuardado->getFechaInst(); # Obtengo la fecha del vuelo haciendo referencia al vuelo guardado 
            $asientosDispo = $vueloGuardado->asignarAsientosDisponibles($cantAsientosIng); # Obtengo un bool sabiendo si estan disponibles la cant de asientos
            if ($destinoUnVuelo == $destinoIng && $fechaUnVuelo == $fechaIng && $asientosDispo){ # si el destino es el mismo, la fecha es la misma y hay asientos disponibles entonces
                $vueloAsignado = $vueloGuardado; # Guardo el vuelo en la posicion i en vuelo asignado, que deja de valer null
            }
            $i++;
        }
        return $vueloAsignado;
    }
}
?>