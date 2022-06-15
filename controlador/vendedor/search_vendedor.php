<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include "../../includes/x_scripts.php"; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Vendedores | Adiban</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="/adiban/styles/style_vendor.css">
</head>

<body>
<?php include "../../includes/x_header.php"; ?>

<!-- Add Seller Modal -->
<div class="modal fade" id="sellerAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Añadir Vendedor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveSeller">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>

                <div class="mb-3">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre_vendedor" class="form-control border-success" />
                </div>
                <div class="mb-3">
                    <label for="">Apellido</label>
                    <input type="text" name="apellido_vendedor" class="form-control border-success" />
                </div>
                <div class="mb-3">
                    <label for="">Direccion</label>
                    <input type="text" name="direccion_vendedor" class="form-control border-success" />
                </div>
                <div class="mb-3">
                    <label for="">Telefono</label>
                    <input type="text" name="telefono_vendedor" class="form-control border-success" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Crear Vendedor</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Edit Seller Modal -->
<div class="modal fade" id="sellerEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Vendedor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateSeller">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="idvendedor_vendedor" id="idvendedor_vendedor" />

                <div class="mb-3">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre_vendedor" id="nombre_vendedor" class="form-control border-success" />
                </div>
                <div class="mb-3">
                    <label for="">Apellido</label>
                    <input type="text" name="apellido_vendedor" id="apellido_vendedor" class="form-control border-success" />
                </div>
                <div class="mb-3">
                    <label for="">Direccion</label>
                    <input type="text" name="direccion_vendedor" id="direccion_vendedor" class="form-control border-success" />
                </div>
                <div class="mb-3">
                    <label for="">Telefono</label>
                    <input type="text" name="telefono_vendedor" id="telefono_vendedor" class="form-control border-success" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Actualizar vendedor</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- View Seller Modal -->
<div class="modal fade" id="sellerViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ver Vendedor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label for="">Nombre</label>
                    <p id="view_nombre_vendedor" class="form-control border-success"></p>
                </div>
                <div class="mb-3">
                    <label for="">Apellido</label>
                    <p id="view_apellido_vendedor" class="form-control border-success"></p>
                </div>
                <div class="mb-3">
                    <label for="">Direccion</label>
                    <p id="view_direccion_vendedor" class="form-control border-success"></p>
                </div>
                <div class="mb-3">
                    <label for="">Telefono</label>
                    <p id="view_telefono_vendedor" class="form-control border-success"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Title -->

<h1>Lista De Vendedores</h1>

<!-- Create Seller Button -->   

    <button type="button" class="btn-new btn btn-danger" data-bs-toggle="modal" data-bs-target="#sellerAddModal">
        Crear Vendedor
    </button>

<!-- Sellers Table -->

    <div class="p-2">
        <table id="myTableSeller" class="table table-bordered table-striped border-success">
                <thead>
                        <tr>
                            <th class="bg-success">Número de Identificación</th>
                            <th class="bg-success">Nombre</th>
                            <th class="bg-success">Apellido</th>
                            <th class="bg-success">Direccion</th>
                            <th class="bg-success">Telefono</th>
                            <th class="bg-success">Acciones</th>
                        </tr>
                </thead>
                    <tbody>
                        <?php
                        require '../../conexion/conectar.php';

                        $search = $_POST['search'];
                        $query = "SELECT * FROM vendedor WHERE idvendedor_vendedor LIKE '%$search%' OR nombre_vendedor LIKE '%$search%' OR apellido_vendedor LIKE '%$search%' OR direccion_vendedor LIKE '%$search%' OR telefono_vendedor LIKE '%$search%'";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $customer)
                            {
                                ?>
                                <tr>
                                    <td><?= $customer['idvendedor_vendedor']; ?></td>
                                    <td><?= $customer['nombre_vendedor']; ?></td>
                                    <td><?= $customer['apellido_vendedor']; ?></td>
                                    <td><?= $customer['direccion_vendedor']; ?></td>
                                    <td><?= $customer['telefono_vendedor']; ?></td>
                                    <td>
                                    <button type="button" value="<?=$customer['idvendedor_vendedor'];?>" class="viewSellerBtn btn btn-warning">Ver</button>
                                    <button type="button" value="<?=$customer['idvendedor_vendedor'];?>" class="editSellerBtn btn btn-success">Editar</button>
                                    <button type="button" value="<?=$customer['idvendedor_vendedor'];?>" class="deleteSellerBtn btn btn-danger">Eliminar</button>
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
        <a href="../../vistas/vendedor.php" class="btn btn-dark btn-outline-danger me-md-2" type="button">Regresar</a>
    </div>                        

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>   
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script> 

<!-- Ajax -->

<script>
// Add Seller
$(document).on('submit', '#saveSeller', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("save_seller", true);

        $.ajax({
          type: "POST",
          url: "/adiban/controlador/vendedor/vendedor_code.php",
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
              $('#sellerAddModal').modal('hide');
              $('#saveSeller')[0].reset();

              alertify.set('notifier','position', 'top-right');
              alertify.success(res.message);

              $('#myTableSeller').load(location.href + " #myTableSeller");

            }
          }
        });

    });

// Edit Seller
$(document).on('click', '.editSellerBtn', function () {

var seller_id = $(this).val();
//alert(customer_id);
$.ajax({
    type: "GET",
    url: "/adiban/controlador/vendedor/vendedor_code.php?seller_id=" + seller_id,
    success: function (response) {
        
        var res = jQuery.parseJSON(response);
        if(res.status == 422) { 

            alert(res.message);
        }else if(res.status == 200){

            $('#idvendedor_vendedor').val(res.data.idvendedor_vendedor);
            $('#nombre_vendedor').val(res.data.nombre_vendedor);
            $('#apellido_vendedor').val(res.data.apellido_vendedor);
            $('#telefono_vendedor').val(res.data.telefono_vendedor);
            $('#direccion_vendedor').val(res.data.direccion_vendedor);

            $('#sellerEditModal').modal('show');
            
        }
    }
});
});

$(document).on('submit', '#updateSeller', function (e) {
e.preventDefault();

var formData = new FormData(this);
formData.append("update_seller", true);

$.ajax({
type: "POST",
url: "/adiban/controlador/vendedor/vendedor_code.php",
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

  $('#sellerEditModal').modal('hide');
  $('#updateSeller')[0].reset();


  $('#myTableSeller').load(location.href + " #myTableSeller");
}
}
});

});

// View Seller
$(document).on('click', '.viewSellerBtn', function () {

var seller_id = $(this).val();
$.ajax({
ype: "GET",
url: "/adiban/controlador/vendedor/vendedor_code.php?seller_id=" + seller_id,
success: function (response) {

    var res = jQuery.parseJSON(response);
    if(res.status == 404) { 

        alert(res.message);
        }else if(res.status == 200){

            $('#view_nombre_vendedor').text(res.data.nombre_vendedor);
            $('#view_apellido_vendedor').text(res.data.apellido_vendedor);
            $('#view_direccion_vendedor').text(res.data.direccion_vendedor);
            $('#view_telefono_vendedor').text(res.data.telefono_vendedor);

            $('#sellerViewModal').modal('show');

    }
}
});
});

// Delete Customer
$(document).on('click', '.sellerCustomerBtn', function (e) {
e.preventDefault();

if(confirm('¿Estas seguro que deseas eliminar el vendedor?'))
{
    var seller_id = $(this).val();
    $.ajax({
        type: "POST",
        url: "/adiban/controlador/vendedor/vendedor_code.php",
        data: {
            'delete_seller': true,
            'seller_id': seller_id
        },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if(res.status == 500) {

                alert(res.message);
            }else{
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.message);


                $('#myTableSeller').load(location.href + " #myTableSeller");
            }
        }
    });
}
});
    </script>
    </body>
</html>