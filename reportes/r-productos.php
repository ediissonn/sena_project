<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include "../includes/x_scripts.php"; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Productos | Adiban</title>

    <link rel="stylesheet" href="../styles/x-reportes.css">
</head>
<body>
    <?php include "../includes/x_header.php"; ?>

    <!-- Title -->
    <h1 class="p-4 fs-2 fw-bold">Reporte De Productos</h1>

    <!-- Table -->
    <div class="m-2">
        <table>
            <tr>
                <th>Numero de Identificacion</th>
                <th>Nombre</th>
                <th>Codigo</th>
                <th>Precio Unitario</th>
                <th>Descripcion</th>
                <th>ID_Categoria</th>
                <th>ID_Proveedor</th>
            </tr>
            <?php 
                require '../conexion/conectar.php';

                $sql = "SELECT * FROM producto ORDER BY idproducto_producto";
                $res = mysqli_query($con, $sql);
                while($producto = mysqli_fetch_array($res)){
            ?>
            <tr>
                <td><?php echo $producto['idproducto_producto'] ?></td>
                <td><?php echo $producto['nombre_producto'] ?></td>
                <td><?php echo $producto['codigo_producto'] ?></td>
                <td><?php echo $producto['precio_unitario_producto'] ?></td>
                <td><?php echo $producto['descripcion_producto'] ?></td>
                <td><?php echo $producto['idcategoria_categoria'] ?></td>
                <td><?php echo $producto['idproveedor_proveedor'] ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <!-- Reports -->
    <a href="../includes/x_index.php" class="btn-return">Regresar</a>
    <a href="report/productos-xls.php" class="report-xls">Reporte Excel</a>
    <a href="report/productos-pdf.php" class="report-pdf">Reporte Pdf</a>
    <a href="report/productos-chart.php" class="report-pdf">Reporte Grafico</a>
    
    </body>
</html>