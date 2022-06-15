<?php

require '../../conexion/conectar.php';

// Delete Category
if(isset($_POST['delete_category']))
{
    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);

    $query = "DELETE FROM categoria WHERE idcategoria_categoria='$category_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Categoria Eliminada'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Categoria No Eliminada'
        ];
        echo json_encode($res);
        return;
    }
}


// Edit Category
if(isset($_POST['update_category']))
{
    $idcategoria_categoria = mysqli_real_escape_string($con, $_POST['idcategoria_categoria']);

    $nombre_categoria     = mysqli_real_escape_string($con, $_POST['nombre_categoria']);

    if($nombre_categoria == NULL)
    {
       $res = [
           'status' => 422,
           'message' => 'Faltan Datos'
       ];
       echo json_encode($res);
       return false;
    }

    $query = "UPDATE categoria SET nombre_categoria='$nombre_categoria' WHERE idcategoria_categoria='$idcategoria_categoria'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Categoria Actualizada'
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Categoria No Actualizada'
        ];
        echo json_encode($res);
        return false;
    }
}

// View Category

if (isset($_GET['category_id']))
{
    $category_id = mysqli_real_escape_string($con, $_GET['category_id']);

    $query = "SELECT * FROM categoria WHERE idcategoria_categoria ='$category_id'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $category = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Categoria Obtenida Con Éxito Por Id',
            'data' => $category
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Id De La Categoria No Encontrada'
        ];
        echo json_encode($res);
        return false;
    }
}


// Add Category
if(isset($_POST['save_category']))
{
    $nombre_categoria     = mysqli_real_escape_string($con, $_POST['nombre_categoria']);

    if($nombre_categoria == NULL)
    {
       $res = [
           'status' => 422,
           'message' => 'Faltan Datos'
       ];
       echo json_encode($res);
       return false;
    }

    $query = "INSERT INTO categoria (nombre_categoria) VALUES ('$nombre_categoria')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Categoria Creada'
        ];
        echo json_encode($res);
        return false;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Categoria No Creada'
        ];
        echo json_encode($res);
        return false;
    }
}