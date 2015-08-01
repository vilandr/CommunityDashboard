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
        <p>Goal Weight: <?php echo $goal->Weight;?>%</p>
        <p>Goal Overall Score: <?php echo round($goal->overallScore()) ?></p>
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
                            ?>%
                        </p>
                        <p>
                        KPI Score: <?php 
                            if(isset($kpi->Score)) {
                                echo Html::encode(round($kpi->overallScore()));
                            } else {
                                echo "No Score Set";
                            }
                            ?>
                        </p>
                            <div id="container-speed-<?= $kpi->ID ?>" style="width: 200px; height:200px;margin: 0 auto;"></div>

                        <ul class="ops">
                            <li>
                                <a href="<?= Url::to(['site/viewkpi','id'=>$kpi->ID]) ?>" class="btn btn-info btn-md">View</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['site/editkpi','id'=>$kpi->ID]) ?>" class="btn btn-info btn-md">Edit</a>
                            </li>
                            <li>
                                <button id="deletekpi" class="btn btn-danger btn-xs" type="button" onclick="kpiDeleteDialog(<?= $kpi->ID; ?>,<?= $goal->ID; ?>)">Delete</button>
                            </li>
                        </ul>

                    </div>
                </div>
<script>
    window.addEventListener("DOMContentLoaded", function() {
    createGauge(<?php echo round($kpi->overallScore()) ?>,100,"container-speed-<?= $kpi->ID ?>");
});
</script>

            <?php } ?>
        </div>

    </div>
</div>