<!DOCTYPE html>
<html>
<head>
    <title>Consultar Alumnos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f0e3;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 40px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            color: #CF0076;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #CF0076;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .regresar-button {
            background-color: #CF0076;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            display: block;
            margin: 20px auto 0;
            width: fit-content;
        }

        .regresar-button:hover {
            background-color: #2980b9;
        }

        .result-container {
            margin-top: 20px;
        }

        .result-section {
            background-color: #f7f0e3;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 10px 0;
        }

        .result-section strong {
            color: #CF0076;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Consultar Alumnos</h1>
        <table>
            <?php
            if (file_exists("registros.txt")) {
                $registros = file("registros.txt");
                if (!empty($registros)) {
                    echo "<table>";
                    echo "<tr><th>Cédula</th><th>Nombre</th><th>Matemáticas</th><th>Física</th><th>Programación</th></tr>";
                    $totalAlumnos = count($registros);
                    $sumaMatematicas = 0;
                    $sumaFisica = 0;
                    $sumaProgramacion = 0;
                    $aplazadosMatematicas = 0;
                    $aplazadosFisica = 0;
                    $aplazadosProgramacion = 0;
                    $alumnosAprobaronTodas = 0;
                    $alumnosAprobaronUna = 0;
                    $alumnosAprobaronDos = 0;
            
  
                    $notaMaximaMatematicas = 0;
                    $notaMaximaFisica = 0;
                    $notaMaximaProgramacion = 0;
            
                    foreach ($registros as $registro) {
                        $datos = explode(",", $registro);
                        echo "<tr>";
                        echo "<td>" . $datos[0] . "</td>";
                        echo "<td>" . $datos[1] . "</td>";
                        echo "<td>" . $datos[2] . "</td>";
                        echo "<td>" . $datos[3] . "</td>";
                        echo "<td>" . $datos[4] . "</td>";
    
                        echo "<td><a href='eliminar.php?cedula=" . $datos[0] . "'>Eliminar</a></td>";
                        echo "</tr>";
            

                        $sumaMatematicas += floatval($datos[2]);
                        $sumaFisica += floatval($datos[3]);
                        $sumaProgramacion += floatval($datos[4]);
            
    
                        $notaMaximaMatematicas = max($notaMaximaMatematicas, floatval($datos[2]));
                        $notaMaximaFisica = max($notaMaximaFisica, floatval($datos[3]));
                        $notaMaximaProgramacion = max($notaMaximaProgramacion, floatval($datos[4]));
            
  
                        if (floatval($datos[2]) < 10) {
                            $aplazadosMatematicas++;
                        }
                        if (floatval($datos[3]) < 10) {
                            $aplazadosFisica++;
                        }
                        if (floatval($datos[4]) < 10) {
                            $aplazadosProgramacion++;
                        }
            

                        $materiasAprobadas = 0;
                        if (floatval($datos[2]) >= 10) {
                            $materiasAprobadas++;
                        }
                        if (floatval($datos[3]) >= 10) {
                            $materiasAprobadas++;
                        }
                        if (floatval($datos[4]) >= 10) {
                            $materiasAprobadas++;
                        }
            
                        if ($materiasAprobadas == 3) {
                            $alumnosAprobaronTodas++;
                        }
            
              
                        $materiasAprobadas = 0;
                        if (floatval($datos[2]) >= 10) {
                            $materiasAprobadas++;
                        }
                        if (floatval($datos[3]) >= 10) {
                            $materiasAprobadas++;
                        }
                        if (floatval($datos[4]) >= 10) {
                            $materiasAprobadas++;
                        }
            
                        if ($materiasAprobadas == 1) {
                            $alumnosAprobaronUna++;
                        }
            
                        if ($materiasAprobadas == 2) {
                            $alumnosAprobaronDos++;
                        }
                    }
            
                    $promedioMatematicas = $sumaMatematicas / $totalAlumnos;
                    $promedioFisica = $sumaFisica / $totalAlumnos;
                    $promedioProgramacion = $sumaProgramacion / $totalAlumnos;
            
                    echo "</table>";
            
                    echo "<div class='result-container'>";
                    echo "<div class='result-section'><strong>Notas Promedio</strong></div>";
                    echo "<div class='result-section'>Matemáticas: " . number_format($promedioMatematicas, 2) . "</div>";
                    echo "<div class='result-section'>Física: " . number_format($promedioFisica, 2) . "</div>";
                    echo "<div class='result-section'>Programación: " . number_format($promedioProgramacion, 2) . "</div>";
                    echo "</div>";
            
                    echo "<div class='result-container'>";
                    echo "<div class='result-section'><strong>Número de Alumnos Aplazados en Cada Materia</strong></div>";
                    echo "<div class='result-section'>Matemáticas: " . $aplazadosMatematicas . "</div>";
                    echo "<div class='result-section'>Física: " . $aplazadosFisica . "</div>";
                    echo "<div class='result-section'>Programación: " . $aplazadosProgramacion . "</div>";
                    echo "</div>";
            
                    echo "<div class='result-container'>";
                    echo "<div class='result-section'><strong>Número de Alumnos que Aprobaron Todas las Materias</strong></div>";
                    echo "<div class='result-section'>" . $alumnosAprobaronTodas . "</div>";
                    echo "</div>";
            
                    echo "<div class='result-container'>";
                    echo "<div class='result-section'><strong>Número de Alumnos que Aprobaron una Sola Materia</strong></div>";
                    echo "<div class='result-section'>" . $alumnosAprobaronUna . "</div>";
                    echo "</div>";
            
                    echo "<div class='result-container'>";
                    echo "<div class='result-section'><strong>Número de Alumnos que Aprobaron Dos Materias</strong></div>";
                    echo "<div class='result-section'>" . $alumnosAprobaronDos . "</div>";
                    echo "</div>";
            
                    echo "<div class='result-container'>";
                    echo "<div class='result-section'><strong>Nota Máxima en Cada Materia</strong></div>";
                    
                    echo "<div class='result-section'>Matemáticas: " . $notaMaximaMatematicas . "</div>";
                    echo "<div class='result-section'>Física: " . $notaMaximaFisica . "</div>";
                    echo "<div class='result-section'>Programación: " . $notaMaximaProgramacion . "</div>";
                    echo "</div>";

    } else {
        echo "<p>No hay registros disponibles.</p>";
    }
} else {
    echo "<p>No hay registros disponibles.</p>";
}
?>
</div>
</body>
</html>
            ?>
        </table>
        <a class="regresar-button" href="index.php">Regresar a Registrar Alumnas</a>
    </div>
</body>
</html>