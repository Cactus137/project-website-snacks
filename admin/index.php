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
                            $pathImg = "assets/img/accounts/";
                            include 'tables/accounts/accounts.php';
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
                            include 'tables/accounts/add_account.php';
                            break;
                        case 'edit_account':
                            include 'tables/accounts/edit_account.php';
                            break;
                        case 'categories':
                            $list_categories = load_all_category();
                            include 'tables/categories/categories.php';
                            break;
                        case 'add_category':
                            if (isset($_POST['btn_edit']) && $_POST['btn_edit']) {
                                $name_category = $_POST['name_category'];
                                $image = $_FILES['image']['name'];
                                $image_tmp = $_FILES['image']['tmp_name'];
                                $image_size = $_FILES['image']['size'];
                                $image_maxsize = 4 * 1024 * 1024;
                                if ($image_size > $image_maxsize) {
                                    $notificationERROR = 'File ảnh quá lớn vui lòng thử lại';
                                } else {
                                    move_uploaded_file($image_tmp, './assets/img/' . $image);
                                    insert_category($name_category, $image);
                                    $notification = 'Thêm thành công';
                                }
                            }
                            include 'tables/categories/add_category.php';
                            break;
                        case 'fix_category':
                            if (isset($_GET['id']) && $_GET['id'] > 0) {
                                $one_category = load_one_category($_GET['id']);
                            }
                            include 'tables/categories/edit_category.php';
                            break;
                        case 'update_category':
                            if (isset($_POST['btn_edit']) && ($_POST['btn_edit'])) {
                                $id = $_POST['id'];
                                $name_category = $_POST['name_category'];
                                $image = $_FILES['image']['name'];
                                $image_tmp = $_FILES['image']['tmp_name'];
                                $image_size = $_FILES['image']['size'];
                                $image_maxsize = 4 * 1024 * 1024;
                                if ($image_size > $image_maxsize) {
                                    $notificationERROR = 'File ảnh quá lớn vui lòng thử lại';
                                } else {
                                    move_uploaded_file($image_tmp, './assets/img/' . $image);
                                    update_category($id, $name_category, $image);
                                    $notification = 'Thêm thành công';
                                }
                                $list_categories = load_all_category();
                                include 'tables/categories/categories.php';
                            }
                            break;
                        case 'dlt_category':
                            if (isset($_GET['id']) && ($_GET['id'] >= 1)) {
                                delete_category($_GET['id']);
                            }
                            $list_categories = load_all_category();
                            include 'tables/categories/categories.php';
                            break;
                        case 'products':
                            include 'tables/products/products.php';
                            break;
                        case 'add_product':
                            include 'tables/products/add_product.php';
                            break;
                        case 'edit_product':
                            include 'tables/products/edit_product.php';
                            break;

                        case 'orders':
                            $listorder = getAll_order();
                            include 'tables/orders/orders.php';
                            break;
                        case 'order_variants':
                            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                                $id = $_GET['id'];
                                $order_details =loadone_order_details($id);
                                extract($order_details);
                               
                           }

                             include 'tables/orders/order_variants.php';
                            break;
                        case 'update_order':
                            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                                $order = loadone_order($_GET['id']);
                            }
                            include "tables/orders/edit_order.php";
                        case 'edit_order':
                            if (isset($_POST['btn_edit']) && ($_POST['btn_edit'])) {
                                $id_order = $_POST['id_order'];
                                $username = $_POST['fullname'];
                                $email = $_POST['email'];
                                $tel = $_POST['tel'];
                                $address = $_POST['address'];
                                $id_status = $_POST['id_status'];
                                $notes = $_POST['notes'];
                                order_update($id_order, $username, $email, $tel, $address, $id_status, $notes);
                            }
                            $listorder = getAll_order();
                            include 'tables/orders/orders.php';
                            break;
                        case 'comments':
                            include 'tables/comments/comments.php';
                            break;
                        case 'comments_detail':
                            include 'tables/comments/comments_detail.php';
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
        console.log(Jan);
    </script>
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
    <script src="assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>