<?php
// Include Model
include "../model/pdo.php";
include "../model/discount_code.php";
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
        
        case 'add_discount_code':
            if(isset($_POST['newpro'])&&($_POST['newpro'])){
                $code_name = $_POST['code'];
                $discount = $_POST['discount'];
                $quantiny= $_POST['quantiny'];
                $expiration_date=$_POST['expiration_date'];
                insert_code($code_name, $discount, $quantiny, $expiration_date);
                
                }

            include 'discounts_code/add_discount_code.php';
            break;
            case 'discounts_code':
                $listcode=loadall_code();
                include 'discounts_code/discounts_code.php';
                break;
        case 'delete_discount_code':
                    if(isset($_GET['id']) && ($_GET['id']>0)){
                        $id=$_GET['id'];
                        delete_code($id);
                    }
                    $listcode=loadall_code();
                    include 'discounts_code/discounts_code.php';
         
                   break;
    case 'update_discount_code':
        if(isset($_GET['id'])&&($_GET['id'])>0){
            $code =loadone_code($_GET['id']);
        }
        $listcode=loadall_code();
        include "discounts_code/edit_discount_code.php";
        break;
        case 'edit_discount_code':
            if(isset($_POST['btn_edit'])&&($_POST['btn_edit'])){
                $id =$_POST['id'];
                $code_name = $_POST['code'];
                $discount = $_POST['discount'];
                $quantiny= $_POST['quantiny'];
                $expiration_date=$_POST['expiration_date'];
                
                update_code($id, $code_name, $discount, $quantiny, $expiration_date);
                }
                $listcode=loadall_code();
                include 'discounts_code/discounts_code.php';
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
