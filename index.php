<?php
session_start();
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
            include './model/pdo.php';
            include './model/accounts.php';
            include './model/products.php';
            include './model/categories.php';
            include './model/product_variants.php';
            include './model/orders.php';
            include './model/cart.php';
            include './model/comments.php';
            include './model/discount_code.php';

            if ($_GET['act']) {
                switch ($_GET['act']) {
                    case 'home':
                        include './user/home.php';
                        break;
                    case 'menu':
                        include './user/products.php';
                        break;
                    case 'login':
                        // xóa session error
                        unset($_SESSION['error']);
                        // kiểm tra phương thức gửi form đi
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            // kiểm tra dữ liệu
                            if (empty($username)) {
                                $_SESSION['error']['username'] = 'Bạn chưa nhập tên đăng nhập';
                            } else {
                                if (strlen($username) < 6) {
                                    $_SESSION['error']['username'] = 'Tên đăng nhập phải có ít nhất 6 ký tự';
                                }
                            }
                            if (empty($password)) {
                                $_SESSION['error']['password'] = 'Bạn chưa nhập mật khẩu';
                            } else {
                                if (strlen($password) < 6) {
                                    $_SESSION['error']['password'] = 'Mật khẩu phải có ít nhất 6 ký tự';
                                }
                            }
                            if (empty($_SESSION['error'])) {
                                $check_login = getAccountByUsername($username);
                                if ($username == $check_login['username'] && $password == $check_login['password']) {
                                    $_SESSION['user'] = $check_login;
                                    if ($check_login['role'] == 0) {
                                        echo "<script>window.location.href = 'admin/index.php';</script>";
                                    } else {
                                        echo "<script>window.location.href = '?act=home';</script>";
                                    }
                                } else {
                                    $_SESSION['error']['login'] = 'Tên đăng nhập hoặc mật khẩu không chính xác';
                                }
                            }
                        }
                        include 'user/login.php';
                        break;
                    case 'signup':
                        // xóa session error
                        unset($_SESSION['error']);
                        // kiểm tra phương thức gửi form đi
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $username = $_POST['username'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $re_password = $_POST['re_password'];
                            $access_policy = $_POST['access_policy'];
                            // kiểm tra dữ liệu
                            if (empty($username)) {
                                $_SESSION['error']['username'] = 'Bạn chưa nhập tên đăng nhập';
                            } else {
                                if (strlen($username) < 6) {
                                    $_SESSION['error']['username'] = 'Tên đăng nhập phải có ít nhất 6 ký tự';
                                } else {
                                    $user_check = getAllAccounts();
                                    foreach ($user_check as $key => $value) {
                                        if ($value['username'] == $username) {
                                            $_SESSION['error']['username'] = 'Tên đăng nhập đã tồn tại';
                                        }
                                    }
                                }
                            }
                            if (empty($email)) {
                                $_SESSION['error']['email'] = 'Bạn chưa nhập email';
                            } else {
                                $regex_email = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
                                if (!preg_match($regex_email, $email)) {
                                    $_SESSION['error']['email'] = 'Email không hợp lệ';
                                }
                            }
                            if (empty($password)) {
                                $_SESSION['error']['password'] = 'Bạn chưa nhập mật khẩu';
                            } else {
                                if (strlen($password) < 6) {
                                    $_SESSION['error']['password'] = 'Mật khẩu phải có ít nhất 6 ký tự';
                                }
                            }
                            if (empty($re_password)) {
                                $_SESSION['error']['re_password'] = 'Bạn chưa nhập lại mật khẩu';
                            } else {
                                if ($password != $re_password) {
                                    $_SESSION['error']['re_password'] = 'Mật khẩu nhập lại không khớp';
                                }
                            }
                            if (empty($access_policy)) {
                                $_SESSION['error']['access_policy'] = 'Bạn chưa đồng ý với điều khoản sử dụng';
                            }
                            if (empty($_SESSION['error'])) {
                                signup($username, $email, $password);
                                $_SESSION['success'] = 'Đăng ký thành công';
                                echo "<script>window.location.href = '?act=login';</script>";
                            }
                        }
                        include 'user/signup.php';
                        break;
                    case 'logout':
                        // xóa session user
                        unset($_SESSION['user']);
                        echo "<script>window.location.href = '?act=home';</script>";
                        break;
                    case 'forgot':
                        // xóa session error
                        unset($_SESSION['error']);
                        unset($_SESSION['success']);
                        // kiểm tra phương thức gửi form đi
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $email = $_POST['email'];
                            // kiểm tra dữ liệu
                            if (empty($email)) {
                                $_SESSION['error'] = 'Bạn chưa nhập email';
                            } else {
                                $regex_email = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
                                if (!preg_match($regex_email, $email)) {
                                    $_SESSION['error'] = 'Email không hợp lệ';
                                }
                            }
                            if (empty($_SESSION['error'])) {
                                $getAllAccounts = getAllAccounts();
                                foreach ($getAllAccounts as $key => $value) {
                                    if (strtolower($value['email']) == strtolower($email)) {
                                        $password = $value['password'];
                                        forgotPassword($value['username'], $email, $password);
                                        $_SESSION['success'] = 'Mật khẩu mới đã được gửi vào email của bạn';
                                        unset($_SESSION['error']);
                                        break;
                                    } else {
                                        $_SESSION['error'] = 'Email không tồn tại';
                                    }
                                }
                            }
                        }
                        include 'user/forgot.php';
                        break;
                    case 'cart':
                        include 'user/cart.php';
                        break;
                    case 'product_detail':
                        include 'user/product_detail.php';
                        break;
                    case 'order':
                        if (isset($_SESSION['user'])) { 
                            $getAllStatusOrder = getAllStatusOrder();
                            if (isset($_GET['status'])) {
                                $id_status = $_GET['status'];
                                $getOrdersByAccount = getOrdersByAccount($_SESSION['user']['id'], $_GET['status']);
                            } else {
                                $id_status = null;
                                $getOrdersByAccount = getOrdersByAccount($_SESSION['user']['id'], $_GET['status']);
                            }
                            include 'user/order.php';
                        } else {
                            echo "<script>window.location.href = '?act=login';</script>";
                        }
                        break;
                    case 'cancel_order':
                        $id_order = $_GET['id_order'];
                        cancelOrder($id_order);
                        echo "<script>window.location.href = '?act=order';</script>";
                        break;
                    case 'pay':
                        $getAccountById = getAccountById($_SESSION['user']['id']);

                        if (isset($_POST['submit_order'])) {
                            // Kiểm tra có nhập đủ thông tin không
                            // Kiểm tra có thay đổi thông tin không (nếu có thì cập nhật lại thông tin)

                            // Code discount

                            $date = new DateTime(); 
                            date_default_timezone_set('Asia/Ho_Chi_Minh');

                            // Tạo một đối tượng DateTime
                            $ngay_hien_tai = new DateTime();

                            // Lấy ra ngày tháng năm ở định dạng Y-m-d
                            $order_date = $ngay_hien_tai->format('Y-m-d');
                            $id_status = 0;
                            $id_account = $_SESSION['user']['id'];
                            // Add order   ngày, status, id_account


                            // Add order_detail id_order, id_product_variants, số lượng, giảm giá, tổng giá, notes.

                        }

                        include 'user/pay.php';
                        break;
                    case 'profile':
                        if (isset($_SESSION['user'])) {
                            $getAccountById = getAccountById($_SESSION['user']['id']);
                            if (isset($_POST['btn_edit'])) {
                                $id = $_SESSION['user']['id'];
                                $username = $_POST['username'];
                                $email = $_POST['email'];
                                $fullname = $_POST['fullname'];
                                $tel = $_POST['tel'];
                                $address = $_POST['address'];

                                if ($_FILES['avatar']['name'] != "") {
                                    $avatar = $_FILES['avatar']['name'];
                                    $target_dir = "assets/img/accounts/";
                                    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
                                    move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
                                } else {
                                    $avatar = $getAccountById['avatar'];
                                }
                                updateProfile($id, $username, $email, $fullname, $avatar, $address, $tel);
                                echo "<script>window.location.href = '?act=profile';</script>";
                            }
                            include 'user/profile.php';
                        } else {
                            echo "<script>window.location.href = '?act=login';</script>";
                        }
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