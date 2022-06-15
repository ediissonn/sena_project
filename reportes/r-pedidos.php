<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include "../includes/x_scripts.php"; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Pedidos | Adiban</title>

    <link rel="stylesheet" href="../styles/x-reportes.css">
</head>
    <?php include "../includes/x_header.php"; ?>

    <!-- Title -->
    <h1 class="p-4 fs-2 fw-bold">Reporte De Pedidos</h1>

    <!-- Table -->
    <div class="m-2">
        <table>
            <tr>
                <th>Numero de Identificacion</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>ID_Cliente</th>
                <th>ID_Vendedor</th>
            </tr>
            <?php 
                require '../conexion/conectar.php';

                $sql = "SELECT * FROM pedidos ORDER BY idpedidos_pedidos";
                $res = mysqli_query($con, $sql);
                while($pedidos = mysqli_fetch_array($res)){
            ?>
            <tr>
                <td><?php echo $pedidos['idpedidos_pedidos'] ?></td>
                <td><?php echo $pedidos['nombre_pedidos'] ?></td>
                <td><?php echo $pedidos['direccion_pedidos'] ?></td>
                <td><?php echo $pedidos['fecha_pedidos'] ?></td>
                <td><?php echo $pedidos['estado_pedidos'] ?></td>
                <td><?php echo $pedidos['idcliente_cliente'] ?></td>
                <td><?php echo $pedidos['idvendedor_vendedor'] ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>


    <!-- Reports -->
    <a href="../includes/x_index.php" class="btn-return">Regresar</a>
    <a href="report/pedidos-xls.php" class="report-xls">Reporte Excel</a>
    <a href="report/pedidos-pdf.php" class="report-pdf">Reporte Pdf</a>
    <a href="report/pedidos-chart.php" class="report-pdf">Reporte Grafico</a>
    </body>
</html>