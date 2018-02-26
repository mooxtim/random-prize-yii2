<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Payments;

/**
* PaymentsSearch represents the model behind the search form of `common\models\Payments`.
*/
class PaymentsSearch extends Payments
{
	/**
	* @inheritdoc
	*/
	public function rules()
	{
		return [
			[['payment_id', 'count', 'status', 'prize_id', 'time'], 'integer'],
		];
	}

	/**
	* @inheritdoc
	*/
	public function scenarios()
	{
		// bypass scenarios() implementation in the parent class
		return Model::scenarios();
	}

	/**
	* Creates data provider instance with search query applied
	*
	* @param array $params
	*
	* @return ActiveDataProvider
	*/
	public function search($params)
	{
		$query = Payments::find();

		// add conditions that should always apply here

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		$this->load($params);

		if (!$this->validate()) {
			// uncomment the following line if you do not want to return any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		// grid filtering conditions
		$query->andFilterWhere([
			'payment_id' => $this->payment_id,
			'count' => $this->count,
			'status' => $this->status,
			'prize_id' => $this->prize_id,
			'time' => $this->time,
		]);

		return $dataProvider;
	}
}
