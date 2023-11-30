<link rel="stylesheet" href="./assets/css/styles.user.pay.css">
<main class="mt-20 mb-20 mb-100">
  <h2 class="title-pay">Thanh toán</h2>
  <form action="" method="post">
    <div class="section-pay">
      <div class="box-left">
        <h3>Thông tin đặt hàng</h3>
        <div class="letf-bottom">
          <div class="row mb-20">
            Họ và tên* <br />
            <input type="text" name="fullname" value="<?= $getAccountById['fullname'] ?>" required />
          </div>
          <div class="row mb-20">
            Email* <br />
            <input type="email" name="email" value="<?= $getAccountById['email'] ?>" required />
          </div>
          <div class="row mb-20">
            Số điện thoại* <br />
            <input type="text" name="tel" value="<?= $getAccountById['tel'] ?>" required />
          </div>
          <div class="row mb-20">
            Địa chỉ* <br />
            <input type="text" name="address" value="<?= $getAccountById['address'] ?>" required />
          </div>
          <div class="row mb-20">
            Ghi chú <br />
            <textarea name="notes"></textarea>
          </div>
        </div>
      </div>
      <div class="box-right">
        <h3>Xem lại đơn hàng</h3>
        <div class="right-top">
          <table>
            <tr>
              <th>Tên sản phẩm</th>
              <th>Size</th>
              <th>Số lượng</th>
              <th>Thành tiền</th>
            </tr>
            <?php
            $total_price = 0;
            $discount = $discount;
            $fee = 50000;
            $temp_price = 0;
            foreach ($load_card as $card) {
              extract($card);
              $temp_price = $price * $quantity;
              $total_price += $temp_price;
            ?>
              <tr>
                <td style="text-align: start;">
                  <?= $name_product ?>
                  <input type="hidden" name="id_product" value="">
                </td>
                <td class="color-price">
                  <?= $name_size ?>
                  <input type="hidden" name="id_size" value="">
                </td>
                <td>
                  <?= $quantity ?>
                  <input type="hidden" name="quantity" value="">
                </td>
                <td class="color-price">
                  <?= number_format($temp_price) ?>đ
                  <input type="hidden" name="total_amount_product" value="">
                </td>
              </tr>
            <?php }
            $total_amount = $total_price + $fee - $discount;
            ?>
          </table>
        </div>
        <div class="right-bottom">
          <div class="order-detail">
            <table>
              <tr>
                <th scope="row">Tạm tính</th>
                <td><?= number_format($total_price); ?>đ</td>
              </tr>
              <tr>
                <th scope="row">Phí vận chuyển</th>
                <td><?= number_format($fee); ?>đ</td>
              </tr>
              <tr>
                <th scope="row">Giảm giá</th>
                <td><?= number_format($discount); ?>đ</td>
              </tr>
              <tr>
                <th scope="row">Tổng thanh toán</th>
                <td><?= number_format($total_amount); ?>đ</td>
                <input type="hidden" name="total_amount" value="<?= $total_amount ?>">
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="confirm-oder mt-20">
      <a href="?act=menu" class="letf-confirm">Tiếp tục mua hàng</a>
      <input type="hidden" name="id_code_discount" value="<?= $id_code_discount ?>">
      <input type="submit" name="submit_order" value="Xác nhận mua hàng" class="right-confirm">
    </div>
  </form>
</main>