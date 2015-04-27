<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">

	<?php  echo yii\base\View::render('//partials/flashMessage', array()); ?>

	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title"><?=  Html::encode($this->title) ?></h3>
		</div><!-- /.box-header -->
		<div class="box-body">

			<div class="row">
				<div class="col-sm-3">
					<p><img class="img-thumbnail" src="<?= $model->getDefaultImg('m') ?>"/></p>
					<?php
						foreach($model->inputImgs as $key => $img):
						if($img->default) {
							continue;
						}
					?>
					<img src="<?= Yii::getAlias('@img_path/product/'.Yii::$app->params['upload_var']['small']['prefix'].'/').$img->file ?>" height="50" width="50"/>
					<?php endforeach; ?>
				</div>
				<div class="col-sm-9">
					<p>
						<strong>Mã hàng:</strong> <?= $model->upc ?> |
						<strong>Kho:</strong> <span class="text-danger"><?= ($model->out_of_stock==0)?'Còn hàng':'Hết hàng' ?></span> |
						<?php
							if ($model->is_new == 1) {
								echo  '<span class="label label-primary">Hàng mới</span>&nbsp;';
							}
							if ($model->is_special == 1) {
								echo '<span class="label label-warning">Đặc biệt</span>';
							}
						?>
					</p>
					<hr/>
					<strong>Danh mục:</strong>
					<?php
						$arrayCategory = array();
						$sperator = ", ";
						foreach ($model->categories as $category) {
							$arrayCategory[] = $category->title;
						}
						echo implode($sperator, $arrayCategory);
					?>
					<hr/>
					<p>
						<strong>Slug:</strong> <?= $model->slug ?>
					</p>
					<p>
						<strong>Giá gốc:</strong> <?= $model->cost ?> |
						<strong>Giá buôn:</strong> <?= $model->wholesale_prices ?> |
						<strong>Giá bán lẻ:</strong> <?= $model->retail_price ?> |
						<strong>Áp dụng giảm giá:</strong> <?= $model->sales[0]->title ?> (<?= $model->sales[0]->sale ?>%)
					</p>
					<p><strong>Số lượng:</strong> <?= $model->quantity ?></p>

					<?php
						$listOptions = $model->getListOptionsGroup();
						if(!empty($listOptions->group)):
						foreach ($listOptions->group as $optionGroup):
					?>
					<p>
						<strong><?= $optionGroup->title ?>:</strong>
						<?php
							$arrayOption = array();
							$sperator = ", ";
							foreach ($listOptions->options[$optionGroup->id] as $option) {
								if($optionGroup->option_type == 'color') {
									$arrayOption[] = '<i class="fa fa-square fa-lg" style="color:'.$option->title.';"></i> &nbsp;';
									$sperator = "";
								} else {
									$arrayOption[] = $option->title.' '.$listOptions->values[$optionGroup->id.'-'.$option->id];
								}
							}
							echo implode($sperator, $arrayOption);
						?>
					</p>
					<?php
						endforeach;
						endif;
					?>

					<p><strong>Xuất sứ:</strong> <?= $model->getFullMade() ?></p>
					<p><strong>Lượt xem:</strong> <?= $model->views ?></p>
				</div>
			</div>

			<!-- Custom Tabs (Pulled to the right) -->
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab_1" data-toggle="tab">Mô tả sản phẩm</a></li>
					<li><a href="#tab_2" data-toggle="tab">Đánh giá</a></li>
				</ul>

				<div class="tab-content">
					<div class="tab-pane active" id="tab_1">
						<div class="box-body">
							<?= $model->description ?>
						</div>
					</div><!-- /.tab-pane -->

					<div class="tab-pane" id="tab_2">
						<div class="box-body">

						</div>
					</div><!-- /.tab-pane -->

				</div><!-- /.tab-content -->

			</div><!-- nav-tabs-custom -->

		</div><!-- /.box-body -->
		<div class="box-footer">
			<?=  Html::a('<i class="fa fa-caret-left"></i> ' . Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-default']) ?>
			<?=  Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
			<?= 			Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
				'class' => 'btn btn-danger',
				'data' => [
					'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
					'method' => 'post',
				],
			])
			?>
		</div>
	</div><!-- /.box -->

</section><!-- /.content -->