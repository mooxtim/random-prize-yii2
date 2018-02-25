<?php

namespace frontend\controllers;

use Yii;
use common\models\Prizes;
use yii\web\NotFoundHttpException;
use yii\web\NotAcceptableHttpException;
use yii\web\ServerErrorHttpException;

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
		}

		return $this->render('prize', ['prize' => $model]);
	}
	
	public function actionTake()
	{
		if (Yii::$app->user->isGuest) {
			return Yii::$app->response->redirect(['site/login']);
		}

		$prize_id = Yii::$app->request->get('id');
		if ( ! $model = Prizes::findOne($prize_id)) {
			throw new NotFoundHttpException('404 Not Found');
		}

		if ($model->status != 0) {
			throw new NotAcceptableHttpException('Already paid or converted');
		}

		if ( ! $model->takePrize()) {
			throw new ServerErrorHttpException('Server Error');
		}

		return $this->render('take', ['prize' => $model]);
	}
	
	public function actionConvert()
	{
		if (Yii::$app->user->isGuest) {
			return Yii::$app->response->redirect(['site/login']);
		}

		$prize_id = Yii::$app->request->get('id');
		if ( ! $model = Prizes::findOne($prize_id)) {
			throw new NotFoundHttpException('404 Not Found');
		}

		if ($model->status != 0) {
			throw new NotAcceptableHttpException('Already paid or converted');
		}

		if ($model->status != 'money') {
			throw new NotAcceptableHttpException('Only money can will been converted');
		}

		if ( ! $model->convertPrize()) {
			throw new ServerErrorHttpException('Server Error');
		}

		return $this->render('convert', ['prize' => $model]);
	}
	
	public function actionRefuse()
	{
		if (Yii::$app->user->isGuest) {
			return Yii::$app->response->redirect(['site/login']);
		}

		$prize_id = Yii::$app->request->get('id');
		if ( ! $model = Prizes::findOne($prize_id)) {
			throw new NotFoundHttpException('404 Not Found');
		}

		if ($model->status != 0) {
			throw new NotAcceptableHttpException('Already paid or converted');
		}

		if ( ! $model->refusePrize()) {
			throw new ServerErrorHttpException('Server Error');
		}

		return $this->render('refuse', ['prize' => $model]);
	}

}
















