<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $conn = new mysqli("db", "usuario1", "contrasenya1", "cine");
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $titulo = $_POST['titulo'];
    $director = $_POST['director'];
    $nota = $_POST['nota'];
    $anyo = $_POST['anyo'];
    $presupuesto = $_POST['presupuesto'];
    $url_trailer = $_POST['url_trailer'];

    $img = file_get_contents($_FILES['img']['tmp_name']);
    $img_base64 = base64_encode($img);

    $sql = "INSERT INTO peliculas (titulo, director, nota, anyo, presupuesto, img_base64, url_trailer) 
            VALUES ('$titulo', '$director', '$nota', '$anyo', '$presupuesto', '$img_base64', '$url_trailer')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Película</title>
</head>
<body>
    <h1>Añadir Película</h1>
    <form action="añadir.php" method="POST" enctype="multipart/form-data">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="director">Director:</label>
        <input type="text" id="director" name="director" required><br><br>

        <label for="nota">Nota:</label>
        <input type="text" id="nota" name="nota" required><br><br>

        <label for="anyo">Año:</label>
        <input type="number" id="anyo" name="anyo" required><br><br>

        <label for="presupuesto">Presupuesto:</label>
        <input type="number" id="presupuesto" name="presupuesto" required><br><br>

        <label for="img">Imagen:</label>
        <input type="file" id="img" name="img" accept="image/*" required><br><br>

        <label for="url_trailer">URL Trailer:</label>
        <input type="text" id="url_trailer" name="url_trailer" required><br><br>

        <input type="submit" value="Añadir Película">
    </form>
</body>
</html>
