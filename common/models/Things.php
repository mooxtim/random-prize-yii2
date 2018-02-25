<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "things".
 *
 * @property int $thing_id
 * @property string $name
 * @property int $count
 */
class Things extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'things';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['count'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'thing_id' => Yii::t('app', 'Thing ID'),
            'name' => Yii::t('app', 'Name'),
            'count' => Yii::t('app', 'Count'),
        ];
    }
}
