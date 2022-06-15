<?php

require '../../conexion/conectar.php';

// Delete Supplier
if(isset($_POST['delete_supplier']))
{
    $supplier_id = mysqli_real_escape_string($con, $_POST['supplier_id']);

    $query = "DELETE FROM proveedor WHERE idproveedor_proveedor='$supplier_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Proveedor Eliminado'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Proveedor No Eliminado'
        ];
        echo json_encode($res);
        return;
    }
}


// Edit Supplier
if(isset($_POST['update_supplier']))
{
    $idproveedor_proveedor = mysqli_real_escape_string($con, $_POST['idproveedor_proveedor']);

    $nombre_proveedor     = mysqli_real_escape_string($con, $_POST['nombre_proveedor']);
    $apellido_proveedor   = mysqli_real_escape_string($con, $_POST['apellido_proveedor']);
    $telefono_proveedor   = mysqli_real_escape_string($con, $_POST['telefono_proveedor']);

    if($nombre_proveedor == NULL || $apellido_proveedor == NULL || $telefono_proveedor == NULL)
    {
       $res = [
           'status' => 422,
           'message' => 'Faltan Datos'
       ];
       echo json_encode($res);
       return false;
    }

    $query = "UPDATE proveedor SET nombre_proveedor='$nombre_proveedor', apellido_proveedor='$apellido_proveedor', telefono_proveedor='$telefono_proveedor' 
                WHERE idproveedor_proveedor='$idproveedor_proveedor'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Proveedor Actualizado'
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Proveedor No Actualizado'
        ];
        echo json_encode($res);
        return false;
    }
}

// View Supplier

if (isset($_GET['supplier_id']))
{
    $supplier_id = mysqli_real_escape_string($con, $_GET['supplier_id']);

    $query = "SELECT * FROM proveedor WHERE idproveedor_proveedor ='$supplier_id'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $supplier = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Proveedor Obtenido Con Éxito Por Id',
            'data' => $supplier
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Id Del Proveedor No Encontrado'
        ];
        echo json_encode($res);
        return false;
    }
}


// Add Supplier
if(isset($_POST['save_supplier']))
{
    $nombre_proveedor     = mysqli_real_escape_string($con, $_POST['nombre_proveedor']);
    $apellido_proveedor   = mysqli_real_escape_string($con, $_POST['apellido_proveedor']);
    $telefono_proveedor   = mysqli_real_escape_string($con, $_POST['telefono_proveedor']);

    if($nombre_proveedor == NULL || $apellido_proveedor == NULL || $telefono_proveedor == NULL)
    {
       $res = [
           'status' => 422,
           'message' => 'Faltan Datos'
       ];
       echo json_encode($res);
       return false;
    }

    $query = "INSERT INTO proveedor (nombre_proveedor, apellido_proveedor, telefono_proveedor) VALUES ('$nombre_proveedor','$apellido_proveedor','$telefono_proveedor')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Proveedor Creado'
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Proveedor No Creado'
        ];
        echo json_encode($res);
        return false;
    }
}