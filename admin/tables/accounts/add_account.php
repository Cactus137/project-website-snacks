<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Thêm người dùng</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row justify-content-center align-items-center h-100 mt-5">
                            <div class="col-12 col-xl-7">
                                <div class="row">
                                    <div class="col-md-6 mb-2 d-flex align-items-center">
                                        <div class="form-outline w-100">
                                            <label for="username" class="form-label">Tên tài khoản</label>
                                            <input type="text" name="username" class="form-control form-control-sm" value="" placeholder="" id="username" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2 d-flex align-items-center">
                                        <div class="form-outline w-100">
                                            <label class="form-label" for="password">Mật khẩu</label>
                                            <input type="text" id="password" name="password" value="" placeholder="" class="form-control form-control-sm" />
                                        </div>
                                    </div>
                                    <span class="text-danger error col-md-6 mb-4 d-flex align-items-centercol-md-6 mb-4 d-flex align-items-center">
                                        <?php
                                        if ($check_validate['username'] != '') {
                                            echo $check_validate['username'];
                                        } else {
                                            echo "";
                                        }
                                        ?>
                                    </span>
                                    <span class="text-danger error col-md-6 mb-4 d-flex align-items-centercol-md-6 mb-4 d-flex align-items-center">
                                        <?php
                                        if ($check_validate['password'] != '') {
                                            echo $check_validate['password'];
                                        } else {
                                            echo "";
                                        }
                                        ?>
                                    </span>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-2 d-flex align-items-center">
                                        <div class="form-outline w-100">
                                            <label for="fullname" class="form-label">Họ và tên</label>
                                            <input type="text" name="fullname" class="form-control form-control-sm" value="" placeholder="" id="fullname" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2 d-flex align-items-center">
                                        <div class="form-outline w-100">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="text" id="email" name="email" value="" placeholder="" class="form-control form-control-sm" />
                                        </div>
                                    </div>
                                    <span class="text-danger error col-md-6 mb-4 d-flex align-items-centercol-md-6 mb-4 d-flex align-items-center">

                                    </span>
                                    <span class="text-danger error col-md-6 mb-4 d-flex align-items-centercol-md-6 mb-4 d-flex align-items-center">
                                        <?php
                                        if ($check_validate['email'] != '') {
                                            echo $check_validate['email'];
                                        } else {
                                            echo "";
                                        }
                                        ?>
                                    </span>
                                </div>

                                <div class="row">
                                    <div class="col-12 mb-4 d-flex align-items-center">
                                        <div class="form-outline datepicker w-100">
                                            <label for="address" class="form-label">Địa chỉ</label>
                                            <input type="text" id="address" name="address" value="" placeholder="" class="form-control form-control-sm" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-2 pb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="tel">Số điện thoại</label>
                                            <input type="text" id="tel" name="tel" value="" minlength="10" placeholder="" class="form-control form-control-sm" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2 pb-2">
                                        <label class="form-label select-label">Vai trò</label>
                                        <select name="id_role" class="select form-control form-control-sm">
                                            <?php foreach ($getAllRoles as $key => $value) : ?>
                                                <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-2 pb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="avatar">Ảnh đại diện</label>
                                            <input class="form-control form-control-sm" id="avatar" name="avatar" type="file" />
                                        </div>
                                    </div>
                                </div>
                                <div class="button">
                                    <a href="?action=accounts">
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Hủy</button>
                                    </a>
                                    <button type="submit" name="submit" class="btn" style="background-color: #17c1e8;">Xác nhận</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>