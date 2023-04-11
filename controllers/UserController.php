<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Users;

class UserController extends Controller
{
	 public function actionGetUsers() {
		$model = new Users();
		return $model->find()->all();
	 }
	 public function actionUpdateUser($id, $newvalue) {
		$user = new Users();
		$user->findOne($id);
		$user->setAttribute('login', $newvalue);
		$user->save();
	 }
	 public function actionDeleteUser($id) {
		$user = new Users();
		$search = $user->findOne($id);
		$search->delete();
	 }
	
}
