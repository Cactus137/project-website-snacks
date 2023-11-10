<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Bình luận</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center justify-content-between mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STT</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sản phẩm</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Số lượng bình luận</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mới nhất</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cũ nhất</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php for ($i = 0; $i < 9; $i++) : ?>
                  <tr>
                    <td class="text-center p-2" style="width: 25px;">
                      <span>1</span>
                    </td>
                    <td class="px-4">
                      <p class="text-sm font-weight-bold mb-0">Burder Italya</p>
                    </td>
                    <td class="text-center px-4">
                      <p class="text-sm font-weight-bold mb-0">100</p>
                    </td>
                    <td class="text-center p-2">
                      <p class="text-sm font-weight-bold mb-0">14:00 13/07/2024</p>
                    </td>
                    <td class="text-center p-2">
                      <p class="text-sm font-weight-bold mb-0">14:00 13/07/2024</p>
                    </td>
                    <td class="align-middle" style="width: 250px;">
                      <div class="d-flex py-3 float-end">
                        <!-- Xem chi tiết -->
                        <a name="detail_btn" class="btn bg-secondary btn-sm m-0 mx-1" style="display: flex; align-items: center; justify-content: center;" href="?action=tables&data=comments_detail">
                          <i class="fa-solid fa-circle-info" style="color: #ffffff;"></i>
                        </a> 
                        <!-- Xóa -->
                        <a name="dlt_btn" class="btn btn-danger btn-sm m-0 mx-1" style=" display: flex; align-items: center; justify-content: center;" onclick="return confirm('Bạn có xác nhận xóa ?');" href="#">
                          <i class="fa fa-trash"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                <?php endfor; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>