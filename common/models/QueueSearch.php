<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Queue;

/**
* QueueSearch represents the model behind the search form of `common\models\Queue`.
*/
class QueueSearch extends Queue
{
	/**
	* @inheritdoc
	*/
	public function rules()
	{
		return [
			[['queue_id', 'prize_id', 'status'], 'integer'],
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
		$query = Queue::find();

		// add conditions that should always apply here

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'sort' => [
				'defaultOrder' => [
					'queue_id' => SORT_DESC
				]
			]
		]);

		$this->load($params);

		if (!$this->validate()) {
			// uncomment the following line if you do not want to return any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		// grid filtering conditions
		$query->andFilterWhere([
			'queue_id' => $this->queue_id,
			'prize_id' => $this->prize_id,
			'status' => $this->status,
		]);

		return $dataProvider;
	}
}
