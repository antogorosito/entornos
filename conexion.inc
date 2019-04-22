<?php
$link = mysqli_connect("localhost", "root", "") or die ("Problemas en la conexion en la base de datos");
mysqli_select_db($link, "supermercado");
mysqli_set_charset($link, 'utf8');
?>
