<?php 
include 'model/comments.php';
?>
<link rel="stylesheet" href="./assets/css/styles.user.product_detail.css">
<section>
    <form action="" method="post" enctype="multipart/form-data">
        <main class="main">
            <div class="product-detail"> 
                <div class="product">
                    <div class="file-img">
                        <img src="<?php echo 'assets/img/products/' . $one_product[0]['image'] ?>" alt="" class="image">
                    </div>
                    <div class="content">
                        <div class="file-content">
                            <h4><?php echo $one_product[0]['name'] ?></h4>

                            <p class="price"><?php
                                                if ($one_product[2]['price'] > 0) {
                                                    echo number_format($one_product[0]['price']) . 'đ - ' . number_format($one_product[2]['price']) . 'đ';
                                                } else {
                                                    echo number_format($one_product[0]['price']) . 'đ  ';
                                                }
                                                ?></p>
                            <p class="conect"><?php echo $one_product[0]['description'] ?></p>
                        </div>
                        <div class="table-size">
                            <div class="size-name">
                                <p class="name-size">Size</p>
                            </div>
                            <?php if ($one_product[0]['quantity'] > 0) { ?>
                                <input type="radio" value="<?= $one_product[0]['quantity'] ?>" name="exp" id="<?php echo $one_product[0]['id_size'] ?>">
                                <label for="1"><?php echo $one_product[0]['size'] ?></label>
                            <?php }
                            if ($one_product[1]['quantity'] > 0) { ?>
                                <input type="radio" value="<?= $one_product[1]['quantity'] ?>" name="exp" id="<?php echo $one_product[1]['id_size'] ?>">
                                <label for="2"><?php echo $one_product[1]['size'] ?></label>
                            <?php }
                            if ($one_product[2]['quantity'] > 0) { ?>
                                <input type="radio" value="<?= $one_product[2]['quantity'] ?>" name="exp" id="<?php echo $one_product[2]['id_size'] ?>">
                                <label for="3"><?php echo $one_product[2]['size'] ?></label>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="qty">
                            <div class="q-inner">
                                <button class="btn-minute" type="button" disabled>-</button>
                                <span name="number" class="number">1</span>
                                <button class="btn-plus" type="button">+</button>
                            </div>
                            <div class="add">
                                <a href="index.php?act=addtocart"><input type="button" value="Thêm vào giỏ hàng" class="add-pro"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $list_comments = load_all_comment_product($id)
                ?>
                <div class="comment">
                    <h4>Bình luận(3)</h4>
                    <hr>
                    <div class="user-comment">
                        <?php
                        foreach ($list_comments as $comment) {
                            extract($comment);
                        ?>
                            <div class="img-user">
                                <img src="<?php echo 'assets/img/accounts/' . $avatar ?>" alt="" class="img">
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
                                // if(isset($_SESSION['user'])){
                            ?>
                            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                                <input type="hidden" name="" value="<?php echo $id ?>">
                                <input type="text" name="content" id="" placeholder="Viết bình luận..." class="text-1">
                                <input type="submit" name="btn_send" id="" value="Đăng bình luận" class="sb-comment">
                            </form>
                            <?php
                                // }
                                // else{
                                //     echo '<h4>Vui lòng đăng nhập để bình luận</h4>';
                                // }
                            ?>
                        </div>
                        <?php
                            if(isset($_POST['send']) && ($_POST['send'])){
                                $content = $_POST['content'];
                                $id_product = $_POST['id'];
                                $id_account = $_SESSION['user']['user'];
                                $comment_date = date('h:i:sa d/m/Y');
                                insert_comment($content,$id_account,$id_product,$comment_date);
                                header('location:' . $_SERVER['HTTP_REFERER']);
                            }
                        ?>
                    </div>
                </div>
                <!-- COMMENT -->
                <div class="related-products">
                    <h4 class="pro-cx">Sản phẩm liên quan</h4>
                    <div class="sum-relad">
                        <?php
                        foreach ($top4_product_similar as $row) {
                            extract($row);
                        ?>
                            <div class="related">
                                <div class="relad-img">
                                    <a href=""><img src="<?php echo 'assets/img/products/' . $image ?>" alt="" class="rel-img"></a>
                                </div>
                                <div class="text-relad">
                                    <a href="">
                                        <p class="title-product"><?php echo $name ?></p>
                                    </a>
                                    <!-- <p>Italian Beef Burger</p> -->
                                    <p class="prices"><?php echo number_format($price) ?>đ</p>
                                    </p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </main>
    </form>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get relevant elements
        var minusButton = document.querySelector('.btn-minute');
        var plusButton = document.querySelector('.btn-plus');
        var quantityElement = document.querySelector('.number');

        // Initial quantity value
        var quantity = 1;
        var quantityE;


        // Function to update the quantity and enable/disable buttons
        function updateQuantity() {

            quantityElement.textContent = quantity;
            minusButton.disabled = (quantity === 1);
            plusButton.disabled = quantityE // Enable the plus button, you might want to add conditions here
        }

        // Event listener for the minus button
        minusButton.addEventListener('click', function() {
            if (quantity > 1) {
                quantity--;
                updateQuantity();
            }
        });

        // Event listener for the plus button
        plusButton.addEventListener('click', function() {
            quantity++;
            updateQuantity();
        });

        // Initial update
        updateQuantity();

        // PRICE PRODUCT
        var priceS = '<?= number_format($one_product[0]['price']) ?>';
        var priceM = '<?= number_format($one_product[1]['price']) ?>';
        var priceL = '<?= number_format($one_product[2]['price']) ?>';
        var price = document.querySelector('.price');

        var radioS = document.getElementById('1');
        var radioM = document.getElementById('2');
        var radioL = document.getElementById('3');
        radioS.onclick = function() {
            price.textContent = priceS + 'đ';
        }

        radioM.onclick = function() {
            price.textContent = priceM + 'đ';
        }

        radioL.onclick = function() {
            price.textContent = priceL + 'đ';
        }
    });
</script>