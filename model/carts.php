<?php
function load_card($id_account)
{
    try {
        $sql = "SELECT 
        c.id AS id_order,
        p.name AS name_product,
        p.image AS image_product,
        s.name AS name_size,
        pv.price AS price,
        c.quantity AS quantity
    FROM cart c
    JOIN product_variants pv ON pv.id = c.id_product_variants
    JOIN products p ON p.id = pv.id_product
    JOIN sizes s ON s.id = pv.id_size
    WHERE id_account = $id_account;
        ";
        return pdo_query($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
function addToCard($id_account, $id_product_variants, $quantity)
{
    try {
        $checkQuantityProductCart = checkQuantityProductCart($id_account, $id_product_variants);

        if ($checkQuantityProductCart) {
            $quantity = $checkQuantityProductCart['quantity'] + $quantity;
            $sql = "UPDATE cart SET quantity = '$quantity' WHERE id_account = '$id_account' and id_product_variants = '$id_product_variants'";
        } else {
            $sql = "INSERT INTO cart (id_account, id_product_variants, quantity)
            VALUES ('$id_account', '$id_product_variants', '$quantity');";
        }
        return pdo_execute($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function checkCart($id_account, $id_product_variants)
{
    try {
        $sql = "SELECT * FROM cart WHERE id_account = $id_account and id_product_variants = $id_product_variants;";
        return pdo_query_one($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function checkQuantityProductCart($id_account, $id_product_variants)
{
    try {
        $sql = "SELECT quantity FROM cart WHERE id_account = $id_account and id_product_variants = $id_product_variants;";
        return pdo_query_one($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function deleteCart($id)
{
    try {
        $sql = "DELETE FROM cart WHERE id = $id";
        pdo_execute($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function getIdProductVariants($id_product, $id_size)
{
    try {
        $sql = "SELECT id  FROM product_variants
        WHERE id_product = $id_product AND id_size = $id_size;";
        return pdo_query_one($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
