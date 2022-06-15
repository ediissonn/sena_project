<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include "../includes/x_scripts.php"; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Clientes | Adiban</title>

    <link rel="stylesheet" href="../styles/x-reportes.css">
</head>
    <?php include "../includes/x_header.php"; ?>

    <!-- Title -->
    <h1 class="p-4 fs-2 fw-bold">Reporte De Clientes</h1>

    <!-- Table -->
    <div class="m-2">
    <table>
        <tr>
            <th>Número de Identificación</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Telefono</th>
            <th>Dirección</th>
        </tr>
        <?php 
        require '../conexion/conectar.php';

        $sql = "SELECT * FROM cliente ORDER BY idcliente_cliente";
        $res = mysqli_query($con, $sql);
        while($cliente = mysqli_fetch_array($res)){
        ?>
            <tr>
                <td><?php echo $cliente['idcliente_cliente'] ?></td>
                <td><?php echo $cliente['nombre_cliente'] ?></td>
                <td><?php echo $cliente['apellido_cliente'] ?></td>
                <td><?php echo $cliente['telefono_cliente'] ?></td>
                <td><?php echo $cliente['direccion_cliente'] ?></td>
            </tr>
            <?php } ?>
    </table>
    </div>

    <!-- Reports -->
    <a href="../includes/x_index.php" class="btn-return">Regresar</a>
    <a href="report/cliente-xls.php" class="report-xls">Reporte Excel</a>
    <a href="report/cliente-pdf.php" class="report-pdf">Reporte Pdf</a>
    <a href="report/cliente-chart.php" class="report-pdf">Reporte Grafico</a>
    </body>
</html>