<div class="col-md-3">
    <div class="blog-sidebar">
        <div class="block">
            <h4>Danh mục sản phẩm</h4>
            <div class="list-group">
                <?php
                include_once ROOT.'data\food_list.php';
                foreach($list_cate as $category) {
                    echo '
								<a href="../controllers/productsController.php?item=' . $category->getId() . '	" class="list-group-item">
									<i class="fa  fa-dot-circle-o"></i>
									' . $category->getCategory_name() . '
								</a>';
                } ?>
            </div>
        </div> <!-- End of /.block -->
        <div class="block">
            <img src="assests/images/food-ad.png" alt="">
        </div>
        <div class="block">
        </div>
        <div class="block">
            <h4>Food Tag</h4>
            <div class="tag-link">
                <a href="">MUA SẮM</a>
                <a href="">THỨC ĂN</a>
                <a href="">CHẤT LƯỢNG</a>
                <a href="">ĐỒ UỐNG</a>
                <a href="">CỬA HÀNG</a>
                <a href="">NHANH</a>
            </div>
        </div>
    </div> <!-- End of /.col-md-3 -->
</div> <!-- End of /.row -->