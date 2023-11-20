<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <title>
        Trang quản trị
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/soft-ui-dashboard.css" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <div class="row">
        <div class="col-2">
            <?php include "./layout/sidebar.php" ?>
        </div>
        <section class="col p-0 m-0">
            <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
                <header>
                    <?php include './layout/navbar.php'; ?>
                </header>
                <!-- include model -->
                <?php
                include '../model/pdo.php';
                include '../model/revenues.php';
                include '../model/accounts.php';
                include '../model/categories.php';
                include '../model/products.php';
                include '../model/orders.php';
                include '../model/comments.php';
                include "../model/discount_code.php";
                ?>
                <div>
                    <?php switch ($_GET['action']) {
                        case 'dashboard':
                            include "./dashboard.php";
                            break;
                        case 'accounts':
                            $getAccounts = getAllAccounts();
                            $pathImg = "../assets/img/accounts/";
                            include 'tables/accounts/accounts.php';
                            break;
                        case 'add_account':
                            unset($_SESSION['error']);
                            $getAllRoles = getAllRoles();
                            $getAccounts = getAllAccounts();

                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $fullname = $_POST['fullname'];
                                $email = $_POST['email'];
                                $address = $_POST['address'];
                                $tel = $_POST['tel'];
                                $id_role = $_POST['id_role'];

                                if ($_FILES['avatar']['name'] != "") {
                                    $avatar = $_FILES['avatar']['name'];
                                    $target_dir = "../assets/img/accounts/";
                                    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
                                    move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
                                } else {
                                    $avatar = "profile.jpg";
                                }

                                $check_validate = [];
                                $check_validate['check'] = true;
                                if (!isset($username) || $username == "") {
                                    $check_validate['username'] = "Tên tài khoản không được để trống";
                                    $check_validate['check'] = false;
                                }
                                foreach ($getAccounts as $key => $value) {
                                    if ($value['username'] == $username) {
                                        $check_validate['username'] = "Tên tài khoản đã tồn tại";
                                        $check_validate['check'] = false;
                                        break;
                                    }
                                }
                                if (strlen($password) < 8) {
                                    $check_validate['password'] = "Mật khẩu phải có ít nhất 8 ký tự";
                                    $check_validate['check'] = false;
                                }
                                $regex_email = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
                                if (!preg_match($regex_email, $email)) {
                                    $check_validate['email'] = "Email không hợp lệ";
                                    $check_validate['check'] = false;
                                }

                                if ($check_validate['check'] == true) {
                                    addAccount($username, $password, $fullname, $avatar, $email, $address, $tel, $id_role);
                                    echo "<script>window.location.href = '?action=accounts';</script>";
                                }
                            }
                            include 'tables/accounts/add_account.php';
                            break;
                        case 'edit_account':
                            unset($_SESSION['error']);
                            $getAllRoles = getAllRoles();
                            $getAccountById = getAccountById($_GET['acc_id']);

                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $fullname = $_POST['fullname'];
                                $email = $_POST['email'];
                                $address = $_POST['address'];
                                $tel = $_POST['tel'];
                                $id_role = $_POST['id_role'];

                                if ($_FILES['avatar']['name'] != "") {
                                    $avatar = $_FILES['avatar']['name'];
                                    $target_dir = "../assets/img/accounts/";
                                    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
                                    move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
                                } else {
                                    $avatar = $getAccountById['avatar'];
                                }

                                $check_validate = [];
                                $check_validate['check'] = true;
                                if (!isset($username) || $username == "") {
                                    $check_validate['username'] = "Tên tài khoản không được để trống";
                                    $check_validate['check'] = false;
                                }
                                foreach ($getAccounts as $key => $value) {
                                    if ($value['username'] == $username) {
                                        if ($getAccountById['username'] != $username) {
                                            $check_validate['username'] = "Tên tài khoản đã tồn tại";
                                            $check_validate['check'] = false;
                                            break;
                                        }
                                    }
                                }
                                if (strlen($password) < 8) {
                                    $check_validate['password'] = "Mật khẩu phải có ít nhất 8 ký tự";
                                    $check_validate['check'] = false;
                                }
                                $regex_email = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
                                if (!preg_match($regex_email, $email)) {
                                    $check_validate['email'] = "Email không hợp lệ";
                                    $check_validate['check'] = false;
                                }

                                if ($check_validate['check'] == true) {
                                    editAccount($_GET['acc_id'], $username, $password, $fullname, $avatar, $email, $address, $tel, $id_role);
                                    echo "<script>window.location.href = '?action=accounts';</script>";
                                }
                            }
                            include 'tables/accounts/edit_account.php';
                            break;
                        case 'delete_account':
                            deleteAccount($_GET['acc_id']);
                            echo "<script>window.location.href = '?action=accounts';</script>";
                            break;
                        case 'forgot_password':
                            if (isset($_POST['btn_submit'])) {
                                $user = $_POST['username'];
                                $email = $_POST['email'];
                                $password = $_POST['password'];
                                forgotPassword($user, $email, $password);
                            }
                            include 'tables/accounts/forgot_password.php';
                            break;
                        case 'categories':
                            $list_categories = load_all_category();
                            include 'tables/categories/categories.php';
                            break;
                        case 'add_category':
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $name_category = $_POST['name_category'];

                                $image = $_FILES['image']['name'];
                                $image_tmp = $_FILES['image']['tmp_name'];
                                $image_size = $_FILES['image']['size'];
                                $image_maxsize = 4 * 1024 * 1024;
                                if ($image_size > $image_maxsize) {
                                    $notificationERROR = 'File ảnh quá lớn vui lòng thử lại';
                                } else {
                                    move_uploaded_file($image_tmp, '../assets/img/categories/' . $image);
                                    insert_category($name_category, $image);
                                    $notification = 'Thêm thành công';
                                }
                            }
                            include 'tables/categories/add_category.php';
                            break;
                        case 'update_category':
                            $one_category = load_one_category($_GET['id']); 

                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $id = $_GET['id'];
                                $name_category = $_POST['name_category']; 

                                if ($_FILES['image']['name'] != "") {
                                    $image = $_FILES['image']['name'];
                                    $image_size = $_FILES['image']['size'];
                                    $image_maxsize = 4 * 1024 * 1024;
                                    if ($image_size > $image_maxsize) {
                                        $notificationERROR = 'File ảnh quá lớn vui lòng thử lại';
                                    } else {
                                        move_uploaded_file($_FILES['image']['tmp_name'], './assets/img/categories/' . $image);
                                    }
                                } else {
                                    $image = $one_category['image'];
                                }
                                update_category($id, $name_category, $image);
                            }
                            include 'tables/categories/edit_category.php';
                            break;
                        case 'dlt_category':
                            if (isset($_GET['id']) && ($_GET['id'] >= 1)) {
                                delete_category($_GET['id']);
                            }
                            $list_categories = load_all_category();
                            include 'tables/categories/categories.php';
                            break;
                        case 'products':
                            // $list_all_product = getAllProducts();
                            $getAllProducts = getAllProducts();
                            $pathImg = "../assets/img/products/";
                            include 'tables/products/products.php';
                            break;
                        case 'add_product':
                            $list_categories = load_all_category();
                            if (isset($_POST['btn_edit']) && $_POST['btn_edit']) {
                                // Products
                                $name = $_POST['name'];
                                $description = $_POST['description'];
                                $id_category = $_POST['id_category'];
                                $image = $_FILES['image']['name'];
                                $image_size = $_FILES['image']['size'];
                                $image_maxsize = 4 * 1024 * 1024;

                                $quantityS = $_POST['quantityS'];
                                $priceS = $_POST['priceS'];
                                $quantityM = $_POST['quantityM'];
                                $priceM = $_POST['priceM'];
                                $quantityL = $_POST['quantityL'];
                                $priceL = $_POST['priceL'];

                                if ($quantityS == "") {
                                    $quantityS = 0;
                                }
                                if ($priceS == "") {
                                    $priceS = 0;
                                }
                                if ($quantityM == "") {
                                    $quantityM = 0;
                                }
                                if ($priceM == "") {
                                    $priceM = 0;
                                }
                                if ($quantityL == "") {
                                    $quantityL = 0;
                                }
                                if ($priceL == "") {
                                    $priceL = 0;
                                }

                                if ($image_size > $image_maxsize) {
                                    $notification = 'File ảnh quá lớn vui lòng thử lại';
                                } else {
                                    move_uploaded_file($_FILES['image']['tmp_name'], '../assets/img/products/' . $image);
                                    insert_products($name, $description, $id_category, $image);
                                    $getLatestProductsIdData = getLatestProductsId();
                                    if ($getLatestProductsIdData) {
                                        $getLatestProductsIdData = $getLatestProductsIdData['id'];
                                        insert_product_variant($getLatestProductsIdData, 1, $priceS, $quantityS);
                                        insert_product_variant($getLatestProductsIdData, 2, $priceM, $quantityM);
                                        insert_product_variant($getLatestProductsIdData, 3, $priceL, $quantityL);
                                    }
                                }
                            }
                            include 'tables/products/add_product.php';
                            break;

                        case 'update_products':
                            $load_one_product = load_one_product($_GET['id']);
                            $sizeL = getQuantitySizeProduct($_GET['id'], 3);
                            $sizeM = getQuantitySizeProduct($_GET['id'], 2);
                            $sizeS = getQuantitySizeProduct($_GET['id'], 1);

                            $list_categories = load_all_category();

                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $name = $_POST['name'];
                                $id_category = $_POST['id_category'];
                                $description = $_POST['description'];
                                $quantityS = $_POST['quantityS'];
                                $priceS = $_POST['priceS'];
                                $quantityM = $_POST['quantityM'];
                                $priceM = $_POST['priceM'];
                                $quantityL = $_POST['quantityL'];
                                $priceL = $_POST['priceL'];

                                if ($quantityS == "") {
                                    $quantityS = 0;
                                }
                                if ($priceS == "") {
                                    $priceS = 0;
                                }
                                if ($quantityM == "") {
                                    $quantityM = 0;
                                }
                                if ($priceM == "") {
                                    $priceM = 0;
                                }
                                if ($quantityL == "") {
                                    $quantityL = 0;
                                }
                                if ($priceL == "") {
                                    $priceL = 0;
                                }

                                if ($_FILES['image']['name'] != "") {
                                    $image = $_FILES['image']['name'];
                                    $image_size = $_FILES['image']['size'];
                                    $image_maxsize = 4 * 1024 * 1024;
                                    if ($image_size > $image_maxsize) {
                                        $notificationERROR = 'File ảnh quá lớn vui lòng thử lại';
                                    } else {
                                        move_uploaded_file($_FILES['image']['tmp_name'], './assets/img/products/' . $image);
                                    }
                                } else {
                                    $image = $load_one_product['image'];
                                }
                                update_product($_GET['id'], $name, $id_category, $description, $image);
                                update_product_variants($_GET['id'], 1, $priceS, $quantityS);
                                update_product_variants($_GET['id'], 2, $priceM, $quantityM);
                                update_product_variants($_GET['id'], 3, $priceL, $quantityL);
                            }
                            include 'tables/products/edit_product.php';
                            break;
                        case 'dlt_product':
                            if (isset($_GET['id']) && ($_GET['id'] >= 1)) {
                                delete_product($_GET['id']);
                                $id_sizeS = 1;
                                $id_sizeM = 2;
                                $id_sizeL = 3;
                                delete_product_variants($_GET['id'], $id_sizeS);
                                delete_product_variants($_GET['id'], $id_sizeM);
                                delete_product_variants($_GET['id'], $id_sizeL);
                            }
                            $list_all_product = load_all_product_category_variant();

                            break;

                        case 'orders':
                            include 'tables/orders/orders.php';
                            break;
                        case 'edit_order':
                            include 'tables/orders/edit_order.php';
                            break;
                        case 'comments':
                            $load_all_comments = load_all_comment();
                            include 'tables/comments/comments.php';
                            break;
                        case 'dlt_comments':
                            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                                delete_comments($_GET['id']);
                            }
                            $load_all_comments = load_all_comment();
                            include 'tables/comments/comments.php';
                            break;
                        case 'comments_detail':
                            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                                $load_all_comment_detail = load_all_comment_detail($_GET['id']);
                            }
                            include 'tables/comments/comments_detail.php';
                            break;
                        case 'dlt_comment_detail':
                            if (isset($_GET['id']) && $_GET['id'] > 0) {
                                delete_comment_detail($_GET['id']);
                            }
                            $load_all_comments = load_all_comment();
                            include 'tables/comments/comments.php';
                            break;
                        case 'add_discount_code':
                            if (isset($_POST['newpro']) && ($_POST['newpro'])) {
                                $code_name = $_POST['code'];
                                $discount = $_POST['discount'];
                                $quantiny = $_POST['quantiny'];
                                $expiration_date = $_POST['expiration_date'];
                                insert_code($code_name, $discount, $quantiny, $expiration_date);
                            }
                            include 'tables/discounts_code/add_discount_code.php';
                            break;
                        case 'discounts_code':
                            $listcode = loadall_code();
                            include 'tables/discounts_code/discounts_code.php';
                            break;
                        case 'delete_discount_code':
                            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                                $id = $_GET['id'];
                                delete_code($id);
                            }
                            $listcode = loadall_code();
                            include 'tables/discounts_code/discounts_code.php';

                            break;
                        case 'update_discount_code':
                            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                                $code = loadone_code($_GET['id']);
                            }
                            $listcode = loadall_code();
                            include "tables/discounts_code/edit_discount_code.php";
                            break;
                        case 'edit_discount_code':
                            if (isset($_POST['btn_edit']) && ($_POST['btn_edit'])) {
                                $id = $_POST['id'];
                                $code_name = $_POST['code'];
                                $discount = $_POST['discount'];
                                $quantiny = $_POST['quantiny'];
                                $expiration_date = $_POST['expiration_date'];

                                update_code($id, $code_name, $discount, $quantiny, $expiration_date);
                            }
                            $listcode = loadall_code();
                            include 'tables/discounts_code/discounts_code.php';
                            break;
                        case 'revenues':
                            // $getRevenues = getRevenues();
                            $pathImg = "../assets/img/products/";
                            $getCategories = load_all_category();

                            if (isset($_POST['filter'])) {
                                $start = $_POST['startDate'];
                                $end = $_POST['endDate'];
                                $categoryId = $_POST['id_category'];
                                $getRevenues = getRevenues($start, $end, $categoryId);
                            } else {
                                $getRevenues = getRevenues();
                            }

                            include 'tables/revenues/revenues.php';
                            break;
                        default:
                            include "./dashboard.php";
                            break;
                    } ?>

                </div>
                <footer>
                    <?php include './layout/footer.php'; ?>
                </footer>
            </main>
        </section>
    </div>

    <!--   Core JS Files   -->
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
                datasets: [{
                    label: "Sales",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "#fff",
                    data: [Jan, Feb, Mar, Apr, May, Jun, Jul, Aug, Sep, Oct, Nov, Dec],
                    maxBarThickness: 6
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 500,
                            beginAtZero: true,
                            padding: 15,
                            font: {
                                size: 14,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#fff"
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false
                        },
                        ticks: {
                            display: false
                        },
                    },
                },
            },
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
                datasets: [{
                        label: "Năm nay",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#cb0c9f",
                        borderWidth: 3,
                        backgroundColor: gradientStroke1,
                        fill: true,
                        data: [Jan, Feb, Mar, Apr, May, Jun, Jul, Aug, Sep, Oct, Nov, Dec],
                        maxBarThickness: 6

                    },
                    {
                        label: "Năm ngoái",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#3A416F",
                        borderWidth: 3,
                        backgroundColor: gradientStroke2,
                        fill: true,
                        data: [oldJan, oldFeb, oldMar, oldApr, oldMay, oldJun, oldJul, oldAug, oldSep, oldOct, oldNov, oldDec],
                        maxBarThickness: 6
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc --> 
</body>

</html>