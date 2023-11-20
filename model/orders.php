<?php
function getAll_order(){
    $sql= "select orders.*, orders.order_date as date_or, accounts.fullname as name_user, order_status.name as name_status, products.name as name_pro, products.image as imgpro,size_products.name as size_pro, size_products.quantity as sl_quantity, size_products.price as price_pro,
    accounts.email as email_ac, accounts.address as adres, accounts.tel as phone, order_details.notes as note
    from orders join accounts on orders.id_account = accounts.id
    join order_status on orders.id_status = order_status.id
    join order_details on orders.id = order_details.id_order
    join product_variants on order_details.id_product_variants = product_variants.id
    join products on product_variants.id_product = products.id
    join size_products on product_variants.id_size_product = size_products.id
    order by id desc;";
    $listorder= pdo_query($sql);
    return $listorder;
}

function getAll_order_var(){
    $sql= "select product_variants.*, products.name as name_pr, products.image as imgpro,size_products.name as size_pro, size_products.quantity as sl_quantity, size_products.price as price_pro
    from product_variants join products on product_variants.id_product = products.id
    join size_products on product_variants.id_size_product = size_products.id
    order by id desc;";
    $listorder_var= pdo_query($sql);
    return $listorder_var;
}
function loadone_order($id){
    $sql="SELECT * 
    FROM `order_details` 
    JOIN orders ON order_details.id_order = orders.id 
    JOIN accounts ON orders.id_account = accounts.id 
    WHERE order_details.id_order = '$id'";
    $order=pdo_query_one($sql);
    return $order;
}
function loadall_order(){
    $sql="select * from orders order by id desc";
    $listor= pdo_query($sql);
    return $listor;
}
function loadall_order_variants($id_order){
    $sql="select * from order_variants where id_order=".$id_order;
    $listvar= pdo_query($sql);
    return $listvar;
}
function order_update($id_order, $username, $email, $tel, $address, $id_status ,$notes ){
    $sql = " UPDATE orders  join order_status on orders.id_status = order_status.id
    join order_details on orders.id = order_details.id_order
    join product_variants on order_details.id_product_variants = product_variants.id
    join products on product_variants.id_product = products.id
    JOIN accounts on orders.id_account = accounts.id
    join size_products on product_variants.id_size_product = size_products.id   SET accounts.fullname= '$username', accounts.email =' $email', accounts.tel =' $tel', accounts.address = '$address', orders.id_status = ' $id_status' ,order_details.notes = '$notes'   WHERE id_order='$id_order' ";
    pdo_execute($sql);
}

?>