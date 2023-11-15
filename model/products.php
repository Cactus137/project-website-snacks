<?php
    function insert_products($name,$introduce,$id_category,$quantity,$image){
        $sql = "INSERT INTO products(name,image,introduce,quantity,id_category) VALUES('$name','$image','$introduce','$quantity','$id_category')";
        pdo_execute($sql);
    }
?>