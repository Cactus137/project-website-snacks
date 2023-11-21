<?php
function getAllOrders()
{
    try {
        $sql = "SELECT * FROM orders;";
        return pdo_query($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
