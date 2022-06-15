<?php

require '../../conexion/conectar.php';

// Delete Seller
if(isset($_POST['delete_seller']))
{
    $seller_id = mysqli_real_escape_string($con, $_POST['seller_id']);

    $query = "DELETE FROM vendedor WHERE idvendedor_vendedor='$seller_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Vendedor Eliminado'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Vendedor No Eliminado'
        ];
        echo json_encode($res);
        return;
    }
}


// Edit Seller
if(isset($_POST['update_seller']))
{
    $idvendedor_vendedor = mysqli_real_escape_string($con, $_POST['idvendedor_vendedor']);

    $nombre_vendedor     = mysqli_real_escape_string($con, $_POST['nombre_vendedor']);
    $apellido_vendedor   = mysqli_real_escape_string($con, $_POST['apellido_vendedor']);
    $direccion_vendedor  = mysqli_real_escape_string($con, $_POST['direccion_vendedor']);
    $telefono_vendedor   = mysqli_real_escape_string($con, $_POST['telefono_vendedor']);

    if($nombre_vendedor == NULL || $apellido_vendedor == NULL || $direccion_vendedor == NULL || $telefono_vendedor == NULL)
    {
       $res = [
           'status' => 422,
           'message' => 'Faltan Datos'
       ];
       echo json_encode($res);
       return false;
    }

    $query = "UPDATE vendedor SET nombre_vendedor='$nombre_vendedor', apellido_vendedor='$apellido_vendedor', direccion_vendedor='$direccion_vendedor', telefono_vendedor='$telefono_vendedor' 
                WHERE idvendedor_vendedor='$idvendedor_vendedor'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Vendedor Actualizado'
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Vendedor No Actualizado'
        ];
        echo json_encode($res);
        return false;
    }
}

if (isset($_GET['seller_id']))
{
    $seller_id = mysqli_real_escape_string($con, $_GET['seller_id']);

    $query = "SELECT * FROM vendedor WHERE idvendedor_vendedor ='$seller_id'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $seller = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Vendedor Obtenido Con Éxito Por Id',
            'data' => $seller
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Id Del Vendedor No Encontrado'
        ];
        echo json_encode($res);
        return false;
    }
}


// Add seller
if(isset($_POST['save_seller']))
{
    $nombre_vendedor     = mysqli_real_escape_string($con, $_POST['nombre_vendedor']);
    $apellido_vendedor   = mysqli_real_escape_string($con, $_POST['apellido_vendedor']);
    $direccion_vendedor  = mysqli_real_escape_string($con, $_POST['direccion_vendedor']);
    $telefono_vendedor   = mysqli_real_escape_string($con, $_POST['telefono_vendedor']);

    if($nombre_vendedor == NULL || $apellido_vendedor == NULL || $direccion_vendedor == NULL || $telefono_vendedor == NULL)
    {
       $res = [
           'status' => 422,
           'message' => 'Faltan Datos'
       ];
       echo json_encode($res);
       return false;
    }

    $query = "INSERT INTO vendedor (nombre_vendedor, apellido_vendedor, direccion_vendedor, telefono_vendedor) VALUES ('$nombre_vendedor','$apellido_vendedor','$direccion_vendedor','$telefono_vendedor')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Vendedor Creado'
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Vendedor No Creado'
        ];
        echo json_encode($res);
        return false;
    }
}