<?php

namespace common\models;

use Yii;
use common\models\Money;
use common\models\MoneySearch;
use common\models\Things;
use common\models\ThingsSearch;

/**
* This is the model class for table "prizes".
*
* @property int $prize_id
* @property int $time
* @property string $type
* @property int $count
* @property int $user_id
* @property string $name
* @property int $status
* @property int $thing_id
*/
class Prizes extends \yii\db\ActiveRecord
{

	public function getRandom()
	{
		$this->setIsNewRecord(true);
		
		$thing_list = Things::find()->andWhere(['>', 'count', 0])->all();
		$thing_count = count($thing_list);

		$money = Money::find()->andWhere(['id' => 1])->one();
		$money_count = $money->value;

		$types = [];
		if ($thing_count > 0 && $money_count >= Yii::$app->params['points'][1]) {
			$types = [1 => 'points', 2 => 'money', 3 => 'thing'];
		} else if ($thing_count <= 0 && $money_count >= Yii::$app->params['points'][1]) {
			$types = [1 => 'points', 2 => 'money'];
		} else if ($money_count < Yii::$app->params['points'][1]) {
			$types = [1 => 'points', 2 => 'thing'];
		} else {
			$types = [1 => 'points'];
		}

		$st1 = rand(1, count($types));
		$result = [];
		switch ($types[$st1]) {
			case 'points':
				$this->type = $types[$st1];
				$this->count = rand(Yii::$app->params['points'][0], Yii::$app->params['points'][1]);
				break;

			case 'money':
				$min = Yii::$app->params['points'][0];
				$max = Yii::$app->params['points'][1];
				if ($min > $money_count) {
					$min = $money_count;
				}
				if ($max > $money_count) {
					$max = $money_count;
				}

				$this->type = $types[$st1];
				$this->count = rand($min, $max);
				break;

			case 'thing':
				$st2 = rand(1, $thing_count);
				$thing = $thing_list[$st2 - 1];

				$this->type = $types[$st1];
				$this->name = $thing->name;
				$this->thing_id = $thing->thing_id;
				$this->count = 1;
				break;

			default:
				return false;
		}
		return true;
		
	}

	public function afterSave($insert, $changedAttributes)
	{
		parent::afterSave($insert, $changedAttributes);
	
		if ($insert) { 
			if ($this->type == 'money') {
				$model = Money::findOne(1);
				$model->value -= $this->count;
				$model->save();
			}
			
			if ($this->type == 'thing') {
				$model = Things::findOne($this->thing_id);
				$model->count--;
				$model->save();
			}
		}
		
	}

	/**
	* @inheritdoc
	*/
	public static function tableName()
	{
		return 'prizes';
	}

	/**
	* @inheritdoc
	*/
	public function rules()
	{
		return [
			[['time', 'type', 'count', 'user_id'], 'required'],
			[['time', 'count', 'user_id', 'thing_id'], 'integer'],
			[['type'], 'string', 'max' => 50],
			[['name'], 'string', 'max' => 255],
			[['status'], 'string', 'max' => 1],
		];
	}

	/**
	* @inheritdoc
	*/
	public function attributeLabels()
	{
		return [
			'prize_id' => Yii::t('app', 'Prize ID'),
			'time' => Yii::t('app', 'Time'),
			'type' => Yii::t('app', 'Type'),
			'count' => Yii::t('app', 'Count'),
			'user_id' => Yii::t('app', 'User ID'),
			'name' => Yii::t('app', 'Name'),
			'status' => Yii::t('app', 'Status'),
			'thing_id' => Yii::t('app', 'Thing ID'),
		];
	}

}
