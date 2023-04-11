<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Products;

class ProductsController extends Controller
{
	 public function actionGetProducts() {
		$model = new Products();
		return $model->find()->all();
	 }

}