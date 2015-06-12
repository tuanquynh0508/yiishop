<div class="grid_3 dropdown-menu">
  <button type="button" class="btn btn-category dropdown-menu-show"><span>Danh mục sản phẩm</span></button>
  <div class="dropdown-items">
    <ul class="dropdown-menu-item">
    <?php foreach ($categories as $category): ?>
      <li class="active"><a href="#"><?= $category->title ?></a>
        <?php if(!empty($category->childrent)): ?>
        <div class="dropdown-sub-menu-wrapper">
          <div class="dropdown-sub-menu">
            <div class="clearfix">
              <?php foreach ($category->childrent as $categoryLevel2): ?>
              <div class="grid_3">
                <p><a href="#" class="dropdown-sub-menu-lv1"><?= $categoryLevel2->title ?></a></p>
                <?php if(!empty($categoryLevel2->childrent)): ?>
                <?php foreach ($categoryLevel2->childrent as $categoryLevel3): ?>
                <p><a href="#" class="dropdown-sub-menu-lv2"><?= $categoryLevel3->title ?></a></p>
                <?php endforeach; ?>
                <?php endif; ?>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <?php endif; ?>
      </li><!-- /.menu-item -->
    <?php endforeach; ?>
    </ul>
  </div>
</div>