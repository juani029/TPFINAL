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
/* Parrilla . Emiliano Dario. Legajo: 3024 . Carrera: Tecnicatura Universitaria en Desarrollo Web. mail: emiliano.parrilla@est.fi.uncoma.edu.ar 
Usuario GitHub: emilianoparrilla
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
    $coleccionJuegos[0] = ["jugadorCruz"=> "ARTURO", "jugadorCirculo" => "RODRIGO", "puntosCruz"=> 4, "puntosCirculo" => 0];
    $coleccionJuegos[1] = ["jugadorCruz"=> "MARCELO", "jugadorCirculo" => "MARIA", "puntosCruz"=> 0, "puntosCirculo" => 3];
    $coleccionJuegos[2] = ["jugadorCruz"=> "ROBERTO", "jugadorCirculo" => "CAMILA", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[3] = ["jugadorCruz" => "RODRIGO", "jugadorCirculo" => "MARCELO", "puntosCruz" => 2, "puntosCirculo" => 0];
    $coleccionJuegos[4] = ["jugadorCruz" => "CAMILA", "jugadorCirculo" => "ARTURO", "puntosCruz" => 0, "puntosCirculo" => 5];
    $coleccionJuegos[5] = ["jugadorCruz"=> "MARIA", "jugadorCirculo" => "CECILIA", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[6] = ["jugadorCruz"=> "ALDANA", "jugadorCirculo" => "DAIANA", "puntosCruz" => 0, "puntosCirculo" => 2];
    $coleccionJuegos[7] = ["jugadorCruz" => "CECILIA", "jugadorCirculo" => "ALDANA", "puntosCruz" => 4, "puntosCirculo" => 0];
    $coleccionJuegos[8] = ["jugadorCruz"=> "DAIANA", "jugadorCirculo" => "MARCELO", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[9] = ["jugadorCruz" => "RODRIGO", "jugadorCirculo" => "ARTURO", "puntosCruz" => 0, "puntosCirculo" => 2];
    return($coleccionJuegos);
}

/**
 * Función 2
 *Este módulo muestra en pantalla el menú de opciones, solicita al usuario que elija una opción, si es válida retorna la opción y sino repite hasta que la opción válida
 *@return int	
 */
function seleccionarOpcion(){
    // int $opValida
    do {
        echo "Menú de opciones: \n";
		echo "   1)   Jugar al tateti \n";
		echo "   2)   Mostrar un juego \n";
		echo "   3)   Mostrar el primer juego ganador \n";
		echo "   4)   Mostrar porcentaje de Juegos ganados \n";
		echo "   5)   Mostrar resumen de Jugador \n";
		echo "   6)   Mostrar listado de juegos Ordenado por jugador O (circulo) \n";
		echo "   7)   Salir \n";
		echo "Elija una opción del menú: ";
		$opValida = trim(fgets(STDIN));
        if($opValida < 1 || $opValida > 7){
            echo "La opcion elegida no es válida, por favor ingrese un número entre el 1 y el 7. \n";
        }
} while ($opValida < 1 || $opValida > 7);
	return($opValida);
}

/**
 * Función 4
 * Este módulo recibe un número de juego como parámetro e imprime en pantalla los datos del mismo. 
 * @param int $nroJuego
 * @param array $juegosCargados
 */
function mostrarJuego ($nroJuego, $juegosCargados){// Consultar Catedra
    /* string $resultado */
    /* int $auxNroJuego */
    if ($juegosCargados[$nroJuego]["puntosCruz"] > $juegosCargados[$nroJuego]["puntosCirculo"]){
        $resultado = "ganó X";
    }else if ($juegosCargados[$nroJuego]["puntosCruz"] < $juegosCargados[$nroJuego]["puntosCirculo"]){
        $resultado = "ganó O";
    }else{
        $resultado = "empate";
    }
    $auxNroJuego  = $nroJuego + 1;
    echo "******************************************\n";
    echo "Juego TATETI: ". $auxNroJuego . "(" . $resultado . ") \n";
    echo "Jugador X: " . $juegosCargados[$nroJuego]["jugadorCruz"]. " obtuvo " . $juegosCargados[$nroJuego]["puntosCruz"] . " puntos \n";
    echo "Jugador O: " . $juegosCargados[$nroJuego]["jugadorCirculo"]. " obtuvo " . $juegosCargados[$nroJuego]["puntosCirculo"] . " puntos \n";
    echo "******************************************\n";
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

/**
 * Función 6
 * Este módulo recibe como parámetros la colección de juegos y el nombre de un jugador, y retorna, 
 * si existe, su primer juego ganado.
 * @param string $nombreBuscado
 * @param array $coleccionBuscada
 * @return int
 */
function primerGanado ($nombreBuscado, $coleccionBuscada) {
    /* int $n, $i, $primerJuegoGanado */
    /* boolean $gano, $corte */
    
    $n = count($coleccionBuscada);
    $i = 0;
    $corte = true;
    $primerJuegoGanado = -1;
    while ($i < $n && $corte){
        if ($coleccionBuscada[$i]["jugadorCruz"] == $nombreBuscado){
            if ($coleccionBuscada[$i]["puntosCruz"] > $coleccionBuscada[$i]["puntosCirculo"]){
                $primerJuegoGanado = $i;
                $corte = false;
          
            }
            
        }elseif ($coleccionBuscada[$i]["jugadorCirculo"] == $nombreBuscado){
            if ($coleccionBuscada[$i]["puntosCirculo"] > $coleccionBuscada[$i]["puntosCruz"]){
                $primerJuegoGanado = $i;
                $corte = false;          
            }            
        }    
        $i = $i + 1;             
    }
    return $primerJuegoGanado;                 
}
    /**
     *Funcion 8
     *Este módulo solicita al usuario un símbolo y valida que sea (X o O) y retorna el mismo en mayúsculas
     *@return string
     */
   
    function validarSimbolo(){
        // string $simbolo
        do {
            echo "Ingrese un símbolo (X o O):";
            $simbolo = strtoupper(trim(fgets(STDIN)));
        } while ($simbolo <> "X" && $simbolo <> "O");
	    return $simbolo;
    }
	
     /**
     *Funcion 9
     *Este módulo recorre la colección y contabiliza la cantidad de juegos ganados total
     *@param array $coleccion
     *@return int
     */	
    function contarJuegosGanados($coleccion){
        // int $i, $n, $cantJuegosGanados 
        $n = count($coleccion);
        $cantJuegosGanados = 0;
        for ($i=0; $i < $n ; $i++) { 
            if ($coleccion[$i]["puntosCruz"] <> $coleccion[$i]["puntosCirculo"]) {
                $cantJuegosGanados = $cantJuegosGanados + 1;
            }
        }
        return $cantJuegosGanados;
    }
	
    /**
     *Funcion 10
     *Este módulo dada una coleccion y un símbolo, retorna la cantidad de juegos ganados por el símbolo ingresado
     *@param array $arregloJuegos
     *@param string $simboloIngresado
     *@return int
     */	
    function contarGanadosSimbolo($arregloJuegos, $simboloIngresado){
        // int $i, $n, $cantGanadosSimbolo
        $n = count($arregloJuegos);
        $cantGanadosSimbolo = 0;
        if ($simboloIngresado == "X") {
            for ($i=0; $i < $n ; $i++){
                if ($arregloJuegos[$i]["puntosCruz"] > $arregloJuegos[$i]["puntosCirculo"]){
                    $cantGanadosSimbolo =  $cantGanadosSimbolo + 1;
                }
            }
        }else{ 
            for ($i=0; $i < $n ; $i++){
                if ($arregloJuegos[$i]["puntosCruz"] < $arregloJuegos[$i]["puntosCirculo"]){
                    $cantGanadosSimbolo =  $cantGanadosSimbolo + 1;
                }
            }
        }
        return $cantGanadosSimbolo; 
    }

    /**
     * Este módulo recibe una colección de juegos y un nombre de un jugador, y retorna un array con el resumen del jugador.
     * @param array $arregloJuegosTotales
     * @param string $nombreJugador
     * @return array
     */
    
    function mostrarResumen ($arregloJuegosTotales, $nombreJugador){
        //array $resumenJugador
        //int $i, $juegosGanados, $juegosPerdidos, $juegosEmpatados, $puntosAcumulados
        $resumenJugador = [];
        $juegosGanados = 0;
        $juegosPerdidos = 0;
        $juegosEmpatados = 0;
        $puntosAcumulados = 0;

        for ($i=0; $i < count ($arregloJuegosTotales); $i++) { 
            if ($arregloJuegosTotales[$i]["jugadorCruz"] == $nombreJugador){
                if ($arregloJuegosTotales[$i]["puntosCruz"] > $arregloJuegosTotales[$i]["puntosCirculo"]){
                    $juegosGanados = $juegosGanados + 1;
                    $puntosAcumulados = $puntosAcumulados + $arregloJuegosTotales[$i]["puntosCruz"];                    
                }else if ($arregloJuegosTotales[$i]["puntosCruz"] < $arregloJuegosTotales[$i]["puntosCirculo"]){
                    $juegosPerdidos = $juegosPerdidos + 1;
                }else{
                    $juegosEmpatados = $juegosEmpatados + 1;
                    $puntosAcumulados = $puntosAcumulados + 1;
                }
            }else if($arregloJuegosTotales[$i]["jugadorCirculo"] == $nombreJugador){
                if ($arregloJuegosTotales[$i]["puntosCruz"] < $arregloJuegosTotales[$i]["puntosCirculo"]){
                    $juegosGanados = $juegosGanados + 1;
                    $puntosAcumulados = $puntosAcumulados + $arregloJuegosTotales[$i]["puntosCirculo"];                    
                }else if ($arregloJuegosTotales[$i]["puntosCruz"] > $arregloJuegosTotales[$i]["puntosCirculo"]){
                    $juegosPerdidos = $juegosPerdidos + 1;
                }else{
                    $juegosEmpatados = $juegosEmpatados + 1;
                    $puntosAcumulados = $puntosAcumulados + 1;
                }
            }            
        }        
        $resumenJugador["nombre"] = $nombreJugador;
        $resumenJugador["ganados"] = $juegosGanados;
        $resumenJugador["perdidos"] = $juegosPerdidos;
        $resumenJugador["empatados"] = $juegosEmpatados;
        $resumenJugador["puntajeTotal"] = $puntosAcumulados;
        return $resumenJugador;
    }    
    /**
    * Este módulo compara dos string y retorna un entero.
    * @param string $a
    * @param string $b
    * @return int
    */
    function cmp($a, $b){
        if ($a["jugadorCirculo"] == $b["jugadorCirculo"]) {
            return 0;
     }return ($a["jugadorCirculo"] < $b["jugadorCirculo"]) ? -1 : 1;
    }
    /**
     * Este módulo recibe un nombre, recorre una colección y valida si existe dentro la misma
     * @param string $nombre
     * @param array $coleccion
     * @return int
     */
    function existeJugador($nombre, $coleccion){
        // boolean $corte
        // int $n, $i, $existe
        $i = 0;
        $n = count($coleccion);
        $corte = true;
        $existe = 0;
        while ($i < $n && $corte) {
            if($nombre == $coleccion[$i]["jugadorCruz"] || $nombre == $coleccion[$i]["jugadorCirculo"]){
                $corte = false;
                $existe = -1;
            }
            $i = $i + 1;
        }
        return $existe;
    }



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
    /* array $datosJuegoNuevo , $juegosTotales, $resumenJuego */
    /* int $numeroJuego, $juegoGanador1, $totalGanados, $totalGanadosSimbolo, $validacion */
    /* float $porcentajeGanados */
    /* string $nombreABuscar, $simboloValidado, $nombreResumen */
//Inicialización de variables:
    $juegosTotales = cargarJuegos();


//Proceso:




 do {
    $opcion = seleccionarOpcion();

    switch ($opcion) { //Corresponde a una estructura de control Alternativa.
        case 1: 
            //Jugar al TATETI
            $datosJuegoNuevo = jugar();
            imprimirResultado($datosJuegoNuevo);
            $juegosTotales = agregarJuego($juegosTotales,count($juegosTotales),$datosJuegoNuevo["jugadorCruz"],$datosJuegoNuevo["jugadorCirculo"],$datosJuegoNuevo["puntosCruz"],$datosJuegoNuevo["puntosCirculo"]);        
            break;
        case 2: 
            //Mostrar un juego
            echo "Ingrese un número de juego: ";       
            $numeroJuego = solicitarNumeroEntre(1,count($juegosTotales));            
            mostrarJuego($numeroJuego - 1, $juegosTotales);
            break;
        case 3: 
            //Mostrar el primer juego ganador
            do {
                echo "Ingrese su nombre para conocer su primer juego ganado: ";
                $nombreABuscar = strtoupper(trim(fgets(STDIN)));
                $validacion = existeJugador($nombreABuscar, $juegosTotales);
                if ($validacion == -1){
                    $juegoGanador1 = primerGanado($nombreABuscar, $juegosTotales);
                    if ($juegoGanador1 <> -1){
                        mostrarJuego($juegoGanador1, $juegosTotales);
                    }else{
                        echo "El jugador " . $nombreABuscar . " no ganó ningún juego.\n";        
                    }
                }else {
                    echo "El jugador no existe, por favor ingrese otro \n";
                }
            } while ($validacion <> -1);
            
            break;
        case 4:
            //Mostrar porcentaje de juegos ganados
            $simboloValidado = validarSimbolo();
            $totalGanados = contarJuegosGanados($juegosTotales);
            $totalGanadosSimbolo = contarGanadosSimbolo($juegosTotales, $simboloValidado);
            $porcentajeGanados = $totalGanadosSimbolo * 100 / $totalGanados;
            echo $simboloValidado . " ganó el: " . $porcentajeGanados . " % de los juegos ganados.\n";
            break;
        case 5:
            //Mostrar Resumen
            do {
                echo "Ingrese nombre de jugador para ver su resumen de juego: ";
            $nombreResumen = strtoupper(trim(fgets(STDIN)));
            $validacion = existeJugador($nombreResumen, $juegosTotales);
            if ($validacion == -1){
                $resumenJuego = mostrarResumen($juegosTotales,$nombreResumen);
                echo "************************************************\n";
                echo "Jugador : " . $resumenJuego["nombre"] . "\n";
                echo "Ganó : " . $resumenJuego["ganados"] . "\n";
                echo "Perdió : " . $resumenJuego["perdidos"] . "\n";
                echo "Empató : " . $resumenJuego["empatados"] . "\n";
                echo "Total de puntos acumulados : " . $resumenJuego["puntajeTotal"] . " puntos" . "\n";
                echo "*************************************************\n";
            }else {
                echo "El jugador no existe, por favor ingrese otro. \n";
            }
            } while ($validacion <> -1);
            
            break;
        //Consultar por el uasort, funciones de comparación, representacion de estructuras, si el echo print esta bien hecho
        case 6:
            //Mostrar listado de juegos Ordenado por jugador O
            uasort($juegosTotales, 'cmp'); // Esta función ordena un array con una función de comparacion definida por el usuario y mantiene la asociación de índices.
            print_r($juegosTotales) . "\n"; // Esta función muestra en pantalla un array
            break;
    }
} while ($opcion != 7);

