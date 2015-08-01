<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
/* @var $this yii\web\View */
$this->title = $kpa->Title;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deleteDialog" id="goaldialog-form">
    <span class="glyphicon glyphicon-exclamation-sign"></span>
<p>Are you sure you want to delete this Goal and all of the contents that belong to it? This action can not be undone!</p>
</div>

<div class="site-index">
	<div class="jumbotron">
        
		<h2><?php echo $kpa->Title;?></h2>
		<p><?php echo $kpa->Description;?></p>
        <p>KPA Overall Score: <?php echo round($kpa->overallScore()) ?></p>
        
	</div>
	<div class="body-content">
		<div class="row">
			<div class="col-sm-12">
				<a class="btn btn-primary" href="<?= Url::to(['site/addgoal','kpa_id'=>$kpa->ID]) ?>"><span class="glyphicon glyphicon-plus-sign"></span> Add Goal</a>
			</div>
		</div>
        <div class="row">
            <?php foreach($goals as $goal) { ?>

                <div class="col-sm-3">
                    <div class="goal">
                        <h4>
                            <?= Html::encode($goal->Title) ?>
                        </h4>
                        <p>
                            <?php if(isset($goal->Description)) {
                                echo Html::encode($goal->Description);
                            } else {
                                echo "No Description";
                            }
                            ?>
                        </p>
                        <p>

                        Goal Weight: <?php 
                            if(isset($goal->Weight)) {
                                echo Html::encode($goal->Weight);
                            } else {
                                echo "No Weight Set";
                            }
                            ?>%
                        </p>
                        <p>
                        Goal Score: <?php 
                            if(isset($goal->Score)) {
                                echo Html::encode(round($goal->overallScore()));
                            } else {
                                echo "No Score Set";
                            }
                            ?>
                        </p>
                            <div id="container-speed-<?= $goal->ID ?>" style="width: 200px; height:200px;margin: 0 auto;"></div>
                        <ul class="ops">
                            <li>
                                <a href="<?= Url::to(['site/viewgoal','id'=>$goal->ID]) ?>" class="btn btn-info btn-md">View</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['site/editgoal','id'=>$goal->ID]) ?>" class="btn btn-info btn-md">Edit</a>
                            </li>
                            <li>
                                <button id="deletegoal" class="btn btn-danger btn-xs" type="button" onclick="goalDeleteDialog(<?= $goal->ID; ?>,<?= $kpa->ID; ?>)">Delete</button>
                            </li>
                        </ul>

                    </div>
                </div>
<script>
    window.addEventListener("DOMContentLoaded", function() {
    createGauge(<?php echo round($goal->overallScore()) ?>,100,"container-speed-<?= $goal->ID ?>");
});
</script>
            <?php } ?>
        </div>
    </div>
</div>
