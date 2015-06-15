<?php $this->beginContent('@app/themes/yiishop/layouts/main.php'); ?>

<?php
		if (isset($this->blocks['zone-before-body'])) {
			echo $this->blocks['zone-before-body'];
		}
?>

<?php if (isset($this->blocks['zone-body'])): ?>
<div id="bodyWrapper" class="clearfix">
	<?= $this->blocks['zone-body'] ?>
	<?php echo yii\base\View::render('//partials/infoBottom',array()); ?>
</div><!-- /#bodyWrapper -->
<?php endif; ?>

<?php
		if (isset($this->blocks['zone-after-body'])) {
			echo $this->blocks['zone-after-body'];
		}
?>

<?php $this->endContent(); ?>