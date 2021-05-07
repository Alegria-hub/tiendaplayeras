<?php
    require_once "../config/conect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/styles2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">}

    <title>Carrito de compras</title>
</head>
<body>
<header class="l-header" id="header">

<nav class="nav bd-container">

    <a href="index.html" class="nav__logo"><img src="../img/obperroo.png" alt=""></a>

    <!-- MENU nav-menu -->
    <div class="nav__menu " id="nav-menu">
        <ul class="nav__list">
            <!-- AQUI ESTA NAV__LINK -->
            <li class="nav__item"><a href="../index.php" class="nav__link">Inicio</a></li>
            <!-- <li class="nav__item"><a href="#about" class="nav__link">Nosotros</a></li> -->
            <li class="nav__item"><a href="tienda.html" class="nav__link active-link">Tienda</a></li>
            <!-- <li class="nav__item"><a href="#contact" class="nav__link">Contactanos</a></li> -->

            <button id = "checkout" class="button-checkout" onclick="pay()" >Pagar</button>

            <i class='bx bx-moon change-theme' id="theme-button"></i>
        </ul>
    </div>

    <!-- ICONO HAMBURGUESA nav-toggle-->
    <div class="nav__toggle" id="nav-toggle">
        <i class='bx bx-menu'></i>
    </div>

</nav>
</header>

<div class="text-center mt-5">
    <h2>Carrito</h2>
</div>
    <!-- Cariito de compras-->
<div class="container mt-5">
    <?php
        $sql = "SELECT * FROM carrito";
        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn))
    ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Categoria</th>
                <th scope="col">Precio</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($row = mysqli_fetch_array($query, MYSQLI_BOTH)) {
        ?>
            <tr>
                <th><?php echo $row['nombre_producto_tmp']; ?></th>
                <th><?php echo $row['categria_tmp']; ?></th>
                <th><?php echo $row['precio_tmp']; ?></th>
                <th>
                    <a href="../data/eliminar_car.php?id=<?php echo $row['id_carrito']; ?>">Quitar</a>
                </th>
            </tr>
        <?php 
        }
        $sql3 = "SELECT SUM(precio_tmp) as mtotal FROM carrito";
        $suma_productos = mysqli_query($conn,$sql3) or die(mysqli_error($conn));
        $row = mysqli_fetch_array($suma_productos, MYSQLI_ASSOC);
        ?>
            <tr>
                <th colspan="2">Total</th>
                <th><?php echo $row['mtotal']; ?></th>
            </tr>
        </tbody>
    </table>
    <div class="row">
        <div class="col-lg-12">
            <a href="indexPago.php?total=<?php echo $row['mtotal']; ?>" class="btn btn-primary btnTam">Pagar</a>
        </div>
    </div>
</div>
</body>
<script src="../js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
    <!--  SCROLL -->
    <!-- <script src="https://unpkg.com/scrollreveal"></script> -->
    <!-- JS -->
    <script src="../js/slider.js"></script>
</html>