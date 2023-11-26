<link rel="stylesheet" href="./assets/css/styles.user.product_detail.css">
<section>
    <form action="" method="post" enctype="multipart/form-data">
        <main class="main">
            <div class="product-detail">
                <div class="product">
                    <div class="file-img">
                        <img src="assets/img/products/burge.jpg" alt="" class="image">
                    </div>
                    <div class="content">
                        <div class="file-content">
                            <h4>Italian Beef Burger</h4>

                            <p class="price">50.000VND</p>
                            <p class="conect">There are many variations of passages of lorem Ipum available theresu anything embarrassing It’s a long established fact that a reader will be looking at its layout.
                                <br>
                                <br>
                                There are many variations of passages of lorem Ipum available theresu anything embarrassing It’s
                            </p>
                        </div>
                        <div class="table-size">
                            <div class="size-name">
                                <p class="name-size">Size</p>
                            </div>
                            <input type="radio" name="exp" id="1">
                            <label for="1">S</label>
                            <input type="radio" name="exp" id="2">
                            <label for="2">M</label>
                            <input type="radio" name="exp" id="3">
                            <label for="3">L</label>
                        </div>
                        <div class="qty">
                            <div class="q-inner">
                                <button class="btn-minute" type="button" disabled>-</button>
                                <span class="number">1</span>
                                <button class="btn-plus" type="button">+</button>
                            </div>
                            <div class="add">
                               <input type="submit" name="addtocart" value="Thêm vào giỏ hàng" class="add-pro"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <h4>Bình luận(3)</h4>
                    <hr>
                    <div class="user-comment">
                        <div class="img-user">
                            <img src="assets/img/accounts/profile.jpg" alt="" class="img">
                            <span class="text-comment">
                                <p class="name-user">Ryan</p>
                                <p>15/03/2023</p>
                                <p>There are many variations of passages of lorem Ipum available theresu anything embarrassing It’s a long established fact that a reader will be looking at its layout. </p>
                            </span>
                        </div>
                        <div class="add-comment">
                            <input type="text" name="" id="" placeholder="Viết bình luận..." class="text-1">
                            <input type="submit" name="" id="" value="Đăng bình luận" class="sb-comment">
                        </div>
                    </div>
                </div>
                <div class="related-products">
                    <h4 class="pro-cx">Sản phẩm liên quan</h4>
                    <div class="sum-relad">
                        <div class="related">
                            <div class="relad-img">
                                <img src="assets/img/products/burge.jpg" alt="" class="rel-img">
                            </div>
                            <div class="text-relad">
                                <p class="title-product">Italian Beef Burger</p>
                                <p>Italian Beef Burger</p>
                                <p class="prices">50.000VND</p>
                            </div>
                        </div> 
                        <div class="related">
                            <div class="relad-img">
                                <img src="assets/img/products/burge.jpg" alt="" class="rel-img">
                            </div>
                            <div class="text-relad">
                                <p class="title-product">Italian Beef Burger</p>
                                <p>Italian Beef Burger</p>
                                <p class="prices">50.000VND</p>
                            </div>
                        </div>
                        <div class="related">
                            <div class="relad-img">
                                <img src="assets/img/products/burge.jpg" alt="" class="rel-img">
                            </div>
                            <div class="text-relad">
                                <p class="title-product">Italian Beef Burger</p>
                                <p>Italian Beef Burger</p>
                                <p class="prices">50.000VND</p>
                            </div>
                        </div>
                        <div class="related">
                            <div class="relad-img">
                                <img src="assets/img/products/burge.jpg" alt="" class="rel-img">
                            </div>
                            <div class="text-relad">
                                <p class="title-product">Italian Beef Burger</p>
                                <p>Italian Beef Burger</p>
                                <p class="prices">50.000VND</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </form>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get relevant elements
        var minusButton = document.querySelector('.btn-minute');
        var plusButton = document.querySelector('.btn-plus');
        var quantityElement = document.querySelector('.number');

        // Initial quantity value
        var quantity = 1;

        // Function to update the quantity and enable/disable buttons
        function updateQuantity() {
            quantityElement.textContent = quantity;
            minusButton.disabled = (quantity === 1);
            plusButton.disabled = false; // Enable the plus button, you might want to add conditions here
        }

        // Event listener for the minus button
        minusButton.addEventListener('click', function() {
            if (quantity > 1) {
                quantity--;
                updateQuantity();
            }
        });

        // Event listener for the plus button
        plusButton.addEventListener('click', function() {
            quantity++;
            updateQuantity();
        });

        // Initial update
        updateQuantity();
    });
</script>