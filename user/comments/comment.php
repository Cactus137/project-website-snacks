<?php
session_start();
$id_product = $_REQUEST['id_product'];
include '../../model/pdo.php';
include '../../model/comments.php';
$list_comments = load_all_comment_product($id_product);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/styles.user.product_detail.css">
</head>
<body>

    <h4>Bình luận(3)</h4>
    <hr>
    <div class="user-comment">
        <?php
        foreach ($list_comments as $comment) {
            extract($comment);
        ?>
            <div class="img-user">
                <img src="<?php echo '../../assets/img/accounts/' . $avatar ?>" alt="" class="img">
                <span class="text-comment">
                    <div style="display: flex;">
                        <p style="font-weight: bold;"><?php echo $user ?></p>
                        <p style="padding: 0 5px;"> - </p>
                        <p><?php echo $comments_date ?></p>
                    </div>
                    <p><?php echo $content ?></p>
                </span>
            </div>
        <?php
        }
        ?>
        <div class="add-comment">
            <?php
            if (isset($_SESSION['user'])) {
            ?>
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                    <input type="hidden" name="id_product" value="<?=  $id_product ?>">
                    <input type="text" name="content" id="" placeholder="Viết bình luận..." class="text-1">
                    <input type="submit" name="send" id="" value="Đăng bình luận" class="sb-comment">
                </form>
            <?php
            } else {
                echo '<h4>Vui lòng đăng nhập để bình luận</h4>';
            }
            ?>
        </div>
        <?php
            if (isset($_POST['send']) && ($_POST['send'])) {
                $content = $_POST['content'];
                $id_product = $_POST['id_product'];
                $id_account = $_SESSION['user']['id'];
                $comment_date = date('Y/m/d');
                insert_comment($content, $id_account, $id_product, $comment_date);
                // load_all_comment_product($id_product);
                // header('location:' . $_SERVER['HTTP_REFERER']);
                echo "<script>
                    // Sau khi thêm bình luận, reload trang
                    window.location.reload();
                </script>";
                exit();
            }
        ?>
        
    </div>
</body>
</html>
