<?php
// Obtener los valores enviados desde el formulario
$titulo = $_POST['titulo'];
$genero = $_POST['genero'];
$anio_lanzamiento = $_POST['anio_lanzamiento'];
$link_img = $_POST['link_img'];

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "peliculas";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Consulta para insertar la película en la tabla 'pelicula'
$sql = "INSERT INTO pelicula (titulo, gen_id, anio_lanzamiento, link_img)
        VALUES ('$titulo', $genero, $anio_lanzamiento, '$link_img')";

if (mysqli_query($conn, $sql)) {
    echo "Película agregada correctamente.";
} else {
    echo "Error al agregar la película: " . mysqli_error($conn);
}

// Cerrar conexión a la base de datos
mysqli_close($conn);
?>
