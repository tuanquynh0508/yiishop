<?php if(!empty($products)): ?>
<div class="box-1 margin-vertical-high-bottom">
  <div class="box-1-head"><h2>Sản phẩm vừa xem</h2></div>
  <div class="clear"></div>
  <div class="box-1-body clearfix">

    <div class="categories-product categories-product-for-cate">
      <div class="categories-product-list">
        <div class="clearfix">
        <?php
          foreach ($products as $item) {
            echo yii\base\View::render('//partials/productItem',array('product' => $item));
          }
        ?>
        </div>
      </div><!-- /.categories-product-list -->
    </div><!-- /.category-product-item -->

  </div>
</div><!-- /.box-1 -->
<?php endif; ?>