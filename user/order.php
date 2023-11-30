<link rel="stylesheet" href="./assets/css/styles.user.order.css">
<style>
    div.category,
    div.size,
    div.quantity,
    div.status,
    div.price_temp {
        font-size: 17px;
    }

    div.price_temp {
        width: 150px;
    }

    div.nav-bar-order {
        height: 100vh;
        background-color: #f9f9f9;
    }

    a.name-status-order {
        color: black;
        font-size: 17px;
        text-decoration: none;
    }

    div.nothing-order {
        margin-top: 100px;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
</style>
<div class="d-flex justify-content-between">
    <div class="col-md-3 shadow text-center nav-bar-order">
        <div class="user mt-5">
            <img width="200px" height="200px" style="background-position: center;" class="rounded-circle object-fit-cover" src="<?= 'assets/img/accounts/' . $_SESSION['user']['avatar']; ?>" id="photo" alt="photo">
            <p class="text-uppercase my-3 text-bold"><?= $_SESSION['user']['username'] ?></p>
        </div>
        <div class="status mt-5">
            <hr>
            <a class="name-status-order" href="index.php?act=order">Tất cả</a>
            <?php
            foreach ($getAllStatusOrder as $status) :
                extract($status);
            ?>
                <hr>
                <a class="name-status-order" href="index.php?act=order&status=<?= $id; ?>"><?= $name; ?></a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row my-5">
            <h4>Đơn hàng của tôi</h4>
        </div>
        <div>
            <?php
            $total_amount = 0;
            $price_product = 0;
            $fee = 50000; 
            foreach ($getOrdersByAccount as $order) :
                $getOrderDetailByAccount = getOrderDetailByAccount($order['id'], $_SESSION['user']['id']);
                extract($order);
                $price_product += ($price * $quantity); 
            ?>
                <div class="row shadow p-3 mb-5" style="border-radius: 12px;">
                    <div class="d-flex justify-content-between mt-1">
                        <div class="col-6 p-0">
                            <?php foreach ($getOrderDetailByAccount as $orderDetail) :
                                extract($orderDetail);
                            ?>
                                <div class="d-flex pb-3">
                                    <div class="col-3">
                                        <img src="<?= 'assets/img/products/' . $image_product ?>" alt="" style="height: 100px">
                                    </div>
                                    <div class="col-9 ms-2 mt-4">
                                        <div class="name pb-2 pt-0"><?= $name_product; ?> - Size: <?= $name_size ?></div>
                                        <div class="quantity">x<?= $quantity; ?> </div>
                                    </div>
                                </div>
                            <?php endforeach;
                            $discount_product = ($discount / 100) * $price_product;
                            $total_amount = $price_product + $fee - $discount_product;
                            ?>
                        </div>
                        <div class="col-1 d-flex justity-content-center align-items-center">
                            <div class="border-end h-100 ms-5" style="width: 2px;"></div>
                        </div>
                        <div class=" col-5 mt-3 align-items-center">
                            <div class="box">
                                <div class="col">
                                    <div class="row d-flex justify-content-between">
                                        <div class="price_temp col text-start">Tổng tiền hàng</div>
                                        <div class="price_temp col text-end"><?= number_format($price_product); ?> VND</div>
                                    </div>
                                    <div class="row">
                                        <div class="price_temp col text-start">Phí vận chuyển</div>
                                        <div class="price_temp col text-end"><?= number_format($fee); ?> VND</div>
                                    </div>
                                    <div class="row">
                                        <div class="price_temp col text-start">Giảm giá</div>
                                        <div class="price_temp col text-end"><?= number_format($discount_product); ?> VND</div>
                                    </div>
                                </div>
                                <div class="col d-flex justify-content-between align-items-center mt-2">
                                    <div class="col text-start fw-bold">Thành tiền</div>
                                    <div class="col text-end fw-bold"><?= number_format($total_amount) ?> VND</div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between my-1">
                        <div class="col align-text-bottom">
                            <div class="status pt-2 mt-1 text-success"><?= $name_status ?></div>
                        </div>
                        <?php
                        if ($id_status == 0) :
                        ?>
                            <div class="col text-end text-bottom align-text-bottom mt-3">
                                <a name="cancel_order" id="cancelOrderBtn" class="btn" style="background-color: #ffc501; color: white" href="?act=cancel_order&id_order=<?= $id_order ?>" role="button" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')">Hủy đơn hàng</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
        if (!$getOrdersByAccount) { ?>
            <div class="nothing-order row">
                <img src="assets/img/checklist.png" alt="" style="width: 100px; margin-bottom: 25px">
                <p>Bạn chưa có đơn hàng nào</p>
            </div>
        <?php } ?>
    </div>
</div>
</section>