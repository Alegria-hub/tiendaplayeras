<?php
    require_once "../config/conect.php";

    $id = $_POST['id'];
    $nom = $_POST['nombre'];
    $cat = $_POST['categoria'];
    $pre = $_POST['precio'];
    $cant = $_POST['cantidad'];

    $total = $pre * $cant;
    //echo "$id  $nom  $cat  $pre";
    $sql2 = "INSERT INTO carrito VALUES(null, $id, '$nom', '$cat', $total)";
    $query2 = mysqli_query($conn,$sql2) or die(mysqli_error($conn));
    if ($query2) {
        echo ("<script LANGUAGE='JavaScript'>
                window.alert('Revise su carrito para terminar con su compra');
                window.location.href='../index.php';
                </script>");
    }else{
        echo ("<script LANGUAGE='JavaScript'>
                window.alert('ocurrio un error');
                window.location.href='../index.php';
                </script>");
    }
?>