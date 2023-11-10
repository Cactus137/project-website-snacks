<?php
// Include Model


if (isset($_GET['data'])) {
    switch ($_GET['data']) {
        case 'accounts':
            include 'accounts/accounts.php';
            break;
        case 'add_account':
            include 'accounts/add_account.php';
            break;
        case 'edit_account':
            include 'accounts/edit_account.php';
            break;
        case 'categories':
            include 'categories/categories.php';
            break;
        case 'add_category':
            include 'categories/add_category.php';
            break;
        case 'edit_category':
            include 'categories/edit_category.php';
            break;
        case 'products':
            include 'products/products.php';
            break;
        case 'add_product':
            include 'products/add_product.php';
            break;
        case 'edit_product':
            include 'products/edit_product.php';
            break;
        case 'orders':
            include 'orders/orders.php';
            break;
        case 'comments':
            include 'comments/comments.php';
            break;
        case 'comments_detail':
            include 'comments/comments_detail.php';
            break;
        case 'discounts_code':
            include 'discounts_code/discounts_code.php';
            break;
        case 'add_discount_code':
            include 'discounts_code/add_discount_code.php';
            break;
        case 'edit_discount_code':
            include 'discounts_code/edit_discount_code.php';
            break;
        case 'revenues':
            include 'revenues/revenues.php';
            break; 
        default:
            include 'accounts/accounts.php';
            break;
    }
} else {
    include 'accounts/accounts.php';
}
