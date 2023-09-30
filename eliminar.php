<?php
if (isset($_GET["cedula"])) {
    $cedulaEliminar = $_GET["cedula"];
    

    $registros = file("registros.txt");
    

    $nuevoArchivo = fopen("registros_temp.txt", "w");
    
    foreach ($registros as $registro) {
        $datos = explode(",", $registro);
        $cedula = $datos[0];
        

        if ($cedula != $cedulaEliminar) {
            fwrite($nuevoArchivo, $registro);
        }
    }
    

    fclose($nuevoArchivo);
    rename("registros_temp.txt", "registros.txt");
    

    header("Location: consultar.php");
    exit;
}
?>