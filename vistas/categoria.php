<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include "../includes/x_scripts.php"; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Categorias | Adiban</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="/adiban/styles/style_category.css">
</head>

<body>
<?php include "../includes/x_header.php"; ?>

<!-- Add Category Modal -->
<div class="modal fade" id="categoryAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Añadir Categoria</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveCategory">
            <div class="modal-body">
                <div id="errorMessage" class="alert alert-warning d-none"></div>
                <div class="mb-3">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre_categoria" class="form-control border-warning" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Crear Categoria</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="categoryEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateCategory">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="idcategoria_categoria" id="idcategoria_categoria" />

                <div class="mb-3">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre_categoria" id="nombre_categoria" class="form-control border-warning" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Actualizar Categoria</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- View Category Modal -->
<div class="modal fade" id="categoryViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ver Categoria</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label for="">Nombre</label>
                    <p id="view_nombre_categoria" class="form-control border-warning"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Title -->

<h1>Lista De Categorias</h1>

<!-- Create Categorys Button -->   

    <button type="button" class="btn-new btn btn-warning" data-bs-toggle="modal" data-bs-target="#categoryAddModal">
        Crear Categoria
    </button>

<!-- Search Category Button -->
    
    <form action="../controlador/categoria/search_categoria.php" method="POST" class="d-flex form-search">
        <input class="form-control me-2" type="search" name="search" placeholder="Ingresa el dato" aria-label="Search">
        <button class="btn btn-info" type="submit">Buscar</button>
    </form>

<!-- Category Table -->

    <div class="p-2">
        <table id="myTableCategory" class="table table-bordered table-striped border-warning">
                <thead>
                        <tr>
                            <th scope="col" class="bg-warning">Número de Identificación</th>
                            <th scope="col" class="bg-warning">Nombre</th>
                            <th scope="col" class="bg-warning">Acciones</th>
                        </tr>
                </thead>
                    <tbody>
                        <?php
                        require '../conexion/conectar.php';

                        $query = "SELECT * FROM categoria";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $customer)
                            {
                                ?>
                                <tr>
                                    <td scope="row"><?= $customer['idcategoria_categoria']; ?></td>
                                    <td><?= $customer['nombre_categoria']; ?></td>
                                    <td>
                                    <button type="button" value="<?=$customer['idcategoria_categoria'];?>" class="viewCategoryBtn btn btn-warning">Ver</button>
                                    <button type="button" value="<?=$customer['idcategoria_categoria'];?>" class="editCategoryBtn btn btn-success">Editar</button>
                                    <button type="button" value="<?=$customer['idcategoria_categoria'];?>" class="deleteCategoryBtn btn btn-danger">Eliminar</button>
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
        <a href="../includes/x_index.php" class="btn btn-dark btn-outline-warning me-md-2" type="button">Regresar</a>
    </div>                        

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>   
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script> 

<!-- Ajax -->

<script>
// Add Category
$(document).on('submit', '#saveCategory', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("save_category", true);

        $.ajax({
          type: "POST",
          url: "/adiban/controlador/categoria/categoria_code.php",
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
              $('#categoryAddModal').modal('hide');
              $('#saveCategory')[0].reset();

              alertify.set('notifier','position', 'top-right');
              alertify.success(res.message);

              $('#myTableCategory').load(location.href + " #myTableCategory");

            }
          }
        });

    });

// Edit Category
$(document).on('click', '.editCategoryBtn', function () {

var category_id = $(this).val();
//alert(customer_id);
$.ajax({
    type: "GET",
    url: "/adiban/controlador/categoria/categoria_code.php?category_id=" + category_id,
    success: function (response) {
        
        var res = jQuery.parseJSON(response);
        if(res.status == 422) { 

            alert(res.message);
        }else if(res.status == 200){

            $('#idcategoria_categoria').val(res.data.idcategoria_categoria);
            $('#nombre_categoria').val(res.data.nombre_categoria);

            $('#categoryEditModal').modal('show');
            
        }
    }
});
});

$(document).on('submit', '#updateCategory', function (e) {
e.preventDefault();

var formData = new FormData(this);
formData.append("update_category", true);

$.ajax({
type: "POST",
url: "/adiban/controlador/categoria/categoria_code.php",
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

  $('#categoryEditModal').modal('hide');
  $('#updateCategory')[0].reset();


  $('#myTableCategory').load(location.href + " #myTableCategory");
}
}
});

});

// View Category
$(document).on('click', '.viewCategoryBtn', function () {

var category_id = $(this).val();
$.ajax({
ype: "GET",
url: "/adiban/controlador/categoria/categoria_code.php?category_id=" + category_id,
success: function (response) {

    var res = jQuery.parseJSON(response);
    if(res.status == 404) { 

        alert(res.message);
        }else if(res.status == 200){

            $('#view_nombre_categoria').text(res.data.nombre_categoria);

            $('#categoryViewModal').modal('show');

    }
}
});
});

// Delete Category
$(document).on('click', '.deleteCategoryBtn', function (e) {
e.preventDefault();

if(confirm('¿Estas seguro que deseas eliminar la categoria?'))
{
    var category_id = $(this).val();
    $.ajax({
        type: "POST",
        url: "/adiban/controlador/categoria/categoria_code.php",
        data: {
            'delete_category': true,
            'category_id': category_id
        },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if(res.status == 500) {

                alert(res.message);
            }else{
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.message);


                $('#myTableCategory').load(location.href + " #myTableCategory");
            }
        }
    });
}
});
    </script>
    </body>
</html>