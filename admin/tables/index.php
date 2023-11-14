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
            $list_categories = load_all_category();
            include 'categories/categories.php';
            break;

        case 'add_category':
            if(isset($_POST['btn_edit']) && $_POST['btn_edit']){
                $name_category = $_POST['name_category'];
                $image = $_FILES['image']['name'];
                $image_tmp = $_FILES['image']['tmp_name'];
                $image_size = $_FILES['image']['size'];
                $image_maxsize = 4 * 1024 * 1024;
                if($image_size > $image_maxsize){
                    $notificationERROR = 'File ảnh quá lớn vui lòng thử lại';
                }else{
                    move_uploaded_file($image_tmp,'./assets/img/'.$image);
                    insert_category($name_category,$image);
                    $notification = 'Thêm thành công';
                }
            }
            include 'categories/add_category.php';
            break;

        case 'fix_category':
            if(isset($_GET['id']) && $_GET['id'] > 0){
                $one_category = load_one_category($_GET['id']);
            }
            include 'categories/edit_category.php';
            break;

        case 'update_category':
            if(isset($_POST['btn_edit']) && ($_POST['btn_edit'])){
                $id = $_POST['id'];
                $name_category = $_POST['name_category'];
                $image = $_FILES['image']['name'];
                $image_tmp = $_FILES['image']['tmp_name'];
                $image_size = $_FILES['image']['size'];
                $image_maxsize = 4 * 1024 * 1024;
                if($image_size > $image_maxsize ){
                    $notificationERROR = 'File ảnh quá lớn vui lòng thử lại';
                }else{
                    move_uploaded_file($image_tmp,'./assets/img/'.$image);
                    update_category($id,$name_category,$image);
                    $notification = 'Thêm thành công';
                }
                $list_categories = load_all_category();
                include 'categories/categories.php';
            }
            break;
        
        case 'dlt_category':
            if(isset($_GET['id']) && ($_GET['id'] >= 1)){
                delete_category($_GET['id']);
            }
            $list_categories = load_all_category();
            include 'categories/categories.php';
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
