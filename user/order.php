<link rel="stylesheet" href="./assets/css/styles.user.order.css">

<div class="d-flex justify-content-between">
    <div class="col-md-3 shadow text-center">
        <div class="user">
            <img src="https://i.pinimg.com/736x/bb/02/d9/bb02d9f76bcbc4ac80fc8d162273f5d8.jpg" alt="" style="width: 200px; height: 200px">
            <p class="text-uppercase my-3">Nguyễn Văn A</p>
        </div>
        <div class="status">
            <hr>
            <p>Tất cả</p>
            <hr>
            <p>Đang giao</p>
            <hr>
            <p>Đã giao</p>
            <hr>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row my-5">
            <h4>Đơn hàng của tôi</h4>
        </div>
        <?php for ($i = 0; $i < 3; $i++) : ?>
            <div>
                <div class="row shadow p-3 mb-5 d-flex justify-content-between">
                    <div class="col-3">
                        <img src="https://i.pinimg.com/736x/bb/02/d9/bb02d9f76bcbc4ac80fc8d162273f5d8.jpg" alt="" style="width: 200px; height: 200px">
                    </div>
                    <div class="col-4 p-0">
                        <div class="col">
                            <div class="name fs-4 py-2">Italian Beef Burger</div>
                            <div class="category">Phân loai: Burger</div>
                            <div class="size">Size: M</div>
                            <div class="quantity">x1</div>
                        </div>
                        <div class="col align-text-bottom">
                            <div class="status pt-5 text-success">Cho xac nhan</div>
                        </div>
                    </div>
                    <div class="col-4 align-items-between">
                        <div class="col">
                            <div class="row d-flex justify-content-between">
                                <div class="col text-start">Tong tien hang</div>
                                <div class="col text-end">50.000 VND</div>
                            </div>
                            <div class="row">
                                <div class="col text-start">Tong tien hang</div>
                                <div class="col text-end">50.000 VND</div>
                            </div>
                            <div class="row">
                                <div class="col text-start">Tong tien hang</div>
                                <div class="col text-end">50.000 VND</div>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-between align-items-center mt-5">
                            <div class="col text-start fw-bold">Tong tien hang</div>
                            <div class="col text-end fw-bold">50.000 VND</div>
                        </div>
                        <div class="col text-end text-bottom align-text-bottom mt-5">
                            <a name="" id="" class="btn btn-primary" href="#" role="button">Huy don hang</a>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
            </div>
    </div>
</div>
</section>