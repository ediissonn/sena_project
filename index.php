<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiban</title>
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="styles/web.css">

    <style>
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-thumb {
        background: #241F1F;
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #362C2C;
    }
    </style>

</head>
<body>
    <header>
        <nav>
            <a href="#">Inicio</a>
            <a href="#">Acerca de</a>
            <a href="#">Galeria</a>
            <a href="#">Contacto</a>
            <a href="controlador/usuarios/login.php">Iniciar Sesión</a>
        </nav>
        <section class="textos-header">
            <h1>Compra las mejores prendas para tu viaje</h1>
            <h2>Ofertas hasta el 50% de descuento</h2>
        </section>
        <div class="wave" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C150.00,150.00 352.00,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
    </header>
    <main>
        <section class="contenedor sobre-nosotros">
            <h2 class="titulo">Nuestro producto</h2>
            <div class="contenedor-sobre-nosotros">
                <img src="img/ilustracion2.svg" alt="" class="imagen-about-us">
                <div class="contenido-textos">
                    <h3><span>1</span>Los mejores productos</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus provident explicabo nemo corrupti repudiandae aliquid recusandae, asperiores totam id eveniet eos optio inventore enim velit voluptas nobis aut voluptate magnam!</p>
                    <h3><span>2</span>Los mejores productos</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus provident explicabo nemo corrupti repudiandae aliquid recusandae, asperiores totam id eveniet eos optio inventore enim velit voluptas nobis aut voluptate magnam!</p>
                </div>
            </div>
        </section>
        <section class="portafolio">
            <div class="contenedor">
                <h2 class="titulo">Imagen</h2>
                <div class="galeria-port">
                    <div class="imagen-port">
                        <img src="img/i1.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="/img/icono1.png" alt="">
                            <p>Nuestro Trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/i2.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Nuestro Trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/i3.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Nuestro Trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/i4.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Nuestro Trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/i5.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Nuestro Trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/i6.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Nuestro Trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/i7.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Nuestro Trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/i8.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Nuestro Trabajo</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="clientes contenedor">
            <h2 class="titulo">Que dicen nuestros clientes</h2>
            <div class="cards">
                <div class="card">
                    <img src="img/face1.jpg" alt="">
                    <div class="contenido-texto-card">
                        <h4>Nombre</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, rem!</p>
                    </div>
                </div>
                <div class="card">
                    <img src="img/face1.jpg" alt="">
                    <div class="contenido-texto-card">
                        <h4>Nombre</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, rem!</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-services">
            <div class="contenedor">
                <h2 class="titulo">Nuestros servicios</h2>
                <div class="servicio-cont">
                    <div class="servicio-ind">
                        <img src="img/ilustracion1.svg" alt="">
                        <h3>Name</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, neque.</p>
                    </div>
                    <div class="servicio-ind">
                        <img src="img/ilustracion4.svg" alt="">
                        <h3>Name</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, neque.</p>
                    </div>
                    <div class="servicio-ind">
                        <img src="img/ilustracion3.svg" alt="">
                        <h3>Name</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, neque.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="contenedor-footer">
            <div class="content-foo">
                <h4>Telefono</h4>
                <p>314.384.7383</p>
            </div>
            <div class="content-foo">
                <h4>Email</h4>
                <p>edibremonsan@gmail.com</p>
            </div>
            <div class="content-foo">
                <h4>Localización</h4>
                <p>Cra. 12 #1035, Bogotá</p>
            </div>
        </div>
        <h2 class="titulo-final">&copy; EdissonMon Design</h2>
    </footer>

</body>
</html>