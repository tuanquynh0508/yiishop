<?php

namespace backend\components;

use yii\grid\GridView;
use yii\helpers\Html;

class CGridView extends GridView {

	/**
	 * @inheritdoc
	 */
	public function renderTableHeader() {
		$cells = [];
		foreach ($this->columns as $column) {
			/* @var $column Column */
			$cell = $column->renderHeaderCell();
			$cell = str_replace('<th><a class="asc"', '<th class="sorting_asc"><a class="asc"', $cell);
			$cell = str_replace('<th><a class="desc"', '<th class="sorting_desc"><a class="desc"', $cell);
			$cell = str_replace('<th><a href=', '<th class="sorting"><a href=', $cell);
			$cells[] = $cell;
		}

		$content = Html::tag('tr', implode('', $cells), $this->headerRowOptions);
		if ($this->filterPosition == self::FILTER_POS_HEADER) {
			$content = $this->renderFilters() . $content;
		} elseif ($this->filterPosition == self::FILTER_POS_BODY) {
			$content .= $this->renderFilters();
		}

		return "<thead>\n" . $content . "\n</thead>";
	}

}
