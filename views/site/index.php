<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;


/* @var $this yii\web\View */
$this->title = 'Community Dashboard';

?>

<div id="dialog-form">
    <form id="delete-kpa-form" method="post">
            <button id="delete" type="btn" name="delete">Delete</button>
            <button id="cancel" type="btn" name="cancel">Cancel</button>
    </form>
</div>

<div class="site-index">

    <div class="jumbotron">
        <h2>Welcome to the Community Dashboard!</h2>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-sm-12">
                <a class="btn btn-primary" href="/web/?r=site/addkpa">Add KPA</a>
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
                                <a href="<?= Url::to(['site/editkpa','id'=>$kpa->ID]) ?>" class="btn btn-info btn-xs">Edit</a>
                            </li>
                            <li>
                                <button id="deletekpa" class="btn" type="button">Delete</button>
                            </li>
                        </ul>

                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</div>