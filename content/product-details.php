<?php
require_once 'connection.php';
$product_id = $_GET['product_id'];
$query = "SELECT `id`,
            `nombre`,
            `descripcion`,
            `precio`,
            `oferta`,
            `orden`,
            `creado`,
            `actualizado`,
            `estado`
          FROM `productos`
          WHERE `id` = " . $product_id . ";";
$result = mysql_query($query);
$array = mysql_fetch_assoc($result);
$array["descripcion"] = htmlentities($array["descripcion"]);
echo json_encode($array);