<?php

namespace frontend\controllers;

use Yii;
use common\models\Prizes;

class RandomController extends \yii\web\Controller
{
	public function actionIndex()
	{
		return $this->render('index');
	}
	
	public function actionPrize()
	{
		if (Yii::$app->user->isGuest) {
			return Yii::$app->response->redirect(['site/login']);
		}

		$model = new Prizes();
		$model->user_id = Yii::$app->user->id;
		$model->time = time();

		if ($model->getRandom()) {
			if (!$model->save()) {
				echo 'ERROR!'; exit;
			}
			echo $model->type .' '; 
			echo $model->name .' ';
			echo $model->count .' ';
		}
		
		exit();
		return $this->render('prize');
	}

}
