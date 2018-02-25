<?php

namespace console\controllers;

use Yii;
use common\models\Prizes;

class MoneyController extends \yii\console\Controller
{
	public function actionIndex(array $arg)
	{
		$limit = (int)$arg[0];
		$limit = $limit == 0 ? 1 : $limit;
		$prizes = Prizes::find()->andWhere(['status' => 0])->andWhere(['type' => 'money'])->limit($limit)->all();
		foreach($prizes as $one) {
			$one->sendMoney();
			if ($one->status == 1) {
				echo 'Prize ID: ' . $one->prize_id . ' - OK' . PHP_EOL;
			} else {
				echo 'Prize ID: ' . $one->prize_id . ' - FAIL' . PHP_EOL;
			}
		}
		echo 'Complete.' . PHP_EOL;
		
	}

}
















