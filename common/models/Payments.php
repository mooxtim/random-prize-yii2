<?php

namespace common\models;

use Yii;

/**
* This is the model class for table "payments".
*
* @property int $payment_id
* @property int $count
* @property int $status
* @property int $prize_id
* @property int $user_id
* @property int $time
*/
class Payments extends \yii\db\ActiveRecord
{
	public function sendToBank()
	{
// 		sleep(1);
		// request to bank api
		if (!true) {
			return false;
		}
		$this->status = 1;
		$this->save();
		return true;
	}
	
	/**
	* @inheritdoc
	*/
	public static function tableName()
	{
		return 'payments';
	}

	/**
	* @inheritdoc
	*/
	public function rules()
	{
		return [
			[['count', 'prize_id', 'time'], 'required'],
			[['count', 'status', 'prize_id', 'time'], 'integer'],
		];
	}

	/**
	* @inheritdoc
	*/
	public function attributeLabels()
	{
		return [
			'payment_id' => Yii::t('app', 'Payment ID'),
			'count' => Yii::t('app', 'Count'),
			'status' => Yii::t('app', 'Status'),
			'prize_id' => Yii::t('app', 'Prize ID'),
			'time' => Yii::t('app', 'Time'),
		];
	}
}
