<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
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
    public function overallScore() {
        
        $total = 0;

        $goals = Goal::find()
            ->where(['KPA_ID'=>$this->ID])
            ->all();

        foreach ($goals as $goal) {
            $total += ($goal->Weight * $goal->overallScore()) / 100;
        }
        return $total;
    }

}
