<link rel="stylesheet" href="./assets/css/styles.user.home.css">
<main class="mb-5 pb-5" style="width: 100%;">
    <div class="CSSgal">

        <!-- Don't wrap targets in parent -->
        <s id="s1"></s>
        <s id="s2"></s>
        <s id="s3"></s>
        <s id="s4"></s>

        <div class="slider">
            <div style="background:#5b8;">
                <img src="assets/img/banners/banner1.png" alt="">
            </div>
            <div style="background:#85b;">
                <img src="assets/img/banners/banner1.png" alt="">
            </div>
            <div style="background:#e95;">
                <img src="assets/img/banners/banner1.png" alt="">
            </div>
            <div style="background:#e59;">
                <img src="assets/img/banners/banner1.png" alt="">
            </div>
        </div>

        <div class="prevNext">
            <div><a href="#s4"></a><a href="#s2"></a></div>
            <div><a href="#s1"></a><a href="#s3"></a></div>
            <div><a href="#s2"></a><a href="#s4"></a></div>
            <div><a href="#s3"></a><a href="#s1"></a></div>
        </div>

        <div class="bullets">
            <a href="#s1">1</a>
            <a href="#s2">2</a>
            <a href="#s3">3</a>
            <a href="#s4">4</a>
        </div>

    </div>
    <h1>Menu của chúng tôi</h1>
    <div class="wrap-menu mb-10">
        <?php
        foreach ($list_category_home as $category) {
            extract($category);
        ?>
            <div class="menu-item">
                <a href="?act=menu&name=#<?php echo $name_category ?>">
                    <img src="<?php echo 'assets/img/categories/' . $image ?>" alt="">
                </a>
                <a href="?act=menu&name=#<?php echo $name_category ?>">
                    <h3><?php echo $name_category ?></h3>
                </a>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="map mt-5 pt-5">
        <h3 class="mb-5">Địa chỉ cửa hàng</h3>
        <div class="row mt-5">
            <div class="col-md-6">
                <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 300px">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1861.9329802809737!2d105.7458325!3d21.0380486!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455305afd834b%3A0x17268e09af37081e!2sT%C3%B2a%20nh%C3%A0%20FPT%20Polytechnic.!5e0!3m2!1svi!2s!4v1700367362695!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-md-6 text-start">
                <div class="item-info d-flex">
                    <i class="fa-solid fa-location-dot me-2 mt-1"></i>
                    <p>Tòa nhà FPT Polytechnic,13 <br>
                        phố Trịnh Văn Bô, phường<br>
                        Phương Canh, quận Nam Từ<br>
                        Liêm, TP Hà Nội </p>
                </div>
                <div class="item-info d-flex">
                    <i class="fa-solid fa-phone me-2 mt-1"></i>
                    <p>Điện thoại: +84 123456789</p>
                </div>
                <div class="item-info d-flex">
                    <i class="fa-solid fa-envelope me-2 mt-1"></i>
                    <p>Email: fastfood@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
</main>