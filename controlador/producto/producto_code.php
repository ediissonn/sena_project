<?php

require '../../conexion/conectar.php';

// Delete Products
if(isset($_POST['delete_product']))
{
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

    $query = "DELETE FROM producto WHERE idproducto_producto='$product_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Producto Eliminado'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Producto No Eliminado'
        ];
        echo json_encode($res);
        return;
    }
}


// Edit Products
if(isset($_POST['update_product']))
{
    $idproducto_producto        = mysqli_real_escape_string($con, $_POST['idproducto_producto']);

    $nombre_producto            = mysqli_real_escape_string($con, $_POST['nombre_producto']);
    $codigo_producto            = mysqli_real_escape_string($con, $_POST['codigo_producto']);
    $precio_unitario_producto   = mysqli_real_escape_string($con, $_POST['precio_unitario_producto']);
    $descripcion_producto       = mysqli_real_escape_string($con, $_POST['descripcion_producto']);
    $idcategoria_categoria      = mysqli_real_escape_string($con, $_POST['idcategoria_categoria']);
    $idproveedor_proveedor      = mysqli_real_escape_string($con, $_POST['idproveedor_proveedor']);

    if($nombre_producto == NULL || $codigo_producto == NULL || $precio_unitario_producto == NULL || $descripcion_producto == NULL || $idcategoria_categoria == NULL || $idproveedor_proveedor == NULL)
    {
       $res = [
           'status' => 422,
           'message' => 'Faltan Datos'
       ];
       echo json_encode($res);
       return false;
    }

    $query = "UPDATE producto SET nombre_producto='$nombre_producto', codigo_producto='$codigo_producto', precio_unitario_producto='$precio_unitario_producto', descripcion_producto='$descripcion_producto', idcategoria_categoria='$idcategoria_categoria', idproveedor_proveedor='$idproveedor_proveedor' 
                WHERE idproducto_producto='$idproducto_producto'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Producto Actualizado'
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Producto No Actualizado'
        ];
        echo json_encode($res);
        return false;
    }
}

// View Products

if (isset($_GET['product_id']))
{
    $products_id = mysqli_real_escape_string($con, $_GET['product_id']);

    $query = "SELECT * FROM producto WHERE idproducto_producto ='$products_id'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $order = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Prducto Obtenido Con Éxito Por Id',
            'data' => $order
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Id Del Producto No Encontrado'
        ];
        echo json_encode($res);
        return false;
    }
}


// Add Order
if(isset($_POST['save_product']))
{
    $nombre_producto            = mysqli_real_escape_string($con, $_POST['nombre_producto']);
    $codigo_producto            = mysqli_real_escape_string($con, $_POST['codigo_producto']);
    $precio_unitario_producto   = mysqli_real_escape_string($con, $_POST['precio_unitario_producto']);
    $descripcion_producto       = mysqli_real_escape_string($con, $_POST['descripcion_producto']);
    $idcategoria_categoria      = mysqli_real_escape_string($con, $_POST['idcategoria_categoria']);
    $idproveedor_proveedor      = mysqli_real_escape_string($con, $_POST['idproveedor_proveedor']);

    if($nombre_producto == NULL || $codigo_producto == NULL || $precio_unitario_producto == NULL || $descripcion_producto == NULL || $idcategoria_categoria == NULL || $idproveedor_proveedor == NULL)
    {
       $res = [
           'status' => 422,
           'message' => 'Faltan Datos'
       ];
       echo json_encode($res);
       return false;
    }

    $query = "INSERT INTO producto (nombre_producto, codigo_producto, precio_unitario_producto, descripcion_producto, idcategoria_categoria, idproveedor_proveedor) VALUES ('$nombre_producto','$codigo_producto','$precio_unitario_producto','$descripcion_producto','$idcategoria_categoria','$idproveedor_proveedor')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Producto Creado'
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Producto No Creado'
        ];
        echo json_encode($res);
        return false;
    }
}