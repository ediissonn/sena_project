<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include "../includes/x_scripts.php"; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Productos | Adiban</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="../styles/style_products.css">
</head>

<body>
<?php include "../includes/x_header.php"; ?>

<!-- Add Products Modal -->
<div class="modal fade" id="productAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Añadir Producto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveProduct">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>

                <div class="mb-3">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre_producto" class="form-control border-dark" />
                </div>
                <div class="mb-3">
                    <label for="">Codigo</label>
                    <input type="text" name="codigo_producto" class="form-control border-dark" />
                </div>
                <div class="mb-3">
                    <label for="">Precio</label>
                    <input type="text" name="precio_unitario_producto" class="form-control border-dark" />
                </div>
                <div class="mb-3">
                    <label for="">Descripcion</label>
                    <input type="text" name="descripcion_producto" class="form-control border-dark" />
                </div>
                <div class="mb-3">
                    <label for="">Categoria</label>
                    <select type="text" name="idcategoria_categoria" id="idcategoria_categoria" class="form-control border-dark">
                        <option value="0">Seleccione</option>
                            <?php 
                                require '../conexion/conectar.php';
                                $proveedor="SELECT * FROM categoria";
                                $resultado=mysqli_query($con,$proveedor);
                                while ($valores = mysqli_fetch_array($resultado)) {
                                    echo '<option value="'.$valores['idcategoria_categoria'].'">'.$valores['idcategoria_categoria'].' - '.$valores['nombre_categoria'].'</option>';
                                }
                            ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Proveedor</label>
                    <select type="text" name="idproveedor_proveedor" id="idproveedor_proveedor" class="form-control border-dark">
                        <option value="0">Seleccione</option>
                            <?php 
                                require '../conexion/conectar.php';
                                $proveedor="SELECT * FROM proveedor";
                                $resultado=mysqli_query($con,$proveedor);
                                while ($valores = mysqli_fetch_array($resultado)) {
                                    echo '<option value="'.$valores['idproveedor_proveedor'].'">'.$valores['idproveedor_proveedor'].' - '.$valores['nombre_proveedor'].'</option>';
                                }
                            ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Crear Producto</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Edit Products Modal -->
<div class="modal fade" id="productEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateProduct">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="idproducto_producto" id="idproducto_producto" />

                <div class="mb-3">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre_producto" id="nombre_producto" class="form-control border-dark" />
                </div>
                <div class="mb-3">
                    <label for="">Codigo</label>
                    <input type="text" name="codigo_producto" id="codigo_producto" class="form-control border-dark" />
                </div>
                <div class="mb-3">
                    <label for="">Precio</label>
                    <input type="text" name="precio_unitario_producto" id="precio_unitario_producto" class="form-control border-dark" />
                </div>
                <div class="mb-3">
                    <label for="">Descripcion</label>
                    <input type="text" name="descripcion_producto" id="descripcion_producto" class="form-control border-dark" />
                </div>
                <div class="mb-3">
                    <label for="">Categoria</label>
                    <select type="text" name="idcategoria_categoria" id="idcategoria_categoria" class="form-control border-dark">
                        <option value="0">Seleccione</option>
                            <?php 
                                require '../conexion/conectar.php';
                                $proveedor="SELECT * FROM categoria";
                                $resultado=mysqli_query($con,$proveedor);
                                while ($valores = mysqli_fetch_array($resultado)) {
                                    echo '<option value="'.$valores['idcategoria_categoria'].'">'.$valores['idcategoria_categoria'].' - '.$valores['nombre_categoria'].'</option>';
                                }
                            ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Proveedor</label>
                    <select type="text" name="idproveedor_proveedor" id="idproveedor_proveedor" class="form-control border-dark">
                        <option value="0">Seleccione</option>
                                <?php 
                                    require '../conexion/conectar.php';
                                    $proveedor="SELECT * FROM proveedor";
                                    $resultado=mysqli_query($con,$proveedor);
                                    while ($valores = mysqli_fetch_array($resultado)) {
                                        echo '<option value="'.$valores['idproveedor_proveedor'].'">'.$valores['idproveedor_proveedor'].' - '.$valores['nombre_proveedor'].'</option>';
                                    }
                                ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Actualizar Producto</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- View Products Modal -->
<div class="modal fade" id="productViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ver Producto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="">Nombre</label>
                    <p id="view_nombre_producto" class="form-control border-dark"></p>
                </div>
                <div class="mb-3">
                    <label for="">Codigo</label>
                    <p id="view_codigo_producto" class="form-control border-dark"></p>
                </div>
                <div class="mb-3">
                    <label for="">Precio</label>
                    <p id="view_precio_unitario_producto" class="form-control border-dark"></p>
                </div>
                <div class="mb-3">
                    <label for="">Descripcion</label>
                    <p id="view_descripcion_producto" class="form-control border-dark"></p>
                </div>
                <div class="mb-3">
                    <label for="">Categoria</label>
                    <p id="view_idcategoria_categoria" class="form-control border-dark">
                    </p>
                </div>
                <div class="mb-3">
                    <label for="">Proveedor</label>
                    <p id="view_idproveedor_proveedor" class="form-control border-dark"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Title -->

<h1>Lista De Productos</h1>

<!-- Create Products Button -->   

    <button type="button" class="btn-new btn btn-light" data-bs-toggle="modal" data-bs-target="#productAddModal">
        Crear Producto
    </button>

<!-- Search Products Button -->
    
    <form action="/adiban/controlador/producto/search_producto.php" method="POST" class="d-flex form-search">
        <input class="form-control me-2" type="search" name="search" placeholder="Ingresa el dato" aria-label="Search">
        <button class="btn btn-info" type="submit">Buscar</button>
    </form>

<!-- Products Table -->

    <div class="p-2">
        <table id="myTableProduct" class="table table-bordered table-striped border-light">
                <thead>
                        <tr>
                            <th scope="col" class="bg-light">Número de Identificación</th>
                            <th scope="col" class="bg-light">Nombre</th>
                            <th scope="col" class="bg-light">Codigo</th>
                            <th scope="col" class="bg-light">Precio</th>
                            <th scope="col" class="bg-light">Descripcion</th>
                            <th scope="col" class="bg-light">Categoria</th>
                            <th scope="col" class="bg-light">Proveedor</th>
                            <th scope="col" class="bg-light">Acciones</th>
                        </tr>
                </thead>
                    <tbody>
                        <?php
                        require '../conexion/conectar.php';

                        $query = "SELECT * FROM producto";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $customer)
                            {
                                ?>
                                <tr>
                                    <td><?= $customer['idproducto_producto']; ?></td>
                                    <td><?= $customer['nombre_producto']; ?></td>
                                    <td><?= $customer['codigo_producto']; ?></td>
                                    <td><?= $customer['precio_unitario_producto']; ?></td>
                                    <td><?= $customer['descripcion_producto']; ?></td>
                                    <td><?= $customer['idcategoria_categoria']; ?></td>
                                    <td><?= $customer['idproveedor_proveedor']; ?></td>
                                    <td>
                                    <button type="button" value="<?=$customer['idproducto_producto'];?>" class="viewProductBtn btn btn-warning">Ver</button>
                                    <button type="button" value="<?=$customer['idproducto_producto'];?>" class="editProductBtn btn btn-success">Editar</button>
                                    <button type="button" value="<?=$customer['idproducto_producto'];?>" class="deleteProductBtn btn btn-danger">Eliminar</button>
                                    </td>
                                    </tr>
                                <?php
                                }
                            }
                            ?>
                            
                </tbody>
        </table>
    </div>

    <!-- Back Button -->

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="../includes/x_index.php" class="btn-back btn btn-light btn-outline-light me-md-2" type="button">Regresar</a>
    </div>                        

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>   
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script> 


<!-- Ajax -->

<script>
// Add Product
$(document).on('submit', '#saveProduct', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("save_product", true);

        $.ajax({
          type: "POST",
          url: "/adiban/controlador/producto/producto_code.php",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            
            var res =jQuery.parseJSON(response);
            if(res.status == 422) {
              $('#errorMessage').removeClass('d-none');
              $('#errorMessage').text(res.message);
            }else if(res.status == 200){

              $('#errorMessage').addClass('d-none');
              $('#productAddModal').modal('hide');
              $('#saveProduct')[0].reset();

              alertify.set('notifier','position', 'top-right');
              alertify.success(res.message);

              $('#myTableProduct').load(location.href + " #myTableProduct");

            }
          }
        });

    });

// Edit Product
$(document).on('click', '.editProductBtn', function () {

var product_id = $(this).val();
//alert(customer_id);
$.ajax({
    type: "GET",
    url: "/adiban/controlador/producto/producto_code.php?product_id=" + product_id,
    success: function (response) {
        
        var res = jQuery.parseJSON(response);
        if(res.status == 422) { 

            alert(res.message);
        }else if(res.status == 200){

            $('#idproducto_producto').val(res.data.idproducto_producto);
            $('#nombre_producto').val(res.data.nombre_producto);
            $('#codigo_producto').val(res.data.codigo_producto);
            $('#precio_unitario_producto').val(res.data.precio_unitario_producto);
            $('#descripcion_producto').val(res.data.descripcion_producto);
            $('#idcategoria_categoria').val(res.data.idcategoria_categoria);
            $('#idproveedor_proveedor').val(res.data.idproveedor_proveedor);

            $('#productEditModal').modal('show');
            
        }
    }
});
});

$(document).on('submit', '#updateProduct', function (e) {
e.preventDefault();

var formData = new FormData(this);
formData.append("update_product", true);

$.ajax({
type: "POST",
url: "/adiban/controlador/producto/producto_code.php",
data: formData,
processData: false,
contentType: false,
success: function (response) {

var res = jQuery.parseJSON(response);
if(res.status == 422) {
  $('#errorMessageUpdate').removeClass('d-none');
  $('#errorMessageUpdate').text(res.message);

}else if(res.status == 200){

  $('#errorMessageUpdate').addClass('d-none');

  alertify.set('notifier','position', 'top-right');
  alertify.success(res.message);

  $('#productEditModal').modal('hide');
  $('#updateProduct')[0].reset();


  $('#myTableProduct').load(location.href + " #myTableProduct");
}
}
});

});

// View Product
$(document).on('click', '.viewProductBtn', function () {

var product_id = $(this).val();
$.ajax({
ype: "GET",
url: "/adiban/controlador/producto/producto_code.php?product_id=" + product_id,
success: function (response) {

    var res = jQuery.parseJSON(response);
    if(res.status == 404) { 

        alert(res.message);
        }else if(res.status == 200){

            $('#view_nombre_producto').text(res.data.nombre_producto);
            $('#view_codigo_producto').text(res.data.codigo_producto);
            $('#view_precio_unitario_producto').text(res.data.precio_unitario_producto);
            $('#view_descripcion_producto').text(res.data.descripcion_producto);
            $('#view_idcategoria_categoria ').text(res.data.idcategoria_categoria );
            $('#view_idproveedor_proveedor').text(res.data.idproveedor_proveedor);

            $('#productViewModal').modal('show');

    }
}
});
});

// Delete Product
$(document).on('click', '.deleteProductBtn', function (e) {
e.preventDefault();

if(confirm('¿Estas seguro que deseas eliminar el producto?'))
{
    var product_id = $(this).val();
    $.ajax({
        type: "POST",
        url: "/adiban/controlador/producto/producto_code.php",
        data: {
            'delete_product': true,
            'product_id': product_id
        },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if(res.status == 500) {

                alert(res.message);
            }else{
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.message);


                $('#myTableProduct').load(location.href + " #myTableProduct");
            }
        }
    });
}
});
    </script>
    </body>
</html>