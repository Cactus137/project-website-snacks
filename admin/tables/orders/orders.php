<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Đơn hàng</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center justify-content-between mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STT</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">account</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">date</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Status</th>
                  <th></th>
                </tr>
              
                  <tr>
                    <td class="text-center p-2" style="width: 25px;">
                      <span>1</span>
                    </td>
                    <td class="p-4">
                      <p class="text-sm font-weight-bold mb-0">Burder Italya</p>
                    </td>
                    <td class="text-center p-4">
                      <p class="text-sm font-weight-bold mb-0">Le Van Thanh</p>
                    </td>
                    <td class="text-center p-2">
                      <p class="text-sm font-weight-bold mb-0">14:00 13/07/2024</p>
                    </td>
                    <td class="text-center p-2" style="width: 300px;">
                      <span class="badge badge-sm bg-gradient-success px-3">Đang giao hàng</span>
                    </td>
                    <td class="align-middle" style="width: 250px;">
                      <div class="d-flex py-3 float-end">
                        <!-- Xem chi tiết -->
                        <a name="detail_btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn bg-secondary btn-sm m-0 mx-1" style="display: flex; align-items: center; justify-content: center;" href="">
                          <i class="fa-solid fa-circle-info" style="color: #ffffff;"></i>
                        </a>
                        <!-- Sửa -->
                        <a name="edit_btn" class="btn bg-secondary btn-sm m-0 mx-1" style="display: flex; align-items: center; justify-content: center;" href="?action=tables&data=edit_order">
                          <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                
             
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-scrollable modal-xl">
      <div class="modal-content">
        <div class="text-center modal-header d-flex justify-content-center">
          <h5 class="text-uppercase text-center modal-title d-flex justify-content-center" id="exampleModalLabel">Chi tiết đơn hàng</h5>
        </div>
        <div class="modal-body">
          <div class="row d-flex justify-content-center pt-2 pb-4">
            <!-- Cột bên trái (2/3) -->
            <div class="col-md-8 ps-5">
              <!-- Thông tin sản phẩm  -->
              <div class="row border border-light rounded-3 ps-3 mb-3">
                <table class="table align-items-center justify-content-between mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sản phẩm</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Size</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Số lượng</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Giá</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php for ($i = 0; $i < 2; $i++) : ?>
                      <tr>
                        <td class="p-1 d-flex align-items-center">
                          <img class="border rounded" src="https://i.pinimg.com/564x/ae/2d/65/ae2d65d73a98f127fdc0b320b2482c8b.jpg" alt="" height="50px">
                          <p class="text-sm font-weight-bold mb-0 ps-2">Burder Italya</p>
                        </td>
                        <td class="text-center p-1">
                          <p class="text-sm font-weight-bold mb-0">M</p>
                        </td>
                        <td class="text-center p-1">
                          <p class="text-sm font-weight-bold mb-0">12</p>
                        </td>
                        <td class="text-center p-1">
                          <p class="text-sm font-weight-bold mb-0">50000VND</p>
                        </td>
                      </tr>
                    <?php endfor; ?>
                  </tbody>
                </table>
              </div>
              <!-- Thông tin khách hàng  -->
              <div class="row border border-light rounded-3 px-3">
                <h6 class="text-uppercase text-center modal-title p-3" id="exampleModalLabel">Thông tin khách hàng</h6>
                <table class="table align-items-center justify-content-between mb-0">
                  <tbody>
                    <tr>
                      <th class="text-secondary text-xxs font-weight-bolder opacity-7">Họ và tên</th>
                      <td class="p-2">
                        <p class="text-sm font-weight-bold mb-0 text-end">Burder Italya</p>
                      </td>
                    </tr>
                    <tr>
                      <th class="text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <td class="p-2">
                        <p class="text-sm font-weight-bold mb-0 text-end">M</p>
                      </td>
                    </tr>
                    <tr>
                      <th class="text-secondary text-xxs font-weight-bolder opacity-7">Số điện thoại</th>
                      <td class="p-2">
                        <p class="text-sm font-weight-bold mb-0 text-end">12</p>
                      </td>
                    </tr>
                    <tr>
                      <th class="text-secondary text-xxs font-weight-bolder opacity-7">Địa chỉ</th>
                      <td class="p-2">
                        <p class="text-sm font-weight-bold mb-0 text-end">50000VND</p>
                      </td>
                    </tr>
                    <tr>
                      <th class="text-secondary text-xxs font-weight-bolder opacity-7">Ghi chú đơn hàng </th>
                      <td class="p-2">
                        <p class="text-sm font-weight-bold mb-0 text-end">ABCXYZ Như nào cũng được</p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- Cột bên phải (1/3) -->
            <div class="col-md-4 px-5">
              <div class="row border border-light rounded-3 mb-3">
                <!-- User -->
                <div class="d-flex p-3">
                  <div>
                    <img src="assets/img/team-2.jpg" class="avatar me-3">
                  </div>
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">John Michael</h6>
                  </div>
                </div>
              </div>
              <!-- Hóa đơn -->
              <div class="row border border-light rounded-3 mb-3">
                <table class="table align-items-center justify-content-between mb-0 table-borderless">
                  <tbody>
                    <tr>
                      <th class="text-secondary text-xxs font-weight-bolder opacity-7">Ngày mua hàng</th>
                      <td>
                        <p class="text-sm font-weight-bold mb-0 text-end">13-07-2004</p>
                      </td>
                    </tr>
                    <tr>
                      <th class="text-secondary text-xxs font-weight-bolder opacity-7">Tạm tính</th>
                      <td>
                        <p class="text-sm font-weight-bold mb-0 text-end">M</p>
                      </td>
                    </tr>
                    <tr>
                      <th class="text-secondary text-xxs font-weight-bolder opacity-7">Phí vận chuyển</th>
                      <td>
                        <p class="text-sm font-weight-bold mb-0 text-end">12</p>
                      </td>
                    </tr>
                    <tr>
                      <th class="text-secondary text-xxs font-weight-bolder opacity-7">Giảm giá</th>
                      <td>
                        <p class="text-sm font-weight-bold mb-0 text-end">5000000VND</p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- Tổng thanh toán -->
              <div class="row border border-light rounded-3">
                <table class="table align-items-center justify-content-between mb-0">
                  <tbody>
                    <tr>
                      <th class="text-secondary text-xxs font-weight-bolder opacity-7">Tổng thanh toán</th>
                      <td>
                        <p class="text-sm font-weight-bold mb-0 text-end">100000</p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>