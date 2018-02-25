<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "queue".
 *
 * @property int $queue_id
 * @property int $user_id
 * @property int $thing_id
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
            [['user_id', 'thing_id'], 'required'],
            [['user_id', 'thing_id', 'status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'queue_id' => Yii::t('app', 'Queue ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'thing_id' => Yii::t('app', 'Thing ID'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
