<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Community Dashboard';
?>


<div class="site-index">
	<div class="jumbotron">
		<h3><?php echo $kpa->Title;?></h4>
		<p><?php echo $kpa->Description;?></p>
	</div>
	<div class="body-content">
		<div class="row">
			<div class="col-sm-12">
				<a class="btn btn-primary" href="<?= Url::to(['site/addgoal','kpa_id'=>$kpa->ID]) ?>">Add Goal</a>
			</div>
		</div>
        <div class="row">
            <?php foreach($goals as $goal) { ?>

                <div class="col-sm-3">
                    <div class="goal">
                        <h4>
                            <?= Html::encode($goal->Title) ?>
                        </h4>
                        <span>
                            <?php if(isset($goal->Description)) {
                                echo Html::encode($goal->Description);
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
                                <a href="<?= Url::to(['site/viewgoal','id'=>$goal->ID]) ?>" class="btn btn-info btn-xs">View</a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-info btn-xs">Edit</a>
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
