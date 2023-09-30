<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST["cedula"];
    $nombre = $_POST["nombre"];
    $matematicas = $_POST["matematicas"];
    $fisica = $_POST["fisica"];
    $programacion = $_POST["programacion"];

    $registro = "$cedula,$nombre,$matematicas,$fisica,$programacion\n";
    file_put_contents("registros.txt", $registro, FILE_APPEND);
}

header("Location: index.php");
exit;
?>