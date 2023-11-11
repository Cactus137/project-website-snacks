  <div class="container-fluid py-4">
    <a class="btn btn-sm btn-info mb-2" href="?action=tables&data=add_category">Thêm danh mục</a>
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Danh mục</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center justify-content-between mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STT</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hình ảnh</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên danh mục</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php for ($i = 0; $i < 9; $i++) : ?>
                    <tr>
                      <td class="text-center p-2" style="width: 25px;">
                        <span>1</span>
                      </td>
                      <td class="text-center p-2" style="width: 300px;">
                        <div>
                          <img src="https://i.pinimg.com/564x/ad/ca/b2/adcab2d2165598c7208bc2105b266c61.jpg" class="rounded" width="100px">
                        </div>
                      </td>
                      <td class=" p-2">
                        <p class="text-sm font-weight-bold mb-0">Burder Italya</p>
                      </td>
                      <td class="align-middle">
                        <div class="d-flex py-5 float-end">
                          <!-- Sửa -->
                          <a name="edit_btn" class="btn bg-secondary btn-sm m-0 mx-1" style="display: flex; align-items: center; justify-content: center;" href="?action=tables&data=edit_category">
                            <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>
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