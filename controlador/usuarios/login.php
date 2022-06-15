<?php
    $alert = '';
    session_start();
    if(!empty($_SESSION['active']))
    {
        header('location: ../../includes/x_index.php');
    }else{
        if(!empty($_POST))
        {
            if(empty($_POST['usuario_usuario']) || empty($_POST['clave_usuario']))
            {
                $alert = 'Ingrese su usuario y su clave';
            }else{
                require '../../conexion/conectar.php';
                $user = mysqli_real_escape_string($con,$_POST['usuario_usuario']);
                $pass = md5(mysqli_real_escape_string($con,$_POST['clave_usuario']));

                $query = mysqli_query($con,"SELECT * FROM usuario WHERE usuario_usuario = '$user' AND clave_usuario = '$pass' ");
                $result = mysqli_num_rows($query);

                if($result > 0)
                {
                    $data = mysqli_fetch_row($query);
                    $_SESSION['active'] = true;
                    $_SESSION['idUser'] = $data['idusuario_usuario'];
                    $_SESSION['user']   = $data['usuario_usuario'];
                    $_SESSION['email']  = $data['correo_usuario'];

                    header('location: ../../includes/x_index.php');
                }else{
                    $alert = 'El usuario o la clave son incorrectas';
                    session_destroy();
                }
            }   
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | Adiban</title>
    <link rel="stylesheet" href="/adiban/styles/x_user.css">
</head>
<body>
    <!-- Form -->
    <section id="container">
        <form action="" method="POST">
            <h3>Iniciar Sesión</h3>
            <img src="../../img/login.png" alt="Login">
            <label for="usuario_usuario">Usuario</label>
            <input type="text" name="usuario_usuario" placeholder="Ingresa el Usuario">
            <label for="clave_usuario">Clave</label>
            <input type="password" name="clave_usuario" placeholder="Ingresa la Contraseña">
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <input type="submit" value="Ingresar">
        </form>
    </section>
</body>
</html>