<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Customers;

class CustomerController extends Controller
{
	 public function actionGetCustomers() {
		$model = new Customers();
		return $model->find()->all();
	 }

}