<style>
    section {
        /* height: 100vh; */
    }

    section input[type=text],
    textarea {
        width: 100%;
        margin: 8px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    section input[type=text] {
        height: 30px;
    }

    input.send {
        background-color: #ffc501;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        width: 100%;
        margin-top: 20px;

    }

    textarea {
        resize: none;
    }
</style>
<section>
    <div class="row d-flex justify-content-around my-5">
        <div class="col-7 ">
            <h2>Liên hệ với chúng tôi</h2>
            <p class="title">Hãy liên hệ với chúng tôi bất cứ lúc nào. Chúng tôi sẽ liên hệ lại với bạn ngay khi có thể!</p>
            <form method="post" class="mt-5">
                <div class="mb-3">
                    <label for="">Họ và tên</label>
                    <input type="text" name="username" class="form-control ps-0">
                    <?php
                    if (isset($_SESSION['error']['username'])) {
                        echo '<span class="text-danger mb-5">';
                        echo $_SESSION['error']['username'];
                        echo '</span>';
                    }
                    ?>
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control ps-0">
                    <?php
                    if (isset($_SESSION['error']['email'])) {
                        echo '<span class="text-danger mb-5">';
                        echo $_SESSION['error']['email'];
                        echo '</span>';
                    }
                    ?>
                </div>
                <div class="mb-3">
                    <label for="">Nội dung</label>
                    <textarea name="content" id="" cols="30" rows="10"></textarea>
                    <?php
                    if (isset($_SESSION['error']['content'])) {
                        echo '<span class="text-danger mb-5">';
                        echo $_SESSION['error']['content'];
                        echo '</span>';
                    }
                    ?>
                </div>
                <input type="submit" name="send" value="Gửi" class="send right-confirm">
            </form> 
        </div> 
        <div class="col-4">
            <h2 class="mb-3">Thông tin liên hệ</h2>
            <div class="item-info d-flex">
                <i class="fa-solid fa-location-dot me-2 mt-1"></i>
                <p>Tòa nhà FPT Polytechnic, 13 phố Trịnh Văn Bô, phường Phương Canh, quận Nam Từ Liêm, TP Hà Nội </p>
            </div>
            <div class="item-info d-flex">
                <i class="fa-solid fa-phone me-2 mt-1"></i>
                <p>Điện thoại: +84 123456789</p>
            </div>
            <div class="item-info d-flex">
                <i class="fa-solid fa-envelope me-2 mt-1"></i>
                <p>Email: anhdo13072004@gmail.com</p>
            </div>
            <div class="item-info d-flex">
                <i class="fa-solid fa-clock me-2 mt-1"></i>
                <p>09:00 - 20:00</p>
            </div>
        </div>
</section>