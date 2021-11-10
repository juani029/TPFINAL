<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido. Nombre. Legajo. Carrera. mail. Usuario Github */
/* Santillan. Juan Ignacio. Legajo: 2691. Carrera: Tecnicatura Universitaria en Desarrollo Web. mail: juan.santillan@est.fi.uncoma.edu.ar 
Usuario GitHub: juani029
*/
/* Rojas. Luciano Agustin. Legajo: 3585 . Carrera: Tecnicatura Universitaria en Desarrollo Web. mail: luciano.rojas@est.fi.uncoma.edu.ar  
Usuario GitHub: AgusDevelop
*/
/* . Legajo: . Carrera: Tecnicatura Universitaria en Desarrollo Web. mail:  
Usuario GitHub: 
*/




/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Función 1
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
 * Función 2
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
 * Función 4
 * Este módulo recibe un número de juego como parámetro e imprime en pantalla los datos del mismo. 
 * @param int $nroJuego
 */
function mostrarJuego ($nroJuego){
    /* string $resultado */
    /* array $juegosCargados */
    $juegosCargados = cargarJuegos();
    if ($juegosCargados[$nroJuego]["puntosCruz"] > $juegosCargados[$nroJuego]["puntosCirculo"]){
        $resultado = "ganó X";
    }else if ($juegosCargados[$nroJuego]["puntosCruz"] < $juegosCargados[$nroJuego]["puntosCirculo"]){
        $resultado = "ganó O";
    }else{
        $resultado = "empate";
    }
    echo "**********************";
    echo "Juego TATETI: ". $nroJuego . "(" . $resultado . ") \n";
    echo "Jugador X: " . $juegosCargados[$nroJuego]["jugadorCruz"]. "obtuvo " . $juegosCargados[$nroJuego]["puntosCruz"] . " puntos \n";
    echo "Jugador O: " . $juegosCargados[$nroJuego]["jugadorCirculo"]. "obtuvo " . $juegosCargados[$nroJuego]["puntosCirculo"] . " puntos \n";
    echo "**********************";
}

/**
 * Función 5
 * Este módulo recibe una colección y un juego y lo agrega al array.
 * @param array $coleccion
 * @param string $nombreCruz, $nombreCirculo
 * @param int $puntajeX, $puntajeO
 * @param int $juego
 * @return array
 */
function agregarJuego ($coleccion, $juego, $nombreCruz, $nombreCirculo, $puntajeX, $puntajeO){
    $coleccion[$juego] = ["jugadorCruz"=> $nombreCruz, "jugadorCirculo" => $nombreCirculo, "puntosCruz"=> $puntajeX, "puntosCirculo" => $puntajeO];
    return ($coleccion);
}


    


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
    /* array $juego */
    /* int $numeroJuego */
//Inicialización de variables:
    cargarJuegos();

//Proceso:




/* do {
    $opcion = seleccionarOpcion();

    
    switch ($opcion) {
        case 1: 
            //Jugar al TATETI
            $juego = jugar();
            //print_r($juego);
            //imprimirResultado($juego);

            break;
        case 2: 
            //Mostrar un juego
            echo "Ingrese un número de juego: ";       
            $numeroJuego = solicitarNumeroEntre(1,count($colecccionJuegos));            
            imprimirResultado($juego);

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion != X); */
