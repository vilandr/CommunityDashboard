<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
/* @var $this yii\web\View */
$this->title = $goal->Title;

$this->params['breadcrumbs'][] = ['label' => $kpa->Title, 'url' => Url::to(['site/viewkpa','id'=>$kpa->ID])];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="deleteDialog" id="kpidialog-form">
    <span class="glyphicon glyphicon-exclamation-sign"></span>
<p>Are you sure you want to delete this KPI and all of the contents that belong to it? This action can not be undone!</p>

</div>

<div class="site-index">
	<div class="jumbotron">
		<h3><?php echo $goal->Title;?></h4>
		<p><?php echo $goal->Description;?></p>
        <p>Goal Weight: <?php echo $goal->Weight;?></p>
	</div>
	<div class="body-content">
		<div class="row">
			<div class="col-sm-12">
				<a class="btn btn-primary" href="<?= Url::to(['site/addkpi','goal_id'=>$goal->ID]) ?>"><span class="glyphicon glyphicon-plus-sign"></span> Add KPI</a>
			</div>
		</div>
        <div class="row">
            <?php foreach($kpis as $kpi) { ?>

                <div class="col-sm-3">
                    <div class="kpi">
                        <h4>
                            <?= Html::encode($kpi->Title); ?>
                        </h4>
                        <p>
                            <?php if(isset($kpi->Description)) {
                                echo Html::encode($kpi->Description);
                            } else {
                                echo "No Description";
                            }
                            ?>
                        </p>
                        <p>
                        KPI Weight: <?php
                            if(isset($kpi->Weight)) {
                                echo Html::encode($kpi->Weight);
                            } else {
                                echo "No Weight Set";
                            }
                            ?>
                        </p>
                        <ul>
                            <li>
                                <b>KPIs:</b> 5
                            </li>
                            <li>
                                <b>Metrics:</b> 10
                            </li>
                            <li>
                                <b>Metrics:</b> 15
                            </li>
                        </ul>
                        <ul class="ops">
                            <li>
                                <a href="<?= Url::to(['site/viewkpi','id'=>$kpi->ID]) ?>" class="btn btn-info btn-md">View</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['site/editkpi','id'=>$kpi->ID]) ?>" class="btn btn-info btn-md">Edit</a>
                            </li>
                            <li>
                                <button id="deletekpi" class="btn btn-danger btn-xs" type="button" onclick="kpiDeleteDialog(<?= $kpi->ID; ?>)">Delete</button>
                            </li>
                        </ul>

                    </div>
                </div>

            <?php } ?>
        </div>

    </div>
</div>