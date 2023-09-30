<!DOCTYPE html>
<html>
<head>
    <title>Notas Estudiantes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(0deg, rgba(204,56,128,1) 14%, rgba(255,194,250,1) 85%);

            margin: 0;
            padding: 0;
        }

    
 
        .container {
            width: 80%;
            margin: 46.5px auto;
            background:white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            color: #CF0076;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="text"],
        input[type="number"] {
            width: 70%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"], .consultar-button {
            background-color: #CF0076;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-weight: bold;
        }

        input[type="submit"]:hover, .consultar-button:hover {
            background-color: #FF98D3;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Notas Alumnos</h1>
        <form action="procesar_registro.php" method="post">
            <label for="cedula">Cédula de Identidad:</label>
            <input type="text" id="cedula" name="cedula" pattern="[0-9]{7,8}" required>
            
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" pattern="[A-Za-záéíóúÁÉÍÓÚ\s]+" required>
            
            <label for="matematicas">Nota de Matemáticas:</label>
            <input type="number" id="matematicas" name="matematicas" min="1" max="20" required>
            
            <label for="fisica">Nota de Física:</label>
            <input type="number" id="fisica" name="fisica" min="1" max="20" required>
            
            <label for="programacion">Nota de Programación:</label>
            <input type="number" id="programacion" name="programacion" min="1" max="20" required>

            <div class="button-container">
                <input type="submit" value="Registrar">
                <a class="consultar-button" href="consultar.php">Consultar Alumnas</a>
            </div>
        </form>
    </div>

</body>
</html>