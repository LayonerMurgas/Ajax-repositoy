<?php

include ("conexion.php");

$listaProductos = obtenerProductos($conn);

echo $listaProductos;
function obtenerProductos($conn)
{
    $sql = "SELECT * FROM producto";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $lista = '<h2>Lista de productos</h2><ul>';
        while ($fila = $resultado->fetch_assoc()) {
            $lista = '<li>' . $fila["nombre"] . ' - ' . $fila["precio"] . '</li>';
        }

        $lista .= '</ul>';
    } else {
        $lista = 'No hay productos registrados!';
    }

    return $lista;
}