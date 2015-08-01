<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

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
        [['Title', 'Description','KPA_ID', 'Weight'], 'required'],
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
            'Weight' => 'Weight',
        ];
    }
    public function overallScore() {
        
        $total = 0;

        $kpis = KPI::find()
            ->where(['Goal_ID'=>$this->ID])
            ->all();

        foreach ($kpis as $kpi) {
            $total += ($kpi->Weight * $kpi->overallScore()) / 100;
        }
        return $total;
    }

}