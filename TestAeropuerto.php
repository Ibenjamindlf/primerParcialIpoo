<?php
include_once 'Aerolineas.php';
include_once 'Aeropuerto.php';
include_once 'Persona.php';
include_once 'Vuelo.php';

$objAerolinea1 = new Aerolineas(45,"Flybondi",[$objVuelo1,$objVuelo2]); # Le asigne el vuelo
$objAerolinea2 = new Aerolineas(30,"AeroArg",[$objVuelo3,$objVuelo4]); # Le asigne el vuelo

$fechaAct = date("Y-m-d"); # Obtengo la fecha actual
$objVuelo1 = new Vuelo(4,1000,$fechaAct,"Argentina",15,16,200,200,[]); # Creo un vuelo con una coleccion de personas vacia por que no tengo referencia en el enunciado
$objVuelo2 = new Vuelo(5,2000,$fechaAct,"Brazil",17,18,300,300,[]); # Creo un vuelo con una coleccion de personas vacia por que no tengo referencia en el enunciado
$objVuelo3 = new Vuelo(6,4000,$fechaAct,"Uruguay",19,20,400,400,[]); # Creo un vuelo con una coleccion de personas vacia por que no tengo referencia en el enunciado
$objVuelo4 = new Vuelo(7,6000,$fechaAct,"Peru",22,23,50,50,[]); # Creo un vuelo con una coleccion de personas vacia por que no tengo referencia en el enunciado

$objAeropuerto = new Aeropuerto("Rio","bahia",[$objAerolinea1,$objAerolinea2]); # Perdon por los nombre, no me funciona el cerebro, son las 17:53

$ventaAutomatica = $objAeropuerto->ventaAutomatica(3,$fechaAct,"Argentina");
echo $ventaAutomatica;

$promedioRecaudadoXAerolinea = $objAeropuerto->promedioRecaudadoXAerolinea(45);
echo $promedioRecaudadoXAerolinea;
?>