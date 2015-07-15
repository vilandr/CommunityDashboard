<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
$this->title = 'Community Dashboard';
?>

<ol class="breadcrumb">
  <li><a href="/web/?r=site/index">Home</a></li>
  <li class="active"> <?php echo $metric->Title;?> </a></li>
</ol>
<div class="site-index">
    <div class="jumbotron">
        <h3><?php echo $metric->Title;?></h4>
        <p><?php echo $metric->Description;?></p>
        <p>Metric Weight: <?php echo $metric->Weight;?></p>
        <span>Metric Current Score: <?php echo $metric->Current;?></span>
        <span>Metric Target Score: <?php echo $metric->Target;?></span>
        <p>Progress: <?php echo $progress ?>% to our goal</p>
    </div>

    <div class="body-content">

            
    </div>
</div>