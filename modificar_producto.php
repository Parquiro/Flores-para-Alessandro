<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
    <link rel="stylesheet" href="assets\css\style.css">
</head>
<body>
    <div class="container">
        <h1>Modificar Producto</h1>
        
        <?php
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "crud";
        

        $conn = new mysqli($servername, $username, $password, $dbname);


        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $id = $_GET['id'];
 
        $sql = "SELECT * FROM inventario WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            
            <form action="guardar_modificacion.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required>
                <label for="metros">Metros:</label>
                <input type="number" id="metros" name="metros" value="<?php echo $row['metros']; ?>" step="0.01"  min="0.01" required>
                <label for="precio_mayor">Precio al mayor:</label>
                <input type="number" id="precio_mayor" name="precio_mayor" value="<?php echo $row['precio_mayor']; ?>" step="0.01"  min="0.01" required>
                <label for="precio_detal">Precio al detal:</label>
                <input type="number" id="precio_detal" name="precio_detal" value="<?php echo $row['precio_detal']; ?>" step="0.01" min="0.01" required>
                <button type="submit">Guardar Cambios</button>
            </form>
            <?php
        } else {
            echo "Producto no encontrado.";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
