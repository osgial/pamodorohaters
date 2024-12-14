<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pomodorohates OscarG</title>
    <style>
        .mapa {
            display: grid;
            grid-template-columns: repeat(24, 24px);
            grid-template-rows: repeat(24, 24px);
            gap: 1px;
        }
        .casilla {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
            width: 24px;
            height: 24px;
        }
        .tierra {
            background-color:rgb(7, 202, 66);
        }
        .urbano {
            background-color:rgb(103, 103, 103);
        }
        .mar {
            background-color:rgb(43, 248, 213);
        }
        .impactoUrbano {
            background-color:rgb(255, 2, 2);
        }
        .impactoMar {
            background-color:rgb(71, 74, 245);
        }
        .nohabitado{
            background-color:rgb(238, 157, 6);
        }
    </style>
</head>
<body>
    
<?php

    $pomodoroHaters = [
        ['~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '~', '~', '0', '0', 'A', '0', 'A', '0', '0', 'A', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '0', '0', '0', '0', '0', '0', 'A', '0', '0', '0', '0', 'A', '0', '~', '~', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'A', 'A', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'A', '0', '0', 'A', 'A', 'A', '0', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '0', '0', '0', 'A', '0', 'A', 'A', '0', '0', '0', '0', '0', '0', '0', 'A', '0', '0', '0', 'A', '0', '0', '~'],
        ['~', '~', '~', '~', '~', '~', '0', '0', 'A', '0', '0', '0', 'A', '0', '0', '0', '0', '0', '0', 'A', '0', '0', '0', '~'],
        ['~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '~'],
        ['~', '~', '~', '~', '~', '0', '0', 'A', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'A', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '~', '~', '~'],
        ['~', '~', '~', '0', '0', '0', '0', '0', '0', '0', 'A', '0', '0', '0', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~'],
        ['~', '0', '0', '0', '0', '0', '0', '0', '0', 'A', '0', '0', '0', 'A', '0', '0', '0', '0', '0', 'A', '0', '~', '~', '~'],
        ['~', '~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', '0', 'A', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', 'A', 'A', 'A', '0', '0', 'A', '0', '0', '0', '~', '~', '~'],
        ['~', '~', '~', '~', '0', 'A', 'A', '0', '0', 'A', '0', '0', '0', 'A', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '0', 'A', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', 'A', '0', '0', '0', '0', '0', 'A', '0', 'A', '0', '0', '0', '~'],
        ['~', '~', '~', '0', 'A', '0', '0', '0', '0', '0', '0', '0', '0', 'A', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', 'A', '0', '0', 'A', '0', '~', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '~', '0', '0', '0', '0', 'A', '0', '0', '0', '0', 'A', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
        ['~', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'A', '0', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'A', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~']
    ];
    $impacts = [
        [20, 4],
        [2, 13],
        [13, 12],
        [3, 17],
        [2, 13],
        [5, 19],
        [6, 18],
        [5, 2],
        [20, 13],
        [9, 7],
        [5, 9],
        [15, 16],
        [16, 13],
        [16, 9],
        [16, 0],
        [3, 19],
        [19, 8],
        [1, 16],
        [18, 4],
        [21, 23],
        [7, 17],
        [22, 15],
        [21, 6],
        [14, 8],
        [12, 23],
        [7, 7],
        [22, 4],
        [3, 21],
        [2, 3],
        [8, 11],
        [0, 4],
        [7, 21],
        [11, 4],
        [7, 15],
        [6, 17],
        [5, 19],
        [4, 19],
        [4, 7],
        [23, 21],
        [15, 20],
        [2, 9],
        [21, 2],
        [1, 13],
        [7, 10],
        [21, 5],
        [13, 17],
        [2, 14],
        [11, 14],
        [22, 17],
        [18, 22],
        [2, 23],
        [3, 1],
        [18, 6],
        [17, 12],
        [18, 18],
        [20, 2],
        [3, 14],
        [11, 21],
        [6, 5],
        [6, 2],
        [12, 23],
        [18, 18],
        [21, 6],
        [10, 12],
        [5, 4],
        [16, 19],
        [8, 10],
        [12, 21],
        [15, 1],
        [20, 14],
        [3, 20],
        [6, 19],
        [20, 13],
        [15, 4],
        [10, 2],
        [5, 16],
        [20, 1],
        [12, 13],
        [11, 5],
        [12, 14],
        [8, 3],
        [6, 8],
        [19, 7],
        [16, 9],
        [13, 20],
        [3, 5],
        [1, 0],
        [20, 14],
        [12, 21],
        [12, 16],
        [15, 7],
        [9, 1],
        [1, 18],
        [20, 6],
        [8, 6],
        [22, 1],
        [10, 22],
        [19, 19],
        [7, 16],
        [8, 8]
    ];

    //ESCRIBE AQUÍ TU PROGRAMA PRINCIPAL

    echo "<br> Mapa original <br>";
    mostrarMapa($pomodoroHaters);

    aplicarImpactos($pomodoroHaters, $impacts);
    echo "<br> Mapa con inpactos en centros poblacionales marcados <br>";
    mostrarMapa($pomodoroHaters);

    colirio($pomodoroHaters);

    aplicarImpactosTotales($pomodoroHaters, $impacts);
    echo "<br> Mapa con todos los impactos marcados <br>";
    mostrarMapa($pomodoroHaters);

    dañosTotales($pomodoroHaters);

    conteoMar($pomodoroHaters);
    
    bakalao($pomodoroHaters);

    //ESCRIBE AQUÍ LA DEFINICIÓN DE LAS FUNCIONES

    function mostrarMapa ($mapa) {
        echo '<div class="mapa">';
        foreach ($mapa as $fila) {
            foreach ($fila as $celda) {
                echo coloritos($celda); 
            }
        }
        echo '</div>';
    };  

    function aplicarImpactos (&$mapa, $impact) {
        foreach ($impact as $impactos) {
            $fila = $impactos[0];
            $columna = $impactos[1];
            if ($mapa[$fila][$columna] === 'A') {
                $mapa[$fila][$columna] = 'C';
            }
        }
    }

    function colirio ($mapa) {
        $colirioPersona = 25;
        $media = 5000;
        $persona = 0;
        foreach ($mapa as $fila) {
            foreach ($fila as $celda) {
                if ($celda === 'C') {
                    $persona++;
                }
            }
        }
        $personasAfectadas = $media * $persona;
        $colPerAfec = ($personasAfectadas * $colirioPersona) / 1000;
        echo "<br> El total de personas afectadas es de " . $personasAfectadas . " y se necisitan un total de " . $colPerAfec . " litros de colirio para tratar a todas las personas afectadas <br>";
    }

    function aplicarImpactosTotales (&$mapa, $impact) {
        foreach ($impact as $impactos) {
            $fila = $impactos[0];
            $columna = $impactos[1];
            if ($mapa[$fila][$columna] === '~') {
                $mapa[$fila][$columna] = 'S';
            } elseif ($mapa[$fila][$columna] === '0') {
                $mapa[$fila][$columna] = 'X';
            }
        }
    }

    function dañosTotales ($mapa) {
        $noUrbana = 50000;
        $urbana = 200000;
        $celdaNoUrbana = 0;
        $celdaUrbana = 0;
        foreach ($mapa as $fila) {
            foreach ($fila as $celda) {
                if ($celda === 'C') {
                    $celdaUrbana++;
                } elseif ($celda === 'X') {
                    $celdaNoUrbana++;
                }
            }
        }
        $dineroNoUrbana = $noUrbana * $celdaNoUrbana;
        $dineroUrbana = $urbana * $celdaUrbana;
        $dineroTotal = $dineroNoUrbana + $dineroUrbana;
        echo "<br> Para limpiar todo el tomate de las donas urbanas y no urbanas se va necesitar un total de " . $dineroTotal . "€ para poder limpiarlo todo <br>";
    }

    function conteoMar ($mapa) {
        $marNoAfectado = 0;
        $marAfectado = 0;
        foreach ($mapa as $fila) {
            foreach ($fila as $celda) {
                if ($celda === '~') {
                    $marNoAfectado++;
                } elseif ($celda === 'S') {
                    $marAfectado++;
                }
            }
        }
        $marTotal = $marAfectado + $marNoAfectado;
        echo "<br> Hay un total de " . $marNoAfectado . " km² de mar no afectado, un total de " . $marAfectado . "km² de mar afectado y el mar tiene un tamaño total de " . $marTotal . "km² <br>";//² alt + 253
        $GLOBALS['marTotal'] = $marTotal;
        $GLOBALS['marAfectado'] = $marAfectado;
    }

    function bakalao($mapa) {
        global $marTotal, $marAfectado;
        $bakalaoTon = 2000;
        $bakalaoTotalRestante = $bakalaoTon * $marAfectado / $marTotal;
        $bakalaoTotalRestanteKg = $bakalaoTotalRestante * 1000;
        $dinero = $bakalaoTotalRestanteKg * 5 ;
        echo "<br> Hay un total de " . floor($bakalaoTotalRestante) . " toneladas de bakalao restante en el mar y se vendera a un precio de " . floor($dinero) . "€ <br>";
    }

    function coloritos($casilla){
        $class = '';
        if ($casilla === '0') {
            $class = 'tierra';
        } elseif ($casilla === 'A') {
            $class = 'urbano';
        } elseif ($casilla === '~') {
            $class = 'mar';
        } elseif ($casilla === 'C') {
            $class = 'impactoUrbano';
        }elseif ($casilla === 'X') {
            $class = 'nohabitado';
        }elseif ($casilla === 'S') {
            $class = 'impactoMar';
        }
        return '<div class="casilla ' . $class . '">' . $casilla . '</div>';
    }
    ?>
</body>
</html>
