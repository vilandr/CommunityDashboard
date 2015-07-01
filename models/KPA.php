<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kpa".
 *
 * @property integer $id
 * @property string $name
 */
class KPA extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'key_performance_area';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Title'], 'string', 'max' => 200],
            [['Description'], 'string', 'max' => 500],
            [['Title','Description'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Title' => 'Title',
            'Description' => 'Description',
        ];
    }
}
