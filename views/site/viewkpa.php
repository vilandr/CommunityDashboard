<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
/* @var $this yii\web\View */
$this->title = 'Community Dashboard';
?>
<div class="deleteDialog" id="goaldialog-form">
    <span class="glyphicon glyphicon-exclamation-sign"></span>
<p>Are you sure you want to delete this Goal and all of the contents that belong to it? This action can not be undone!</p>

</div>

<ol class="breadcrumb">
  <li><a href="/web/?r=site/index">Home</a></li>
  <li class="active"> <?php echo $kpa->Title;?> </a></li>
</ol>

<div class="site-index">
	<div class="jumbotron">
        
		<h2><?php echo $kpa->Title;?></h2>
        
		<p><?php echo $kpa->Description;?></p>
        
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
                                <a href="<?= Url::to(['site/viewgoal','id'=>$goal->ID]) ?>" class="btn btn-info btn-md">View</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['site/editgoal','id'=>$goal->ID]) ?>" class="btn btn-info btn-md">Edit</a>
                            </li>
                            <li>
                                <button id="deletegoal" class="btn btn-danger btn-xs" type="button" onclick="goalDeleteDialog(<?= $goal->ID; ?>)">Delete</button>
                            </li>
                        </ul>

                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</div>
