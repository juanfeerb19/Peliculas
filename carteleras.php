<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cartelera.css">
    <title>Carteleras</title>
</head>
<body><center>
<nav class="navigation-bar">
  <ul>
    <li><a href="carteleras.php">Home</a></li>
    <li><a href="index.php">Subir Película</a></li>
    <li><a href="eliminar_pelicula.php">Eliminar Película</a></li>
    <li><a href="actores.php">Actores</a></li>
    <li><a href="iniciarsesion.php">Cerrar Sesión</a></li>
  </ul>
</nav></center>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "peliculas";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
$sql = "SELECT p.*, g.nombre FROM `pelicula` p
INNER JOIN genero g
on p.gen_id = g.gen_id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // Iterar a través de los resultados y mostrar los datos
    echo "<div class='container'>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='card'>
                <img src='" . $row["link_img"] . "' alt='cartelera'>
                <h1>" . $row["titulo"] . "</h1>
                <h3>" . $row["nombre"] . "</h3>
                <p>" . $row["anio_lanzamiento"] . "</p>
              </div>";
    }
    echo "</div>";
} else {
    echo "No se encontraron resultados.";
}
?>
</body>
</html>
