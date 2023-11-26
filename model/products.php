<?php
function getAllProducts()
{
    try {
        $sql = "SELECT * FROM products;";
        return pdo_query($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

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

function insert_product_variant($getLatestProductsIdData, $id_size, $price, $quantity)
{
    $sql = "INSERT INTO product_variants(id_product,id_size,price,quantity)
            VALUES('$getLatestProductsIdData','$id_size','$price','$quantity')";
    pdo_execute($sql);
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


function quantity($id_pro)
{
    $sql = "SELECT * FROM product_variants 
        INNER JOIN products ON product_variants.id_product = products.id
        INNER JOIN sizes ON product_variants.id_size = sizes.id
        WHERE id_product = $id_pro";
    $quantity = pdo_query($sql);
    return $quantity;
}

function load_one_product($id)
{
    $sql = "SELECT products.id AS id_product, products.id_category AS id_category, 
        products.name AS name, products.image AS image, products.description AS description, 
        product_variants.quantity AS quantity, product_variants.price, sizes.id AS id_size, sizes.name AS size FROM products
        INNER JOIN product_variants ON product_variants.id_product = products.id 
        INNER JOIN sizes ON sizes.id = product_variants.id_size WHERE products.id=$id 
        ORDER BY sizes.id ASC";
    $load_one_product = pdo_query($sql);
    return $load_one_product;
}

function update_product($id, $name, $id_category, $description, $image)
{
    if ($image !=  '') {
        $sql = "UPDATE products SET name='$name', image='$image', description='$description', id_category='$id_category' WHERE id=" . $id;
    } else {
        $sql = "UPDATE products SET name='$name', description='$description', id_category='$id_category' WHERE id=" . $id;
    }
    pdo_execute($sql);
}

function update_product_variants($id, $id_size, $price, $quantity)
{
    $sql = "UPDATE product_variants SET quantity='$quantity', price='$price' WHERE id_product=$id AND id_size=" . $id_size;
    pdo_execute($sql);
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

// USER
function list_products($id_category)
{
    $sql = "SELECT products.id AS id_product, products.name AS name_product,
    products.image AS image_product, product_variants.price 
    FROM products
    INNER JOIN categories ON categories.id = products.id_category
    INNER JOIN product_variants ON products.id = product_variants.id_product
    WHERE id_size = 1 AND products.id_category = $id_category";
    $list_products = pdo_query($sql);
    return $list_products;
}

function top4_similar($id_category)
{
    $sql = "SELECT * FROM products
    INNER JOIN product_variants ON product_variants.id_product = products.id
    WHERE  products.id_category = $id_category AND product_variants.id_size = 1  ORDER BY products.id DESC LIMIT 4";
    $top4_product_similar = pdo_query($sql);
    return $top4_product_similar;
}


function list_search_products($keyw)
{
    $sql = 'SELECT * FROM products
    INNER JOIN product_variants ON product_variants.id_product = products.id
    WHERE products.name LIKE "%' . $keyw . '%" AND product_variants.id_size = 1 ORDER BY products.id DESC ';
    $list_search_products = pdo_query($sql);
    return $list_search_products;
}


