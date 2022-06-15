<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include "../../includes/x_scripts.php"; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Proveedores | Adiban</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="/adiban/styles/style_supplier.css">
</head>

<body>
<?php include "../../includes/x_header.php"; ?>

<!-- Add Supplier Modal -->
<div class="modal fade" id="supplierAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Añadir Proveedor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveSupplier">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>

                <div class="mb-3">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre_proveedor" class="form-control border-info" />
                </div>
                <div class="mb-3">
                    <label for="">Apellido</label>
                    <input type="text" name="apellido_proveedor" class="form-control border-info" />
                </div>
                <div class="mb-3">
                    <label for="">Telefono</label>
                    <input type="text" name="telefono_proveedor" class="form-control border-info" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Crear Proveedor</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Edit Supplier Modal -->
<div class="modal fade" id="supplierEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Proveedor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateSupplier">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="idproveedor_proveedor" id="idproveedor_proveedor" />

                <div class="mb-3">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre_proveedor" id="nombre_proveedor" class="form-control border-info" />
                </div>
                <div class="mb-3">
                    <label for="">Apellido</label>
                    <input type="text" name="apellido_proveedor" id="apellido_proveedor" class="form-control border-info" />
                </div>
                <div class="mb-3">
                    <label for="">Telefono</label>
                    <input type="text" name="telefono_proveedor" id="telefono_proveedor" class="form-control border-info" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Actualizar Proveedor</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- View Supplier Modal -->
<div class="modal fade" id="supplierViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ver Proveedor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label for="">Nombre</label>
                    <p id="view_nombre_proveedor" class="form-control border-info"></p>
                </div>
                <div class="mb-3">
                    <label for="">Apellido</label>
                    <p id="view_apellido_proveedor" class="form-control border-info"></p>
                </div>
                <div class="mb-3">
                    <label for="">Telefono</label>
                    <p id="view_telefono_proveedor" class="form-control border-info"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Title -->

<h1>Lista De Proveedores</h1>

<!-- Create Supplier Button -->   

    <button type="button" class="btn-new btn btn-info" data-bs-toggle="modal" data-bs-target="#supplierAddModal">
        Crear Proveedor
    </button>

<!-- Supplier Table -->

    <div class="p-2">
        <table id="myTableSupplier" class="table table-bordered table-striped border-info">
                <thead>
                        <tr>
                            <th class="bg-info">Número de Identificación</th>
                            <th class="bg-info">Nombre</th>
                            <th class="bg-info">Apellido</th>
                            <th class="bg-info">Telefono</th>
                            <th class="bg-info">Acciones</th>
                        </tr>
                </thead>
                    <tbody>
                        <?php
                        require '../../conexion/conectar.php';

                        $search = $_POST['search'];
                        $query = "SELECT * FROM proveedor WHERE idproveedor_proveedor LIKE '%$search%' OR nombre_proveedor LIKE '%$search%' OR apellido_proveedor LIKE '%$search%' OR telefono_proveedor LIKE '%$search%'";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $customer)
                            {
                                ?>
                                <tr>
                                    <td><?= $customer['idproveedor_proveedor']; ?></td>
                                    <td><?= $customer['nombre_proveedor']; ?></td>
                                    <td><?= $customer['apellido_proveedor']; ?></td>
                                    <td><?= $customer['telefono_proveedor']; ?></td>
                                    <td>
                                    <button type="button" value="<?=$customer['idproveedor_proveedor'];?>" class="viewSupplierBtn btn btn-warning">Ver</button>
                                    <button type="button" value="<?=$customer['idproveedor_proveedor'];?>" class="editSupplierBtn btn btn-success">Editar</button>
                                    <button type="button" value="<?=$customer['idproveedor_proveedor'];?>" class="deleteSupplierBtn btn btn-danger">Eliminar</button>
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
        <a href="../../vistas/proveedor.php" class="btn btn-dark btn-outline-info me-md-2" type="button">Regresar</a>
    </div>                        

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>   
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script> 

<!-- Ajax -->

<script>
// Add Supplier
$(document).on('submit', '#saveSupplier', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("save_supplier", true);

        $.ajax({
          type: "POST",
          url: "/adiban/controlador/proveedor/proveedor_code.php",
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
              $('#supplierAddModal').modal('hide');
              $('#saveSupplier')[0].reset();

              alertify.set('notifier','position', 'top-right');
              alertify.success(res.message);

              $('#myTableSupplier').load(location.href + " #myTableSupplier");

            }
          }
        });

    });

// Edit Supplier
$(document).on('click', '.editSupplierBtn', function () {

var supplier_id = $(this).val();
//alert(customer_id);
$.ajax({
    type: "GET",
    url: "/adiban/controlador/proveedor/proveedor_code.php?supplier_id=" + supplier_id,
    success: function (response) {
        
        var res = jQuery.parseJSON(response);
        if(res.status == 422) { 

            alert(res.message);
        }else if(res.status == 200){

            $('#idproveedor_proveedor').val(res.data.idproveedor_proveedor);
            $('#nombre_proveedor').val(res.data.nombre_proveedor);
            $('#apellido_proveedor').val(res.data.apellido_proveedor);
            $('#telefono_proveedor').val(res.data.telefono_proveedor);

            $('#supplierEditModal').modal('show');
            
        }
    }
});
});

$(document).on('submit', '#updateSupplier', function (e) {
e.preventDefault();

var formData = new FormData(this);
formData.append("update_supplier", true);

$.ajax({
type: "POST",
url: "/adiban/controlador/proveedor/proveedor_code.php",
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

  $('#supplierEditModal').modal('hide');
  $('#updateSupplier')[0].reset();


  $('#myTableSupplier').load(location.href + " #myTableSupplier");
}
}
});

});

// View Supplier
$(document).on('click', '.viewSupplierBtn', function () {

var seller_id = $(this).val();
$.ajax({
ype: "GET",
url: "/adiban/controlador/proveedor/proveedor_code.php?supplier_id=" + supplier_id,
success: function (response) {

    var res = jQuery.parseJSON(response);
    if(res.status == 404) { 

        alert(res.message);
        }else if(res.status == 200){

            $('#view_nombre_proveedor').text(res.data.nombre_proveedor);
            $('#view_apellido_proveedor').text(res.data.apellido_proveedor);
            $('#view_telefono_proveedor').text(res.data.telefono_proveedor);

            $('#supplierViewModal').modal('show');

    }
}
});
});

// Delete Customer
$(document).on('click', '.deleteSupplierBtn', function (e) {
e.preventDefault();

if(confirm('¿Estas seguro que deseas eliminar el proveedor?'))
{
    var supplier_id = $(this).val();
    $.ajax({
        type: "POST",
        url: "/adiban/controlador/proveedor/proveedor_code.php",
        data: {
            'delete_supplier': true,
            'supplier_id': supplier_id
        },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if(res.status == 500) {

                alert(res.message);
            }else{
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.message);


                $('#myTableSupplier').load(location.href + " #myTableSupplier");
            }
        }
    });
}
});
    </script>
    </body>
</html>