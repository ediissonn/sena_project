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
        <th>Telefono</th>>
    </tr>
    <?php 
        require '../../conexion/conectar.php';

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
