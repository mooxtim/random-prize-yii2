<?php

namespace console\controllers;

use Yii;
use common\models\Prizes;

class TestController extends \yii\console\Controller
{
	public function actionIndex()
	{
		echo 'Use test/convert-money' . PHP_EOL;
	}
	public function actionConvertMoney()
	{
		$model = new Prizes();
		
		echo 'Test for empty count';
		$model->type = 'money';
		$model->count = 0;
		Yii::$app->params['ratioMoneyToPoints'] = 10;
		$model->convertMoneyToPoints();
		if ($model->receivedPoints === false) {
			echo ' - OK' . PHP_EOL;
		} else {
			echo ' - FAIL' . PHP_EOL;
		}

		echo 'Test for type prize';
		$model->type = 'points';
		$model->count = 1000;
		Yii::$app->params['ratioMoneyToPoints'] = 10;
		$model->convertMoneyToPoints();
		if ($model->receivedPoints === false) {
			echo ' - OK' . PHP_EOL;
		} else {
			echo ' - FAIL' . PHP_EOL;
		}

		echo 'Test for wrong ratioMoneyToPoints';
		$model->type = 'money';
		$model->count = 1000;
		Yii::$app->params['ratioMoneyToPoints'] = 'test';
		$model->convertMoneyToPoints();
		if ($model->receivedPoints === false) {
			echo ' - OK' . PHP_EOL;
		} else {
			echo ' - FAIL' . PHP_EOL;
		}

		echo 'Complete.' . PHP_EOL;
		
	}

}
















