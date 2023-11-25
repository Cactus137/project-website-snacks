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
            <input type="text" name="fullname" required />
          </div>
          <div class="row mb-20">
            Email* <br />
            <input type="email" name="email" required />
          </div>
          <div class="row mb-20">
            Số điện thoại* <br />
            <input type="text" name="tel" required />
          </div>
          <div class="row mb-20">
            Địa chỉ* <br />
            <input type="text" name="address" required />
          </div>
          <div class="row mb-20">
            Ghi chú <br />
            <textarea name="notes"></textarea>
          </div>
          <!-- <textarea name="post_content" cols="30" rows="10"></textarea> -->
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
              for ($i = 0; $i < 5; $i++) { 
            ?>
            <tr>
              <td style="text-align: start;">
                Italian Beef Burger 
                <input type="hidden" name="id_product" value="">
              </td>
              <td class="color-price">
                M
                <input type="hidden" name="id_size" value="">
              </td>
              <td>
                1
                <input type="hidden" name="quantity" value="">
              </td>
              <td class="color-price">
                50.000đ
                <input type="hidden" name="total_amount_product" value="">
              </td>
            </tr> 
            <?php } ?>
          </table>
        </div>
        <div class="right-bottom">
          <div class="order-detail">
            <div class="total-price">
              <p>Tạm tính</p>
              <p>Phí vận chuyển</p>
              <p>Giảm giá</p>
              <p style="font-weight: 600; font-size: 17px">Tổng thanh toán</p>
            </div>
            <div class="btn-pay">
              <p class="color-price">50.000đ</p>
              <p class="color-price">50.000đ</p>
              <p class="color-price">50.000đ</p>
              <p class="color-price" style="font-weight: 600; font-size: 17px">50.000đ</p>
              <input type="hidden" name="total_amount" value="">
            </div>
          </div> 
        </div>
      </div>
    </div>
    <div class="confirm-oder mt-20">
      <input type="submit" value="Tiếp tục mua hàng" class="letf-confirm">
      <input type="submit" value="Xác nhận mua hàng" class="right-confirm">
    </div>
  </form>
</main>