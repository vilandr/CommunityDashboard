<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
/* @var $this yii\web\View */
$this->title = 'Community Dashboard';

?>
<div id="metricdialog-form">
    
<p>Are you sure you want to delete this Metric and all of the contents that belong to it? This action can not be undone!</p>

</div>
<ol class="breadcrumb">
  <li><a href="/web/?r=site/index">Home</a></li>
  <li class="active"> <?php echo $kpi->Title;?> </a></li>
</ol>

<div class="site-index">
    <div class="jumbotron">
        <h3><?php echo $kpi->Title;?></h4>
        <p><?php echo $kpi->Description;?></p>
        <p>KPI Weight: <?php echo $kpi->Weight;?></p>
    </div>
    <div class="body-content">
        <div class="row">
            <div class="col-sm-12">
                <a class="btn btn-primary" href="<?= Url::to(['site/addmetric','kpi_id'=>$kpi->ID]) ?>">Add Metric</a>
            </div>
        </div>
        <div class="row">
            <?php foreach($metrics as $metric) { ?>

                <div class="col-sm-3">
                    <div class="kpi">
                        <h4>
                            <?= Html::encode($metric->Title) ?>
                        </h4>
                        <p>
                            <?php if(isset($metric->Description)) {
                                echo Html::encode($metric->Description);
                            } else {
                                echo "No Description";
                            }
                            ?>
                        </p>
                        <p>
                        Metric Weight: <?php 
                            if(isset($metric->Weight)) {
                                echo Html::encode($metric->Weight);
                            } else {
                                echo "No Weight Set";
                            }
                            ?>
                        </p>
                        <p> Current Score:<?php
                            if(isset($metric->Current)) {
                                echo Html::encode($metric->Current);
                            } else {
                                echo "No Current Score set";
                            }
                            ?>
                        </p>
                        <p> Target Score:<?php
                            if(isset($metric->Target)) {
                                echo Html::encode($metric->Target);
                            } else {
                                echo "No Target Score set";
                            }
                            ?>
                        </p>
                        <ul class="ops">
                            <li>
                                <a href="<?= Url::to(['site/viewmetric','id'=>$metric->ID]) ?>" class="btn btn-info btn-md">View</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['site/editmetric','id'=>$metric->ID]) ?>" class="btn btn-info btn-md">Edit</a>
                            </li>
                            <li>
                                <button id="deletemetric" class="btn btn-danger btn-xs" type="button" onclick="metricDeleteDialog(<?= $metric->ID; ?>,<?= $kpi->ID ?>)">Delete</button>
                            </li>
                        </ul>

                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</div>