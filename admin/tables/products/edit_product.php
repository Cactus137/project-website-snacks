<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Cập nhật sản phẩm</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row justify-content-center align-items-center h-100 mt-5">
                            <div class="col-12 col-xl-7">
                                <div class="row">
                                    <div class="col-12 mb-4 d-flex align-items-center">
                                        <div class="form-outline w-100">
                                            <label for="name" class="form-label">Tên sản phẩm</label>
                                            <input type="text" name="name" class="form-control form-control-sm" value="" placeholder="" id="name" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 mb-4 d-flex align-items-center">
                                        <div class="form-outline datepicker w-100">
                                            <label for="introduce" class="form-label">Mô tả sản phẩm</label>
                                            <textarea name="introduce" cols="30" rows="3" class="form-control form-control-sm" id="introduce"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">
                                        <label class="form-label select-label">Phân loại</label>
                                        <select name="id_category" class="select form-control form-control-sm">
                                            <option value="0">Người dùng</option>
                                            <option value="1">Admin</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline w-100">
                                            <label class="form-label" for="quantity">Số lượng</label>
                                            <input type="number" id="quantity" name="quantity" value="" placeholder="" class="form-control form-control-sm" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-4 pb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="image">Hình ảnh</label>
                                            <input class="form-control form-control-sm" id="image" name="image" type="file" />
                                        </div>
                                    </div>
                                </div>
                                <div class="button">
                                    <a href="?action=tables&data=products">
                                        <button class="btn btn-secondary" style="background-color: #17c1e8;" type="button" data-bs-dismiss="modal">Hủy</button>
                                    </a>
                                    <button type="submit" name="btn_edit" class="btn"  style="background-color: #17c1e8;">Xác nhận</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>