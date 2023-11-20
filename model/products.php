<?php
function insert_products($name, $description, $id_category, $image)
{
    $sql = "INSERT INTO products(name,image,description,id_category) VALUES('$name','$image','$description','$id_category')";
    pdo_execute($sql);
}

function getLatestProductsId()
{
    try {
        $sql = "SELECT id FROM products ORDER BY id DESC LIMIT 1;";
        return pdo_query_one($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function insert_product_variant($id, $id_size, $price, $quantity)
{
    $sql = "INSERT INTO product_variants(id_product,id_size,price,quantity)
            VALUES('$id','$id_size','$price','$quantity')";
    pdo_execute($sql);
}

// function load_all_product_category_variant(){
//     $sql = "SELECT products.id AS id ,products.image AS image ,products.name AS name_product, categories.name_category
//     FROM products 
//     INNER JOIN categories ON products.id_category = categories.id
//     ORDER BY products.id DESC";
//     $list_all_product = pdo_query($sql);
//     return $list_all_product;
// }


// function quantity($id_pro,$id_size){
//     $sql = "SELECT quantity FROM product_variants WHERE id_product = $id_pro AND  id_size = $id_size";
//     $quantity = pdo_query_one($sql);
//     return $quantity;
// }

function getAllProducts()
{
    try {
        $sql = "SELECT p.id, p.name, p.image, c.name_cate
            FROM products p
            JOIN categories c ON p.id_category = c.id
            ORDER BY id DESC";
        return pdo_query($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function load_one_product($id)
{
    try {
        $sql = "SELECT * FROM products WHERE id= $id; ";
        return pdo_query($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}



function load_all_product_category_variant()
{
    $sql = "SELECT products.id AS id ,products.image AS image ,products.name AS name_product, categories.name_category
    FROM products 
    INNER JOIN categories ON products.id_category = categories.id
    ORDER BY products.id DESC";
    $list_all_product = pdo_query($sql);
    return $list_all_product;
}

function getQuantitySizeProduct($id_product, $id_size)
{
    try {
        $sql = "SELECT * FROM product_variants WHERE id_product = $id_product AND id_size = $id_size";
        return pdo_query_one($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function update_product($id, $name, $id_category, $description, $image)
{
    $sql = "UPDATE products SET name='$name', image='$image', description='$description', id_category='$id_category' WHERE id = $id";
    pdo_query($sql);
}

function update_product_variants($id, $id_size, $price, $quantity)
{
    $sql = "UPDATE product_variants SET price='$price', quantity='$quantity' WHERE id_product = $id AND id_size = $id_size";
    pdo_query($sql);    
}

function delete_product($id)
{
    $sql = "DELETE FROM products WHERE id=" . $id;
    pdo_execute($sql);
}

function delete_product_variants($id, $id_size)
{
    $sql = "DELETE FROM product_variants WHERE id=$id AND id_size=" . $id_size;
    pdo_execute($sql);
}
