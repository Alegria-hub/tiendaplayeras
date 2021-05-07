<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  Iconos -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles2.css">
    <title>Playeras Obligame perro</title>
</head>

<body>
    <!-- Scroll arriba -->
    <a href="" class="scrolltop " id="scroll-top">
        <i class='bx bx-chevron-up scroll-header scrolltop__icon'></i>
    </a>


    <!--  HEADER -->

    <header class="l-header" id="header">

        <nav class="nav bd-container">

            <a href="#home" class="nav__logo"><img src="img/obperroo.png" alt=""></a>

            <!-- MENU nav-menu -->
            <div class="nav__menu " id="nav-menu">
                <ul class="nav__list">
                    <!-- AQUI ESTA NAV__LINK -->
                    <li class="nav__item"><a href="#home" class="nav__link active-link">Inicio</a></li>
                    <li class="nav__item"><a href="#about" class="nav__link">Nosotros</a></li>
                    <li class="nav__item"><a href="#contact" class="nav__link">Contactanos</a></li>
                    <li class="nav__item"><a href="view/tienda.html" class="nav__link">Tienda</a></li>
                    <!--<li class="nav__item"><a href="#" class="nav__link">Clientes Premiuns</a></li>-->
                    <li class="nav__item"><a href="view/carrito.php" class="nav__link">Carrito</a></li>

                    <!-- <button id="checkout" class="button-checkout" onclick="pay()">Pagar</button> -->

                    <i class='bx bx-moon change-theme' id="theme-button"></i>
                </ul>
            </div>
            <!--  -->

            <!-- ICONO HAMBURGUESA nav-toggle-->
            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>

        </nav>

    </header>

    <!-- =================SLIDER================= -->
    <div class="contenedor ">

        <div class="carousel">

            <div class="carousel__contenedor">

                <div class="carousel__lista">

                    <div class="carousel__elemento">
                        <img src="img/1.jpg" alt="">
                    </div>

                    <div class="carousel__elemento">
                        <img src="img/3.jpg" alt="">
                    </div>

                    <div class="carousel__elemento">
                        <img src="img/4.jpg" alt="">
                    </div>

                </div>

                <div class="direcciones">
                    <button aria-label="Anterior" class="carousel__anterior">
                        <i class='bx bxs-chevron-left'></i>
                    </button>

                    <button aria-label="Siguiente" class="carousel__siguiente">
                        <i class='bx bxs-chevron-right'></i>
                    </button>
                </div>
            </div>

            <div role="tablist" class="carousel__indicadores"></div>

        </div>

    </div>

    <!-- =================INICIO================= -->

    <!-- <main class="l-main">
        <section class="home" id="home">
            <div class="home__container bd-container bd-grid">
                <div class="home__data">
                    <h1 class="home__title">
                        Playeras Obligame Perro
                    </h1>
                    <h2 class="home__subtitle">
                        Las mejores playeras <br>
                        que existen
                    </h2>
                    <a href="#" class="button">Ver Tienda</a>
                </div>

                <img src="../img/fondo-playeras.jpg" alt="" class="home__img">
            </div>
        </section>
    </main> -->

    <!-- =================NOSOTROS================= -->

    <section class="about section bd-container" id="about">
        <div class="about__container bd-grid">
            <div class="about__data">
                <span class="section-subtitle about__initial">Nosotros</span>
                <h2 class="section-title">Tenemos<br> lo que te gusta</h2>
                <P class="about_description">Somos unos emprendedores, con estudios e indumentaria. Creamos una marca
                    una que represente a los jovenes.</P>
                <a href="#" class="button">Exploranos</a>
            </div>
            <img src="img/p1.jpg" alt="" class="about__img">
        </div>
    </section>

    <!-- =================TIENDA================= -->
    <?php require_once "config/conect.php";
        $sql = "SELECT * FROM productos";
        $query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    ?>
    <section class="tienda section bd-container" id="tienda">
        <span class="section-subtitle">Conoce</span>
        <h2 class="section-title">Nuestros Productos</h2>

        <div class="tienda__container bd-grid">
            <?php 
                while ($row = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                    # code...
            ?>
            <div class="tienda__content">
                <?php echo '<img class="tienda__img" height="80" width="80" src="data:image/jpeg;base64,'.base64_encode($row["imagen"]).'"/>'; ?>
                <h3 class="tienda__nombre"><?php echo $row['nombre']; ?></h3>
                <span class="tienda__detail"><?php echo utf8_decode($row['material']); ?></span>
                <span class="tienda__detail"><?php echo $row['stock']; ?></span>
                <span class="tienda__detail"><?php echo $row['categoria']; ?></span>
                <span class="tienda_precio">$<?php echo $row['precio']; ?>MXN</span>
                <form method="POST" action="data/insertar_car.php">
                <input class="num_pro" name="cantidad" value="1" type="number">
                    <input name="id" type="text" value="<?php echo $row['id_producto']; ?>" hidden>
                    <input name="nombre" type="text" value="<?php echo $row['nombre']; ?>" hidden>
                    <input name="categoria" type="text" value="<?php echo $row['categoria']; ?>" hidden>
                    <input name="precio" type="text" value="<?php echo $row['precio']; ?>" hidden>
                <!-- <a href="" class="button menu__button" >
                    <i class='bx bx-cart-alt' ></i>
                </a> -->
                <button class="button menu__button" name="car" onclick="add('p2',2)">
                    <i class='bx bx-cart-alt'></i>
                </button>
                </form>
            </div>
            <?php }
            ?>
        </div>
    </section>

    <!-- =================CONTACTANOS================= -->
    <section class="contact section bd-container" id="contact">
        <div class="contact__container bd-grid">
            <div class="contact__data">
                <span class="section-subtitle contact__initial">Hablemos</span>
                <h2 class="section-title contact__initial">Contactanos</h2>
                <p class="contact__description">Obligame perro crea diseños exclusivos, se toman pedido, cualquier duda,
                    sugerencia o reclamo comuníquese con nosotros estamos para servirle Gracias</p>
            </div>
            <div class="contact__button">
                <a href="" class="button">Contactanos ahora</a>
            </div>
        </div>
    </section>


    <!-- =================FOOTER================= -->

    <footer class="footer section bd-container">
        <div class="footer__container bd-grid">
            <div class="footer__content">
                <a href="#" class="footer__logo">Obigame perro</a>
                <span class="footer__description">Negocio</span>

                <div>
                    <a href="#" class="footer__social"><i class='bx bxl-facebook'></i></a>
                    <a href="#" class="footer__social"><i class='bx bxl-instagram'></i></a>
                    <a href="#" class="footer__social"><i class='bx bxl-twitter'></i></a>
                </div>
            </div>
            <div class="footer__content">
                <h3 class="footer__title">Servicios</h3>
                <ul>
                    <li><a href="#" class="footer__link">Delivery</a></li>
                    <li><a href="#" class="footer__link">Economico</a></li>
                    <li><a href="#" class="footer__link">Seguro</a></li>
                    <li><a href="#" class="footer__link">Compra ya</a></li>
                </ul>
            </div>
            <div class="footer__content">
                <h3 class="footer__title">Informacion</h3>
                <ul>
                    <li><a href="#" class="footer__link">Contactanos</a></li>
                    <li><a href="#" class="footer__link">política de privacidad</a></li>
                    <li><a href="#" class="footer__link">Terminos y condiciones</a></li>
                </ul>
            </div>
            <div class="footer__content">
                <h3 class="footer__title">Direccion</h3>
                <ul>
                    <li>Mexico - Queretaro</li>
                    <li>999-888-777</li>
                    <li>playerasobligameperro@gmail.com</li>
                </ul>
            </div>
        </div>

        <p class="footer__copy">&#169; 2021 ObligamePerro. Todos los derechos reservados.</p>
    </footer>


    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
    <!--  SCROLL -->
    <!-- <script src="https://unpkg.com/scrollreveal"></script> -->
    <!-- JS -->
    <script src="js/slider.js"></script>
</body>

</html>