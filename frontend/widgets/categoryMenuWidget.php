<?php

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use common\models\Category;

class categoryMenuWidget extends Widget
{	
//	public function init(){
//		parent::init();		
//	}
	
	public function run(){
		$listCategory = Category::staticGetTreeCategory(0, 1, "", true);
		
		return $this->render('categoryMenuWidget', [
			'menuItems' => $this->menuParse($listCategory)
		]);
	}
	
	private function menuParse($listMenu) {
		$listItem = array();
		
		foreach ($listMenu as $item) {
			$menu = [
				'url' => ['/product/default/category', 'cateslug' => $item->slug],
			];

			if($item->level === 1) {
				$menu['label'] = '<i class="fa fa-arrow-circle-o-right"></i> <span>'.$item->title.'</span>';
				$menu['options'] = ['class' => 'treeview',];
				$menu['template'] = '<a href="{url}">{label} <i class="fa fa-angle-left pull-right"></i></a>';
			} else {
				$menu['label'] = '<i class="fa fa-long-arrow-right"></i> <span>'.$item->title.'</span>';
			}
			
			if(!empty($item->childrent)) {
				$menu['items'] = $this->menuParse($item->childrent);
			}
			
			$listItem[] = $menu;
		}
		
		return $listItem;
	}
}

