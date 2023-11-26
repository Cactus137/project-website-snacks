<?php
include './model/pdo.php';
include './model/categories.php';
include './model/products.php';

$list_category_home = load_all_category_home();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Trang chủ</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS thuần -->
    <link rel="stylesheet" href="./assets/css/styles.user.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Start header -->
    <?php include './user/layout/header.php'; ?>
    <!-- End header  -->

    <main class="d-flex justify-content-center">

        <div class="container">
            <?php

            if ($_GET['act']) {
                switch ($_GET['act']) {
                    case 'home':

                        include './user/home.php';
                        break;
                    case 'menu':
                        include './user/products.php';
                        break;
                    case 'login':
                        include 'user/login.php';
                        break;
                    case 'signup':
                        include 'user/signup.php';
                        break;
                    case 'forgot':
                        include 'user/forgot.php';
                        break;
                    case 'cart':
                        include 'user/cart.php';
                        break;
                    case 'list_search_products':
                        if (isset($_POST['keyw']) && ($_POST['keyw'] != '')) {
                            $keyw = $_POST['keyw'];
                        } else {
                            $keyw = '';
                        }
                        $list_search_products = list_search_products($keyw);
                        include 'user/products_list_search.php';
                        break;
                    case 'product_detail':
                        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                            $id = $_GET['id'];
                            $one_product =  load_one_product($id);
                            extract($one_product);
                            $id_category = $one_product[0]['id_category'];
                            $top4_product_similar = top4_similar($id_category);
                        }
                        include 'user/product_detail.php';
                        break;


                    case 'order':
                        include 'user/order.php';
                        break;
                    case 'profile':
                        include 'user/profile.php';
                        break;
                    default:
                        include './user/home.php';
                        break;
                }
            } else {
                include './user/home.php';
            }
            ?>
        </div>
    </main>

    <!-- Start footer -->
    <?php include './user/layout/footer.php'; ?>
    <!-- End footer  -->
</body>

</html>