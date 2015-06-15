<?php $this->beginContent('@app/themes/yiishop/layouts/main.php'); ?>

<?php
	if (isset($this->blocks['zone-before-body'])) {
		echo $this->blocks['zone-before-body'];
	}
?>

<div id="bodyWrapper" class="clearfix">
	<div id="twoColumnsLayout" class="clearfix margin-vertical-bottom twoColumnsLayout-Right3Border">
		<div id="leftColumnsLayout" class="grid_12">
			<?php
				if (isset($this->blocks['zone-left-body'])) {
					echo $this->blocks['zone-left-body'];
				}
			?>
		</div><!-- /#leftColumnsLayout -->
		<div id="rightColumnsLayout" class="grid_3">
			<?php
				if (isset($this->blocks['zone-right-body'])) {
					echo $this->blocks['zone-right-body'];
				}
			?>
		</div><!-- /#rightColumnsLayout -->
	</div><!-- /#twoColumnsLayout -->
	<?php echo yii\base\View::render('//partials/infoBottom',array()); ?>
</div><!-- /#bodyWrapper -->

<?php
	if (isset($this->blocks['zone-after-body'])) {
		echo $this->blocks['zone-after-body'];
	}
?>

<?php $this->endContent(); ?>