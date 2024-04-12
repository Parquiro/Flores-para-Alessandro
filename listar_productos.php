<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$sql = "SELECT id, codigo, nombre, metros, precio_mayor, precio_detal FROM inventario";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table id='tabla-productos'>
            <thead>
                <tr>
                    <th onclick='ordenarPorColumna(0)'>Código</th>
                    <th onclick='ordenarPorColumna(1)'>Nombre</th>
                    <th onclick='ordenarPorColumna(2)'>Cantidad de Flores</th>
                    <th onclick='ordenarPorColumna(3)'>Precio al mayor</th>
                    <th onclick='ordenarPorColumna(4)'>Precio al detal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>";
  
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["codigo"] . "</td>
        <td>" . $row["nombre"] . "</td>
        <td>" . $row["metros"] . "</td>
        <td>" . $row["precio_mayor"] . "$</td>
        <td>" . $row["precio_detal"] . "$</td>
        <td>
        <button onclick='cargarContenidoModal(" . $row["id"] . ")'>Modificar</button> | 
            <a href='#' onclick='confirmarEliminar(" . $row["id"] . ")'>Eliminar</a>
        </td>
    </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "<p>No hay productos disponibles</p>";
}

$conn->close();
?>
