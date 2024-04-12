<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="stylesheet" href="assets\css\style.css">
    <script src="modal.js"></script>
    <script>
        function ordenarPorColumna(columna) {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("tabla-productos");
            switching = true;
            
            while (switching) {
                switching = false;
                rows = table.getElementsByTagName("tr");
                
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    
                    x = rows[i].getElementsByTagName("td")[columna];
                    y = rows[i + 1].getElementsByTagName("td")[columna];
                    
                    if (columna === 2) {
                        x = parseInt(x.innerHTML);
                        y = parseInt(y.innerHTML);
                    } else {
                        x = x.innerHTML;
                        y = y.innerHTML;
                    }

                    if (x < y) {
                        shouldSwitch = true;
                        break;
                    }
                }

                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }

        function confirmarEliminar(id) {
            if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
                window.location.href = "eliminar_producto.php?id=" + id;
            }
        }

        function validarFormulario() {
            var codigo = document.getElementById("codigo").value;
            var nombre = document.getElementById("nombre").value;
            var metros = document.getElementById("metros").value;
            var precioMayor = document.getElementById("precio_mayor").value;
            var precioDetal = document.getElementById("precio_detal").value;

            if (codigo === "" || nombre === "" || metros === "" || precioMayor === "" || precioDetal === "") {
                alert("Por favor, llene todos los campos.");
                return false;
            }

            if (precioMayor <= 0 || precioDetal <= 0) {
                alert("Los precios deben ser números positivos.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Inventario de Flores</h1>

        <form action="agregar_producto.php" method="post" onsubmit="return validarFormulario()">
            <label for="codigo">Código:</label>
            <input type="text" id="codigo" name="codigo" required>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="metros">Cantidad:</label>
            <input type="number" id="metros" name="metros" step="1" required min="1">
            <label for="precio_mayor">Precio al mayor:</label>
            <input type="number" id="precio_mayor" name="precio_mayor" step="0.1" min="0.1" required>
            <label for="precio_detal">Precio al detal:</label>
            <input type="number" id="precio_detal" name="precio_detal" step="0.1" min="0.1" required><br>
            <button type="submit">Agregar Producto</button>
        </form>

        <hr>

        <h2>Productos existentes</h2>
        <table id="tabla-productos">
            <thead>
                <tr>
                    <th onclick="ordenarPorColumna(0)">Código</th>
                    <th onclick="ordenarPorColumna(1)">Nombre</th>
                    <th onclick="ordenarPorColumna(2)">Cantidad de Flores</th>
                    <th onclick="ordenarPorColumna(3)">Precio al mayor</th>
                    <th onclick="ordenarPorColumna(4)">Precio al detal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'listar_productos.php'; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div id="modal" class="modal" onclick="cerrarModal()">
        <div class="modal-content" onclick="event.stopPropagation();">
        </div>
    </div>
</body>
</html>
