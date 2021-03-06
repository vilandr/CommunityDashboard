<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;


/* @var $this yii\web\View */
$this->title = 'Community Dashboard';

?>

<div class="deleteDialog" id="kpadialog-form">
    <span class="glyphicon glyphicon-exclamation-sign"></span>
<p>Are you sure you want to delete this KPA and all of the contents that belong to it? This action can not be undone!</p>

</div>

<div class="site-index">

    <div class="jumbotron">
        <h2>Welcome to the Community Dashboard!</h2>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-sm-12">
                <a class="btn btn-primary" href="/web/?r=site/addkpa"><span class="glyphicon glyphicon-plus-sign"></span> Add KPA</a>
            </div>
        </div>
        <div class="row">
            <?php foreach($kpas as $kpa) { ?>

                <div class="col-sm-3">
                    <div class="kpa">
                        <h4>
                            <?= Html::encode($kpa->Title) ?>
                        </h4>
                        <span>
                            <?php if(isset($kpa->Description)) {
                                echo Html::encode($kpa->Description);
                            } else {
                                echo "No Description";
                            }
                            ?>
                        </span>
                            <div id="container-speed-<?= $kpa->ID ?>" style="width: 200px; height:200px;margin: 0 auto;"></div>
                        <ul class="ops">
                            <li>
                                <a href="<?= Url::to(['site/viewkpa','id'=>$kpa->ID]) ?>" class="btn btn-info btn-md">View</a>
                            </li>
                            <li>
                                <a href="<?= Url::to(['site/editkpa','id'=>$kpa->ID]) ?>" class="btn btn-info btn-md">Edit</a>
                            </li>
                            <li>
                                <button id="deletekpa" class="btn btn-danger btn-xs" type="button" onclick="kpaDeleteDialog(<?= $kpa->ID; ?>)">Delete</button>
                            </li>
                        </ul>

                    </div>
                </div>
<script>
    window.addEventListener("DOMContentLoaded", function() {
    createGauge(<?php echo round($kpa->overallScore()) ?>,100,"container-speed-<?= $kpa->ID ?>");
});
</script>

            <?php } ?>
        </div>
    </div>
</div>