<?php
function load_card($id)
{
    try {
        $sql = "SELECT * FROM cart WHERE id_account = '$id'";
        return pdo_query($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function addToCard($id_account, $id_product_variants, $quantity)
{
    try {
        $checkCart = checkCart($id_account, $id_product_variants);
        $checkQuantityProductCart = checkQuantityProductCart($id_account, $id_product_variants);

        if ($checkCart) {
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