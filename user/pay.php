<link rel="stylesheet" href="./assets/css/styles.user.pay.css">
<main class="mt-20 mb-20 mb-100">
        <h2 class="title-pay">Thanh toán</h2>
        <div class="section-pay">
          <div class="box-left">
            <form method="POST">
            <h3>Thông tin đặt hàng</h3>
              <div class="letf-bottom">
                <div class="row mb-20">
                  Họ và tên* <br />
                  <input type="text" name="hoten" required />
                </div>
                <div class="row mb-20">
                  Email* <br />
                  <input type="email" name="email" required />
                </div>
                <div class="row mb-20">
                  Số điện thoại* <br />
                  <input type="number" name="sdt" required />
                </div>
                <div class="row mb-20">
                  Địa chỉ* <br />
                  <input type="text" name="diachi" required />
                </div>
                <div class="row mb-20">
                  Ghi chú <br />
                  <textarea name="ghichu"></textarea>
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
                  <th>Đơn giá</th>
                  <th>Số lượng</th>
                  <th>Thành tiền</th>
                </tr>
                <tr>
                  <td>Italian Beef Burger</td>
                  <td class="color-price">50.000đ</td>
                  <td>1</td>
                  <td class="color-price">50.000đ</td>
                </tr>
                <tr>
                  <td>Italian Beef Burger</td>
                  <td class="color-price">50.000đ</td>
                  <td>1</td>
                  <td class="color-price">50.000đ</td>
                </tr>
              </table>
            </div>
            <div class="right-bottom">
              <div class="order-detail">
                  <div class="total-price">
                    <h4>Tạm tính</h4>
                    <h4>Phí vận chuyển</h4>
                    <h4>Giảm giá</h4>
                  </div>
                <div class="btn-pay">
                    <p class="color-price">50.000đ</p>
                    <p class="color-price">50.000đ</p>
                    <p class="color-price">50.000đ</p>
                </div>
              </div>
            <div class="discount">
              <input type="text" name="" placeholder="Mã giảm giá">
              <input type="submit" value="Áp dụng">
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