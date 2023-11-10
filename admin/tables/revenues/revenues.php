<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Doanh thu cửa hàng</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="">
                        <form action="" method="post">
                            <div class="row mt-3 px-5">
                                <div class="col-md-4 mb-3">
                                    <label for="startDate" class="form-label">Từ ngày:</label>
                                    <input type="date" class="form-control" id="startDate">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="endDate" class="form-label">Đến ngày:</label>
                                    <input type="date" class="form-control" id="endDate">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="category" class="form-label">Danh mục:</label>
                                    <select class="form-select" id="category">
                                        <option value="">Tất cả</option>
                                        <option value="category1">Danh mục 1</option>
                                        <option value="category2">Danh mục 2</option>
                                        <!-- Thêm các tùy chọn danh mục khác nếu cần -->
                                    </select>
                                </div>
                            </div>
                            <button class="btn ms-5 px-5" style="background-color: #17c1e8;">Lọc</button>
                            <button type="reset" class="btn btn-secondary ms-2 px-4">Mặc định</button>
                        </form>
                    </div>

                    <table class="table align-items-center justify-content-between mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STT</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sản phẩm</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Doanh thu</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < 9; $i++) : ?>
                                <tr>
                                    <td class="text-center p-2" style="width: 25px;">
                                        <span>1</span>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="assets/img/small-logos/logo-spotify.svg" class="me-3" alt="user1" width="70px">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm text-truncate" style="width: 400px;">John Michael Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum debitis ea provident ut iure, quasi optio quam non dignissimos eveniet tempore nobis soluta molestias quo sunt porro ab aliquid deleniti expedita delectus? Deleniti provident voluptatibus odit, suscipit beatae esse libero laborum accusantium accusamus autem eligendi repellendus ea! Laudantium ducimus enim voluptatum quis sit nihil labore dolorum rem laborum asperiores ipsam fugiat dolorem aliquam tempore harum qui quibusdam, totam maxime nulla vero architecto eos ad magni consequuntur. In quibusdam magnam obcaecati tenetur assumenda sequi voluptatibus quia architecto, sapiente quas possimus, ullam ducimus labore minus. Libero repellendus dignissimos cum dolore aliquid quasi.</h6>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="text-center p-2">
                                        <p class="text-sm font-weight-bold mb-0">50.000.000 VNĐ</p>
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