<?php

require '../../conexion/conectar.php';

// Delete Customer
if(isset($_POST['delete_customer']))
{
    $customer_id = mysqli_real_escape_string($con, $_POST['customer_id']);

    $query = "DELETE FROM cliente WHERE idcliente_cliente='$customer_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Cliente Eliminado'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Cliente No Eliminado'
        ];
        echo json_encode($res);
        return;
    }
}


// Edit Customer
if(isset($_POST['update_customer']))
{
    $idcliente_cliente = mysqli_real_escape_string($con, $_POST['idcliente_cliente']);

    $nombre_cliente     = mysqli_real_escape_string($con, $_POST['nombre_cliente']);
    $apellido_cliente   = mysqli_real_escape_string($con, $_POST['apellido_cliente']);
    $telefono_cliente   = mysqli_real_escape_string($con, $_POST['telefono_cliente']);
    $direccion_cliente  = mysqli_real_escape_string($con, $_POST['direccion_cliente']);

    if($nombre_cliente == NULL || $apellido_cliente == NULL || $telefono_cliente == NULL || $direccion_cliente == NULL)
    {
       $res = [
           'status' => 422,
           'message' => 'Faltan Datos'
       ];
       echo json_encode($res);
       return false;
    }

    $query = "UPDATE cliente SET nombre_cliente='$nombre_cliente', apellido_cliente='$apellido_cliente', telefono_cliente='$telefono_cliente', direccion_cliente='$direccion_cliente' 
                WHERE idcliente_cliente='$idcliente_cliente'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Cliente Actualizado'
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Cliente No Actualizado'
        ];
        echo json_encode($res);
        return false;
    }
}

// View Customer

if (isset($_GET['customer_id']))
{
    $customer_id = mysqli_real_escape_string($con, $_GET['customer_id']);

    $query = "SELECT * FROM cliente WHERE idcliente_cliente ='$customer_id'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $customer = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Cliente Obtenido Con Éxito Por Id',
            'data' => $customer
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Id Del Cliente No Encontrado'
        ];
        echo json_encode($res);
        return false;
    }
}


// Add Customer
if(isset($_POST['save_customer']))
{
    $nombre_cliente     = mysqli_real_escape_string($con, $_POST['nombre_cliente']);
    $apellido_cliente   = mysqli_real_escape_string($con, $_POST['apellido_cliente']);
    $telefono_cliente   = mysqli_real_escape_string($con, $_POST['telefono_cliente']);
    $direccion_cliente  = mysqli_real_escape_string($con, $_POST['direccion_cliente']);

    if($nombre_cliente == NULL || $apellido_cliente == NULL || $telefono_cliente == NULL || $direccion_cliente == NULL)
    {
       $res = [
           'status' => 422,
           'message' => 'Faltan Datos'
       ];
       echo json_encode($res);
       return false;
    }

    $query = "INSERT INTO cliente (nombre_cliente, apellido_cliente, telefono_cliente, direccion_cliente) VALUES ('$nombre_cliente','$apellido_cliente','$telefono_cliente','$direccion_cliente')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Cliente Creado'
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Cliente No Creado'
        ];
        echo json_encode($res);
        return false;
    }
}