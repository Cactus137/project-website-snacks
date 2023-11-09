<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Cập nhật mã giảm giá</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row justify-content-center align-items-center h-100 mt-5">
                            <div class="col-12 col-xl-7">
                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline w-100">
                                            <label for="code_name" class="form-label">Mã giảm giá</label>
                                            <input type="text" name="code_name" class="form-control form-control-sm" value="" placeholder="" id="code_name" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline w-100">
                                            <label class="form-label" for="sale_discount">Discount</label>
                                            <input type="number" min="0" max="100" id="sale_discount" name="sale_discount" value="" placeholder="" class="form-control form-control-sm" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline w-100">
                                            <label for="quantity" class="form-label">Số lượng</label>
                                            <input type="number" name="quantity" class="form-control form-control-sm" value="" placeholder="" id="quantity" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline w-100">
                                            <label class="form-label" for="exp_date">Ngày hết hạn</label>
                                            <input type="datetime-local" id="exp_date" name="exp_date" value="" placeholder="" class="form-control form-control-sm" />
                                        </div>
                                    </div>
                                </div>
                                <div class="button">
                                    <a href="?action=tables&data=discounts_code">
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Hủy</button>
                                    </a>
                                    <button type="submit" name="btn_edit" class="btn btn-primary">Xác nhận</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>