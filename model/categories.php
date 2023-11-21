<?php
function insert_category($name_category, $image)
{
    $sql = "INSERT INTO categories(name_cate, image) VALUES ('$name_category','$image')";
    pdo_execute($sql);
}

function load_all_category()
{
    $sql = 'SELECT * FROM categories ORDER BY id DESC';
    $list_categories = pdo_query($sql);
    return $list_categories;
}

function load_one_category($id)
{
    $sql = "SELECT * FROM categories WHERE id='$id'";
    $one_category = pdo_query_one($sql);
    return $one_category;
}

function update_category($id, $name_category, $image)
{
    $sql = "UPDATE categories SET name_cate='$name_category', image='$image' WHERE id = $id";
    pdo_execute($sql);
}

function delete_category($id)
{
    $sql = "DELETE FROM categories WHERE id=" . $id;
    pdo_execute($sql);
} 