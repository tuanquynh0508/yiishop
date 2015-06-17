<?php
use yii\widgets\Breadcrumbs;
?>
<nav id="pageBreadcrumb" class="<?= $classCss ?>">
<?= Breadcrumbs::widget([
  'itemTemplate' => '<li>{link}</li>',
  'activeItemTemplate' => '<li class="active"><span>{link}</span></li>',
  'options' => [
    'class' => 'clearfix',
  ],
  'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
</nav>
<div class="clear"></div>