<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
$this->title = $metric->Title;
$this->params['breadcrumbs'][] = ['label' => $kpa->Title, 'url' => Url::to(['site/viewkpa','id'=>$kpa->ID])];
$this->params['breadcrumbs'][] = ['label' => $goal->Title, 'url' => Url::to(['site/viewgoal','id'=>$goal->ID])];
$this->params['breadcrumbs'][] = ['label' => $kpi->Title, 'url' => Url::to(['site/viewkpi','id'=>$kpi->ID])];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-index">
    <div class="jumbotron">
        <h3><?php echo $metric->Title;?></h4>
        <p><?php echo $metric->Description;?></p>
        <p>Metric Weight: <?php echo $metric->Weight;?>%</p>
        <span>Metric Current Score: <?php echo $metric->Current;?></span>
        <span>Metric Target Score: <?php echo $metric->Target;?></span>
        <p>Progress: </p>
    </div>

    <div class="body-content">

            
    </div>
</div>