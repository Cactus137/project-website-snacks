<link rel="stylesheet" href="./assets/css/styles.user.cart.css">
<h2 class="cart ">GIỎ HÀNG CỦA TÔI</h2>
<section class="main">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="viewcart">
            <div style="display: block;">
                <?php
                foreach ($load_card as $card) :
                    extract($card);
                    $total_price += $price * $quantity;
                    $fee = 50000;
                ?>
                    <div class="product-category-detail">
                        <div class="field-img">
                            <img src="<?= "assets/img/products/" . $image_product; ?>" alt="" class="image">
                        </div>
                        <div class="content">
                            <div class="field-content">
                                <h4><?= $name_product ?></h4>
                                <p class="size">Size: <?= $name_size ?></p>
                                <p class="price"><?= number_format($price) . " VNĐ" ?></p>
                            </div>
                            <div class="qty">
                                <div class="q-inner">
                                    <button class="btn-minute" type="button" disabled>-</button>
                                    <span class="number">
                                        <?= $quantity; ?>
                                    </span>
                                    <button class="btn-plus" type="button" disabled>+</button>
                                </div>
                                <div class="icon-delete">
                                    <!-- <a href=""><img src="img/trash-bin 1.png" alt="" ></a> -->
                                    <a href="index.php?act=delcart"><i class="fa-solid fa-trash-can"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="field-note">
                <form action="" method="post">
                    <span class="field-text">
                        <p class="name">1 MÓN</p>
                        <hr>
                        <p class="name">Bạn có Mã giảm giá?</p>
                        <input type="text" name="code_discount" placeholder="Mã giảm giá*" class="vorcher">
                        <input type="submit" name="btn_code_discount" id="" value="Áp dụng" class="sbvocher">
                        <hr>
                    </span>
                </form>
                <ul class="list-options">
                    <li>
                        <div class="pr-name">Tổng đơn hàng</div>
                        <div class="inner">
                            <span class="pricee"><?= number_format($total_price) ?>đ</span>

                        </div>
                    </li>
                    <li>
                        <div class="pr-name">Phí vận chuyển</div>
                        <div class="inner">
                            <span class="pricee2"><?= number_format($fee); ?>đ</span>
                        </div>
                    </li>
                    <li>
                        <div class="pr-name">Giảm giá</div>
                        <div class="inner">
                            <span class="pricee2"><?= number_format(($discount / 100) * $total_price); ?>đ</span>
                        </div>
                    </li>
                    <li>
                        <div class="pr-nametong">Tổng thanh toán</div>
                        <div class="inner">
                            <span class="pricee3"><?php $total_amount = ($total_price + $fee) - $discount; echo number_format($total_amount) ?>đ</span>
                        </div>
                    </li>

                </ul>
                <hr>

                <div class="thanhtoan">
                    <a href="#" class="ttoan"><input type="submit" name="bill" id="" value="Thanh toán" class="tt"></a>
                </div>
    </form>

    </div>

    </div>
    </main>