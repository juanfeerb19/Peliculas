<?php
class Actor {
    public $id;
    public $nombres;
    public $apellidos;
    public $nacionalidad;

    public function __construct($id, $nombres, $apellidos, $nacionalidad) {
        $this->id = $id;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->nacionalidad = $nacionalidad;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="actores.css">
    <title>Actores</title>
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
</nav></center><?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "peliculas";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
$sql = "SELECT * FROM actor;";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // Iterar a través de los resultados y mostrar los datos
    echo "<div class='container'>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='card'>
            <h1>" . $row["nombres"] . " " . $row["apellidos"] . "</h1>
            <h3>" . $row["nacionalidad"] . "</h3>";
        $sql2 = "SELECT pel.titulo, a.nombres, a.apellidos FROM pelicula pel
            INNER JOIN participacion par
            ON pel.pelicula_id = par.pelicula_id
            INNER JOIN actor a
            ON a.actor_id = par.actor_id
            WHERE a.nombres = '" . $row["nombres"] . "' and a.apellidos = '" . $row["apellidos"] . "'";
        $actor = mysqli_query($conn, $sql2);
        while ($act = mysqli_fetch_assoc($actor)) {
            echo "<p>" . $act["titulo"] . "</p>";
        }
        echo "</div>";
    }
    echo "</div>";

} else {
    echo "No se encontraron resultados.";
}
?>
<div class='card'>
    <h1>Agregar Actores</h1> <!-- Título agregado -->
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required>
        <label for="nacionalidad">Nacionalidad:</label>
        <input type="text" name="nacionalidad" required>
        <input type="submit" value="Agregar">
        <input type="submit" name="eliminar" value="Eliminar">
    </form>
</div>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "peliculas";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $nacionalidad = $_POST['nacionalidad'];

    // Verificar si los datos ya existen en la base de datos
    $query = "SELECT * FROM actor WHERE nombres = '$nombre' AND apellidos = '$apellido' AND nacionalidad = '$nacionalidad'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 0) {
        // Insertar los datos en la base de datos
        $sql = "INSERT INTO `actor`(`nombres`, `apellidos`, `nacionalidad`) VALUES ('$nombre','$apellido','$nacionalidad')";
        mysqli_query($conn, $sql);
        // Redireccionar a otra página después de la inserción
    } else {
        // Datos duplicados, mostrar mensaje de error o realizar otra acción
        echo "Los datos ya existen en la base de datos.";
    }
}

if (isset($_POST['eliminar'])) {
    miMetodo();
}
function miMetodo()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "peliculas";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $nacionalidad = $_POST['nacionalidad'];
        $sql3 = "DELETE FROM actor WHERE nombres = '" . $nombre . "' and apellidos = '" . $apellido . "' and nacionalidad = '" . $nacionalidad . "'";
        mysqli_query($conn, $sql3);
    }
}
?>
</body>
</html>
