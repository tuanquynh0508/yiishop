<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>

use Yii;
use yii\helpers\Html;
use <?= $generator->indexWidgetType === 'grid' ? "backend\\components\\CGridView" : "yii\\widgets\\ListView" ?>;

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;

$baseUrl = Yii::$app->request->baseUrl;
$this->registerCssFile($baseUrl . '/adminlte/plugins/datatables/dataTables.bootstrap.css', ['depends' => [\backend\assets\AdminlteAsset::className()]]);
?>
<!-- Main content -->
<section class="content">
	<!-- ====================================== -->
	<?= "<?php " ?> echo yii\base\View::render('//partials/flashMessage', array()); ?>
	
	<div class="box box-primary">
        <div class="box-header">
			<h3 class="box-title"><?= "<?= " ?> Html::encode($this->title) ?></h3>
			<div class="box-tools">
				<?= "<?= " ?> Html::a('<i class="fa fa-plus"></i> ' . <?= $generator->generateString('Add New')?>, ['create'], ['class' => 'btn btn-block btn-success btn-sm']) ?>
			</div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body no-padding">

			<?php if ($generator->indexWidgetType === 'grid'): ?>
    <?= "<?= " ?>CGridView::widget([
        'dataProvider' => $dataProvider,
        <?= !empty($generator->searchModelClass) ? "'filterModel' => \$searchModel,\n        'columns' => [\n" : "'columns' => [\n"; ?>
            ['class' => 'yii\grid\SerialColumn'],

<?php
$count = 0;
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        if (++$count < 6) {
            echo "            '" . $name . "',\n";
        } else {
            echo "            // '" . $name . "',\n";
        }
    }
} else {
    foreach ($tableSchema->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        if (++$count < 6) {
            echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        } else {
            echo "            // '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        }
    }
}
?>

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php else: ?>
    <?= "<?= " ?>ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
        },
    ]) ?>
<?php endif; ?>

		</div><!-- /.box-body -->
	</div><!-- /.box -->
	<!-- ====================================== -->
</section><!-- /.content -->