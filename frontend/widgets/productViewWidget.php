<?php

namespace frontend\widgets;

use \Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\web\Session;

use common\models\Product;

class productViewWidget extends Widget
{
    public $productId;

	public function init(){
		parent::init();
	}

	public function run(){
		return $this->render('productView', [
          'products' => $this->getListProduct(),
        ]);
	}

    private function getListProduct() {
        $session = new Session;

        if (!$session->isActive) {
            $session->open();
        }

        // Get from session
        $listProductView = $session->get('list_product_view');

        if(null === $listProductView) {
            return array();
        }

        return Product::find()
            ->where(['in','id',$listProductView])
            ->andWhere('id != :productId', [':productId' => $this->productId])
            ->limit(8)
            ->visible()
            ->all();
    }
}

