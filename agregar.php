<?php
include ("conexion.php");

// capturamos los datos que envia el formulario por medio de AJAX

$nombre = $_POST["nombre"];
$precio = $_POST["precio"];

$sql = "INSERT INTO producto (nombre,precio) VALUES ('$nombre','$precio')";

if ($conn->query($sql) === TRUE) {
    echo "producto agregado!!";
} else {
    echo "Error al agregar el producto" . $conn->error;
}

$conn->close();

