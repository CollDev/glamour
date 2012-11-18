<?php
require_once 'connection.php';
if (isset($_GET)) {
    if (isset($_GET['products'])) {
        $query = "SELECT `id`,
                    `nombre`
                  FROM `productos`
                  ORDER BY `orden` ASC;";
        $result = mysql_query($query);
        $response = array();
        while ($array = mysql_fetch_assoc($result)) {
            $response[] = $array;
        }
        echo json_encode($response);
    } elseif (isset($_GET['product_id'])) {
        $query = "SELECT `id`,
                    `descripcion`,
                    `precio`,
                    `oferta`
                  FROM `productos`
                  WHERE `id` = " . $_GET['product_id'] . ";";
        $result = mysql_query($query);
        $response = mysql_fetch_assoc($result);
        $response["descripcion"] = htmlentities($response["descripcion"]);
        $response["oferta"] = htmlentities($response["oferta"]);
        echo json_encode($response);
    } else {
        
    }
} elseif (isset($_POST)) {
    if (isset($_POST[''])) {
        
    }
} else {
    echo 'You are not allowed to this section';
}