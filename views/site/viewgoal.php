<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Community Dashboard';
?>


<div class="site-index">
	<div class="jumbotron">
		<h3><?php echo $goal->Title;?></h4>
		<p><?php echo $goal->Description;?></p>
	</div>
	<div class="body-content">
		<div class="row">
			<div class="col-sm-12">
				<a class="btn btn-primary" href="<?= Url::to(['site/addkpi','goal_id'=>$goal->ID]) ?>">Add KPI</a>
			</div>
		</div>
        <div class="row">
            <?php foreach($kpis as $kpi) { ?>

                <div class="col-sm-3">
                    <div class="kpi">
                        <h4>
                            <?= Html::encode($kpi->Title); ?>
                        </h4>
                        <span>
                            <?php if(isset($kpi->Description)) {
                                echo Html::encode($kpi->Description);
                            } else {
                                echo "No Description";
                            }
                            ?>
                        </span>
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
                                <a href="<?= Url::to(['site/viewkpi','id'=>$kpi->ID]) ?>" class="btn btn-info btn-xs">View</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['site/editkpi','id'=>$kpi->ID]) ?>" class="btn btn-info btn-xs">Edit</a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-danger btn-xs">Delete</a>
                            </li>
                        </ul>

                    </div>
                </div>

            <?php } ?>
        </div>

    </div>
</div>