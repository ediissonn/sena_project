<?php
    header("content-Type: application/xls");
    header("content-Disposition: attachment; filename=reporte-de-productos.xls");
?>

<!-- Table -->

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
        require '../../conexion/conectar.php';

        $sql = "SELECT * FROM producto ORDER BY idproducto_producto ";
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
