<?php 
function getLatestProductsId(){
    try {
        $sql = "SELECT id FROM products
        ORDER BY id DESC LIMIT 1;";
        return pdo_query_one($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>