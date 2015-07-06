<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goal".
 *
 * @property integer $id
 * @property string $name
 */

class Goal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
    */  
    public static function tableName()
    {
        return 'goal';
    }
    /**
     * @inheritdoc
     */
     public function rules()
     {
        return [
        [['Title'], 'string', 'max' =>200],
        [['Description'], 'string', 'max' => 500],
        [['Title', 'Description','KPA_ID'], 'required'],
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
            'kpa_id' => 'KPA_ID',
        ];
    }
}