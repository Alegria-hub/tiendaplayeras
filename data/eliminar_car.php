<?php
require_once "../config/conect.php";

$id = $_GET['id'];
$sql = "DELETE FROM carrito WHERE id_carrito = $id";
$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
if ($query) {
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('El producto de quito de su carrito');
    window.location.href='../view/carrito.php';
    </script>");
}else{
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('ocurrio un error');
    window.location.href='../view/carrito.php';
    </script>");
}

?>