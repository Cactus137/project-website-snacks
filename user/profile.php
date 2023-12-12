<section>
    <div class="row d-flex justify-content-between">
        <div class="col-md-12">
            <h3 class="text-uppercase mt-5 mb-2" style="font-weight: bold;">Hồ sơ của tôi</h3>
            <div class="col d-flex align-items-center">
                <div class="col-md-12">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="d-flex gap-5 my-5">
                                <div class="col-3 px-3">
                                    <div class="mb-5 d-flex justify-content-center align-items-center">
                                        <div class="gap-5">
                                            <img width="200px" height="200px" style="background-position: center;" class="rounded-circle object-fit-cover" src="<?= 'assets/img/accounts/' . $getAccountById['avatar'] ?>" id="photo" alt="photo">
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <div class="px-5 py-2 rounded d-flex flex-column align-items-center">
                                            <label for="cover-photo" class="text-center">
                                                <div class="mb-3">
                                                    <span class="badge bg-primary">Chọn ảnh</span>
                                                    <input id="cover-photo" hidden name="avatar" type="file">
                                                </div>
                                                <small class="awc awo axs">Định dạng PNG, JPG</small><br>
                                                <small class="awc awo axs">Dung lượng file tối đa 1MB</small>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8 p-5 bg-white rounded shadow">
                                    <div class="">
                                        <label for="username" class="form-label">Tên đăng nhập</label>
                                        <input type="text" name="username" id="username" class="form-control form-control-sm" value="<?= $getAccountById['username'] ?>">
                                    </div>
                                    <div class="mt-1 mb-3">
                                        <span class="text-danger error col-md-6 mb-4 d-flex align-items-centercol-md-6 mb-4 d-flex align-items-center">
                                            <?php
                                            if (isset($_SESSION['error']['username'])) {
                                                echo $_SESSION['error']['username'];
                                            } else {
                                                echo "";
                                            }
                                            ?>
                                        </span>
                                    </div>
                                    <div class="">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email" class="form-control form-control-sm" value="<?= $getAccountById['email'] ?>">
                                    </div>
                                    <div class="mt-1 mb-3">
                                        <span class="text-danger error col-md-6 mb-4 d-flex align-items-centercol-md-6 mb-4 d-flex align-items-center">
                                            <?php
                                            if (isset($_SESSION['error']['email'])) {
                                                echo $_SESSION['error']['email'];
                                            } else {
                                                echo "";
                                            }
                                            ?>
                                        </span>
                                    </div>
                                    <div class="d-flex gap-5">
                                        <div class="col">
                                            <label for="fullname" class="form-label">Họ và tên</label>
                                            <input type="text" name="fullname" id="fullname" class="form-control form-control-sm" value="<?= $getAccountById['fullname'] ?>">
                                        </div>
                                        <div class="col">
                                            <label for="tel" class="form-label">Số điện thoại</label>
                                            <input type="text" name="tel" id="tel" class="form-control form-control-sm" value="<?= $getAccountById['tel'] ?>">
                                        </div>
                                    </div>
                                    <div class="d-flex mt-1 mb-3 gap-5">
                                        <div class="col">
                                        </div>
                                        <div class="col">
                                            <span class="text-danger error col-md-6 mb-4 d-flex align-items-centercol-md-6 mb-4 d-flex align-items-center">
                                                <?php
                                                if (isset($_SESSION['error']['tel'])) {
                                                    echo $_SESSION['error']['tel'];
                                                } else {
                                                    echo "";
                                                }
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <label for="address" class="form-label">Địa chỉ</label>
                                        <input type="text" name="address" id="address" class="form-control form-control-sm" value="<?= $getAccountById['address'] ?>">
                                    </div>
                                    <hr>
                                    <div class="text-end">
                                        <button type="submit" name="btn_edit" class="btn btn-sm btn-primary">Lưu</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'scroll.php'; ?>