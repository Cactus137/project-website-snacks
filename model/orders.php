<?php
function getAll_order(){
    $sql= "select orders.*, orders.order_date as date_or, accounts.fullname as name_user, order_status.name as name_status, products.name as name_pro, products.image as imgpro, sizes.name as size_pro, product_variants.quantity as sl_quantity, product_variants.price as price_pro,
    accounts.email as email_ac, accounts.address as adres, accounts.tel as phone, order_details.notes as note
    from orders join accounts on orders.id_account = accounts.id
    join order_status on orders.id_status = order_status.id
    join order_details on orders.id = order_details.id_order
    join product_variants on order_details.id_product_variants = product_variants.id
    join products on product_variants.id_product = products.id
    join sizes on product_variants.id_size = sizes.id
    order by id desc;";
    $listorder= pdo_query($sql);
    return $listorder;
}


function loadone_order_details($id){
    $sql="select order_details.*, products.name as name_pr, product_variants.price as prc_pro, product_variants.quantity as slg_pr, sizes.name as size_name,
    accounts.fullname as user_fullname, accounts.email as mail_acc, accounts.tel as tel_phone, accounts.address as adress,  order_details.notes as note,
    orders.order_date as date_ord,sum(product_variants.quantity * product_variants.price) as 'total_price'
    from order_details join orders on order_details.id_order = orders.id
    join accounts on orders.id_account = accounts.id
    join product_variants on order_details.id_product_variants = product_variants.id
    join products on product_variants.id_product = products.id
    join sizes on product_variants.id_size = sizes.id

    where orders.id = '".$id."'
   ";
    $order_details=pdo_query_one($sql);
    return $order_details;
}
function loadone_order($id){
    $sql="SELECT * FROM `order_details` JOIN orders ON order_details.id_order = orders.id JOIN accounts ON orders.id_account = accounts.id WHERE order_details.id_order = '$id'";
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
    join sizes on product_variants.id_size = sizes.id   SET accounts.fullname= '$username', accounts.email =' $email', accounts.tel =' $tel', accounts.address = '$address', orders.id_status = ' $id_status' ,order_details.notes = '$notes'   WHERE id_order='$id_order' ";
    pdo_execute($sql);
}

?>