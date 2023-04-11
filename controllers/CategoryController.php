<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Category;

class CategoryController extends Controller
{
	 public function actionGetCategory() {
		$model = new Category();
		return $model->find()->all();
	 }

}