<?php $this->beginContent('@app/themes/cuahangnhua/layouts/main.php'); ?>

<div class="row" id="bodyFirst">
	<div class="col-sm-3 col-lg-3 col-md-3">		
		<?php 
			if (isset($this->blocks['zone-1'])) {
				echo $this->blocks['zone-1'];
			}
		?>
	</div><!-- /.col-sm-2 -->

	<div class="col-sm-9 col-lg-9 col-md-9">
		<?php 
			if (isset($this->blocks['zone-2'])) {
				echo $this->blocks['zone-2'];
			}
		?>
	</div>
</div><!-- /#bodyFirst -->

<?php if (isset($this->blocks['zone-3'])): ?>
<div class="row" id="bodySecond">
	<?= $this->blocks['zone-3'] ?>
</div><!-- /#bodySecond -->
<?php endif; ?>

<?php echo yii\base\View::render('//partials/infoBottom',array()); ?>

<?php $this->endContent(); ?>