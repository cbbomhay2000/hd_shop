<?php
include('db.php');
$output = '';
$sql_select = mysqli_query($conn, "SELECT * FROM shop_items WHERE shop_id = $id ORDER BY id DESC");
if (mysqli_num_rows($sql_select)>0) {
    while ($rows = mysqli_fetch_array($sql_select)) {
        $output .= '
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="images/' .$rows['image']. '" height="184" alt="" />
                        <h2>'.$rows['price'].'</h2>
                        <p>'.$rows['title'].'</p>
                        <a href="#" class="btn btn-default add-to-cart">
                            <i class="fa fa-shopping-cart"></i>
                                Add to cart
                        </a>
                    </div>
                </div>
            </div>
        ';
    }
}

echo $output;
?>