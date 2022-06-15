<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include "../includes/x_scripts.php"; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Clientes | Adiban</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="../styles/style_customer.css">
</head>

<body>
<?php include "../includes/x_header.php"; ?>

<!-- Add Customer Modal -->
<div class="modal fade" id="customerAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Añadir Cliente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveCustomer">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>

                <div class="mb-3">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre_cliente" class="form-control border-danger" />
                </div>
                <div class="mb-3">
                    <label for="">Apellido</label>
                    <input type="text" name="apellido_cliente" class="form-control border-danger" />
                </div>
                <div class="mb-3">
                    <label for="">Telefono</label>
                    <input type="text" name="telefono_cliente" class="form-control border-danger" />
                </div>
                <div class="mb-3">
                    <label for="">Direccion</label>
                    <input type="text" name="direccion_cliente" class="form-control border-danger" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Crear Cliente</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Edit Customer Modal -->
<div class="modal fade" id="customerEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateCustomer">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="idcliente_cliente" id="idcliente_cliente" />

                <div class="mb-3">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control border-danger" />
                </div>
                <div class="mb-3">
                    <label for="">Apellido</label>
                    <input type="text" name="apellido_cliente" id="apellido_cliente" class="form-control border-danger" />
                </div>
                <div class="mb-3">
                    <label for="">Telefono</label>
                    <input type="text" name="telefono_cliente" id="telefono_cliente" class="form-control border-danger" />
                </div>
                <div class="mb-3">
                    <label for="">Direccion</label>
                    <input type="text" name="direccion_cliente" id="direccion_cliente" class="form-control border-danger" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- View Customer Modal -->
<div class="modal fade" id="customerViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ver Cliente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label for="">Nombre</label>
                    <p id="view_nombre_cliente" class="form-control border-danger"></p>
                </div>
                <div class="mb-3">
                    <label for="">Apellido</label>
                    <p id="view_apellido_cliente" class="form-control border-danger"></p>
                </div>
                <div class="mb-3">
                    <label for="">Telefono</label>
                    <p id="view_telefono_cliente" class="form-control border-danger"></p>
                </div>
                <div class="mb-3">
                    <label for="">Direccion</label>
                    <p id="view_direccion_cliente" class="form-control border-danger"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Title -->

<h1>Lista De Clientes</h1>

<!-- Create Customers Button -->   

    <button type="button" class="btn-new btn btn-danger" data-bs-toggle="modal" data-bs-target="#customerAddModal">
        Crear Cliente
    </button>

<!-- Search Customer Button -->
    
    <form action="../controlador/cliente/search_cliente.php" method="POST" class="d-flex form-search">
        <input class="form-control me-2" type="search" name="search" placeholder="Ingresa el dato" aria-label="Search">
        <button class="btn btn-info" type="submit">Buscar</button>
    </form>

<!-- Customer Table -->

    <div class="p-2">
        <table id="myTableCustomer" class="table table-bordered table-striped border-danger">
                <thead>
                        <tr>
                            <th scope="col" class="bg-danger">Número de Identificación</th>
                            <th scope="col" class="bg-danger">Nombre</th>
                            <th scope="col" class="bg-danger">Apellido</th>
                            <th scope="col" class="bg-danger">Telefono</th>
                            <th scope="col" class="bg-danger">Direccion</th>
                            <th scope="col" class="bg-danger">Acciones</th>
                        </tr>
                </thead>
                    <tbody>
                        <?php
                        require '../conexion/conectar.php';

                        $query = "SELECT * FROM cliente";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $customer)
                            {
                                ?>
                                <tr>
                                    <td scope="row"><?= $customer['idcliente_cliente']; ?></td>
                                    <td><?= $customer['nombre_cliente']; ?></td>
                                    <td><?= $customer['apellido_cliente']; ?></td>
                                    <td><?= $customer['telefono_cliente']; ?></td>
                                    <td><?= $customer['direccion_cliente']; ?></td>
                                    <td>
                                    <button type="button" value="<?=$customer['idcliente_cliente'];?>" class="viewCustomerBtn btn btn-warning">Ver</button>
                                    <button type="button" value="<?=$customer['idcliente_cliente'];?>" class="editCustomerBtn btn btn-success">Editar</button>
                                    <button type="button" value="<?=$customer['idcliente_cliente'];?>" class="deleteCustomerBtn btn btn-danger">Eliminar</button>
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
        <a href="../includes/x_index.php" class="btn btn-dark btn-outline-danger me-md-2" type="button">Regresar</a>
    </div>                        

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>   
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script> 

<!-- Ajax -->

<script>
// Add Customer
$(document).on('submit', '#saveCustomer', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("save_customer", true);

        $.ajax({
          type: "POST",
          url: "/adiban/controlador/cliente/cliente_code.php",
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
              $('#customerAddModal').modal('hide');
              $('#saveCustomer')[0].reset();

              alertify.set('notifier','position', 'top-right');
              alertify.success(res.message);

              $('#myTableCustomer').load(location.href + " #myTableCustomer");

            }
          }
        });

    });

// Edit Customer 
$(document).on('click', '.editCustomerBtn', function () {

var customer_id = $(this).val();
//alert(customer_id);
$.ajax({
    type: "GET",
    url: "/adiban/controlador/cliente/cliente_code.php?customer_id=" + customer_id,
    success: function (response) {
        
        var res = jQuery.parseJSON(response);
        if(res.status == 422) { 

            alert(res.message);
        }else if(res.status == 200){

            $('#idcliente_cliente').val(res.data.idcliente_cliente);
            $('#nombre_cliente').val(res.data.nombre_cliente);
            $('#apellido_cliente').val(res.data.apellido_cliente);
            $('#telefono_cliente').val(res.data.telefono_cliente);
            $('#direccion_cliente').val(res.data.direccion_cliente);

            $('#customerEditModal').modal('show');
            
        }
    }
});
});

$(document).on('submit', '#updateCustomer', function (e) {
e.preventDefault();

var formData = new FormData(this);
formData.append("update_customer", true);

$.ajax({
type: "POST",
url: "/adiban/controlador/cliente/cliente_code.php",
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

  $('#customerEditModal').modal('hide');
  $('#updateCustomer')[0].reset();


  $('#myTableCustomer').load(location.href + " #myTableCustomer");
}
}
});

});

// View Customer
$(document).on('click', '.viewCustomerBtn', function () {

var customer_id = $(this).val();
$.ajax({
ype: "GET",
url: "/adiban/controlador/cliente/cliente_code.php?customer_id=" + customer_id,
success: function (response) {

    var res = jQuery.parseJSON(response);
    if(res.status == 404) { 

        alert(res.message);
        }else if(res.status == 200){

            $('#view_nombre_cliente').text(res.data.nombre_cliente);
            $('#view_apellido_cliente').text(res.data.apellido_cliente);
            $('#view_telefono_cliente').text(res.data.telefono_cliente);
            $('#view_direccion_cliente').text(res.data.direccion_cliente);

            $('#customerViewModal').modal('show');

    }
}
});
});

// Delete Customer
$(document).on('click', '.deleteCustomerBtn', function (e) {
e.preventDefault();

if(confirm('¿Estas seguro que deseas eliminar el cliente?'))
{
    var customer_id = $(this).val();
    $.ajax({
        type: "POST",
        url: "/adiban/controlador/cliente/cliente_code.php",
        data: {
            'delete_customer': true,
            'customer_id': customer_id
        },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if(res.status == 500) {

                alert(res.message);
            }else{
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.message);


                $('#myTableCustomer').load(location.href + " #myTableCustomer");
            }
        }
    });
}
});
    </script>
    </body>
</html>