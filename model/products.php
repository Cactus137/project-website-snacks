<?php
    function insert_products($name,$description,$id_category,$image){
        $sql = "INSERT INTO products(name,image,description,id_category) VALUES('$name','$image','$description','$id_category')";
        pdo_execute($sql);
    }

    function getLatestProductsId(){
        try {
            $sql = "SELECT id FROM products ORDER BY id DESC LIMIT 1;";
            return pdo_query_one($sql);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    function insert_product_variant($getLatestProductsIdData,$id_size,$price,$quantity){
            $sql = "INSERT INTO product_variants(id_product,id_size,price,quantity)
            VALUES('$getLatestProductsIdData','$id_size','$price','$quantity')";
            pdo_execute($sql);
    }

    function load_all_product_category_variant(){
        $sql = "SELECT products.id AS id ,products.image AS image ,products.name AS name_product, categories.name_category
        FROM products 
        INNER JOIN categories ON products.id_category = categories.id
        ORDER BY products.id DESC";
        $list_all_product = pdo_query($sql);
        return $list_all_product;
    }

    
    function quantity($id_pro,$id_size){
        $sql = "SELECT quantity FROM product_variants WHERE id_product = $id_pro AND  id_size = $id_size";
        $quantity = pdo_query_one($sql);
        return $quantity;
    }




    
    // function load_quantity_size($id_pro,$quantiny){
    //     $sql = "SELECT product_variants.quantity 
    //     FROM product_variants 
    //     INNER JOIN products ON products.id = product_variants.id_product
    //     INNER JOIN size ON product_variants.id_size = sizes.id
    //     WHERE $id_pro = product_variants.id_product AND  product_variants.id_size = $quantiny";
    //     $list_quantity = pdo_query($sql);
    //     return $list_quantity;
    // }
    
    // -- GROUP BY  products.id, categories.id
    // -- INNER JOIN product_variants ON products.id = product_variants.id_product
    // -- INNER JOIN sizes ON product_variants.id_size = sizes.id 
?>



