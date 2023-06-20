<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Agregar Película</title>
</head>
<body>
<h1>Buscar y Eliminar Película</h1>
<form method="GET" action="eliminar_pelicula.php">
    <label for="buscar">Buscar Película:</label>
    <input type="text" name="buscar" required>
    <input type="submit" value="Buscar">
</form>
<div class="container">
<div class="logo">
    <img src="imagenes/FILM HOUSE (2).png" alt="Logo">
</div>
<h1>Agregar Película</h1>
<form method="POST" action="agregar_pelicula.php">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" required><br><br>
    
    <label for="genero">Género:</label>
    <select name="genero" required>      
    <option value="">Selecciona un género</option>
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
        
        // Consulta para obtener los géneros de la tabla 'genero'
        $query = "SELECT * FROM genero";
        $result = mysqli_query($conn, $query);
        
        // Iterar sobre los resultados y mostrar las opciones del select
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['gen_id'] . "'>" . $row['nombre'] . "</option>";
        }
        
        // Cerrar conexión a la base de datos
        mysqli_close($conn);
        ?>
    </select><br><br>
    
    <label for="anio_lanzamiento">Año de Lanzamiento:</label>
    <input type="number" name="anio_lanzamiento" required><br><br>
    
    <label for="link_img">Enlace de la Imagen:</label>
    <input type="text" name="link_img" required><br><br>
    
    <input type="submit" value="Agregar Película">
</form>
</div>
</body>
</html>
