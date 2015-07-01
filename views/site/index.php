<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Community Dashboard';
?>
<div class="site-index">

    <div class="jumbotron">
        <h2>Welcome to the Community Dashboard!</h2>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-sm-12">
                <a href="/web/?r=site/addkpa" class="btn btn-primary">Add a new KPA</a>
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
                        <ul>
                            <li>
                                <b>Goals:</b> 5
                            </li>
                            <li>
                                <b>KPIs:</b> 10
                            </li>
                            <li>
                                <b>Metrics:</b> 15
                            </li>
                        </ul>
                        <ul class="ops">
                            <li>
                                <a href="<?= Url::to(['site/viewkpa','id'=>$kpa->ID]) ?>" class="btn btn-info btn-xs">View</a>
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
