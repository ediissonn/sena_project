<?php
    header("content-Type: application/xls");
    header("content-Disposition: attachment; filename=reporte-de-pedidos.xls");
?>

<!-- Table -->

<table>
    <tr>
        <th>Número de Identificación</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Fecha</th>
        <th>Estado</th>
        <th>ID_Cliente</th>
        <th>ID_Vendedor</th>
    </tr>
    <?php 
        require '../../conexion/conectar.php';

        $sql = "SELECT * FROM pedidos ORDER BY idpedidos_pedidos";
        $res = mysqli_query($con, $sql);
        while($pedido = mysqli_fetch_array($res)){    
    ?>
        <tr>
            <td><?php echo $pedido['idpedidos_pedidos'] ?></td>
            <td><?php echo $pedido['nombre_pedidos'] ?></td>
            <td><?php echo $pedido['direccion_pedidos'] ?></td>
            <td><?php echo $pedido['fecha_pedidos'] ?></td>
            <td><?php echo $pedido['estado_pedidos'] ?></td>
            <td><?php echo $pedido['idcliente_cliente'] ?></td>
            <td><?php echo $pedido['idvendedor_vendedor'] ?></td>
        </tr>
    <?php } ?>
</table>
