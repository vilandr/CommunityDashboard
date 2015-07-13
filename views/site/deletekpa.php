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

	<div>
		<h4>Are you sure you want to delete <?php echo $kpa->Title;?>?</h4>
		<p>This will remove all of the contents belonging to it.</p>
	</div>
	<a class="btn btn-primary" href="<?= Url::to(['site/deletekpa','id'=>$kpa->ID]) ?>">Delete</a>
	<a class="btn btn-primary" href="/web/?r=site/index">Cancel</a>
</div>