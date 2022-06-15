<?php
    header("content-Type: application/xls");
    header("content-Disposition: attachment; filename=reporte-de-clientes.xls");
?>

<!-- Table -->

<table>
    <tr>
        <th>Numero de Identificacion</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Telefono</th>
        <th>Direccion</th>
    </tr>
    <?php 
        
        require '../../conexion/conectar.php';

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
