<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: purple;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            color: white;
        }

        .container {
            max-width: 800px;
            width: 100%;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
        }

        h2, h3 {
            margin: 0;
            padding: 10px 0;
        }

        p {
            margin: 0;
            padding: 5px 0;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        form {
            display: inline;
        }

        input[type="submit"] {
            background-color: lightblue;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
    <title>Eliminar</title>
</head>
<body>
<div class="container">
<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "peliculas";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener el valor de búsqueda enviado desde el formulario
$buscar = isset($_GET['buscar']) ? $_GET['buscar'] : '';

// Consulta para buscar la película en la tabla 'pelicula'
$sql = "SELECT * FROM pelicula WHERE titulo LIKE '%$buscar%'";
$result = mysqli_query($conn, $sql);

$eliminada = false; // Variable de bandera para verificar si se ha eliminado una película

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Resultados de búsqueda:</h2>";

    // Mostrar los resultados de búsqueda
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div>";
        echo "<h3>Título: " . $row['titulo'] . "</h3>";
        echo "<p>Género: " . obtenerGenero($row['gen_id'], $conn) . "</p>";
        echo "<p>Año de Lanzamiento: " . $row['anio_lanzamiento'] . "</p>";
        echo "<img src='" . $row['link_img'] . "' alt='Imagen de la película'>";
        echo "<form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
        echo "<input type='hidden' name='pelicula_id' value='" . $row['pelicula_id'] . "'>";
        echo "<input type='submit' name='eliminar' value='Eliminar' onclick='return confirmarEliminacion();'>";
        echo "</form>";
        echo "</div>";
    }

    // Proceso de eliminación de la película
    if (isset($_POST['eliminar'])) {
        $pelicula_id = $_POST['pelicula_id'];

        if (!empty($pelicula_id)) {
            // Consulta para eliminar la película de la tabla 'pelicula'
            $sql = "DELETE FROM pelicula WHERE pelicula_id = $pelicula_id";

            if (mysqli_query($conn, $sql)) {
                echo "<h3>Película eliminada correctamente.</h3>";
                $eliminada = true;
            } else {
                echo "<h3>Error al eliminar la película: " . mysqli_error($conn) . "</h3>";
            }
        }
    }

    // Cerrar conexión a la base de datos
    mysqli_close($conn);

    // Si se ha eliminado una película, no se mostrarán más resultados
    if ($eliminada) {
        exit();
    }
} else {
    echo "<h2>No se encontraron resultados.</h2>";

    // Cerrar conexión a la base de datos
    mysqli_close($conn);
}
// Función para obtener el nombre del género basado en el gen_id
function obtenerGenero($gen_id, $conn)
{
    // Consulta para obtener el nombre del género
    $sql = "SELECT nombre FROM genero WHERE gen_id = $gen_id";
    $result = mysqli_query($conn, $sql);

    $nombre = "";

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nombre = $row['nombre'];
    }

    return $nombre;
}
?>

<script>
function confirmarEliminacion() {
    return confirm("¿Estás seguro de que deseas eliminar esta película?");
}
</script>

</div>
</body>
</html>

