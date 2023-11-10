<style>
    input[type="text"],
    input[type="password"] {
        border: none;
        border-bottom: 1px solid #585858;
        border-radius: 0;
        box-shadow: none;
    }

    button[type="submit"] {
        border-radius: 100px !important;
        background-color: #FFC501;
        font-size: 20px;
    }
</style>
<section>
    <div class="row d-flex justify-content-between">
        <div class="col-md-5">
            <div class="background-image">
                <img src="assets/img/banners/banner.jpg" alt="">
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-center">
            <div class="col">
                <h2 class="text-uppercase mb-5" style="font-weight: bold;">Đăng nhập tài khoản</h2>
                <form>
                    <div class="mb-3 border-bottom">
                        <input type="text" class="form-control py-2 ps-0" placeholder="Tên đăng nhập*">
                    </div>
                    <div class="mb-3 border-bottom">
                        <input type="password" class="form-control py-2 ps-0" placeholder="Mật khẩu*">
                    </div>
                    <a class="text-decoration-none d-inline float-end text-end w-100" style="color: #585858" href="?act=forgot">Quên mật khẩu?</a>
                    <button type="submit" class="btn my-3 text-white w-100">Đăng nhập</button>
                    <p class="text-center">Bạn chưa có tài khoản? <a class="text-dark fw-bolder" href="?act=login">Đăng ký</a></p>
                </form>
            </div>
        </div>
    </div> 
</section>