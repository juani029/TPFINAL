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
*Inicializa una estructura de datos con ejemplos de juegos y retorna la misma
*@return array
*/
function cargarJuegos(){
    // array $coleccion
    $coleccion = [];
    /* $coleccion[0] = ["jugadorCruz"=> "ARTURO", "jugadorCirculo" => "RODRIGO", "puntosCruz"=> 4, "puntosCirculo" => 0];
    $coleccion[1] = ["jugadorCruz"=> "MARCELO", "jugadorCirculo" => "MARIA", "puntosCruz"=> 0, "puntosCirculo" => 3];
    $coleccion[2] = ["jugadorCruz"=> "ROBERTO", "jugadorCirculo" => "CAMILA", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccion[3] = ["jugadorCruz" => "RODRIGO", "jugadorCirculo" => "MARCELO", "puntosCruz" => 2, "puntosCirculo" => 0];
    $coleccion[4] = ["jugadorCruz" => "CAMILA", "jugadorCirculo" => "ARTURO", "puntosCruz" => 0, "puntosCirculo" => 5];
    $coleccion[5] = ["jugadorCruz"=> "MARIA", "jugadorCirculo" => "CECILIA", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccion[6] = ["jugadorCruz"=> "ALDANA", "jugadorCirculo" => "DAIANA", "puntosCruz" => 0, "puntosCirculo" => 2];
    $coleccion[7] = ["jugadorCruz" => "CECILIA", "jugadorCirculo" => "ALDANA", "puntosCruz" => 4, "puntosCirculo" => 0];
    $coleccion[8] = ["jugadorCruz"=> "DAIANA", "jugadorCirculo" => "MARCELO", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccion[9] = ["jugadorCruz" => "RODRIGO", "jugadorCirculo" => "ARTURO", "puntosCruz" => 0, "puntosCirculo" => 2];
    */
    $jg1 = ["jugadorCruz" => "AMARILIS", "jugadorCirculo" => "MILOS",    "puntosCruz" => 1, "puntosCirculo" => 1];
    $jg2 = ["jugadorCruz" => "ZENDA",    "jugadorCirculo" => "AMARILIS", "puntosCruz" => 3, "puntosCirculo" => 0];
    $jg3 = ["jugadorCruz" => "ZENDA",    "jugadorCirculo" => "MILOS",    "puntosCruz" => 0, "puntosCirculo" => 4];
    $jg4 = ["jugadorCruz" => "CALIXTO",  "jugadorCirculo" => "TRUMAN",   "puntosCruz" => 1, "puntosCirculo" => 1];
    $jg5 = ["jugadorCruz" => "AMARILIS", "jugadorCirculo" => "MILOS",    "puntosCruz" => 5, "puntosCirculo" => 0];
    $jg6 = ["jugadorCruz" => "FEDORA",   "jugadorCirculo" => "CALIXTO",  "puntosCruz" => 0, "puntosCirculo" => 3];
    $jg7 = ["jugadorCruz" => "TRUMAN",   "jugadorCirculo" => "AMARILIS", "puntosCruz" => 4, "puntosCirculo" => 0];
    $jg8 = ["jugadorCruz" => "CALIXTO",  "jugadorCirculo" => "TRUMAN",   "puntosCruz" => 1, "puntosCirculo" => 1];
    $jg9 = ["jugadorCruz" => "TRUMAN",   "jugadorCirculo" => "FEDORA",   "puntosCruz" => 2, "puntosCirculo" => 0];
    $jg10= ["jugadorCruz" => "MILOS",    "jugadorCirculo" => "ZENDA",   "puntosCruz" => 1, "puntosCirculo" => 1];
    array_push($coleccion, $jg1, $jg2, $jg3, $jg4, $jg5, $jg6, $jg7, $jg8, $jg9, $jg10);
    return($coleccion);
}


/**
*Muestra en pantalla el men?? de opciones y solicita al usuario que elija una opci??n 
*Si es v??lida, retorna la opci??n y sino repite hasta que la opci??n se encuentre dentro del rango
*@return int	
*/
function seleccionarOpcion(){
    // int $opValida
    do {
        echo "Men?? de opciones: \n";
		echo "   1)   Jugar al tateti \n";
		echo "   2)   Mostrar un juego \n";
		echo "   3)   Mostrar el primer juego ganador \n";
		echo "   4)   Mostrar porcentaje de Juegos ganados \n";
		echo "   5)   Mostrar resumen de Jugador \n";
		echo "   6)   Mostrar listado de juegos Ordenado por jugador O (circulo) \n";
		echo "   7)   Salir \n";
		echo "Por favor, elija una opci??n del men??: ";
		$opValida = trim(fgets(STDIN));
        if($opValida < 1 || $opValida > 7){
            echo "La opcion elegida no es v??lida. Por favor, ingrese un n??mero entre el 1 y el 7. \n";
        }
    } while ($opValida < 1 || $opValida > 7);
	return($opValida);
}


/**
*Recibe un n??mero de juego, una colecci??n e imprime en pantalla los datos del juego
*@param int $nroJuego
*@param array $coleccion
*/
function mostrarJuego ($nroJuego, $coleccion){
    // string $resultado 
    // int $auxNroJuego 
    if ($coleccion[$nroJuego]["puntosCruz"] > $coleccion[$nroJuego]["puntosCirculo"]){
        $resultado = "gan?? X";
    }else if ($coleccion[$nroJuego]["puntosCruz"] < $coleccion[$nroJuego]["puntosCirculo"]){
        $resultado = "gan?? O";
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
*Recibe una colecci??n, un n??mero de juego y agrega nuevos datos a la colecci??n ingresada.
*@param array $coleccion
*@param string $nombreCruz, $nombreCirculo
*@param int $puntajeX, $puntajeO
*@param int $juego
*@return array
*/
function agregarJuego ($coleccion, $juego, $nombreCruz, $nombreCirculo, $puntajeX, $puntajeO){
    $coleccion[$juego] = ["jugadorCruz"=> $nombreCruz, "jugadorCirculo" => $nombreCirculo, "puntosCruz"=> $puntajeX, "puntosCirculo" => $puntajeO];
    return ($coleccion);
}


/**
*Recibe una colecci??n de juegos y el nombre de un jugador ya validado 
*Si existe, retorna el ??ndice de su primer juego ganado y sino retorna -1
*@param string $nombreJugador
*@param array $coleccion
*@return int
*/
function primerGanado ($nombreJugador, $coleccion) {
    // int $n, $i, $primerJuegoGanado 
    // boolean $corte 
    $n = count($coleccion);
    $i = 0;
    $corte = true;
    $primerJuegoGanado = -1;
    while ($i < $n && $corte){
        if ($coleccion[$i]["jugadorCruz"] == $nombreJugador){
            if ($coleccion[$i]["puntosCruz"] > $coleccion[$i]["puntosCirculo"]){
                $primerJuegoGanado = $i;
                $corte = false;
            }
        }elseif ($coleccion[$i]["jugadorCirculo"] == $nombreJugador){
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
*Solicita al usuario un s??mbolo, valida que sea (X o O) y retorna el mismo en may??sculas
*@return string
*/
function validarSimbolo(){
    // string $simbolo
    do {
        echo "Ingrese un s??mbolo (X o O):";
        $simbolo = strtoupper(trim(fgets(STDIN)));
        if ($simbolo <> "X" && $simbolo <> "O") {
            echo "El s??mbolo ingresado no es v??lido, por favor ingrese otro. \n";
        }
    }while ($simbolo <> "X" && $simbolo <> "O");
	return $simbolo;
}


/**
*Este m??dulo recorre la colecci??n y contabiliza la cantidad de juegos ganados total
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
*Recibe una coleccion, un s??mbolo y retorna la cantidad de juegos ganados por el s??mbolo ingresado
*@param array $coleccion
*@param string $simbolo
*@return int
*/	
function contarGanadosSimbolo($coleccion, $simbolo){
    // int $i, $n, $cantGanadosSimbolo
    $n = count($coleccion);
    $cantGanadosSimbolo = 0;
    if ($simbolo == "X") {
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
*Recibe una colecci??n de juegos, un nombre de un jugador y retorna un array con el resumen del jugador
*@param array $coleccion
*@param string $nombreJugador
*@return array
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
*Compara dos string y retorna un entero.
*@param string $a
*@param string $b
*@return int
*/
function cmp($a, $b){
    //int $i
    if ($a["jugadorCirculo"] == $b["jugadorCirculo"]) {
        $i = 0;
    }elseif ($a["jugadorCirculo"] < $b["jugadorCirculo"]) {
        $i = -1;
    }else {
        $i = 1;
    }
    return $i;
}


/**
*Recibe un nombre y una colecci??n. Recorre la misma y valida que el nombre se encuentre dentro
*@param string $nombreJugador
*@param array $coleccion
*@return int
*/
function existeJugador($nombreJugador, $coleccion){
    // boolean $corte
    // int $n, $i, $existe
    $i = 0;
    $n = count($coleccion);
    $corte = true;
    $existe = 0;
    while ($i < $n && $corte) {
        if($nombreJugador == $coleccion[$i]["jugadorCruz"] || $nombreJugador == $coleccion[$i]["jugadorCirculo"]){
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


//Declaraci??n de variables:
// array $datosJuegoNuevo, $juegosTotales, $resumenJuego 
// int $opcion, $numeroJuego, $juegoGanador1, $totalGanados, $totalGanadosSimbolo, $validacion 
// float $porcentajeGanados 
// string $nombreABuscar, $simboloValidado, $nombreResumen 


//Inicializaci??n de variables:
$juegosTotales = cargarJuegos();
    

//Proceso:
do {
    $opcion = seleccionarOpcion();
    switch ($opcion) { //Corresponde a una estructura de control Alternativa.
        case 1: 
            //Jugar al TATETI
            $datosJuegoNuevo = jugar(); // Se invoca a la funci??n jugar del archivo tateti.
            imprimirResultado($datosJuegoNuevo); //Se reusa la funci??n del archivo tateti.
            $juegosTotales = agregarJuego($juegosTotales,count($juegosTotales),$datosJuegoNuevo["jugadorCruz"],$datosJuegoNuevo["jugadorCirculo"],$datosJuegoNuevo["puntosCruz"],$datosJuegoNuevo["puntosCirculo"]);        
            break;
        case 2: 
            //Mostrar un juego
            echo "Por favor, ingrese un n??mero de juego: ";          
            $numeroJuego = solicitarNumeroEntre(1,count($juegosTotales)); //Se reusa la funci??n del archivo tateti.           
            mostrarJuego($numeroJuego - 1, $juegosTotales); // Se le resta 1 a numeroJuego para coincidir con ??ndice de coleccion.
            break;
        case 3: 
            //Mostrar el primer juego ganador
            do {
                echo "Por favor, ingrese su nombre para conocer su primer juego ganado: ";
                $nombreABuscar = strtoupper(trim(fgets(STDIN))); //Funci??n string predefinida que transforma a may??scula.
                $validacion = existeJugador($nombreABuscar, $juegosTotales);
                if ($validacion == -1){
                    $juegoGanador1 = primerGanado($nombreABuscar, $juegosTotales);
                    if ($juegoGanador1 <> -1){
                        mostrarJuego($juegoGanador1, $juegosTotales); //Se reutiliza funci??n.
                    }else{
                        echo "El jugador " . $nombreABuscar . " no gan?? ning??n juego.\n";        
                    }
                }else {
                    echo "El jugador no existe. Por favor, ingrese otro. \n";
                }
            } while ($validacion <> -1);
            break;
        case 4:
            //Mostrar porcentaje de juegos ganados
            $simboloValidado = validarSimbolo();
            $totalGanados = contarJuegosGanados($juegosTotales); //Realiza un recorrido exhaustivo usando instrucci??n for.
            $totalGanadosSimbolo = contarGanadosSimbolo($juegosTotales, $simboloValidado); //Recorrido exhaustivo con contador.
            $porcentajeGanados = $totalGanadosSimbolo * 100 / $totalGanados;
            echo $simboloValidado . " gan?? el: " . $porcentajeGanados . " % de los juegos ganados.\n";
            break;
        case 5:
            //Mostrar Resumen
            do {
                echo "Por favor, ingrese un nombre para ver su resumen de juego: ";
                $nombreResumen = strtoupper(trim(fgets(STDIN)));
                $validacion = existeJugador($nombreResumen, $juegosTotales); //Reusa funci??n.
                if ($validacion == -1){
                    $resumenJuego = cargarResumen($juegosTotales,$nombreResumen);
                    echo "************************************************\n";
                    echo "Jugador : " . $resumenJuego["nombre"] . "\n";
                    echo "Gan?? : " . $resumenJuego["ganados"] . "\n";
                    echo "Perdi?? : " . $resumenJuego["perdidos"] . "\n";
                    echo "Empat?? : " . $resumenJuego["empatados"] . "\n";
                    echo "Total de puntos acumulados : " . $resumenJuego["puntajeTotal"] . " puntos" . "\n";
                    echo "*************************************************\n";
                }else {
                    echo "El jugador no existe. Por favor, ingrese otro. \n";
                }
            } while ($validacion <> -1);
            break;        
        case 6:
            //Mostrar listado de juegos Ordenado por jugador O
            uasort($juegosTotales, 'cmp'); // Funci??n predefinida: ordena un array con una funci??n de comparacion definida por el usuario y mantiene la asociaci??n de ??ndices.
            print_r($juegosTotales) . "\n"; // Funci??n predefinida: muestra en pantalla un array
            break;
        case 7:
            //Salir del juego.
            echo "Gracias por Jugar al TATETI. Atte: Emi, Juani y Agus.";
            break;
    }
} while ($opcion != 7);

