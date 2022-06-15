<?php
    header("content-Type: application/xls");
    header("content-Disposition: attachment; filename=reporte-de-proveedores.xls");
?>

<!-- Table -->

<table>
    <tr>
        <th>Numero de Identificacion</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Direccion</th>
        <th>Telefono</th>
    </tr>
    <?php 
        require '../../conexion/conectar.php';

        $sql = "SELECT * FROM vendedor ORDER BY idvendedor_vendedor";
        $res = mysqli_query($con, $sql);
        while($vendedor = mysqli_fetch_assoc($res)){
    ?>
        <tr>
            <td><?php echo $vendedor['idvendedor_vendedor'] ?></td>
            <td><?php echo $vendedor['nombre_vendedor'] ?></td>
            <td><?php echo $vendedor['apellido_vendedor'] ?></td>
            <td><?php echo $vendedor['direccion_vendedor'] ?></td>
            <td><?php echo $vendedor['telefono_vendedor'] ?></td>
        </tr>
    <?php } ?>
</table>
