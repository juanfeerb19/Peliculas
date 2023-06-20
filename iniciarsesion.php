<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar los valores del formulario
    $email = $_POST["email"];
    $password = $_POST["password"];

    $servername = "localhost";  // Nombre del servidor MySQL (por lo general, localhost)
    $username = "root";  // Nombre de usuario de MySQL
    $dbpassword = "";  // Contraseña de MySQL
    $dbname = "peliculas";  // Nombre de la base de datos que creaste

    // Crear conexión
    $conn = new mysqli($servername, $username, $dbpassword, $dbname);

    // Verificar si hubo un error en la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Preparar la consulta SQL
    $sql = "SELECT * FROM `usuario` WHERE `email` = '$email' AND `password` = '$password'";

    // Ejecutar la consulta SQL
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Inicio de sesión exitoso
        $_SESSION["email"] = $email;
        header("Location: carteleras.php");
        exit();
    } else {
        // Credenciales inválidas
        $error = "Correo electrónico o contraseña incorrectos";
    }


    // Cerrar la conexión
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="icon" type="image/x-icon" href="imagenes/FILM HOUSE (1).png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #541197;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin-top: 100px;
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid purple;
        }


        input[type="submit"] {
            width: 95%;
            padding: 10px;
            background-color: #541197;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #541197;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="imagenes/FILM HOUSE (2).png" alt="Logo de la empresa" style="width: 100%; max-width: 200px; margin: 0 auto; display: block;">

        <h1>Iniciar Sesión</h1>
        <form method="POST">
            <label for="email">Email:</label>
            <input type="text" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>

            <?php if (isset($error)) { ?>
                <p class="error"><?php echo $error; ?></p>
            <?php } ?>

            <input type="submit" value="Iniciar Sesión">
        </form>
    </div>
</body>
</html>
