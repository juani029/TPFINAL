<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/


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
*Este módulo inicializa una estructura de datos con ejemplos de juegos y retorna la colección de juegos
*@return array
*/
function cargarJuegos(){
    // array $coleccion
    $coleccion = [];
    $coleccion[0] = ["jugadorCruz"=> "ARTURO", "jugadorCirculo" => "RODRIGO", "puntosCruz"=> 4, "puntosCirculo" => 0];
    $coleccion[1] = ["jugadorCruz"=> "MARCELO", "jugadorCirculo" => "MARIA", "puntosCruz"=> 0, "puntosCirculo" => 3];
    $coleccion[2] = ["jugadorCruz"=> "ROBERTO", "jugadorCirculo" => "CAMILA", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccion[3] = ["jugadorCruz" => "RODRIGO", "jugadorCirculo" => "MARCELO", "puntosCruz" => 2, "puntosCirculo" => 0];
    $coleccion[4] = ["jugadorCruz" => "CAMILA", "jugadorCirculo" => "ARTURO", "puntosCruz" => 0, "puntosCirculo" => 5];
    $coleccion[5] = ["jugadorCruz"=> "MARIA", "jugadorCirculo" => "CECILIA", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccion[6] = ["jugadorCruz"=> "ALDANA", "jugadorCirculo" => "DAIANA", "puntosCruz" => 0, "puntosCirculo" => 2];
    $coleccion[7] = ["jugadorCruz" => "CECILIA", "jugadorCirculo" => "ALDANA", "puntosCruz" => 4, "puntosCirculo" => 0];
    $coleccion[8] = ["jugadorCruz"=> "DAIANA", "jugadorCirculo" => "MARCELO", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccion[9] = ["jugadorCruz" => "RODRIGO", "jugadorCirculo" => "ARTURO", "puntosCruz" => 0, "puntosCirculo" => 2];
    return($coleccion);
}


/**
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
* Este módulo recibe un número de juego como parámetro e imprime en pantalla los datos del mismo. 
* @param int $nroJuego
* @param array $coleccion
*/
function mostrarJuego ($nroJuego, $coleccion){
    /* string $resultado */
    /* int $auxNroJuego */
    if ($coleccion[$nroJuego]["puntosCruz"] > $coleccion[$nroJuego]["puntosCirculo"]){
        $resultado = "ganó X";
    }else if ($coleccion[$nroJuego]["puntosCruz"] < $coleccion[$nroJuego]["puntosCirculo"]){
        $resultado = "ganó O";
    }else{
        $resultado = "empate";
    }
    $auxNroJuego  = $nroJuego + 1;
    echo "******************************************\n";
    echo "Juego TATETI: ". $auxNroJuego . "(" . $resultado . ") \n";
    echo "Jugador X: " . $coleccion[$nroJuego]["jugadorCruz"]. " obtuvo " . $coleccion[$nroJuego]["puntosCruz"] . " puntos \n";
    echo "Jugador O: " . $coleccion[$nroJuego]["jugadorCirculo"]. " obtuvo " . $coleccion[$nroJuego]["puntosCirculo"] . " puntos \n";
    echo "******************************************\n";
}


/**
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
* Este módulo recibe como parámetros la colección de juegos y el nombre de un jugador, y retorna, 
* si existe, su primer juego ganado.
* @param string $nombreBuscado
* @param array $coleccion
* @return int
*/
function primerGanado ($nombreBuscado, $coleccion) {
    /* int $n, $i, $primerJuegoGanado */
    /* boolean $gano, $corte */
    $n = count($coleccion);
    $i = 0;
    $corte = true;
    $primerJuegoGanado = -1;
    while ($i < $n && $corte){
        if ($coleccion[$i]["jugadorCruz"] == $nombreBuscado){
            if ($coleccion[$i]["puntosCruz"] > $coleccion[$i]["puntosCirculo"]){
                $primerJuegoGanado = $i;
                $corte = false;
            }
        }elseif ($coleccion[$i]["jugadorCirculo"] == $nombreBuscado){
            if ($coleccion[$i]["puntosCirculo"] > $coleccion[$i]["puntosCruz"]){
                $primerJuegoGanado = $i;
                $corte = false;          
            }            
        }    
        $i = $i + 1;             
    }
    return $primerJuegoGanado;                 
}


/**
*Este módulo solicita al usuario un símbolo y valida que sea (X o O) y retorna el mismo en mayúsculas
*@return string
*/
function validarSimbolo(){
    // string $simbolo
    do {
        echo "Ingrese un símbolo (X o O):";
        $simbolo = strtoupper(trim(fgets(STDIN)));
        if ($simbolo <> "X" && $simbolo <> "O") {
            echo "El símbolo ingresado no es válido, por favor ingrese otro. \n";
        }
    }while ($simbolo <> "X" && $simbolo <> "O");
	return $simbolo;
}


/**
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
*Este módulo dada una coleccion y un símbolo, retorna la cantidad de juegos ganados por el símbolo ingresado
*@param array $coleccion
*@param string $simboloIngresado
*@return int
*/	
function contarGanadosSimbolo($coleccion, $simboloIngresado){
    // int $i, $n, $cantGanadosSimbolo
    $n = count($coleccion);
    $cantGanadosSimbolo = 0;
    if ($simboloIngresado == "X") {
        for ($i=0; $i < $n ; $i++){
            if ($coleccion[$i]["puntosCruz"] > $coleccion[$i]["puntosCirculo"]){
                $cantGanadosSimbolo =  $cantGanadosSimbolo + 1;
            }
        }
    }else{ 
        for ($i=0; $i < $n ; $i++){
            if ($coleccion[$i]["puntosCruz"] < $coleccion[$i]["puntosCirculo"]){
                $cantGanadosSimbolo =  $cantGanadosSimbolo + 1;
            }
        }
    }
    return $cantGanadosSimbolo; 
}


/**
* Este módulo recibe una colección de juegos y un nombre de un jugador, y retorna un array con el resumen del jugador.
* @param array $coleccion
* @param string $nombreJugador
* @return array
*/    
function cargarResumen ($coleccion, $nombreJugador){
    //array $resumenJugador
    //int $i, $juegosGanados, $juegosPerdidos, $juegosEmpatados, $puntosAcumulados
    $resumenJugador = [];
    $juegosGanados = 0;
    $juegosPerdidos = 0;
    $juegosEmpatados = 0;
    $puntosAcumulados = 0;
    for ($i=0; $i < count ($coleccion); $i++) { 
        if ($coleccion[$i]["jugadorCruz"] == $nombreJugador){
            if ($coleccion[$i]["puntosCruz"] > $coleccion[$i]["puntosCirculo"]){
                $juegosGanados = $juegosGanados + 1;
                $puntosAcumulados = $puntosAcumulados + $coleccion[$i]["puntosCruz"];                    
            }else if ($coleccion[$i]["puntosCruz"] < $coleccion[$i]["puntosCirculo"]){
                $juegosPerdidos = $juegosPerdidos + 1;
            }else{
                $juegosEmpatados = $juegosEmpatados + 1;
                $puntosAcumulados = $puntosAcumulados + 1;
            }
        }else if($coleccion[$i]["jugadorCirculo"] == $nombreJugador){
            if ($coleccion[$i]["puntosCruz"] < $coleccion[$i]["puntosCirculo"]){
                $juegosGanados = $juegosGanados + 1;
                $puntosAcumulados = $puntosAcumulados + $coleccion[$i]["puntosCirculo"];                    
            }else if ($coleccion[$i]["puntosCruz"] > $coleccion[$i]["puntosCirculo"]){
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
    }
    return ($a["jugadorCirculo"] < $b["jugadorCirculo"]) ? -1 : 1;
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
    /* array $datosJuegoNuevo, $juegosTotales, $resumenJuego */
    /* int $opcion, $numeroJuego, $juegoGanador1, $totalGanados, $totalGanadosSimbolo, $validacion */
    /* float $porcentajeGanados */
    /* string $nombreABuscar, $simboloValidado, $nombreResumen */
//Inicialización de variables:
    $juegosTotales = cargarJuegos();
    //Consultar si hace falta inicializarlas, o se inicializan en el transcurso del código.

//Proceso:


do {
    $opcion = seleccionarOpcion();
    switch ($opcion) { //Corresponde a una estructura de control Alternativa.
        case 1: 
            //Jugar al TATETI
            $datosJuegoNuevo = jugar(); // Se invoca a la función jugar del archivo tateti.
            imprimirResultado($datosJuegoNuevo); //Se reusa la función del archivo tateti.
            $juegosTotales = agregarJuego($juegosTotales,count($juegosTotales),$datosJuegoNuevo["jugadorCruz"],$datosJuegoNuevo["jugadorCirculo"],$datosJuegoNuevo["puntosCruz"],$datosJuegoNuevo["puntosCirculo"]);        
            break;
        case 2: 
            //Mostrar un juego
            echo "Ingrese un número de juego: ";       
            $numeroJuego = solicitarNumeroEntre(1,count($juegosTotales)); //Se reusa la función del archivo tateti.           
            mostrarJuego($numeroJuego - 1, $juegosTotales); // Se le resta 1 a numeroJuego para coincidir con índice de coleccion.
            break;
        case 3: 
            //Mostrar el primer juego ganador
            do {
                echo "Ingrese su nombre para conocer su primer juego ganado: ";
                $nombreABuscar = strtoupper(trim(fgets(STDIN))); //Función string predefinida que transforma a mayúscula.
                $validacion = existeJugador($nombreABuscar, $juegosTotales);
                if ($validacion == -1){
                    $juegoGanador1 = primerGanado($nombreABuscar, $juegosTotales);
                    if ($juegoGanador1 <> -1){
                        mostrarJuego($juegoGanador1, $juegosTotales); //Se reutiliza función.
                    }else{
                        echo "El jugador " . $nombreABuscar . " no ganó ningún juego.\n";        
                    }
                }else {
                    echo "El jugador no existe, por favor ingrese otro. \n";
                }
            } while ($validacion <> -1);
            break;
        case 4:
            //Mostrar porcentaje de juegos ganados
            $simboloValidado = validarSimbolo();
            $totalGanados = contarJuegosGanados($juegosTotales); //Realiza un recorrido exhaustivo usando instrucción for.
            $totalGanadosSimbolo = contarGanadosSimbolo($juegosTotales, $simboloValidado); //Recorrido exhaustivo con contador.
            $porcentajeGanados = $totalGanadosSimbolo * 100 / $totalGanados;
            echo $simboloValidado . " ganó el: " . $porcentajeGanados . " % de los juegos ganados.\n";
            break;
        case 5:
            //Mostrar Resumen
            do {
                echo "Ingrese nombre de jugador para ver su resumen de juego: ";
                $nombreResumen = strtoupper(trim(fgets(STDIN)));
                $validacion = existeJugador($nombreResumen, $juegosTotales); //Reusa función.
                if ($validacion == -1){
                    $resumenJuego = cargarResumen($juegosTotales,$nombreResumen);
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
        case 6:
            //Mostrar listado de juegos Ordenado por jugador O
            uasort($juegosTotales, 'cmp'); // Función predefinida: ordena un array con una función de comparacion definida por el usuario y mantiene la asociación de índices.
            print_r($juegosTotales) . "\n"; // Función predefinida: muestra en pantalla un array
            break;
        case 7:
            //Salir del juego.
            echo "Gracias por Jugar al TATETI de la TUDW. Atte: Emi, Juani y Agus.";
            break;
    }
} while ($opcion != 7);
//Agrego este comentario
