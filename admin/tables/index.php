<?php
if (isset($_GET['data'])) {
    switch ($_GET['data']) {
        case 'accounts':
            $getAccounts = getAllAccounts();
            $pathImg = "assets/img/accounts/";
            include 'accounts/accounts.php';
            break;
        case 'add_account':
            $getAllRoles = getAllRoles();
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id_role = $_POST['id_role'];

                if ($_FILES['avatar']['name'] != "") {
                    $avatar = $_FILES['avatar']['name'];
                    $target_dir = "assets/img/accounts/";
                    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
                    move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
                } else {
                    $avatar = "profile.png";
                }
                addAccount($username, $password, $fullname, $avatar, $email, $address, $tel, $id_role);
                header('location: ?action=tables&data=accounts');
            }
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
        case 'edit_order':
            include 'orders/edit_order.php';
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
