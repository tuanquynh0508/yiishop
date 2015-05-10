<!-- Custom Tabs -->
<div class="nav-tabs-justified custom-tab-primary">
	<ul class="nav nav-tabs margin-bottom">		
		<li class="active"><a href="#tab_1" data-toggle="tab">Sản phẩm mới</a></li>
		<li><a href="#tab_2" data-toggle="tab">Sản phẩm xem nhiều nhất</a></li>
		<li><a href="#tab_3" data-toggle="tab">Sản phẩm khuyến mãi</a></li>
	</ul>
	<div class="tab-content">
		
		<?php if(!empty($newProducts)): ?>
		<div class="tab-pane active" id="tab_1">

			<div class="row">
				
				<?php foreach ($newProducts as $item): ?>
				<div class="col-sm-3 col-lg-3 col-md-3 product-item">					
					<div class="thumbnail">
						<?php if($item->getSalePrice() != 0): ?>
						<div class="sign-sale"><span>Sale</span></div>
						<?php else: ?>
							<?php if($item->is_new == 1): ?>
							<div class="sign-new"><span>New</span></div>
							<?php endif; ?>
						<?php endif; ?>
						<img src="<?= $item->getDefaultImg('m') ?>" height="150" style="height: 150px !important;"/>
						<div class="caption">
							<h4 class="text-center"><a href="<?= Yii::$app->urlManager->createUrl(['product/default/detail', 'slug' => $item->slug]) ?>"><?= $item->title ?></a></h4>
							
							<?php if($item->retail_price == 0): ?>
								<p class="text-center"><strong>Giá bán: <span class="text-red">Liên hệ</strong></p>
							<?php else: ?>
								<?php if($item->getSalePrice() != 0): ?>
								<p class="text-center"><strong>Giá cũ: <span class="text-red" style="text-decoration: line-through;"><?= $item->retail_price ?> <u>đ</u></span></strong></p>
								<p class="text-center"><strong>Giá mới: <span class="text-red"><?= $item->getSalePrice() ?> <u>đ</u></span></strong></p>							
								<?php else: ?>
								<p class="text-center"><strong>Giá bán: <span class="text-red"><?= $item->retail_price ?> <u>đ</u></span></strong></p>
								<?php endif; ?>
							<?php endif; ?>
						</div>
						<div class="button clearfix">
							<a href="<?= Yii::$app->urlManager->createUrl(['error/under-construction']) ?>" class="btn btn-default btn-sm pull-left">
								<i class="fa fa-shopping-cart"></i> Đặt hàng
							</a>
							<a href="<?= Yii::$app->urlManager->createUrl(['product/default/detail', 'slug' => $item->slug]) ?>" class="btn btn-default btn-sm pull-right">
								<i class="fa fa-search"></i> Chi tiết
							</a>
						</div>
					</div>
				</div><!-- /.product-item -->
				<?php endforeach; ?>

			</div>

		</div><!-- /.tab-pane -->
		<?php endif; ?>
		
		<?php if(!empty($popularProduct)): ?>
		<div class="tab-pane" id="tab_2">

			<div class="row">
				
				<?php foreach ($popularProduct as $item): ?>
				<div class="col-sm-3 col-lg-3 col-md-3 product-item">					
					<div class="thumbnail">
						<?php if($item->getSalePrice() != 0): ?>
						<div class="sign-sale"><span>Sale</span></div>
						<?php else: ?>
							<?php if($item->is_new == 1): ?>
							<div class="sign-new"><span>New</span></div>
							<?php endif; ?>
						<?php endif; ?>
						<img src="<?= $item->getDefaultImg('m') ?>" height="150" style="height: 150px !important;"/>
						<div class="caption">
							<h4 class="text-center"><a href="<?= Yii::$app->urlManager->createUrl(['product/default/detail', 'slug' => $item->slug]) ?>"><?= $item->title ?></a></h4>
							
							<?php if($item->retail_price == 0): ?>
								<p class="text-center"><strong>Giá bán: <span class="text-red">Liên hệ</strong></p>
							<?php else: ?>
								<?php if($item->getSalePrice() != 0): ?>
								<p class="text-center"><strong>Giá cũ: <span class="text-red" style="text-decoration: line-through;"><?= $item->retail_price ?> <u>đ</u></span></strong></p>
								<p class="text-center"><strong>Giá mới: <span class="text-red"><?= $item->getSalePrice() ?> <u>đ</u></span></strong></p>							
								<?php else: ?>
								<p class="text-center"><strong>Giá bán: <span class="text-red"><?= $item->retail_price ?> <u>đ</u></span></strong></p>
								<?php endif; ?>
							<?php endif; ?>
						</div>
						<div class="button clearfix">
							<a href="<?= Yii::$app->urlManager->createUrl(['error/under-construction']) ?>" class="btn btn-default btn-sm pull-left">
								<i class="fa fa-shopping-cart"></i> Đặt hàng
							</a>
							<a href="<?= Yii::$app->urlManager->createUrl(['product/default/detail', 'slug' => $item->slug]) ?>" class="btn btn-default btn-sm pull-right">
								<i class="fa fa-search"></i> Chi tiết
							</a>
						</div>
					</div>
				</div><!-- /.product-item -->
				<?php endforeach; ?>

			</div>

		</div><!-- /.tab-pane -->
		<?php endif; ?>
		
		<?php if(!empty($saleProduct)): ?>
		<div class="tab-pane" id="tab_3">

			<div class="row">
				
				<?php foreach ($saleProduct as $item): ?>
				<div class="col-sm-3 col-lg-3 col-md-3 product-item">					
					<div class="thumbnail">
						<?php if($item->getSalePrice() != 0): ?>
						<div class="sign-sale"><span>Sale</span></div>
						<?php else: ?>
							<?php if($item->is_new == 1): ?>
							<div class="sign-new"><span>New</span></div>
							<?php endif; ?>
						<?php endif; ?>
						<img src="<?= $item->getDefaultImg('m') ?>" height="150" style="height: 150px !important;"/>
						<div class="caption">
							<h4 class="text-center"><a href="<?= Yii::$app->urlManager->createUrl(['product/default/detail', 'slug' => $item->slug]) ?>"><?= $item->title ?></a></h4>
							
							<?php if($item->retail_price == 0): ?>
								<p class="text-center"><strong>Giá bán: <span class="text-red">Liên hệ</strong></p>
							<?php else: ?>
								<?php if($item->getSalePrice() != 0): ?>
								<p class="text-center"><strong>Giá cũ: <span class="text-red" style="text-decoration: line-through;"><?= $item->retail_price ?> <u>đ</u></span></strong></p>
								<p class="text-center"><strong>Giá mới: <span class="text-red"><?= $item->getSalePrice() ?> <u>đ</u></span></strong></p>							
								<?php else: ?>
								<p class="text-center"><strong>Giá bán: <span class="text-red"><?= $item->retail_price ?> <u>đ</u></span></strong></p>
								<?php endif; ?>
							<?php endif; ?>
						</div>
						<div class="button clearfix">
							<a href="<?= Yii::$app->urlManager->createUrl(['error/under-construction']) ?>" class="btn btn-default btn-sm pull-left">
								<i class="fa fa-shopping-cart"></i> Đặt hàng
							</a>
							<a href="<?= Yii::$app->urlManager->createUrl(['product/default/detail', 'slug' => $item->slug]) ?>" class="btn btn-default btn-sm pull-right">
								<i class="fa fa-search"></i> Chi tiết
							</a>
						</div>
					</div>
				</div><!-- /.product-item -->
				<?php endforeach; ?>

			</div>

		</div><!-- /.tab-pane -->
		<?php endif; ?>
		
	</div><!-- /.tab-content -->
</div><!-- nav-tabs-custom -->