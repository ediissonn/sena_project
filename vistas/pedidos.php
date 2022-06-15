<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include "../includes/x_scripts.php"; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Pedidos | Adiban</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="../styles/style_orders.css">
</head>

<body>
<?php include "../includes/x_header.php"; ?>

<!-- Add Order Modal -->
<div class="modal fade" id="orderAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Añadir Pedido</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveOrder">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>

                <div class="mb-3">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre_pedidos" class="form-control border-secondary" />
                </div>
                <div class="mb-3">
                    <label for="">Direccion</label>
                    <input type="text" name="direccion_pedidos" class="form-control border-secondary" />
                </div>
                <div class="mb-3">
                    <label for="">Fecha</label>
                    <input type="datetime-local" name="fecha_pedidos" class="form-control border-secondary" />
                </div>
                <div class="mb-3">
                    <label for="">Estado</label>
                    <input type="text" name="estado_pedidos" class="form-control border-secondary" />
                </div>
                <div class="mb-3">
                    <label for="">Cliente</label>
                    <select type="text" name="idcliente_cliente" id="idcliente_cliente" class="form-control border-secondary">
                        <option value="0">Seleccione</option>
                        <?php 
                        require '../conexion/conectar.php';
                        $proveedor="SELECT * FROM cliente";
                        $resultado=mysqli_query($con,$proveedor);
                        while ($valores = mysqli_fetch_array($resultado)) {
                            echo '<option value="'.$valores['idcliente_cliente'].'">'.$valores['idcliente_cliente'].' - '.$valores['nombre_cliente'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Vendedor</label>
                    <select type="text" name="idvendedor_vendedor" id="idvendedor_vendedor" class="form-control border-secondary">
                        <option value="0">Seleccione</option>
                        <?php 
                        require '../conexion/conectar.php';
                        $proveedor="SELECT * FROM vendedor";
                        $resultado=mysqli_query($con,$proveedor);
                        while ($valores = mysqli_fetch_array($resultado)) {
                            echo '<option value="'.$valores['idvendedor_vendedor'].'">'.$valores['idvendedor_vendedor'].' - '.$valores['nombre_vendedor'].'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Crear Pedido</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Edit Order Modal -->
<div class="modal fade" id="orderEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Pedido</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateOrder">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="idpedidos_pedidos" id="idpedidos_pedidos" />

                <div class="mb-3">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre_pedidos" id="nombre_pedidos" class="form-control border-secondary" />
                </div>
                <div class="mb-3">
                    <label for="">Direccion</label>
                    <input type="text" name="direccion_pedidos" id="direccion_pedidos" class="form-control border-secondary" />
                </div>
                <div class="mb-3">
                    <label for="">Fecha</label>
                    <input type="datetime-local" name="fecha_pedidos" id="fecha_pedidos" class="form-control border-secondary" />
                </div>
                <div class="mb-3">
                    <label for="">Estado</label>
                    <input type="text" name="estado_pedidos" id="estado_pedidos" class="form-control border-secondary" />
                </div>
                <div class="mb-3">
                    <label for="">Cliente</label>
                    <select type="text" name="idcliente_cliente" id="idcliente_cliente" class="form-control border-secondary">
                        <option value="0">Seleccione</option>
                        <?php 
                        require '../conexion/conectar.php';
                        $proveedor="SELECT * FROM cliente";
                        $resultado=mysqli_query($con,$proveedor);
                        while ($valores = mysqli_fetch_array($resultado)) {
                            echo '<option value="'.$valores['idcliente_cliente'].'">'.$valores['idcliente_cliente'].' - '.$valores['nombre_cliente'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Vendedor</label>
                    <select type="text" name="idvendedor_vendedor" id="idvendedor_vendedor" class="form-control border-secondary">
                        <option value="0">Seleccione</option>
                        <?php 
                        require '../conexion/conectar.php';
                        $proveedor="SELECT * FROM vendedor";
                        $resultado=mysqli_query($con,$proveedor);
                        while ($valores = mysqli_fetch_array($resultado)) {
                            echo '<option value="'.$valores['idvendedor_vendedor'].'">'.$valores['idvendedor_vendedor'].' - '.$valores['nombre_vendedor'].'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Actualizar Pedido</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- View Order Modal -->
<div class="modal fade" id="orderViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ver Pedido</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="">Nombre</label>
                    <p id="view_nombre_pedidos" class="form-control border-secondary"></p>
                </div>
                <div class="mb-3">
                    <label for="">Direccion</label>
                    <p id="view_direccion_pedidos" class="form-control border-secondary"></p>
                </div>
                <div class="mb-3">
                    <label for="">Fecha</label>
                    <p id="view_fecha_pedidos" class="form-control border-secondary"></p>
                </div>
                <div class="mb-3">
                    <label for="">Estado</label>
                    <p id="view_estado_pedidos" class="form-control border-secondary"></p>
                </div>
                <div class="mb-3">
                    <label for="">Cliente</label>
                    <p id="view_idcliente_cliente" class="form-control border-secondary">
                    </p>
                </div>
                <div class="mb-3">
                    <label for="">Vendedor</label>
                    <p id="view_idvendedor_vendedor" class="form-control border-secondary"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Title -->

<h1>Lista De Pedidos</h1>

<!-- Create Orders Button -->   

    <button type="button" class="btn-new btn btn-secondary" data-bs-toggle="modal" data-bs-target="#orderAddModal">
        Crear Pedido
    </button>

<!-- Search Order Button -->
    
    <form action="../controlador/pedidos/search_pedidos.php" method="POST" class="d-flex form-search">
        <input class="form-control me-2" type="search" name="search" placeholder="Ingresa el dato" aria-label="Search">
        <button class="btn btn-info" type="submit">Buscar</button>
    </form>

<!-- Order Table -->

    <div class="p-2">
        <table id="myTableOrder" class="table table-bordered table-striped border-secondary">
                <thead>
                        <tr>
                            <th scope="col" class="bg-secondary">Número de Identificación</th>
                            <th scope="col" class="bg-secondary">Nombre</th>
                            <th scope="col" class="bg-secondary">Direccion</th>
                            <th scope="col" class="bg-secondary">Fecha</th>
                            <th scope="col" class="bg-secondary">Estado</th>
                            <th scope="col" class="bg-secondary">Cliente</th>
                            <th scope="col" class="bg-secondary">Vendedor</th>
                            <th scope="col" class="bg-secondary">Acciones</th>
                        </tr>
                </thead>
                    <tbody>
                        <?php
                        require '../conexion/conectar.php';

                        $query = "SELECT * FROM pedidos";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $customer)
                            {
                                ?>
                                <tr>
                                    <td scope="row"><?= $customer['idpedidos_pedidos']; ?></td>
                                    <td><?= $customer['nombre_pedidos']; ?></td>
                                    <td><?= $customer['direccion_pedidos']; ?></td>
                                    <td><?= $customer['fecha_pedidos']; ?></td>
                                    <td><?= $customer['estado_pedidos']; ?></td>
                                    <td><?= $customer['idcliente_cliente']; ?></td>
                                    <td><?= $customer['idvendedor_vendedor']; ?></td>
                                    <td>
                                    <button type="button" value="<?=$customer['idpedidos_pedidos'];?>" class="viewOrderBtn btn btn-warning">Ver</button>
                                    <button type="button" value="<?=$customer['idpedidos_pedidos'];?>" class="editOrderBtn btn btn-success">Editar</button>
                                    <button type="button" value="<?=$customer['idpedidos_pedidos'];?>" class="deleteOrderBtn btn btn-secondary">Eliminar</button>
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
        <a href="../includes/x_index.php" class="btn btn-dark btn-outline-secondary me-md-2" type="button">Regresar</a>
    </div>                        

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>   
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script> 


<!-- Ajax -->

<script>
// Add Order
$(document).on('submit', '#saveOrder', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("save_order", true);

        $.ajax({
          type: "POST",
          url: "/adiban/controlador/pedidos/pedidos_code.php",
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
              $('#orderAddModal').modal('hide');
              $('#saveOrder')[0].reset();

              alertify.set('notifier','position', 'top-right');
              alertify.success(res.message);

              $('#myTableOrder').load(location.href + " #myTableOrder");

            }
          }
        });

    });

// Edit Order
$(document).on('click', '.editOrderBtn', function () {

var order_id = $(this).val();
//alert(customer_id);
$.ajax({
    type: "GET",
    url: "/adiban/controlador/pedidos/pedidos_code.php?order_id=" + order_id,
    success: function (response) {
        
        var res = jQuery.parseJSON(response);
        if(res.status == 422) { 

            alert(res.message);
        }else if(res.status == 200){

            $('#idpedidos_pedidos').val(res.data.idpedidos_pedidos);
            $('#nombre_pedidos').val(res.data.nombre_pedidos);
            $('#direccion_pedidos').val(res.data.direccion_pedidos);
            $('#fecha_pedidos').val(res.data.fecha_pedidos);
            $('#estado_pedidos').val(res.data.estado_pedidos);
            $('#idcliente_cliente').val(res.data.idcliente_cliente);
            $('#idvendedor_vendedor').val(res.data.idvendedor_vendedor);

            $('#orderEditModal').modal('show');
            
        }
    }
});
});

$(document).on('submit', '#updateOrder', function (e) {
e.preventDefault();

var formData = new FormData(this);
formData.append("update_order", true);

$.ajax({
type: "POST",
url: "/adiban/controlador/pedidos/pedidos_code.php",
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

  $('#orderEditModal').modal('hide');
  $('#updateOrder')[0].reset();


  $('#myTableOrder').load(location.href + " #myTableOrder");
}
}
});

});

// View Order
$(document).on('click', '.viewOrderBtn', function () {

var order_id = $(this).val();
$.ajax({
ype: "GET",
url: "/adiban/controlador/pedidos/pedidos_code.php?order_id=" + order_id,
success: function (response) {

    var res = jQuery.parseJSON(response);
    if(res.status == 404) { 

        alert(res.message);
        }else if(res.status == 200){

            $('#view_nombre_pedidos').text(res.data.nombre_pedidos);
            $('#view_direccion_pedidos').text(res.data.direccion_pedidos);
            $('#view_fecha_pedidos').text(res.data.fecha_pedidos);
            $('#view_estado_pedidos').text(res.data.estado_pedidos);
            $('#view_idcliente_cliente').text(res.data.idcliente_cliente);
            $('#view_idvendedor_vendedor').text(res.data.idvendedor_vendedor);

            $('#orderViewModal').modal('show');

    }
}
});
});

// Delete Order
$(document).on('click', '.deleteOrderBtn', function (e) {
e.preventDefault();

if(confirm('¿Estas seguro que deseas eliminar el pedido?'))
{
    var order_id = $(this).val();
    $.ajax({
        type: "POST",
        url: "/adiban/controlador/pedidos/pedidos_code.php",
        data: {
            'delete_order': true,
            'order_id': order_id
        },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if(res.status == 500) {

                alert(res.message);
            }else{
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.message);


                $('#myTableOrder').load(location.href + " #myTableOrder");
            }
        }
    });
}
});
    </script>
    </body>
</html>