<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goal".
 *
 * @property integer $id
 * @property string $name
 */

class KPI extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
    */  
    public static function tableName()
    {
        return 'key_performance_indicator';
    }
    /**
     * @inheritdoc
     */
     public function rules()
     {
        return [
        [['Title'], 'string', 'max' =>200],
        [['Description'], 'string', 'max' => 500],
        [['Title', 'Description', 'Goal_ID', 'Weight'], 'required'],
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
            'goal_id' => 'Goal_ID',
            'Weight' => 'Weight',
        ];
    }
    public function calculateProgress() {
        


        return 80;
    }

}