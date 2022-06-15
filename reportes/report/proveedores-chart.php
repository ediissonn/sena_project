<?php
    include('../../conexion/conectar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Proveedores | Adiban</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.js"></script>
</head>
<body>
<canvas id="myChart" width="365" height="150"></canvas>
<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
        <?php
        $sql = "SELECT * FROM proveedor";
        $result = mysqli_query($con, $sql);
        while ($registros = mysqli_fetch_array($result))
        {
        ?>
            '<?php echo $registros["nombre_proveedor"] ?>',
        <?php
        }
        ?>
        ],
        datasets: [{
            label: 'Reporte De Proveedores',
            data: 
            <?php
            $sql = "SELECT * FROM proveedor";
            $result = mysqli_query($con, $sql);
            ?>
            [<?php while ($registros = mysqli_fetch_array($result)){ ?><?php echo $registros["idproveedor_proveedor"]?>,
                <?php }?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
<a href="../r-proveedores.php" class="btn-return">Regresar</a>
</body>

    <style>
            body{
                background-color: #FFF;
            }

            /* BARRA DE NAVEGACION **/

            body::-webkit-scrollbar {
                width: 11px;
            }

            body::-webkit-scrollbar-thumb {
                background: #009BFF;
                border-radius: 5px;
            }

            body::-webkit-scrollbar-thumb:hover {
                background: #0566A4;
            }

            /*** BOTON REGRESAR ***/

            .btn-return {
                background: #52b2fa;
                color: #fff;
                padding: 15px 20px;
                border-radius: 4px;
                margin: 5px;
                align-items: center;
                text-decoration: none;
                float: right;
            }
    </style>



</html>
