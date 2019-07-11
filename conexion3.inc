<?php
$link = mysqli_connect("localhost", "id10169139_entornosgraficos1", "entornos2019") or die ("Problemas en la conexion en la base de datos");
mysqli_select_db($link, "id10169139_supermercado");
mysqli_set_charset($link, 'utf8');
?>