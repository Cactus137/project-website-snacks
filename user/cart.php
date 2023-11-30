<link rel="stylesheet" href="./assets/css/styles.user.cart.css">
<style>
    ul.list-options li {
        padding-top: 5px;
        display: flex;
        padding-bottom: 10px;
        justify-content: space-between;
    }
</style>
<h2 class="cart ">GIỎ HÀNG CỦA TÔI</h2>
<section>
    <?php
    if (count($load_card) <= 0) { ?>
        <div class="viewcart" style="min-height: 500px; display: block; text-align: center; width: 100%">
            <img src="assets/img/emptyCart.png" alt="" style="height: 100px; margin-bottom: 25px">
            <p>Chưa có sản phẩm nào trong giỏ hàng của bạn</p>
        </div>
    <?php } else { ?>
        <div class="viewcart">
            <div style="display: block; width: 100%">
                <?php
                $total_price = 0;
                $id_code_discount = $id_code_discount;
                $discount = $discount;
                $fee = 50000;
                foreach ($load_card as $card) :
                    extract($card);
                    $total_price += $price * $quantity;
                ?>
                    <div class="product-category-detail">
                        <div class="field-img">
                            <img src="<?= "assets/img/products/" . $image_product; ?>" alt="" class="image">
                        </div>
                        <div class="box" style="display: flex; justify-content: space-between; width: 100%; margin-left: 15px"> 
                            <div class="content">
                                <div class="field-content">
                                    <h4><?= $name_product ?></h4>
                                    <p class="size">Size: <?= $name_size ?></p>
                                    <p class="price"><?= number_format($price) . " VNĐ" ?></p>
                                </div>
                            </div>
                            <div class="qty">
                                <!-- <div class="q-inner">
                                <button class="btn-minute" type="button" disabled>-</button>
                                <span name="number" class="number"><?= $quantity ?></span>
                                <input type="hidden" value="" name="quantity" id="quantityPro">
                                <button class="btn-plus" type="button">+</button>
                            </div> -->
                                <div class="icon-delete">
                                    <a href="index.php?act=delcart&id_cart=<?= $id_cart ?>" onclick="return confirm('Bạn có xác nhận xóa ?')">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="field-note">
                <form action="" method="post">
                    <span class="field-text">
                        <p class="name">Bạn có Mã giảm giá?</p>
                        <input type="text" name="code_discount" placeholder="Mã giảm giá*" class="vorcher">
                        <input type="submit" name="btn_code_discount" id="" value="Áp dụng" class="sbvocher">
                        <hr>
                    </span>
                </form>
                <ul class="list-options" style="padding: 0;">
                    <li>
                        <div class="pr-name">Tổng đơn hàng</div>
                        <div class="pr-price">
                            <?= number_format($total_price) ?>đ
                        </div>
                    </li>
                    <li>
                        <div class="pr-name">Phí vận chuyển</div>
                        <div class="pr-price">
                            <?= number_format($fee); ?>đ
                        </div>
                    </li>
                    <li>
                        <div class="pr-name">Giảm giá</div>
                        <div class="pr-price">
                            <?php $discount_price = (($discount / 100) * $total_price);
                            echo number_format($discount_price) ?>đ
                        </div>
                    </li>
                    <li style="font-weight: bold;">
                        <div class="pr-name">Tổng thanh toán</div>
                        <div class="pr-price">
                            <?php $total_amount = ($total_price + $fee) - $discount_price;
                            echo number_format($total_amount) ?>đ
                        </div>
                    </li>
                </ul>
                <hr>
                <form action="?act=pay" method="post" enctype="multipart/form-data">
                    <div class="pay">
                        <input type="hidden" name="discount" value="<?= $discount_price ?>">
                        <input type="hidden" name="id_code_discount" value="<?= $id_code_discount ?>">
                        <a class="pay"><input type="submit" name="bill" id="" value="Thanh toán" class="tt"></a>
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get relevant elements
        var minusButtons = document.querySelectorAll('.btn-minute');
        var plusButtons = document.querySelectorAll('.btn-plus');
        var quantityElements = document.querySelectorAll('.number');
        var quantityPros = document.querySelectorAll('#quantityPro');

        // Initial quantity value
        var initialQuantity = 0;
        // Function to update the quantity and enable/disable buttons
        function updateQuantity(index) {
            initialQuantity = quantityElements[index].textContent;
            quantityElements[index].textContent = initialQuantity;
            quantityPros[index].value = initialQuantity;
            minusButtons[index].disabled = (initialQuantity === 1);
        }

        // Event listeners for minus buttons
        minusButtons.forEach(function(button, index) {
            button.addEventListener('click', function() {
                if (initialQuantity > 1) {
                    initialQuantity--;
                    updateQuantity(index);
                }
            });
        });

        // Event listeners for plus buttons
        plusButtons.forEach(function(button, index) {
            button.addEventListener('click', function() {
                initialQuantity++;
                updateQuantity(index);
            });
        });

        // Initial update for all products
        quantityElements.forEach(function(_, index) {
            updateQuantity(index);
        });
    });
</script>