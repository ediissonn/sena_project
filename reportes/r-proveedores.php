<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include "../includes/x_scripts.php"; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Proveedores | Adiban</title>

    <link rel="stylesheet" href="../styles/x-reportes.css">

</head>
<body>
    <?php include "../includes/x_header.php"; ?>

    <!-- Title -->
    <h1 class="p-4 fs-2 fw-bold">Reporte De Proveedores</h1>

    <!-- Table -->
    <div class="m-2">
        <table>
            <tr>
                <th>Número de Identificación</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
            </tr>
            <?php 
                require '../conexion/conectar.php';

                $sql = "SELECT * FROM proveedor ORDER BY idproveedor_proveedor";
                $res = mysqli_query($con, $sql);
                while($proveedor = mysqli_fetch_assoc($res)){
                ?>
            <tr>
                <td><?php echo $proveedor['idproveedor_proveedor'] ?></td>
                <td><?php echo $proveedor['nombre_proveedor'] ?></td>
                <td><?php echo $proveedor['apellido_proveedor'] ?></td>
                <td><?php echo $proveedor['telefono_proveedor'] ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <!-- Reports -->
    <a href="../includes/x_index.php" class="btn-return">Regresar</a>
    <a href="report/proveedores-xls.php" class="report-xls">Reporte Excel</a>
    <a href="report/proveedores-pdf.php" class="report-pdf">Reporte Pdf</a>
    <a href="report/proveedores-chart.php" class="report-pdf">Reporte Grafico</a>
   
    </body>
</html>