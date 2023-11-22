
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Cập nhật đơn hàng</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <form action="index.php?action=edit_order" method="POST" enctype="multipart/form-data">
                        <div class="row justify-content-center align-items-center h-100 mt-5">
                            <div class="col-12 col-xl-7">
                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline w-100">
                                            <label for="fullname" class="form-label">Họ và tên</label>
                                            <input readonly type="text" name="fullname" class="form-control form-control-sm" value="<?php echo $order['fullname']?>" placeholder="" id="fullname" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline w-100">
                                            <label class="form-label" for="email">Email</label>
                                            <input readonly type="email" id="email" name="email" value="<?=$order['email'] ?>" placeholder="" class="form-control form-control-sm" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="tel">Số điện thoại</label>
                                            <input readonly type="text" id="tel" name="tel" value="<?=$order['tel'] ?>" placeholder="" class="form-control form-control-sm" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">
                                        <label class="form-label select-label">Trạng thái</label>
                                        <select name="id_status" class="select form-control form-control-sm">
                                            <option  value="0" <?=($order['id_status'] == 0)?'selected':'' ?>>Chờ xác nhận</option>
                                            <option value="1"<?=($order['id_status'] == 1)?'selected':'' ?>>Đã xác nhận</option>
                                            <option value="2"<?=($order['id_status'] == 2)?'selected':'' ?>>Đang đóng gói</option>
                                            <option value="3"<?=($order['id_status'] == 3)?'selected':'' ?>>Đang giao hàng</option>
                                            <option value="4"<?=($order['id_status'] == 4)?'selected':'' ?>>Đã giao hàng</option>
                                            <option value="5"<?=($order['id_status'] == 5)?'selected':'' ?>>Đã hủy</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-4 d-flex align-items-center">
                                        <div class="form-outline datepicker w-100">
                                            <label for="address" class="form-label">Địa chỉ</label>
                                            <input readonly type="text" name="address" class="form-control form-control-sm" value="<?=$order['address'] ?>" placeholder="" id="address" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-4 d-flex align-items-center">
                                        <div class="form-outline datepicker w-100">
                                            <label for="notet" class="form-label">Ghi chú</label>
                                            <textarea readonly name="notes" cols="30" rows="3" class="form-control form-control-sm" ><?=$order['notes'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="button">
                                <input type="hidden" name="id_order" id="" value="<?php echo $order['id_order'] ?>">
                                    <a href="index.php?action=orders">
                                    
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Hủy</button>
                                    </a>
                                    <input type="submit" name="btn_edit" class="btn" style="background-color: #17c1e8;" value="Xác nhận">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>