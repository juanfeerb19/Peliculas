<?php
$servername = "localhost"; // Cambia "localhost" si tu servidor de base de datos está en otro lugar
$username = "root"; // Reemplaza "tu_usuario" con tu nombre de usuario de MySQL
$password = ""; // Reemplaza "tu_contraseña" con tu contraseña de MySQL
$database = "peliculas"; // Reemplaza "nombre_base_de_datos" con el nombre de tu base de datos

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verifica si hay errores en la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

echo "Conexión exitosa a la base de datos";

// ... Aquí puedes realizar consultas o ejecutar operaciones en la base de datos ...

// Cierra la conexión
$conn->close();
?>
