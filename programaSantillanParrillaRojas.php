<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido. Nombre. Legajo. Carrera. mail. Usuario Github */
/* Santillan. Juan Ignacio. Legajo: 2691. Carrera: Tecnicatura Universitaria en Desarrollo Web. mail: juan.santillan@est.fi.uncoma.edu.ar 
Usuario GitHub: juani029
*/
/* . Legajo: . Carrera: Tecnicatura Universitaria en Desarrollo Web. mail:  
Usuario GitHub: 
*/
/* . Legajo: . Carrera: Tecnicatura Universitaria en Desarrollo Web. mail:  
Usuario GitHub: 
*/




/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 *Este módulo inicializa una estructura de datos con ejemplos de juegos y retorna la colección de juegos
 *@return array
 */
function cargarJuegos(){
    // array $coleccionJuegos
    $coleccionJuegos = [];
    $coleccionJuegos[0] = ["jugadorCruz"=> "Arturo", "jugadorCirculo" => "Rodrigo", "puntosCruz"=> 4, "puntosCirculo" => 0];
    $coleccionJuegos[1] = ["jugadorCruz"=> "Marcelo", "jugadorCirculo" => "Maria", "puntosCruz"=> 0, "puntosCirculo" => 3];
    $coleccionJuegos[2] = ["jugadorCruz"=> "Roberto", "jugadorCirculo" => "Camila", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[3] = ["jugadorCruz" => "Rodrigo", "jugadorCirculo" => "Marcelo", "puntosCruz" => 2, "puntosCirculo" => 0];
    $coleccionJuegos[4] = ["jugadorCruz" => "Camila", "jugadorCirculo" => "Arturo", "puntosCruz" => 0, "puntosCirculo" => 5];
    $coleccionJuegos[5] = ["jugadorCruz"=> "Maria", "jugadorCirculo" => "Cecilia", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[6] = ["jugadorCruz"=> "Aldana", "jugadorCirculo" => " Daiana", "puntosCruz" => 0, "puntosCirculo" => 2];
    $coleccionJuegos[7] = ["jugadorCruz" => "Cecilia", "jugadorCirculo" => "Aldana", "puntosCruz" => 4, "puntosCirculo" => 0];
    $coleccionJuegos[8] = ["jugadorCruz"=> "Daiana", "jugadorCirculo" => "Marcelo", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[9] = ["jugadorCruz" => "Rodrigo", "jugadorCirculo" => "Arturo", "puntosCruz" => 0, "puntosCirculo" => 2];
    return($coleccionJuegos);
}

/**
 *Este módulo muestra en pantalla el menú de opciones. solicita al usuario que elija una opción. si es válida retorna la opción y sino repite hasta que la opción válida
 *@return int	
 */
function seleccionarOpcion(){
    do {
        echo "Menú de opciones: \n";
		echo "   1)   Jugar al tateti \n";
		echo "   2)   Mostrar un juego \n";
		echo "   3)   Mostrar el primero juego ganador \n";
		echo "   4)   Mostrar porcentaje de Juegos ganados \n";
		echo "   5)   Mostrar resumen de Jugador \n";
		echo "   6)   Mostrar listado de juegos Ordenado por jugador O \n";
		echo "   7)   Salir \n";
		echo "Elija una opción del menú: ";
		$opcion = trim(fgets(STDIN));
} while ($opcion < 1 || $opcion > 7);
	return($opcion);
}

/**
 * Este módulo recibe un número de juego como parámetro y si el juego existe. imprime en pantalla los datos del mismo. Si no existe. repite el proceso hasta que se ingrese un número válido.
 * @param int $nroJuego
 * @param array $coleccionJuegos
 */
function mostrarJuego ($nroJuego){
    echo "**********************";
    echo "Juego TATETI: ". $nroJuego. " (" . $coleccionJuegos["resultado"] .  ")" . "\n";
    echo "Jugador X: " . $coleccionJuegos["jugadorCruz"]. "obtuvo " . $coleccionJuegos["puntosCruz"] . " puntos \n";
    echo "Jugador O: " . $coleccionJuegos["jugadorCirculo"]. "obtuvo " . $coleccionJuegos["puntosCirculo"] . " puntos \n";
    echo "**********************";
}



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

$juego = jugar();
//print_r($juego);
//imprimirResultado($juego);



/*
do {
    $opcion = ...;

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion != X);
*/