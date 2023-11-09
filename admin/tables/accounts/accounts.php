<div class="container-fluid py-4">
  <a class="btn btn-sm btn-info mb-2" href="?action=tables&data=add_account">Thêm tài khoản</a>
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Người dùng</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên tài khoản</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Họ và tên</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Địa chỉ</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Số điện thoại</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Vai trò</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php for ($i = 0; $i < 9; $i++) : ?>
                  <tr>
                    <td class="text-center" style="width: 15px;">
                      <span>1</span>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">John Michael</h6>
                          <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">Le Van Thanh</p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0 px-3 text-truncate" style="width: 400px;">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Porro autem laboriosam, dignissimos, alias a architecto molestiae saepe repellat accusantium soluta quidem? Odit ea pariatur dolore exercitationem culpa. Nihil magnam, accusantium iusto quis deserunt aut hic perferendis velit necessitatibus veniam. Vitae cupiditate facere praesentium hic culpa delectus. Obcaecati animi voluptatum labore, consectetur dolores officiis cum eveniet voluptatibus molestiae beatae, tenetur aliquid? Obcaecati, rerum quas qui nulla consequatur quod magnam at modi molestiae ducimus non facere perferendis quia officia voluptatum beatae, sunt tempora. Doloribus quis fugiat libero aspernatur, unde accusantium iste nulla exercitationem. Accusantium debitis a ducimus, quo officia distinctio consequuntur numquam!</p>
                    </td>
                    <td class="align-middle">
                      <span class="text-secondary text-xs font-weight-bold  px-3">0123456789</span>
                    </td>
                    <td class="align-middle text-sm">
                      <span class="badge badge-sm bg-gradient-success px-3">User</span>
                    </td>
                    <td class="align-middle d-flex py-4"> 
                      <!-- Sửa -->
                      <a name="edit_btn" class="btn bg-secondary btn-sm m-0 mx-1" style="display: flex; align-items: center; justify-content: center;" href="?action=tables&data=edit_account">
                        <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>
                      </a>
                      <!-- Xóa -->
                      <a name="dlt_btn" class="btn btn-danger btn-sm m-0 mx-1" style=" display: flex; align-items: center; justify-content: center;" onclick="return confirm('Bạn có xác nhận xóa ?');" href="#">
                        <i class="fa fa-trash"></i>
                      </a>
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