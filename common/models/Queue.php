<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "queue".
 *
 * @property int $queue_id
 * @property int $prize_id
 * @property int $status
 */
class Queue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'queue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prize_id'], 'required'],
            [['prize_id', 'status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'queue_id' => Yii::t('app', 'Queue ID'),
            'prize_id' => Yii::t('app', 'Prize ID'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
