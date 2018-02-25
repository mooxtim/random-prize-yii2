<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Prizes;

/**
* PrizesSearch represents the model behind the search form of `common\models\Prizes`.
*/
class PrizesSearch extends Prizes
{
	/**
	* @inheritdoc
	*/
	public function rules()
	{
		return [
			[['prize_id', 'time', 'count', 'user_id', 'thing_id'], 'integer'],
			[['type', 'name', 'status'], 'safe'],
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
		$query = Prizes::find();

		// add conditions that should always apply here

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'sort' => [
				'defaultOrder' => [
					'prize_id' => SORT_DESC
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
			'prize_id' => $this->prize_id,
			'time' => $this->time,
			'count' => $this->count,
			'user_id' => $this->user_id,
			'thing_id' => $this->thing_id,
		]);

		$query->andFilterWhere(['like', 'type', $this->type])
			->andFilterWhere(['like', 'name', $this->name])
			->andFilterWhere(['like', 'status', $this->status]);

		return $dataProvider;
	}
}
