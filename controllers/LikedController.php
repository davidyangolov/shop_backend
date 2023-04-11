<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Liked;

class LikedController extends Controller
{
	 public function actionGetLiked() {
		$model = new Liked();
		return $model->find()->all();
	 }

}