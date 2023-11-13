<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Cập nhật đơn hàng</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row justify-content-center align-items-center h-100 mt-5">
                            <div class="col-12 col-xl-7">
                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline w-100">
                                            <label for="fullname" class="form-label">Họ và tên</label>
                                            <input type="text" name="fullname" class="form-control form-control-sm" value="" placeholder="" id="fullname" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline w-100">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" id="email" name="email" value="" placeholder="" class="form-control form-control-sm" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="tel">Số điện thoại</label>
                                            <input type="text" id="tel" name="tel" value="" placeholder="" class="form-control form-control-sm" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">
                                        <label class="form-label select-label">Trạng thái</label>
                                        <select name="id_role" class="select form-control form-control-sm">
                                            <option value="0">Người dùng</option>
                                            <option value="1">Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-4 d-flex align-items-center">
                                        <div class="form-outline datepicker w-100">
                                            <label for="address" class="form-label">Địa chỉ</label>
                                            <input type="text" name="address" class="form-control form-control-sm" value="" placeholder="" id="address" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-4 d-flex align-items-center">
                                        <div class="form-outline datepicker w-100">
                                            <label for="note" class="form-label">Ghi chú</label>
                                            <textarea name="note" cols="30" rows="3" class="form-control form-control-sm" id="note"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="button">
                                    <a href="?action=tables&data=accounts">
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Hủy</button>
                                    </a>
                                    <button type="submit" name="btn_edit" class="btn" style="background-color: #17c1e8;">Xác nhận</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>