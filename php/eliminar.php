<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $conn = new mysqli("db", "usuario1", "contrasenya1", "cine");

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "DELETE FROM peliculas WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
       
        header("Location: index.php");
        exit(); 
    } else {
        echo "Error al eliminar la película: " . $conn->error;
    }

    
    $conn->close();
}
?>
