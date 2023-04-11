<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Orders;

class OrdersController extends Controller
{
	 public function actionGetOrders() {
		$model = new Orders();
		return $model->find()->all();
	 }

}