<?php

require '../../conexion/conectar.php';

// Delete Order
if(isset($_POST['delete_order']))
{
    $order_id = mysqli_real_escape_string($con, $_POST['order_id']);

    $query = "DELETE FROM pedidos WHERE idpedidos_pedidos='$order_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Pedido Eliminado'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Pedido No Eliminado'
        ];
        echo json_encode($res);
        return;
    }
}


// Edit Order
if(isset($_POST['update_order']))
{
    $idpedidos_pedidos      = mysqli_real_escape_string($con, $_POST['idpedidos_pedidos']);

    $nombre_pedidos         = mysqli_real_escape_string($con, $_POST['nombre_pedidos']);
    $direccion_pedidos      = mysqli_real_escape_string($con, $_POST['direccion_pedidos']);
    $fecha_pedidos          = mysqli_real_escape_string($con, $_POST['fecha_pedidos']);
    $estado_pedidos         = mysqli_real_escape_string($con, $_POST['estado_pedidos']);
    $idcliente_cliente      = mysqli_real_escape_string($con, $_POST['idcliente_cliente']);
    $idvendedor_vendedor    = mysqli_real_escape_string($con, $_POST['idvendedor_vendedor']);

    if($nombre_pedidos == NULL || $direccion_pedidos == NULL || $fecha_pedidos == NULL || $estado_pedidos == NULL || $idcliente_cliente == NULL || $idvendedor_vendedor == NULL)
    {
       $res = [
           'status' => 422,
           'message' => 'Faltan Datos'
       ];
       echo json_encode($res);
       return false;
    }

    $query = "UPDATE pedidos SET nombre_pedidos='$nombre_pedidos', direccion_pedidos='$direccion_pedidos', fecha_pedidos='$fecha_pedidos', estado_pedidos='$estado_pedidos', idcliente_cliente='$idcliente_cliente', idvendedor_vendedor='$idvendedor_vendedor' 
                WHERE idpedidos_pedidos='$idpedidos_pedidos'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Pedido Actualizado'
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Pedido No Actualizado'
        ];
        echo json_encode($res);
        return false;
    }
}

// View Order

if (isset($_GET['order_id']))
{
    $order_id = mysqli_real_escape_string($con, $_GET['order_id']);

    $query = "SELECT * FROM pedidos WHERE idpedidos_pedidos ='$order_id'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $order = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Pedido Obtenido Con Éxito Por Id',
            'data' => $order
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Id Del Pedido No Encontrado'
        ];
        echo json_encode($res);
        return false;
    }
}


// Add Order
if(isset($_POST['save_order']))
{
    $nombre_pedidos         = mysqli_real_escape_string($con, $_POST['nombre_pedidos']);
    $direccion_pedidos      = mysqli_real_escape_string($con, $_POST['direccion_pedidos']);
    $fecha_pedidos          = mysqli_real_escape_string($con, $_POST['fecha_pedidos']);
    $estado_pedidos         = mysqli_real_escape_string($con, $_POST['estado_pedidos']);
    $idcliente_cliente      = mysqli_real_escape_string($con, $_POST['idcliente_cliente']);
    $idvendedor_vendedor    = mysqli_real_escape_string($con, $_POST['idvendedor_vendedor']);

    if($nombre_pedidos == NULL || $direccion_pedidos == NULL || $fecha_pedidos == NULL || $estado_pedidos == NULL || $idcliente_cliente == NULL || $idvendedor_vendedor == NULL)
    {
       $res = [
           'status' => 422,
           'message' => 'Faltan Datos'
       ];
       echo json_encode($res);
       return false;
    }

    $query = "INSERT INTO pedidos (nombre_pedidos, direccion_pedidos, fecha_pedidos, estado_pedidos, idcliente_cliente, idvendedor_vendedor) VALUES ('$nombre_pedidos','$direccion_pedidos','$fecha_pedidos','$estado_pedidos','$idcliente_cliente','$idvendedor_vendedor')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Pedido Creado'
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Pedido No Creado'
        ];
        echo json_encode($res);
        return false;
    }
}