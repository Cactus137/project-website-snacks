<link rel="stylesheet" href="./assets/css/styles.user.products.css">
<section class="mt-20">
    <div class="section-product">

        <div class="wrap-list-products" id="">
            <div class="title-category">
                <h2>SẢN PHẨM BẠN CẦN TÌM ?</h2>
            </div>
            <div class="list-products">
                <?php
                    foreach ($list_search_products as $products) {
                        extract($products);
                        // echo '<pre>';
                        // print_r($products);
                        // echo '</pre>';
                ?>
                        <div class="item-product">
                            <a href="?act=product_detail&id=<?php echo $id_product ?>"><img src="<?php echo 'assets/img/products/' . $image ?>" alt="" /></a>
                            <div class="info mt-20">
                                <a href="?act=product_detail&id=<?php echo $id_product ?>">
                                    <h4 class="mb-10"><?php echo $name ?></h4>
                                </a>
                                <p><?php echo number_format($price) ?>VND</p>
                            </div>
                        </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>

    </div>
</section>