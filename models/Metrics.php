<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goal".
 *
 * @property integer $id
 * @property string $name
 */

class Metrics extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
    */  
    public static function tableName()
    {
        return 'metric';
    }
    /**
     * @inheritdoc
     */
     public function rules()
     {
        return [
        [['Title'], 'string', 'max' =>200],
        [['Description'], 'string', 'max' => 500],
        [['Title', 'Description', 'KPI_ID', 'Weight', 'Target', 'Current'], 'required'],
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
            'kpi_id' => 'KPI_ID',
            'Weight' => 'Weight',
            'Target' => 'Target Score',
            'Current' => 'Current Score',
        ];
    }

    public function calculateProgressWidth() {

        if ($this->Target == 0) {
            return 1;
        }
        return $this->Current / $this->Target;
    }

    public function calculateProgressPercent() {
        if ($this->Target == 0) {
            echo "N/A";
            
        } else {
            echo round(($this->Current / $this->Target) * 100) . "%";
        }
    }

    public function progressStatus() {

        if ($this->Target > 0) {
            $progress = $this->Current / $this->Target;
        } else {
            return "info";
        }
        if( $progress <= .25)
            return "danger";
        else if( $progress <= .50)
            return "warning";
        else if( $progress > .50)
            return "success";
        }

}














